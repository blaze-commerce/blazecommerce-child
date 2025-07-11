# Changelog

All notable changes to the BlazeCommerce Child Theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- DevOps automation implementation
- Automated versioning system with semantic versioning support
- Release management workflow for creating theme ZIP packages
- Code quality checks with WordPress coding standards
- Basic testing framework setup with PHPUnit
- Claude AI-powered code reviews
- Comprehensive GitHub Actions workflows

### Changed
- Enhanced development workflow with automation
- Improved code quality standards
- Added comprehensive testing infrastructure

## [1.0.1] - 2024-12-01

### Changed
- Updated parent theme to Twenty Twenty-Five
- Added plugin dependency management using TGMPA

### Fixed
- Removed the Woo GraphQL version
- Moved plugin files to Amazon S3 for improved scalability and performance

## [1.0.0] - 2024-11-01

### Added
- Initial release with support for Twenty Twenty-Four theme
- Full compatibility with WooCommerce
- Support for Full Site Editing
- Block Patterns for rapid page design
- Optimized for Blaze Commerce platform
- Simple and adaptable design for faster store setup

---

## Release Notes

### Version Numbering
This project follows [Semantic Versioning](https://semver.org/):
- **MAJOR** version when you make incompatible API changes
- **MINOR** version when you add functionality in a backwards compatible manner
- **PATCH** version when you make backwards compatible bug fixes

### Automated Releases
Starting with version 1.0.2, releases are automated using:
- Conventional commit messages for version determination
- Automated changelog generation
- GitHub releases with ZIP packages
- Comprehensive testing before release
