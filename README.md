![bloggy](https://user-images.githubusercontent.com/70512941/121664296-a0bca980-caa7-11eb-9416-b5f2ff21b5de.gif)

# Bloggy

A school assignment with purpose to gain a better understanding of writing backend applications in Laravel.

In a group of two, we decided to create a personal blog where only the blogger can log in to create, edit and delete posts. Visitors can view all posts and leave comments. To get the most out of this project, we were pair programming throughout the process.

The application had to contain the following features of Laravel:

-   Controllers
-   Migrations
-   HTTP Tests (on all routes)
-   Laravel Mix
-   Middleware
-   Models (with relationships)
-   Routes (with route model binding)
-   Eloquent
-   Relationships
-   Validation
-   Views (Blade)

# Installation

1. #### Clone the repository

    ```
    https://github.com/gildaeklof/bloggy
    ```

2. #### Cd to the root of the project and run in terminal:

    ```
    composer update
    ```

3. #### Copy .env.example and create a .env file and with credentials to your database.

4. #### Run in terminal:

    ```
    php artisan migrate
    ```

5. #### In order to test the website and login you need to create a owner of the website. Frist you need to run following in your terminal:

    ```
    php artisan tinker
    ```

    #### Then you need to run following to add a user in database. Update the credentials if you want to.

    ```
    App\Models\User::create(['name' => 'Henrik', 'email' => 'henrik@yrgo.se', 'password' => Hash::make('123')]);
    ```

6. #### Run in terminal:

    ```
    php artisan storage:link
    ```

7. #### Run in terminal and you ready to go:

    ```
    php artisan serve
    ```

# Code Review

### by JoeyJaySwe @ 2021-04-14 16:44

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

### by Hugocsundberg @ 2021-04-14 21:00

-   app/Http/Controllers/PostController.php @ row 13: <br> Another way to do this is to use the validate method directly on the $request instance. ```$request->validate(['description' => 'string', 'image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:1000']);```

-   CSS is not loading for me. Probably a problem with how i set up the project locally.

-   You could use view components to wrap your views inside another view instead of having several '@includes'. <a href="https://beyondco.de/blog/using-laravel-view-components">Link to component article</a>

-   App/Http/Controllers/LoginController.php @ row 29 <br> If you were to expand the application you could use `redirect()->intended('/dashboard')` To redirect the user to whatever page it was trying to reach before being redirected to the login screen with dashboard as a backup.

-   App/Http/Controllers/LoginController.php @ row 22 <br> You are totally killing the enviorment by using too many whitespaces. I see atleast 22 bytes wasted

-   Images are missing 'Alt tags'

-   Looks good, couldn??t find anything more.

# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
