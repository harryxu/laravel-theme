# Simple theme manager for Laravel 4
# Not done yet...

Inspired by lightgear/theme but not depend on specific asset manager.

## TODO
  * Configurable themes base path.
  * Configurable theme view path?


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

Or just call `Theme::setTheme('mytheme')` to change theme dynamically.

If you do not want do any thing about config, the default theme is called "`default`".

## Usage

Create a new folder `public/themes`.

Create a folder in `themes` use your theme name, like `mytheme`.

Put your theme templates file to `mytheme/views`.

That's it.


## Code example:

```php

View::make('home');  // First find 'public/themes/mytheme/views/home.blade.php'
                     // If not exist, will use 'app/views/home.blade.php'


Theme::asset('js/a.js');  // 'public/themes/mytheme/js/a.js'

// Still want use asset helper function?
asset(Theme::themePath() . '/js/a.js');


Theme::getTheme(); // Get current theme name.
Theme::setTheme('mytheme'); // Change theme.

```

Also support package templates overriding, just put package templates to your theme folder.
