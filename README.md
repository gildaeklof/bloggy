## Installation

1. #### Clone the repository

    `https://github.com/gildaeklof/bloggy`

2. #### Cd to the root of the project and run in terminal:

    `composer update`

3. #### Copy .env.example and create a .env file and with credentials to your database.

4. #### Run in terminal:

    `php artisan migrate`

5. #### In order to test the website and login you need to create a owner of the website. Frist you need to run following in your terminal:

    `php artisan tinker`

    ##### Then you need to run following to add a user in database. Update the credentials if you want to.

    `App\Models\User::create(['name' => 'Henrik', 'email' => 'henrik@yrgo.se', 'password' => Hash::make('123')]);`

6. #### Run in terminal:

    `php artisan storage:link`

7. #### Run in terminal:

    `php artisan serve`

## Code Review by JoeyJaySwe @ 2021-04-14 16:44

-   app/Http/Controllers/CommentsController.php, @ row 7-8:
    Don't forget to remove unused imports.

-   app/Http/Controllers/CommentsController.php, @ row 13:
    in VSC it shows the `Request` type as being undefined.
    Think this is a graphical bug though, as I used it the same way without any error markers in VSC.

-   app/Http/Controllers/CommentsController.php, @ row 15:
    remember that `$this` in this case points towards the class, not the argument. If you replace it, you wont need to call the `$request` before the array :)

-   app/Http/Controllers/CommentsController.php, @ row 22:
    Don't forget to run a `filter_var` to sanitize the data.

-   app/Http/Controllers/CommentsController.php, @ row 26:
    Nice use of friendly feedbacl message with `withSuccess`, however I don't see any feeback
    function in case it didn't succed.

-   app/Http/Controllers/CreatePostController.php, @ row 21:
    Nice check of image type data. Never used this before
    myself, am I right in asuming the pipes are used to say it's either nullable or mime of the following types?

-   app/Http/Controllers/LoginController.php &
    app/Http/Controllers/LogoutController.php:
    Think you could merge these into a UserController
    and then add functions for login and logout instead.

-   app/Http/Controllers/LoginController.php @ row 25:
    Never seen the Session::flash before (had to read up on it). Looks useful for temp storage, but am unsure where the data is being flashed to.

-   database/Models/Post.php @ row 18 &
    database/Models/User.php @ row 47:
    I see you have declared a 1->Many relationship,
    but I wonder why you declared you'd retur that,
    but not the you returned belongsTo on ex user (in Post.php)

-   database/factories/CommentFactory.php, @ row 26:
    Good idea to use `paragraphs()` here. I used sentances
    in ours, don't think that looked as nice.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
