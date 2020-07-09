<p align="center">
    <br><br>
    <img src="https://leaf-docs.netlify.app/images/logo.png" height="100"/>
    <h1 align="center">Leaf Skeleton</h1>
    <br>
    <br><br><br>
</p>

<!-- [![Latest Stable Version](https://poser.pugx.org/leafs/api/v/stable)](https://packagist.org/packages/leafs/api)
[![Total Downloads](https://poser.pugx.org/leafs/api/downloads)](https://packagist.org/packages/leafs/api)
[![License](https://poser.pugx.org/leafs/api/license)](https://packagist.org/packages/leafs/api) -->

# Leaf Skeleton

Use this skeleton application to quickly setup and start working on a new Leaf PHP application without using a full-blown framework. Unlike [Leaf MVC](//leafmvc.netlify.app) and [Leaf API](//leafphp.netlify.app/#/leaf-api/), Skeleton keeps leaf as is, and doesn't build on top of it, it's perfect for creating smaller projects.

## Installation

It's recommended that you use [Composer](https://getcomposer.org/) to install Leaf.

```bash
composer create-project leafs/skeleton <project-name>
```

This will start a new skeleton project.

## Basic Info

```bash
C:.
├───App
│   ├───Controllers
│   ├───Models
│   └───pages
├───Config
├───storage
│   ├───app
│   │   └───public
│   ├───framework
│   │   └───views
│   └───logs
└───vendor
```

This is the default directory structure that leaf skeleton offers, although you can customize it in any way you want. Simply edit the `Config/paths.php` file when you're done re-arranging Skeleton.

You can run your skeleton app with php's server:

```bash
php -S localhost:5500
```

## Building with skeleton

Most of your work will go on in the `App/Routes.php` file. You can define routes, use controllers and models...

An example has been provided on using both controllers and models. You can refer to this if you have any issues.

Skeleton is just Leaf, so please refer to [Leaf's documentation](https://leafphp.netlify.app/#/) for any functionality you may need.

## global methods

These are simple-to-use functions that are available everywhere in your application. You can call these functions in your routes, controllers and everywhere you need them.

### app

This method returns the base Leaf instance. You can perform whatever operation you need on the `app` method.

```php
app()->response->respond(...);
app()->resource("/home", "HomeController");
```

### d

This method returns the leaf date object. You can use any [Leaf Date](2.1/core/date) method on `d`.

```php
$timestamp = d()->random_timestamp();
```

### dbRow

This method returns a row in a database table. It takes in 3 parameters:

- The table to use
- The row id
- The fields to return (optional, will return all if nothing is specified)

```php
$user = dbRow("users", "1");
$item = dbRow("items", 2, "name, user_id");
```

### fs

This returns the [Leaf FS](2.1/core/fs) object. So you can use all it's methods on `fs`

```php
fs()->create_folder("new_logs");
```

### email

This method allows you to [write an email directly](2.1/core/mail?id=write)

```php
email([
  "subject" => "This is a full Write Test",
  "template" => "./template.html",
  "recepient_email" => "mychi.darko@gmail.com",
  "sender_name" => "Leaf PHP Framework",
  "attachment" => "./../attachment.txt"
]);
```

### import

import a page, usually used to render HTML/PHP pages

```php
import("App/errors/$code.php");
```

### markup

Render markup as a response

```php
markup("<h2>Hello</h2>");
```

### plural

This method allows you to get the plural version of a string.

```php
$word = "todo";
plural($word); // returns "todos"
```

### render

This outputs a blade view.

```php
function user() {
  render("user", ["username" => "Mychi"]);
}
```

### requestBody

`requestBody` returns the whole body of a request.

```php
$loginData = requestBody();
$username = $loginData["username"];
```

### requestData

This method returns a particular parameter in the request body

```php
$username = requestData("username");
```

### respond

Outputs a JSON encoded response.

```php
$data = ["name" => "BMW", "data" => ["id" => "1", "driver" => "Mychi"]];
respond($data);
```

### respondWithCode

`respondWithCode` sends JSON encoded data with a code and the appropriate headers as a response

```php
respondWithCode($data, 201);
```

### Route

This method creates a new route. It takes in 3 parameters:

- The route method(s)
- The route
- The handler

```php
Route("GET|POST", "/me", function() {...});
```

### sessionBody

This method returns all session data

```php
$session_data = sessionBody();
```

### sessionGet

Return a session variable

```php
$user = sessionGet("user");
```

### sessionSet

Add a new session variable

```php
$user = sessionSet("user", ["id" => "1"]);
```

### singular

This method allows you to get the singular version of a string.

```php
$word = "todos";
singular($word); // returns "todo"
```

### throwErr

Throws a json encoded error with appropraite headers.

```php
throwErr("user not found", 404);
```

Note that `throwErr` pauses code execution, and so, no code after `throwErr` runs. You can use this with conditional statements for a better effect.

```php
if (!$user->isLoggedIn) throwErr("User not logged in");
```

### view

`view` returns a blade view.

```php
$output = view("user", ["username" => "Mychi"]);
```

## Other Leaf Projects

Leaf API is a lightweight PHP MVC framework for rapid API development. It serves as minimal MVC wrapper around Leaf PHP Framework which allows you to use Leaf in an MVC environment. It also comes along with a bunch of handy tools which can speed up your development.

Read the [docs](https://leafphp.netlify.app/#/leaf-api/).

## License

The LeafAPI framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## View Leaf's docs [here](https://leafphp.netlify.app)
