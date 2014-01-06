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

## Config?

We do not have any new config file.

You can put a one line config to `config/app.php`:

    'theme' => 'mytheme',

If you do not want do any thing about config, the default theme is called "`default`".

## Usage

Create a new folder `public/themes`.

Create a folder in `themes` use your theme name, like `mytheme`.

Put your theme templates file to `mytheme/views`.

That's it.


## Code example

```php

View::make('home');  // First find in 'public/themes/mytheme/views/'.
                     // If file not exist, will use default location 'app/views/'.


Theme::asset('js/a.js');  // 'public/themes/mytheme/js/a.js'

// Still want use asset helper function?
asset(Theme::name() . '/js/a.js');


Theme::name(); // Get current theme name.

```

Also support package templates overriding, just put package templates to your theme folder.
