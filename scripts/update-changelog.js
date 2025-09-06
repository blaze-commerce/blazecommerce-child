#!/usr/bin/env node

const fs = require('fs');
const { execSync } = require('child_process');

// Read the current version from package.json
const packageJson = JSON.parse(fs.readFileSync('package.json', 'utf8'));
const version = packageJson.version;

console.log(`📝 Updating CHANGELOG.md for version ${version}`);

try {
    // Get the latest tag
    let lastTag;
    try {
        lastTag = execSync('git describe --tags --abbrev=0', { encoding: 'utf8' }).trim();
    } catch (error) {
        lastTag = null;
        console.log('📋 No previous tags found, generating changelog from beginning');
    }

    // Get commits since last tag
    const gitLogCommand = lastTag 
        ? `git log ${lastTag}..HEAD --oneline --pretty=format:"- %s (%h)"`
        : `git log --oneline --pretty=format:"- %s (%h)" -20`;
    
    let commits;
    try {
        commits = execSync(gitLogCommand, { encoding: 'utf8' }).trim();
    } catch (error) {
        commits = '';
    }

    if (!commits) {
        console.log('📭 No new commits found since last tag');
        return;
    }

    // Categorize commits based on conventional commit format
    const commitLines = commits.split('\n');
    const categorizedCommits = {
        features: [],
        fixes: [],
        docs: [],
        style: [],
        refactor: [],
        test: [],
        chore: [],
        other: []
    };

    commitLines.forEach(commit => {
        if (commit.match(/^- feat(\(.+\))?:/)) {
            categorizedCommits.features.push(commit);
        } else if (commit.match(/^- fix(\(.+\))?:/)) {
            categorizedCommits.fixes.push(commit);
        } else if (commit.match(/^- docs(\(.+\))?:/)) {
            categorizedCommits.docs.push(commit);
        } else if (commit.match(/^- style(\(.+\))?:/)) {
            categorizedCommits.style.push(commit);
        } else if (commit.match(/^- refactor(\(.+\))?:/)) {
            categorizedCommits.refactor.push(commit);
        } else if (commit.match(/^- test(\(.+\))?:/)) {
            categorizedCommits.test.push(commit);
        } else if (commit.match(/^- chore(\(.+\))?:/)) {
            categorizedCommits.chore.push(commit);
        } else {
            categorizedCommits.other.push(commit);
        }
    });

    // Read existing changelog
    let changelogContent = '';
    if (fs.existsSync('CHANGELOG.md')) {
        changelogContent = fs.readFileSync('CHANGELOG.md', 'utf8');
    } else {
        changelogContent = `# Changelog

All notable changes to the BlazeCommerce Child Theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

`;
    }

    // Create new entry
    const today = new Date().toISOString().split('T')[0];
    let newEntry = `## [${version}] - ${today}\n\n`;

    // Add categorized commits
    if (categorizedCommits.features.length > 0) {
        newEntry += `### Added\n${categorizedCommits.features.join('\n')}\n\n`;
    }
    if (categorizedCommits.fixes.length > 0) {
        newEntry += `### Fixed\n${categorizedCommits.fixes.join('\n')}\n\n`;
    }
    if (categorizedCommits.docs.length > 0) {
        newEntry += `### Documentation\n${categorizedCommits.docs.join('\n')}\n\n`;
    }
    if (categorizedCommits.style.length > 0) {
        newEntry += `### Style\n${categorizedCommits.style.join('\n')}\n\n`;
    }
    if (categorizedCommits.refactor.length > 0) {
        newEntry += `### Refactored\n${categorizedCommits.refactor.join('\n')}\n\n`;
    }
    if (categorizedCommits.test.length > 0) {
        newEntry += `### Tests\n${categorizedCommits.test.join('\n')}\n\n`;
    }
    if (categorizedCommits.chore.length > 0) {
        newEntry += `### Maintenance\n${categorizedCommits.chore.join('\n')}\n\n`;
    }
    if (categorizedCommits.other.length > 0) {
        newEntry += `### Other Changes\n${categorizedCommits.other.join('\n')}\n\n`;
    }

    // Insert new entry after the header
    const lines = changelogContent.split('\n');
    const headerEndIndex = lines.findIndex((line, index) => 
        line.trim() === '' && index > 5
    ) || 6;
    
    lines.splice(headerEndIndex + 1, 0, newEntry);
    const updatedChangelog = lines.join('\n');

    fs.writeFileSync('CHANGELOG.md', updatedChangelog);
    console.log(`✅ Updated CHANGELOG.md with version ${version}`);
    console.log('📋 New entries:');
    console.log(commits);

} catch (error) {
    console.error('❌ Error updating changelog:', error.message);
    process.exit(1);
}
