# Changelog

## 1.0.0

BC breaking changes:

- in Markdown files, you now need to use `layout: custom.twig` instead of `template: custom.twig`. Template now means the whole template (all files) while layout is a single Twig file.
- the default layout is now `default.twig` (it was previously `page.twig`)
- template directories are simpler: the `website/public/` directory is not needed anymore, assets should be placed directly in the `website/` directory
- the config option `templateVariables.baseUrl` is now `baseUrl`
- the config option `templateUrl` is now `template.url`
- the config option `directory` is now `template.directory`
- the config options `before` and `after` are now `scripts.before` and `scripts.after`

Major new features:

- Couscous now provides a default template and 2 other alternative templates
- Documentation overhaul
- Simpler commands
- Markdown Extra support
- [#10](https://github.com/CouscousPHP/Couscous/pull/10) automatically install Bower dependencies if a `bower.json` file is in `website/public/`

Minor new features:

- The preview command will show the name of the files that have changed when regenerating
- You don't need to create the `gh-pages` branch if it doesn't exist

Bugfixes

- [#7](https://github.com/CouscousPHP/Couscous/issues/7), [#12](https://github.com/CouscousPHP/Couscous/issues/12) The preview command now detects any file change (to regenerate the website)
