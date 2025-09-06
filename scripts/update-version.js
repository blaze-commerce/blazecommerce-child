#!/usr/bin/env node

const fs = require('fs');
const path = require('path');

// Read the current version from package.json
const packageJson = JSON.parse(fs.readFileSync('package.json', 'utf8'));
const newVersion = packageJson.version;

console.log(`🚀 Updating theme version to ${newVersion}`);

// Update style.css theme header
const styleFile = 'style.css';
if (fs.existsSync(styleFile)) {
    let styleContent = fs.readFileSync(styleFile, 'utf8');
    
    // Update the version in the theme header
    styleContent = styleContent.replace(
        /^Version:\s*[\d.]+$/m,
        `Version:      ${newVersion}`
    );
    
    fs.writeFileSync(styleFile, styleContent);
    console.log(`✅ Updated ${styleFile} with version ${newVersion}`);
} else {
    console.warn(`⚠️  ${styleFile} not found`);
}

// Update functions.php version constant if it exists
const functionsFile = 'functions.php';
if (fs.existsSync(functionsFile)) {
    let functionsContent = fs.readFileSync(functionsFile, 'utf8');
    
    // Check if version constant exists, if not add it
    if (functionsContent.includes('BLAZECOMMERCE_CHILD_VERSION')) {
        functionsContent = functionsContent.replace(
            /define\(\s*['"]BLAZECOMMERCE_CHILD_VERSION['"],\s*['"][\d.]+['"]\s*\);/,
            `define( 'BLAZECOMMERCE_CHILD_VERSION', '${newVersion}' );`
        );
    } else {
        // Add version constant after opening PHP tag
        const phpOpenTag = '<?php';
        if (functionsContent.includes(phpOpenTag)) {
            functionsContent = functionsContent.replace(
                phpOpenTag,
                `${phpOpenTag}\n\n// Theme version constant\ndefine( 'BLAZECOMMERCE_CHILD_VERSION', '${newVersion}' );\n`
            );
        }
    }
    
    fs.writeFileSync(functionsFile, functionsContent);
    console.log(`✅ Updated ${functionsFile} with version ${newVersion}`);
}

// Update theme.json version if it exists
const themeJsonFile = 'theme.json';
if (fs.existsSync(themeJsonFile)) {
    try {
        const themeJson = JSON.parse(fs.readFileSync(themeJsonFile, 'utf8'));
        themeJson.version = newVersion;
        fs.writeFileSync(themeJsonFile, JSON.stringify(themeJson, null, '\t') + '\n');
        console.log(`✅ Updated ${themeJsonFile} with version ${newVersion}`);
    } catch (error) {
        console.warn(`⚠️  Could not update ${themeJsonFile}: ${error.message}`);
    }
}

// Update README.md version references
const readmeFile = 'README.md';
if (fs.existsSync(readmeFile)) {
    let readmeContent = fs.readFileSync(readmeFile, 'utf8');
    
    // Update version badges or references
    readmeContent = readmeContent.replace(
        /Version:\s*[\d.]+/g,
        `Version: ${newVersion}`
    );
    
    fs.writeFileSync(readmeFile, readmeContent);
    console.log(`✅ Updated ${readmeFile} with version ${newVersion}`);
}

console.log('🎉 Version update complete!');
console.log(`📦 All files updated to version ${newVersion}`);
