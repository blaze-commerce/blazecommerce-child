# Issue Documentation Rule

**Priority: ALWAYS**

**Description:** Mandate comprehensive documentation of all issues, tests, and resolutions for AI learning and institutional knowledge.

## Core Requirements

### 1. Documentation Template
```markdown
# Issue: [Brief Description]

## Problem
- **Symptoms**: What was observed
- **Impact**: Functionality affected
- **Environment**: WordPress/PHP/theme versions

## Root Cause
- **Investigation**: What was checked
- **Findings**: What was discovered
- **Cause**: Underlying issue

## Solution
- **Steps**: Resolution process
- **Code**: Specific changes made
- **Testing**: Verification method

## Prevention
- **Monitoring**: Detection method
- **Guidelines**: Prevention measures
```

### 2. WordPress Child Theme Focus
- theme.json configuration issues
- Block pattern/template problems
- WooCommerce template conflicts
- Hook/filter implementations
- Custom post type issues
- Performance optimizations
- Security vulnerabilities

### 3. Security Compliance (CRITICAL)
- **NEVER** include credentials, API keys, tokens, passwords
- **NEVER** include database strings or server details
- **NEVER** include user personal information
- Use placeholder: `[REPLACE_WITH_ACTUAL_VALUE_FROM_USER_CREDENTIALS]`
- Sanitize code examples, remove production URLs, anonymize data

### 4. File Organization
- **Location**: `/.augment/rules/issues/` (primary), `/docs/troubleshooting/` (backup)
- **Naming**: `YYYY-MM-DD-issue-brief-description.md`
- **Format**: Markdown with descriptive names

### 5. Workflow Integration
- Document issues during development
- Include resolution in commit messages
- Reference in pull requests
- Document test cases revealing issues
- Note performance impact

## Enforcement
**ALWAYS** priority - cannot be bypassed. Ensures:
1. Institutional knowledge preservation
2. AI pattern recognition
3. Quality improvement
4. Team efficiency
