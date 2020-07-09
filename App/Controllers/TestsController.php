<?php

namespace App\Controllers;

use App\Models\Test;

class TestsController extends \Leaf\ApiController
{
	public function test()
	{
		respond(Test::all());
	}
}
