---
type: "agent_requested"
description: "CI/CD practices for WordPress child theme development"
---

# CI/CD & DevOps Standards Rule

## GitHub Actions Workflows

### Code Quality & Security
```yaml
name: Code Quality Check
on: [push, pull_request]
jobs:
  php-lint:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.1'
      - name: PHP Lint
        run: find . -name "*.php" -exec php -l {} \;

  phpcs:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: PHPCS Check
        run: phpcs --standard=WordPress .

  security:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Security Scan
        run: grep -r "password\|api_key\|secret" --exclude-dir=.git .
```

### Testing Requirements
- WordPress compatibility testing (multiple versions)
- WooCommerce compatibility verification
- PHP version compatibility (8.0+)
- Performance testing (Core Web Vitals)
- Security scanning for credentials

## Deployment & Asset Management

### Deployment Pipeline
```yaml
name: Deploy to Production
on:
  push:
    branches: [main]
jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Deploy to Production
        run: rsync -avz --exclude='.git' . user@server:/path/to/theme/
```

### WordPress Environment Setup
```bash
#!/bin/bash
wp core download
wp config create --dbname=blazecommerce --dbuser=root --dbpass=password
wp core install --url=localhost --title="BlazeCommerce" --admin_user=admin
wp theme activate blazecommerce-child
```

### Build Process
```json
{
  "scripts": {
    "build": "npm run build:css && npm run build:js",
    "build:css": "tailwindcss -i ./src/style.css -o ./style.css --minify",
    "build:js": "webpack --mode=production"
  }
}
```

**Deployment Requirements:**
- Staging environment with automated testing
- Blue-green deployment strategy
- Database migration handling
- Asset optimization and cache invalidation

## Environment & Quality Assurance

### Environment Configuration
```php
// wp-config.php environment settings
define('WP_ENVIRONMENT_TYPE', getenv('WP_ENV') ?: 'development');
if (WP_ENVIRONMENT_TYPE === 'development') {
    define('WP_DEBUG', true);
    define('WP_DEBUG_LOG', true);
}
```

### Quality Assurance Requirements
- **Automated**: PHP_CodeSniffer, ESLint, Stylelint, accessibility testing
- **Manual**: Code review, design review, functionality testing, performance validation
- **Monitoring**: Error tracking, performance monitoring, security incident detection
- **Backup**: Daily database/file backups, disaster recovery procedures

### Security & Performance
- **Secrets**: Use GitHub Secrets, rotate regularly, audit access
- **Scanning**: Dependency vulnerabilities, code security analysis
- **Optimization**: Parallel builds, caching strategies, minimal downtime deployments
- **Reporting**: Build status, test coverage, performance, security reports

## Context
WordPress child theme development, WooCommerce integration, block patterns, custom functionality, performance optimization, security updates.
