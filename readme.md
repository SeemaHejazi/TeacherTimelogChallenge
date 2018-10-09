##The Challenge

When a teacher arrives to work, they clock-in, when leave they clock-out, and the platform keeps track of the time worked.
Using an MVC framework, build a very basic MVP of a clock in/out application, using traditional CRUD methods.

I chose to use Laravel 5.6 which beautifully handles CRUD methodology. 
</br>*The Model*: table name `entries` with columns `id`, `firstname`, `lastname`, `in_time`, `out_time` and `total_minutes`

</br>*The Controllers*: PagesController controls the routing to pages. EntriesController contains all the main functionality:
</br>`index()` : displays the listing of the entries 
</br>`store()` : create and store new entries to db 
</br>`edit()`: edit a specific entry
</br>`destroy()`: delete a specific entry
</br>`update()` : used to update an entry with the entered checkout time and total minutes worked.

</br>*The Views*:
</br>home.blade.php : the home page and clock in/clockout form.
</br>index.blade.php : the entries listed blade, accessible at /entries.
</br>edit/delete.blade.php : the edit and delete modals.



-----------------------------------------------------------------------------------------------------------------------------
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
