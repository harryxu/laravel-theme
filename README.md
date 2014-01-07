# Simple theme manager for Laravel 4
# Not done yet...

Inspired by lightgear/theme but not depend on specific asset manager.

## TODO
  * Template files in public path may not a good idea, configurable theme view path?


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
