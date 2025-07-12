#!/usr/bin/env node

const fs = require('fs');
const path = require('path');

console.log('🔍 Validating WordPress theme structure...');

let errors = [];
let warnings = [];
let passed = 0;

// Required files for WordPress theme
const requiredFiles = [
    'style.css',
    'functions.php'
];

// Recommended files
const recommendedFiles = [
    'screenshot.png',
    'screenshot.jpg',
    'README.md',
    'theme.json'
];

// Check required files
console.log('\n📋 Checking required files...');
requiredFiles.forEach(file => {
    if (fs.existsSync(file)) {
        console.log(`✅ ${file} - Found`);
        passed++;
    } else {
        console.log(`❌ ${file} - Missing`);
        errors.push(`Required file missing: ${file}`);
    }
});

// Check recommended files
console.log('\n📋 Checking recommended files...');
recommendedFiles.forEach(file => {
    if (fs.existsSync(file)) {
        console.log(`✅ ${file} - Found`);
        passed++;
    } else {
        console.log(`⚠️  ${file} - Missing (recommended)`);
        warnings.push(`Recommended file missing: ${file}`);
    }
});

// Validate style.css header
console.log('\n📋 Validating style.css header...');
if (fs.existsSync('style.css')) {
    const styleContent = fs.readFileSync('style.css', 'utf8');
    const requiredHeaders = [
        'Theme Name',
        'Template',
        'Version'
    ];
    
    requiredHeaders.forEach(header => {
        const regex = new RegExp(`^${header}:\\s*.+$`, 'm');
        if (regex.test(styleContent)) {
            console.log(`✅ ${header} - Found`);
            passed++;
        } else {
            console.log(`❌ ${header} - Missing`);
            errors.push(`Missing required header in style.css: ${header}`);
        }
    });
    
    // Check if it's properly formatted as child theme
    if (styleContent.includes('Template:')) {
        console.log('✅ Child theme template reference - Found');
        passed++;
    } else {
        console.log('❌ Child theme template reference - Missing');
        errors.push('style.css must include Template header for child themes');
    }
}

// Validate functions.php
console.log('\n📋 Validating functions.php...');
if (fs.existsSync('functions.php')) {
    const functionsContent = fs.readFileSync('functions.php', 'utf8');
    
    // Check for proper PHP opening tag
    if (functionsContent.startsWith('<?php')) {
        console.log('✅ PHP opening tag - Correct');
        passed++;
    } else {
        console.log('❌ PHP opening tag - Missing or incorrect');
        errors.push('functions.php must start with <?php');
    }
    
    // Check for parent theme stylesheet enqueue
    if (functionsContent.includes('wp_enqueue_style') && 
        (functionsContent.includes('get_template_directory_uri') || 
         functionsContent.includes('parent'))) {
        console.log('✅ Parent theme stylesheet enqueue - Found');
        passed++;
    } else {
        console.log('⚠️  Parent theme stylesheet enqueue - Not found');
        warnings.push('Consider properly enqueuing parent theme stylesheet');
    }
}

// Check theme.json if it exists
console.log('\n📋 Validating theme.json...');
if (fs.existsSync('theme.json')) {
    try {
        const themeJson = JSON.parse(fs.readFileSync('theme.json', 'utf8'));
        
        if (themeJson.version) {
            console.log('✅ theme.json version - Found');
            passed++;
        } else {
            console.log('⚠️  theme.json version - Missing');
            warnings.push('theme.json should include version number');
        }
        
        if (themeJson.settings) {
            console.log('✅ theme.json settings - Found');
            passed++;
        } else {
            console.log('⚠️  theme.json settings - Missing');
            warnings.push('theme.json should include settings object');
        }
        
    } catch (error) {
        console.log('❌ theme.json - Invalid JSON format');
        errors.push('theme.json contains invalid JSON');
    }
}

// Check for common WordPress directories
console.log('\n📋 Checking theme structure...');
const commonDirs = ['templates', 'parts', 'patterns'];
commonDirs.forEach(dir => {
    if (fs.existsSync(dir)) {
        console.log(`✅ ${dir}/ directory - Found`);
        passed++;
    } else {
        console.log(`ℹ️  ${dir}/ directory - Not found (optional)`);
    }
});

// Summary
console.log('\n' + '='.repeat(50));
console.log('📊 VALIDATION SUMMARY');
console.log('='.repeat(50));
console.log(`✅ Passed checks: ${passed}`);
console.log(`⚠️  Warnings: ${warnings.length}`);
console.log(`❌ Errors: ${errors.length}`);

if (warnings.length > 0) {
    console.log('\n⚠️  WARNINGS:');
    warnings.forEach(warning => console.log(`   • ${warning}`));
}

if (errors.length > 0) {
    console.log('\n❌ ERRORS:');
    errors.forEach(error => console.log(`   • ${error}`));
    console.log('\n🚨 Theme validation failed! Please fix the errors above.');
    process.exit(1);
} else {
    console.log('\n🎉 Theme validation passed!');
    if (warnings.length > 0) {
        console.log('💡 Consider addressing the warnings for better theme quality.');
    }
}
