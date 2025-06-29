# Changelog

All notable changes to the BlazeCommerce Child Theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Comprehensive documentation structure in `/docs` directory
- Mandatory documentation requirements for all code changes
- Documentation-first development workflow
- Action Scheduler conditional disabling for staging environments

### Changed
- Updated `.augment-guidelines` to mandate comprehensive .md documentation
- Enhanced commit guidelines to require documentation updates

### Performance
- Disabled Action Scheduler background processing on `.blz.onl` staging domains to prevent unnecessary resource usage

## [1.0.1] - 2024-12-12

### Added
- Initial BlazeCommerce Child Theme setup
- Twenty Twenty-Five parent theme integration
- Basic theme structure with patterns, templates, and parts
- WooCommerce template overrides
- Custom functions and theme setup

### Features
- Full Site Editing (FSE) support
- Block patterns for common layouts
- WooCommerce integration
- Responsive design with Tailwind CSS
- Accessibility features

### Files Added
- `style.css` - Main theme stylesheet with theme header
- `functions.php` - Theme functions and WordPress hooks
- `theme.json` - Theme configuration for block editor
- `/patterns/` - Block patterns directory
- `/templates/` - FSE templates directory
- `/parts/` - Template parts directory
- `/woocommerce/` - WooCommerce template overrides

## [1.0.0] - 2024-12-01

### Added
- Initial theme structure
- Parent theme dependency (Twenty Twenty-Five)
- Basic theme configuration

---

## Documentation Requirements

**MANDATORY**: Every entry in this changelog MUST include:

1. **Version number** following semantic versioning
2. **Date** in YYYY-MM-DD format
3. **Category** (Added, Changed, Deprecated, Removed, Fixed, Security)
4. **Detailed description** of changes
5. **Files affected** list
6. **Breaking changes** clearly marked
7. **Migration notes** if applicable

## Change Categories

- **Added** for new features
- **Changed** for changes in existing functionality
- **Deprecated** for soon-to-be removed features
- **Removed** for now removed features
- **Fixed** for any bug fixes
- **Security** in case of vulnerabilities

## Version Format

- **MAJOR** version for incompatible API changes
- **MINOR** version for backwards-compatible functionality additions
- **PATCH** version for backwards-compatible bug fixes

---

**Maintained by**: BlazeCommerce Team  
**Last Updated**: December 2024
