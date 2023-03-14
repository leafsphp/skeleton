<?php

use Leaf\Database;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes 'manually'. Feels great to relax.
|
*/

require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bring in (env)
|--------------------------------------------------------------------------
|
| Quickly use our environment variables
|
*/
try {
    \Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();
} catch (\Throwable $th) {
    trigger_error($th);
}

/*
|--------------------------------------------------------------------------
| Database Connection
|--------------------------------------------------------------------------
|
| Connect your database to your leaf app.
|
*/
Database::config(DatabaseConfig());

/*
|--------------------------------------------------------------------------
| Sync Leaf Db with ORM and connect
|--------------------------------------------------------------------------
|
| Sync Leaf Db with ORM and connect to the database
| This allows you to use Leaf Db without having to initialize it
| in your controllers.
|
| This is optional, you can still use Leaf Db in your controllers. If you
| want to opt into this, just uncomment the line below.
|
*/
// Leaf\Database::syncLeafDb();

/*
|--------------------------------------------------------------------------
| Attach blade view
|--------------------------------------------------------------------------
|
| Since blade no longer ships with Leaf by default, we
| can attach blade back to Leaf so you can use Skeleton
| as you've always used it.
|
| To do this, run `composer require leafs/blade` and
| uncomment the line below.
|
*/
// Leaf\View::attach(\Leaf\Blade::class);

/*
|--------------------------------------------------------------------------
| Load application paths
|--------------------------------------------------------------------------
|
| Tell Leaf MVC Core where to locate application paths
|
*/
Leaf\Core::paths(PathsConfig());

/*
|--------------------------------------------------------------------------
| Configure your leaf app
|--------------------------------------------------------------------------
|
| Plant a seed, grow the stem and return Leaf🤷‍
|
*/
app()->config(AppConfig());

/*
|--------------------------------------------------------------------------
| Default fix for CORS
|--------------------------------------------------------------------------
|
| This just prevents the connection client from throwing
| CORS errors at you.
|
*/
app()->cors(CorsConfig());

/*
|--------------------------------------------------------------------------
| Route Config
|--------------------------------------------------------------------------
|
| Require app routes.
|
*/
require __DIR__ . '/routes/index.php';

/*
|--------------------------------------------------------------------------
| Run Leaf Application
|--------------------------------------------------------------------------
|
| Require app routes
|
*/
app()->run();
