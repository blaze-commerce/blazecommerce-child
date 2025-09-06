#!/usr/bin/env node

const fs = require('fs');
const path = require('path');
const archiver = require('archiver');

// Read the current version from package.json
const packageJson = JSON.parse(fs.readFileSync('package.json', 'utf8'));
const version = packageJson.version;
const themeName = 'blazecommerce-child';

console.log(`📦 Creating theme ZIP package for version ${version}`);

// Files and directories to exclude from the ZIP
const excludePatterns = [
    // Version control
    '.git/',
    '.github/',
    '.gitignore',
    
    // Development files
    'node_modules/',
    'package.json',
    'package-lock.json',
    'yarn.lock',
    'scripts/',
    '*.log',
    
    // Documentation (optional - remove if you want docs in release)
    'docs/',
    'README.md',
    
    // IDE files
    '.vscode/',
    '.idea/',
    '*.swp',
    '*.swo',
    
    // OS files
    '.DS_Store',
    'Thumbs.db',
    
    // Test files
    'tests/',
    'phpunit.xml',
    'coverage/',
    
    // Build artifacts
    'dist/',
    'build/',
    
    // Augment files
    '.augment/',
    '.augmentignore',
    '.augment-guidelines',
    
    // Linting configs
    '.eslintrc*',
    '.stylelintrc*',
    'phpcs.xml',
    'phpcs.xml.dist'
];

// Create output directory if it doesn't exist
const outputDir = 'releases';
if (!fs.existsSync(outputDir)) {
    fs.mkdirSync(outputDir, { recursive: true });
}

const outputPath = path.join(outputDir, `${themeName}-${version}.zip`);

// Create a file to write archive data to
const output = fs.createWriteStream(outputPath);
const archive = archiver('zip', {
    zlib: { level: 9 } // Sets the compression level
});

// Listen for all archive data to be written
output.on('close', function() {
    console.log(`✅ Theme ZIP created: ${outputPath}`);
    console.log(`📊 Archive size: ${(archive.pointer() / 1024 / 1024).toFixed(2)} MB`);
    console.log(`🎉 Theme package ready for distribution!`);
});

// Handle warnings
archive.on('warning', function(err) {
    if (err.code === 'ENOENT') {
        console.warn('⚠️  Warning:', err.message);
    } else {
        throw err;
    }
});

// Handle errors
archive.on('error', function(err) {
    console.error('❌ Error creating ZIP:', err.message);
    throw err;
});

// Pipe archive data to the file
archive.pipe(output);

// Function to check if a file should be excluded
function shouldExclude(filePath) {
    return excludePatterns.some(pattern => {
        if (pattern.endsWith('/')) {
            // Directory pattern
            return filePath.startsWith(pattern) || filePath.includes('/' + pattern);
        } else if (pattern.includes('*')) {
            // Wildcard pattern
            const regex = new RegExp(pattern.replace(/\*/g, '.*'));
            return regex.test(filePath);
        } else {
            // Exact match
            return filePath === pattern || filePath.endsWith('/' + pattern);
        }
    });
}

// Add files to archive
function addDirectory(dirPath, archivePath = '') {
    const items = fs.readdirSync(dirPath);
    
    items.forEach(item => {
        const fullPath = path.join(dirPath, item);
        const relativePath = archivePath ? path.join(archivePath, item) : item;
        
        // Skip excluded files/directories
        if (shouldExclude(relativePath)) {
            console.log(`⏭️  Skipping: ${relativePath}`);
            return;
        }
        
        const stat = fs.statSync(fullPath);
        
        if (stat.isDirectory()) {
            addDirectory(fullPath, relativePath);
        } else {
            archive.file(fullPath, { name: path.join(themeName, relativePath) });
            console.log(`📄 Adding: ${relativePath}`);
        }
    });
}

// Start adding files
console.log('📁 Adding theme files to archive...');
addDirectory('.');

// Finalize the archive
archive.finalize();
