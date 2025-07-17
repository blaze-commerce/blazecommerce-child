---
type: "agent_requested"
description: "Git workflow and PR standards for WordPress child theme development"
---

# Git & PR Standards Rule

## Conventional Commits

### Commit Structure
```
<type>[scope]: <description>
```

### Types & Scopes
**Types:** feat, fix, docs, style, refactor, perf, test, chore, security
**Scopes:** blocks, templates, woocommerce, styles, functions, assets, config

### Examples
```
feat(blocks): add product showcase block pattern
fix(woocommerce): resolve cart drawer styling issue
docs(templates): update template customization guide
perf(styles): optimize CSS loading for better Core Web Vitals
security(functions): sanitize user input in custom functions
```

## Branch Management

### Naming Convention
- **Feature**: `feature/block-pattern-hero-section`
- **Bug fix**: `fix/cart-drawer-mobile-styling`
- **Hotfix**: `hotfix/security-vulnerability-fix`
- **Release**: `release/v1.2.0`

### Workflow
```bash
git checkout main && git pull origin main
git checkout -b feature/new-product-template
git add . && git commit -m "feat(templates): add custom single product template"
git push origin feature/new-product-template
# Create PR, after merge: git branch -d feature/new-product-template
```

### Protected Branches
- **main**: Require PR reviews, status checks, linear history
- **develop**: Require PR reviews, allow maintainer force pushes
- No direct pushes to protected branches

## Pull Request Standards

### PR Title Format
```
feat(blocks): integrate hero section block pattern for homepage
fix(woocommerce): resolve mobile cart drawer styling issues
docs(setup): update installation and configuration documentation
```

### PR Description Template
```markdown
## Description
Brief description of changes made.

## Type of Change
- [ ] Bug fix / New feature / Breaking change / Documentation / Performance / Security

## Context
- WordPress: 6.4+ | WooCommerce: 8.0+ | PHP: 8.1+

## Testing Checklist
- [ ] WordPress coding standards followed
- [ ] Self-review completed
- [ ] Documentation updated
- [ ] All tests pass locally
- [ ] Accessibility (WCAG 2.1 AA) verified
- [ ] Cross-browser/mobile testing completed
- [ ] Performance impact assessed

## Related Issues
Closes #123, Fixes #456, Related to #789

## Deployment Notes
Special considerations or database migrations needed.
```

### Review Requirements
- **Reviewers**: 1 for minor, 2 for major changes
- **Checks**: All CI/CD pipelines must pass
- **Standards**: Code quality, testing, documentation requirements

## Code Review & Workflow

### Review Checklist
- [ ] WordPress coding standards, security, performance, accessibility
- [ ] Cross-browser/mobile compatibility, documentation, tests
- [ ] No credentials or sensitive data exposed

### Git Best Practices
- **Commits**: Atomic, clear messages, present tense, reference issues
- **Merge**: Squash for features, merge for releases, rebase for clean history
- **Conflicts**: `git rebase main`, resolve, `git push --force-with-lease`

### Release Management (SemVer)
- **MAJOR**: Breaking changes
- **MINOR**: New features (backward compatible)
- **PATCH**: Bug fixes (backward compatible)

```bash
# Release process
git checkout -b release/v1.2.0
# Update versions, CHANGELOG.md, test
git checkout main && git merge release/v1.2.0
git tag -a v1.2.0 -m "Release version 1.2.0"
git push origin v1.2.0
```

### Documentation
- Keep README.md current with setup instructions
- Maintain CHANGELOG.md with Added/Fixed/Changed sections
- Document compatibility information

## Context
WordPress child theme development, WooCommerce integration, block patterns, custom functionality, performance optimization, security changes.
