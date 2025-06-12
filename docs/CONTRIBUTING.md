# Contributing Guide

Thank you for your interest in contributing to the BlazeCommerce Child Theme! This guide outlines the process and requirements for contributing to the project.

## 🚨 MANDATORY Documentation Requirements

**CRITICAL**: All contributions MUST include comprehensive documentation updates. No exceptions.

### Before You Start

1. **Read** all documentation in `/docs/` directory
2. **Understand** the documentation-first development workflow
3. **Prepare** to create/update relevant .md files for your changes

## Development Workflow

### 1. Documentation-First Approach

**MANDATORY PROCESS**:

1. **Before coding**: Create or update relevant documentation files
2. **During development**: Keep documentation synchronized with code changes
3. **Before committing**: Verify all documentation is complete and accurate
4. **PR Review**: Documentation completeness is checked before merge

### 2. Required Documentation Updates

For **every contribution**, you MUST update:

#### New Features
- [ ] `/docs/FUNCTIONS.md` - Document all new functions with examples
- [ ] `/docs/BLOCK-PATTERNS.md` - Document new patterns with usage
- [ ] `/docs/TEMPLATES.md` - Document template changes
- [ ] `/docs/API.md` - Document new hooks/filters
- [ ] `/docs/CHANGELOG.md` - Add detailed change entry
- [ ] `/docs/README.md` - Update if feature affects overview

#### Bug Fixes
- [ ] `/docs/CHANGELOG.md` - Document the fix
- [ ] `/docs/TROUBLESHOOTING.md` - Update if relevant
- [ ] Relevant feature documentation - Update if behavior changes

#### Documentation Changes
- [ ] All affected .md files
- [ ] `/docs/CHANGELOG.md` - Document documentation updates

## Getting Started

### 1. Fork and Clone

```bash
# Fork the repository on GitHub
# Clone your fork
git clone https://github.com/YOUR-USERNAME/blazecommerce-child.git
cd blazecommerce-child
```

### 2. Set Up Development Environment

```bash
# Install dependencies (if any)
npm install  # or yarn install

# Set up local WordPress development environment
# Ensure Twenty Twenty-Five parent theme is installed
```

### 3. Create Feature Branch

```bash
# Create and checkout new branch
git checkout -b feature/your-feature-name

# Or for bug fixes
git checkout -b fix/issue-description
```

## Development Standards

### 1. Code Standards

- **WordPress Coding Standards**: Follow WPCS for all PHP code
- **Function Naming**: Use `blazecommerce_child_` prefix for all functions
- **File Structure**: Follow established directory structure
- **Comments**: Use PHPDoc format for all functions and classes

### 2. Testing Requirements

- [ ] Test with latest WordPress version
- [ ] Test with Twenty Twenty-Five parent theme
- [ ] Test WooCommerce compatibility (if applicable)
- [ ] Test across major browsers
- [ ] Test responsive design
- [ ] Test accessibility features

### 3. Security Requirements

- [ ] Sanitize all inputs
- [ ] Escape all outputs
- [ ] Use WordPress nonces for forms
- [ ] Follow WordPress security best practices

## Documentation Standards

### 1. Markdown Format

- Use consistent Markdown formatting
- Include code examples for all functions
- Add screenshots for visual features
- Use proper heading hierarchy

### 2. Code Examples

All code examples MUST:
- Be tested and working
- Include proper context
- Show both usage and output
- Follow WordPress coding standards

### 3. Screenshots

For visual features:
- Include before/after screenshots
- Show responsive behavior
- Demonstrate accessibility features
- Use consistent styling

## Commit Guidelines

### 1. Commit Message Format

```
type(scope): description

Detailed explanation of changes

docs: update documentation
- Add function documentation to FUNCTIONS.md
- Include usage examples and parameters
- Update CHANGELOG.md with changes
```

### 2. Commit Types

- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes
- `refactor`: Code refactoring
- `test`: Adding tests
- `chore`: Maintenance tasks

### 3. Documentation Commits

**MANDATORY**: Every code commit MUST be accompanied by documentation commits:

```bash
# Example workflow
git add functions.php
git commit -m "feat(functions): add cart count display function"

git add docs/FUNCTIONS.md docs/CHANGELOG.md
git commit -m "docs: document cart count function

- Add blazecommerce_child_woocommerce_cart_count() to FUNCTIONS.md
- Include usage examples and return values
- Update CHANGELOG.md with new feature"
```

## Pull Request Process

### 1. Pre-PR Checklist

**MANDATORY CHECKS**:
- [ ] All code follows WordPress standards
- [ ] All functions have `blazecommerce_child_` prefix
- [ ] All relevant documentation files updated
- [ ] Code examples tested and working
- [ ] Screenshots added for visual changes
- [ ] CHANGELOG.md updated with detailed entry
- [ ] All tests passing
- [ ] No merge conflicts

### 2. PR Description Template

```markdown
## Summary
Brief description of changes

## Changes Made
- List of specific changes
- Include file names and functions

## Documentation Updates
- [ ] FUNCTIONS.md updated
- [ ] CHANGELOG.md updated
- [ ] Screenshots added
- [ ] Code examples tested

## Testing
- [ ] WordPress latest version
- [ ] Parent theme compatibility
- [ ] Browser testing completed
- [ ] Accessibility testing done

## Breaking Changes
List any breaking changes and migration notes
```

### 3. Review Process

1. **Automated checks** run on PR creation
2. **Documentation review** for completeness
3. **Code review** by maintainers
4. **Testing** in development environment
5. **Approval** and merge

## Code Review Guidelines

### For Contributors

- Respond to feedback promptly
- Make requested changes
- Update documentation as needed
- Test all changes thoroughly

### For Reviewers

- Check documentation completeness first
- Verify code follows standards
- Test functionality
- Provide constructive feedback

## Common Mistakes to Avoid

### 1. Documentation Mistakes

- ❌ Forgetting to update documentation
- ❌ Incomplete function documentation
- ❌ Missing code examples
- ❌ Outdated screenshots

### 2. Code Mistakes

- ❌ Missing function prefixes
- ❌ Not following WordPress standards
- ❌ Inadequate testing
- ❌ Security vulnerabilities

### 3. Process Mistakes

- ❌ Committing without documentation
- ❌ Poor commit messages
- ❌ Not testing thoroughly
- ❌ Ignoring review feedback

## Getting Help

### Resources

- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [Child Theme Development](https://developer.wordpress.org/themes/advanced-topics/child-themes/)
- [Block Development](https://developer.wordpress.org/block-editor/)

### Support Channels

- GitHub Issues for bug reports
- GitHub Discussions for questions
- BlazeCommerce support for urgent issues

## Recognition

Contributors will be:
- Listed in CHANGELOG.md
- Credited in README.md
- Recognized in release notes

---

## Quick Checklist

Before submitting any contribution:

- [ ] Code follows WordPress standards
- [ ] Functions use proper prefixes
- [ ] All documentation updated
- [ ] Code examples tested
- [ ] Screenshots included (if visual)
- [ ] CHANGELOG.md updated
- [ ] Tests passing
- [ ] PR description complete

**Remember**: Documentation is not optional - it's mandatory for all contributions!

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
