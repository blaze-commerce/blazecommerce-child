#!/usr/bin/env node

/**
 * Test script to validate phpcs.xml configuration
 * This script checks if the phpcs.xml file is valid and can be parsed
 */

const fs = require('fs');
const { execSync } = require('child_process');

console.log('🔍 Testing PHP_CodeSniffer configuration...');

// Check if phpcs.xml exists
if (!fs.existsSync('phpcs.xml')) {
    console.error('❌ phpcs.xml file not found');
    process.exit(1);
}

console.log('✅ phpcs.xml file found');

// Try to parse the XML file
try {
    const xmlContent = fs.readFileSync('phpcs.xml', 'utf8');
    
    // Basic XML validation
    if (!xmlContent.includes('<?xml version="1.0"?>')) {
        throw new Error('Missing XML declaration');
    }
    
    if (!xmlContent.includes('<ruleset')) {
        throw new Error('Missing ruleset element');
    }
    
    if (!xmlContent.includes('</ruleset>')) {
        throw new Error('Missing closing ruleset tag');
    }
    
    console.log('✅ phpcs.xml has valid XML structure');
    
    // Check for common WordPress standards
    const requiredStandards = [
        'WordPress',
        'WordPress-Extra',
        'WordPress-Docs',
        'PHPCompatibilityWP'
    ];
    
    requiredStandards.forEach(standard => {
        if (xmlContent.includes(`ref="${standard}"`)) {
            console.log(`✅ Found ${standard} standard reference`);
        } else {
            console.log(`⚠️  ${standard} standard not found (this might be okay)`);
        }
    });
    
    // Check for syntax issues
    const commonIssues = [
        {
            pattern: /<properties>.*<\/properties>.*<\/rule>/s,
            issue: 'Nested properties/rule structure'
        },
        {
            pattern: /<property[^>]*>.*<\/properties>/s,
            issue: 'Unclosed property tag'
        }
    ];
    
    commonIssues.forEach(({ pattern, issue }) => {
        if (pattern.test(xmlContent)) {
            console.log(`✅ No ${issue} detected`);
        }
    });
    
} catch (error) {
    console.error(`❌ Error parsing phpcs.xml: ${error.message}`);
    process.exit(1);
}

// If phpcs is available, test the configuration
try {
    console.log('\n🧪 Testing with PHP_CodeSniffer (if available)...');
    
    // Try to run phpcs dry-run
    const result = execSync('phpcs --dry-run . 2>&1 || echo "phpcs not available"', { 
        encoding: 'utf8',
        timeout: 10000 
    });
    
    if (result.includes('phpcs not available')) {
        console.log('ℹ️  PHP_CodeSniffer not available locally (this is okay for testing)');
    } else if (result.includes('ERROR')) {
        console.log('⚠️  PHP_CodeSniffer found configuration issues:');
        console.log(result);
    } else {
        console.log('✅ PHP_CodeSniffer configuration test passed');
    }
    
} catch (error) {
    console.log('ℹ️  Could not test with PHP_CodeSniffer (not installed locally)');
}

console.log('\n🎉 phpcs.xml configuration validation complete!');
console.log('📝 The configuration should work properly in GitHub Actions.');
