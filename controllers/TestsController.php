<?php

namespace Controllers;

use Models\Test;

class TestsController extends Controller
{
    public function index()
    {
        $data = [
            [
                'icon' => 'book-outline',
                'title' => 'Skeleton Documentation',
                'description' => 'Skeleton comes with a clean and developer-friendly documentation for both beginners and seasoned users.',
                'link' => 'https://leafphp.dev/skeleton/',
                'linkText' => 'Skeleton Docs'
            ],
            [
                'icon' => 'laptop-outline',
                'title' => 'Leaf Documentation',
                'description' => 'Since Skeleton is basically a boilerplate built with Leaf, we recommend checking out the leaf docs first.',
                'link' => 'https://leafphp.dev/',
                'linkText' => 'Leaf Docs'
            ],
            [
                'icon' => 'logo-twitter',
                'title' => 'Twitter',
                'description' => 'Follow Leaf PHP on Twitter to get latest news about releases, new modules, tutorials and amazing tips.',
                'link' => 'https://twitter.com/leafphp',
                'linkText' => '@leafphp'
            ],
            [
                'icon' => 'logo-youtube',
                'title' => 'YouTube',
                'description' => 'We have a youtube channel where we upload videos on leaf, our modules, frameworks and other projects.',
                'link' => 'https://www.youtube.com/channel/UCllE-GsYy10RkxBUK0HIffw',
                'linkText' => 'Leaf YouTube Channel'
            ],
        ];

        echo view('test', [
            'data' => $data,
        ]);
    }

    public function test()
    {
        response()->json(Test::all());
    }
}
