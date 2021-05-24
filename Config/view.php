<?php

return [
    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual LeafMVC view path has already been registered for you.
    |
    */
    "views_path" => views_path("", false),

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */
    "cache_path" => storage_path('framework/views'),

    /*
    |--------------------------------------------------------------------------
    | Leaf EXPERIMENTAL features
    |--------------------------------------------------------------------------
    |
    | This allows you to use the experimental features below
    |
    */
    "experimental" => false,

    /*
    |--------------------------------------------------------------------------
    | Custom render method [EXPERIMENTAL]
    |--------------------------------------------------------------------------
    |
    | This render method is triggered whenever render() with the experimental
    | option above set to true. This render method allows you to even plug
    | in external view libraries, configure them and call them with `render`
    | whenever and wherever you feel the need.
    |
    */
    "render" => function(string $view, array $data = []) {
        return markup(view($view, $data));
    },
];
