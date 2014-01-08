# Simple theme manager for Laravel 4

Inspired by [lightgear/theme](https://github.com/lightgear/theme), but not depend on specific asset manager.

## Install

Composer require:

    "bigecko/laravel-theme": "dev-master"

Service provider:

    'Bigecko\LaravelTheme\LaravelThemeServiceProvider',

Alias:

    'Theme' => 'Bigecko\LaravelTheme\Facade',

## Usage

### Structure

Create a new folder `public/themes`.

Create a folder in `themes` use your theme name, like `mytheme`.

Put your theme templates file to `mytheme/views`.

### init theme

```php
Theme::init('mytheme');
```


### Code example

```php

View::make('home');  // First find in 'public/themes/mytheme/views/'.
                     // If file not exist, will use default location 'app/views/'.


Theme::asset('js/a.js');  // 'public/themes/mytheme/js/a.js'

// Still want use laravel's asset helper function?
asset(Theme::asset() . '/js/a.js');


Theme::name(); // Get current theme name.

```

Also support package templates overriding, just put package templates to your theme folder.


## Why use this?

Simple:

  * Dot not need change code to render template, still `View::make`.
  * No asset management or other dependencies.
  * No new config file.
  * Just few lines of code, easy to read.
  * Only for theme, no more other responsibilities.
