<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# hotel-reservation

![Db structure](diagrama.jpg)

## Instalation

First clone this repository

```
 $ git clone https://github.com/moacirguedes/hotel-reservation

 $ cd hotel-reservation

```

Then install the dependencies

```
$ composer install
$ npm install && npm run dev
```

After that, set up the database

```
rename env.example to .env
fill in your local database information
$ composer dump-autoload
$ php artisan migrate:fresh --seed
```

and now you can run the application with

```
$ php artisan serve
```

it should be running on ```localhost:8080```, you can create a new user or login with a manager profile. Each one can do different things (The manager can create hotels and others things).

```
email: user@manager.com
password: password
```

____________________________


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
