## Code Review by JoeyJaySwe @ 2021-04-14 16:44

* app/Http/Controllers/CommentsController.php, @ row 7-8:
    Don't forget to remove unused imports.

* app/Http/Controllers/CommentsController.php, @ row 13:
    in VSC it shows the `Request` type as being undefined.
    Think this is a graphical bug though, as I used it the same way without any error markers in VSC.

* app/Http/Controllers/CommentsController.php, @ row 15:
    remember that `$this` in this case points towards the class, not the argument. If you replace it, you wont need to call the `$request` before the array :)

* app/Http/Controllers/CommentsController.php, @ row 22:
     Don't forget to run a `filter_var` to sanitize the data.

* app/Http/Controllers/CommentsController.php, @ row 26:
    Nice use of friendly feedbacl message with `withSuccess`, however I don't see any feeback
    function in case it didn't succed.

* app/Http/Controllers/CreatePostController.php, @ row 21:
    Nice check of image type data. Never used this before
    myself, am I right in asuming the pipes are used to say it's either nullable or mime of the following types?

* app/Http/Controllers/LoginController.php &
  app/Http/Controllers/LogoutController.php:
  Think you could merge these into a UserController
  and then add functions for login and logout instead.

* app/Http/Controllers/LoginController.php @ row 25:
    Never seen the Session::flash before (had to read up on it). Looks useful for temp storage, but am unsure where the data is being flashed to.

* database/Models/Post.php @ row 18 &
  database/Models/User.php @ row 47:
    I see you have declared a 1->Many relationship,
    but I wonder why you declared you'd retur that, 
    but not the you returned belongsTo on ex user (in Post.php)

* database/factories/CommentFactory.php, @ row 26:
    Good idea to use `paragraphs()` here. I used sentances
    in ours, don't think that looked as nice.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
