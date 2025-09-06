# DevOps Automation Setup

This document provides setup and usage instructions for the comprehensive DevOps automation implemented in the BlazeCommerce Child Theme.

## 🚀 Quick Start

### Prerequisites
- Node.js 14+ and npm 6+
- Git with conventional commit message support
- PHP 8.0+ (for local development and testing)

### Installation
```bash
# Install Node.js dependencies
npm install

# Make scripts executable (if needed)
chmod +x scripts/*.js
chmod +x bin/install-wp-tests.sh
```

## 🔄 Automated Versioning

### How It Works
The system automatically analyzes your commit messages and determines the appropriate version bump:

- `feat:` → Minor version bump (1.0.0 → 1.1.0)
- `fix:` → Patch version bump (1.0.0 → 1.0.1)
- `feat!:` or `BREAKING CHANGE` → Major version bump (1.0.0 → 2.0.0)

### Commit Message Format
```bash
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

### Examples
```bash
# Minor version bump
git commit -m "feat: add new hero block pattern"
git commit -m "feat(blocks): implement product showcase grid"

# Patch version bump
git commit -m "fix: resolve mobile responsive issues"
git commit -m "fix(css): correct button alignment"

# Major version bump
git commit -m "feat!: redesign theme structure"
git commit -m "feat: remove deprecated functions

BREAKING CHANGE: The old theme setup function has been removed"

# No version bump
git commit -m "docs: update README"
git commit -m "style: fix code formatting"
git commit -m "chore: update dependencies"
```

### Manual Version Management
```bash
# If you need to manually bump versions
npm run version:patch  # 1.0.0 → 1.0.1
npm run version:minor  # 1.0.0 → 1.1.0
npm run version:major  # 1.0.0 → 2.0.0

# Update changelog
npm run changelog

# Prepare for release
npm run prepare-release
```

## 📦 Release Management

### Automatic Releases
1. Push commits with conventional messages to `main` branch
2. Auto-version workflow runs and creates new version + tag
3. Release workflow triggers on new tag
4. GitHub release created with ZIP package

### Manual Release
```bash
# Create theme ZIP package
npm run zip

# The ZIP will be created in releases/ directory
```

### What's Included in Releases
- All theme files (PHP, CSS, JS, templates, patterns)
- Required assets and images
- Documentation (if enabled)

### What's Excluded from Releases
- Development files (node_modules, scripts, tests)
- Version control files (.git, .github)
- IDE and OS files
- Build artifacts and logs

## 🔍 Code Quality

### Automated Checks
All code is automatically checked for:
- WordPress coding standards (PHP)
- CSS best practices (Stylelint)
- Security vulnerabilities
- Theme structure validation

### Running Checks Locally
```bash
# Run all quality checks
npm run lint

# Fix auto-fixable issues
npm run lint:fix

# PHP-specific checks
npm run lint:php
npm run lint:php:fix

# CSS-specific checks
npm run lint:css
npm run lint:css:fix

# Validate theme structure
npm run validate
```

### Code Review with Claude AI
- Automatic code reviews on pull requests
- WordPress-specific feedback
- Security and performance suggestions
- Best practices recommendations

## 🧪 Testing

### Setup WordPress Test Environment
```bash
# Install WordPress test suite
bin/install-wp-tests.sh wordpress_test root '' localhost latest

# Set environment variable
export WP_TESTS_DIR=/tmp/wordpress-tests-lib
```

### Running Tests
```bash
# Run all tests
npm test

# Run with coverage report
npm run test:coverage

# Watch mode for development
npm run test:watch
```

### Test Structure
- `tests/test-theme-setup.php` - Theme functionality tests
- `tests/test-woocommerce-integration.php` - WooCommerce compatibility tests
- `tests/class-theme-test-case.php` - Base test utilities

## 🔧 Configuration

### GitHub Secrets (Optional)
Add these to your GitHub repository secrets for full automation:

- `ANTHROPIC_API_KEY` - For Claude AI code reviews
- Additional secrets for WordPress.org deployment (future)

### Customizing Workflows
Edit files in `.github/workflows/` to customize:
- `auto-version.yml` - Version bump triggers and logic
- `release.yml` - Release package contents and distribution
- `code-quality.yml` - Quality check rules and tools
- `claude-code-review.yml` - AI review prompts and triggers

### Linting Configuration
- `phpcs.xml` - PHP CodeSniffer rules for WordPress
- `.stylelintrc.json` - CSS linting rules
- `.zipignore` - Files to exclude from release packages

## 📊 Monitoring and Debugging

### GitHub Actions
- View workflow runs in GitHub Actions tab
- Check logs for detailed error information
- Monitor automation performance and success rates

### Local Debugging
```bash
# Test version update script
npm run version:patch
git status  # Check what files were updated
git reset --hard HEAD  # Reset for testing

# Test ZIP creation
npm run zip
ls -la releases/  # Check generated files

# Validate theme structure
npm run validate
```

## 🚨 Troubleshooting

### Common Issues

**Version bump not working:**
- Check commit message format
- Ensure you're on the main branch
- Verify GitHub Actions permissions

**Tests failing:**
- Install WordPress test environment
- Check PHP version compatibility
- Verify database connection

**Linting errors:**
- Run `npm run lint:fix` for auto-fixes
- Check configuration files for custom rules
- Review WordPress coding standards

**Release ZIP missing files:**
- Check `.zipignore` configuration
- Verify file paths and exclusions
- Test locally with `npm run zip`

### Getting Help
1. Check GitHub Actions logs for detailed error messages
2. Review this documentation for configuration options
3. Test automation locally before pushing
4. Use conventional commit messages for predictable behavior

## 🎯 Best Practices

### Development Workflow
1. Create feature branch from main
2. Make changes with conventional commits
3. Push branch and create pull request
4. Code quality checks run automatically
5. Merge to main triggers version bump and release

### Commit Messages
- Use clear, descriptive messages
- Follow conventional commit format
- Include scope when relevant
- Add breaking change notes for major updates

### Testing
- Run tests locally before pushing
- Add tests for new functionality
- Maintain good test coverage
- Test theme with actual WordPress installation

### Releases
- Let automation handle versioning
- Review generated changelogs
- Test release packages before distribution
- Monitor GitHub releases for issues

---

This DevOps setup transforms manual, error-prone processes into a fully automated, professional-grade pipeline that saves hours of work per release while dramatically improving code quality and consistency.
