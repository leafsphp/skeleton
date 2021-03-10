<?php

/*
|--------------------------------------------------------------------------
| Set up 404 handler
|--------------------------------------------------------------------------
|
| Create a handler for 404 errors
|
*/
$app->set404();

/*
|--------------------------------------------------------------------------
| Set up Controller namespace
|--------------------------------------------------------------------------
|
| This allows you to directly use controller names instead of typing
| the controller namespace first.
|
*/
$app->setNamespace("\App\Controllers");

$app->get("/", function () {
	import(views_path("index.html", false));
});

$app->blade->configure(views_path(null, false), storage_path("framework/views"));

Route("GET", "/test", "TestsController@test");

Route("GET", "/test/blade", function () {
	render("blade", ["data" => "This is a variable"]);
});
