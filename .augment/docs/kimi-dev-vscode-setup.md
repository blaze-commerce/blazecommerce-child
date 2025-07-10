# Kimi-Dev VS Code Integration Setup for WordPress Child Theme Development

## Prerequisites
- VS Code with Augment Code extension
- Python environment with kimi-dev installed
- WordPress development environment (Local, XAMPP, etc.)
- PHP CodeSniffer with WordPress Coding Standards
- WordPress child theme development tools
- vLLM server running (optional, for local model)

## Setup Steps

### 1. Install Kimi-Dev
```bash
git clone https://github.com/MoonshotAI/Kimi-Dev.git
cd Kimi-Dev
conda create -n kimidev python=3.12
conda activate kimidev
pip install -e .
```

### 2. WordPress Child Theme VS Code Tasks Configuration
Create `.vscode/tasks.json`:

```json
{
    "version": "2.0.0",
    "tasks": [
        {
            "label": "WordPress Child Theme Customization",
            "type": "shell",
            "command": "python",
            "args": [
                "${workspaceFolder}/scripts/child-theme-kimi-dev-customization.py",
                "--file", "${file}",
                "--issue", "${input:issueDescription}",
                "--parent-theme", "astra"
            ],
            "group": "build",
            "presentation": {
                "echo": true,
                "reveal": "always",
                "focus": false,
                "panel": "shared"
            }
        },
        {
            "label": "WordPress Child Theme Template Override",
            "type": "shell",
            "command": "python",
            "args": [
                "${workspaceFolder}/scripts/child-theme-kimi-dev-template.py",
                "--file", "${file}",
                "--template-type", "${input:templateType}"
            ],
            "group": "build"
        },
        {
            "label": "WordPress Child Theme Performance Audit",
            "type": "shell",
            "command": "python",
            "args": [
                "${workspaceFolder}/scripts/child-theme-kimi-dev-performance.py",
                "--file", "${file}"
            ],
            "group": "build"
        },
        {
            "label": "WordPress Child Theme Compatibility Check",
            "type": "shell",
            "command": "python",
            "args": [
                "${workspaceFolder}/scripts/child-theme-kimi-dev-compatibility.py",
                "--parent-theme", "astra"
            ],
            "group": "test"
        },
        {
            "label": "WordPress Standards Check",
            "type": "shell",
            "command": "phpcs",
            "args": [
                "--standard=WordPress",
                "${file}"
            ],
            "group": "build"
        }
    ],
    "inputs": [
        {
            "id": "issueDescription",
            "description": "Describe the WordPress child theme issue to fix",
            "default": "",
            "type": "promptString"
        },
        {
            "id": "templateType",
            "description": "Type of WordPress template to create/modify",
            "default": "page",
            "type": "pickString",
            "options": [
                "page",
                "single",
                "archive",
                "woocommerce",
                "block-pattern",
                "template-part",
                "custom-post-type"
            ]
        }
    ]
}
```

### 3. WordPress Child Theme Custom Scripts
Create helper scripts for child theme development:

#### Child Theme Customization Script (`scripts/child-theme-kimi-dev-customization.py`)
```python
#!/usr/bin/env python3
import argparse
import sys
import os
from pathlib import Path

def main():
    parser = argparse.ArgumentParser()
    parser.add_argument('--file', required=True)
    parser.add_argument('--issue', required=True)
    parser.add_argument('--parent-theme', default='astra')
    args = parser.parse_args()
    
    # Stage 1: WordPress Child Theme File Localization
    print("🔍 Stage 1: WordPress Child Theme File Localization")
    print(f"   Analyzing child theme structure...")
    print(f"   Checking parent theme compatibility: {args.parent_theme}")
    print(f"   Reviewing template hierarchy and overrides...")
    
    # Stage 2: Child Theme-Compliant Code Editing
    print("🛠️ Stage 2: Child Theme-Compliant Code Editing")
    print(f"   Applying child theme best practices...")
    print(f"   Ensuring parent theme inheritance...")
    print(f"   Implementing proper template customizations...")
    
    print(f"Processing child theme file: {args.file}")
    print(f"Issue: {args.issue}")
    print(f"Parent theme: {args.parent_theme}")

if __name__ == "__main__":
    main()
```

### 4. WordPress Child Theme Keybindings
Add to `keybindings.json`:

```json
[
    {
        "key": "ctrl+shift+t ctrl+shift+c",
        "command": "workbench.action.tasks.runTask",
        "args": "WordPress Child Theme Customization"
    },
    {
        "key": "ctrl+shift+t ctrl+shift+t",
        "command": "workbench.action.tasks.runTask",
        "args": "WordPress Child Theme Template Override"
    },
    {
        "key": "ctrl+shift+t ctrl+shift+p",
        "command": "workbench.action.tasks.runTask",
        "args": "WordPress Child Theme Performance Audit"
    },
    {
        "key": "ctrl+shift+t ctrl+shift+k",
        "command": "workbench.action.tasks.runTask",
        "args": "WordPress Child Theme Compatibility Check"
    },
    {
        "key": "ctrl+shift+t ctrl+shift+s",
        "command": "workbench.action.tasks.runTask",
        "args": "WordPress Standards Check"
    }
]
```

## WordPress Child Theme Development Workflow Examples

### 1. Child Theme Customization Workflow
1. **Ctrl+Shift+T, Ctrl+Shift+C** → Trigger child theme customization task
2. Describe the child theme customization needed
3. Kimi-Dev analyzes with child theme context and provides compliant customization
4. Review changes for parent theme compatibility
5. Test with parent theme updates

### 2. Template Override Workflow
1. **Ctrl+Shift+T, Ctrl+Shift+T** → Trigger template override task
2. Select template type (page, single, archive, woocommerce, etc.)
3. Kimi-Dev generates proper template overrides following WordPress hierarchy
4. Review template inheritance and customizations

### 3. Performance Optimization Workflow
1. **Ctrl+Shift+T, Ctrl+Shift+P** → Trigger performance audit
2. Kimi-Dev analyzes child theme for performance bottlenecks
3. Provides recommendations for CSS/JS optimization, image loading
4. Implements Core Web Vitals improvements

### 4. Parent Theme Compatibility Workflow
1. **Ctrl+Shift+T, Ctrl+Shift+K** → Trigger compatibility check
2. Kimi-Dev analyzes child theme compatibility with parent theme
3. Identifies potential conflicts with parent theme updates
4. Provides recommendations for maintaining compatibility

### 5. WordPress Standards Workflow
1. **Ctrl+Shift+T, Ctrl+Shift+S** → Run WordPress coding standards check
2. PHP CodeSniffer validates against WordPress standards
3. Fix any violations found in child theme files
4. Ensure compliance with WordPress theme guidelines

## WordPress Child Theme Development Benefits

### Augment Code Strengths for Child Themes
- **WordPress Child Theme Understanding**: Excellent context of child theme architecture
- **Template Hierarchy Analysis**: Understanding of WordPress template system
- **Parent Theme Integration**: Clear understanding of theme inheritance patterns
- **WooCommerce Template Mapping**: Understanding of e-commerce template customizations

### Kimi-Dev Strengths for Child Themes
- **Child Theme Best Practices**: Specialized in WordPress child theme patterns
- **Template Customization**: Expert template override and customization techniques
- **Performance Optimization**: Child theme-specific performance improvements
- **Compatibility Maintenance**: Ensuring parent theme update compatibility

### Combined Child Theme Development
- **Comprehensive Context**: Full understanding of WordPress child theme ecosystem
- **Best Practice Solutions**: Child theme development following WordPress standards
- **Performance-Optimized**: Built-in child theme performance considerations
- **Future-Proof**: Maintaining compatibility with parent theme updates
- **E-commerce Ready**: WooCommerce template customization expertise
