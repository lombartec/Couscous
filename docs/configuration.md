---
current_menu: configuration
---
# Configuration with couscous.yml

You can define options in a `couscous.yml` file at the root of your repository.

That configuration file is optional.

Reference:

```yaml
template:
    # Name of the directory containing the website template (default is "website")
    directory: website
    # Or if you are using a remote template, you can set the Git URL
    url: https://github.com/CouscousPHP/Template-Light.git

# List of directories to exclude from the processing (default contains "vendor" and "website")
# Paths are relative to the repository root
exclude:
    - vendor
    - website
    - some/dir

scripts:
    # Scripts to execute before generating the website
    before:
        - cp bin/couscous.phar website/
    # Scripts to execute after generating the website
    after:
        - rm website/couscous.phar

# Any variable you put in this file is also available in the Twig layouts:
title: Hello!

# Base URL of the published website (no "/" at the end!)
# You are advised to set and use this variable to write your links in the HTML layouts
baseUrl: http://username.github.io/your-project
```

**Note:** any variable you put in `couscous.yml` is called **Metadata**. You can use these variables in templates for example. Learn more about this in the [Metadata documentation](metadata.md).
