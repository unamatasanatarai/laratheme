in laravel `config/app.php` providers add:

`'Unamatasanatarai\Options\OptionServiceProvider'`

then run:

`$ php artisan vendor:publish`

`$ php artisan migrate`

then use:

```
\Opt::set('value', 500);
\Opt::set('getmagnivic', ['value', microtime(true)]);
\Opt::get('test');
\Opt::get('dtest');
\Opt::render();
```
Opt::set($name, $value); -> store value under name in database
Opt::get($name); -> get value by key from database
Opt::all(); -> get all values from database
Opt::render(); -> save contents of database to app/config/options.php

and then Use Laravel::config get

