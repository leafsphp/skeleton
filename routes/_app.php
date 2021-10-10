<?php

app()->get("/", function () {
    response()->page(views_path("index.html", false));
});

app()->get("/home", "TestsController@index");

app()->get("/test", "TestsController@test");
