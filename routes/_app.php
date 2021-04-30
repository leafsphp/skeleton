<?php

/**@var Leaf\App $app */

$app->get("/", function () {
    import(views_path("index.html", false));
});

$app->get("/home", "TestsController@index");

$app->get("/test", "TestsController@test");
