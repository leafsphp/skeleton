<?php

namespace Controllers;

use Models\Test;

class TestsController extends Controller
{
    public function index()
    {
        render("test", [
            "title" => "Leaf Skeleton v2"
        ]);
    }

    public function test()
    {
        json(Test::all());
    }
}
