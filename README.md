<p align="center">
    <img src="https://github.com/blade-ui-kit/art/blob/master/socialcard.png" width="1280" title="Social Card Blade UI Kit">
</p>

# Blade UI Kit

<a href="https://github.com/blade-ui-kit/blade-ui-kit/actions?query=workflow%3ATests">
    <img src="https://github.com/blade-ui-kit/blade-ui-kit/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.com/blade-ui-kit/blade-ui-kit/actions?query=workflow%3A%22Code+Style%22">
    <img src="https://github.com/blade-ui-kit/blade-ui-kit/workflows/Code%20Style/badge.svg" alt="Code Style">
</a>
<a href="https://packagist.org/packages/blade-ui-kit/blade-ui-kit">
    <img src="https://poser.pugx.org/blade-ui-kit/blade-ui-kit/v/stable.svg" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/blade-ui-kit/blade-ui-kit">
    <img src="https://poser.pugx.org/blade-ui-kit/blade-ui-kit/d/total.svg" alt="Total Downloads">
</a>

> Blade UI Kit is currently under development and not ready yet to run in production. Some things can and probably will change before the first stable minor release.

A set of renderless components to utilise in your Laravel Blade views.

- [Requirements](#requirements)
- [Installation](#installation)
- [Updating](#updating)
- [Changelog](#changelog)
- [Maintainers](#maintainers)
- [License](#license)

## Requirements

- PHP 7.3 or higher
- Laravel 7.0 or higher

## Installation

Proper documentation is coming soon but for now you'll have to figure out things on your own a bit. You can see how you can use the components by looking at [the tests](./tests). Please note that some components like Mapbox and Unsplash require you to set up additional settings in your `services.php` file. Other components like cron and markdown require you to install additional libraries. Please reference the component classes and [`composer.json`](./composer.json) for these until the docs are released.

First make sure to configure the repository in your `composer.json` by running:

```bash
composer config repositories.blade-ui-kit vcs https://github.com/blade-ui-kit/blade-ui-kit
```

Before installing a new package it's always a good idea to clear your config cache:

```bash
php artisan config:clear
```

Then install the package by running:

```bash
composer require blade-ui-kit/blade-ui-kit
```

To finish up, add `@bladeUIStyles` just before your closing `</head>` tag and `@bladeUIScripts` just before your closing `</body>` tag.

## Updating

Please refer to [`the upgrade guide`](UPGRADE.md) when updating the library.

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade UI Kit is developed and maintained by [Dries Vints](https://driesvints.com).

## License

Blade UI Kit is open-sourced software licensed under [the MIT license](LICENSE.md).
