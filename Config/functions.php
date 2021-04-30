<?php
if (!function_exists('app')) {
	/**
	 * Return the Leaf instance
	 */
	function app()
	{
		global $app;
		return $app;
	}
}

if (!function_exists('auth')) {
	/**
	 * Return Leaf's auth object
	 */
	function auth($guard = null)
	{
		if (!$guard) return \Leaf\Auth::class;

		if ($guard === 'session') {
			return \Leaf\Auth::session();
		}

		return \Leaf\Auth::guard($guard);
	}
}

if (!function_exists('d')) {
	/**
	 * Return Leaf's date object
	 */
	function d()
	{
		return app()->date;
	}
}

if (!function_exists('dbRow')) {
	/**
	 * Return a db row by it's id
	 *
	 * @param string $table The table to find row
	 * @param string|int $row_id The row's id
	 * @param string $columns The columns to get
	 *
	 * @return array|null The database field
	 */
	function dbRow($table, $row_id, $columns = "*")
	{
		app()->db()->autoConnect();
		return app()->db()->select($table, $columns)->where("id", $row_id)->fetchAll();
	}
}

if (!function_exists('email')) {
	/**
	 * Write and send an email
	 *
	 * @param array $email The email block to write and send
	 */
	function email(array $email)
	{
		$mail = new \Leaf\Mail;
		if (getenv("MAIL_DRIVER") === "smtp") {
			$mail->smtp_connect(
				getenv("MAIL_HOST"),
				getenv("MAIL_PORT"),
				!getenv("MAIL_USERNAME") ? false : true,
				getenv("MAIL_USERNAME") ?? null,
				getenv("MAIL_PASSWORD") ?? null,
				getenv("MAIL_ENCRYPTION") ?? "STARTTLS"
			);
		}
		$mail->write($email)->send();
	}
}

if (!function_exists('fs')) {
	/**
	 * Return Leaf's FS object
	 */
	function fs()
	{
		return app()->fs;
	}
}

if (!function_exists('flash')) {
    /**
     * Return Leaf's flash object
     */
    function flash()
    {
        return \Leaf\Flash::class;
    }
}

if (!function_exists('hasAuth')) {
	/**
	 * Find out if there's an active sesion
	 */
	function hasAuth()
	{
		return !!sessionUser();
	}
}

if (!function_exists('import')) {
    /**
     * Output page as response
     *
     * @param string $data The page to output
     * @param int $code The http status code
     */
    function import($data, $code = 200)
    {
        app()->response()->page($data, $code);
    }
}

if (!function_exists('json')) {
	/**
	 * json uses Leaf's now `json` method
	 *
	 * json() packs in a bunch of functionality and customization into one method
	 *
	 * @param array|string|object $data The data to output
	 * @param int $code HTTP Status code for response, it's set in header
	 * @param bool $showCode Show response code in response body?
	 * @param bool $useMessage Show code meaning instead of int in response body?
	 */
	function json($data, int $code = 200, bool $showCode = false, bool $useMessage = false)
	{
		app()->response()->json($data, $code, $showCode, $useMessage);
	}
}

if (!function_exists('markup')) {
	/**
	 * Output markup as response
	 *
	 * @param string $data The markup to output
	 * @param int $code The http status code
	 */
	function markup($data, $code = 200)
	{
		app()->response()->markup($data, $code);
	}
}

if (!function_exists('plural')) {
	function plural($value, $count = 2)
	{
		return Leaf\Str::plural($value, $count);
	}
}

if (!function_exists('render')) {
	function render(string $view, array $data = [])
	{
		if (viewConfig("view_engine") === \Leaf\Blade::class) {
			return markup(view($view, $data));
		}

		return viewConfig("render")($view, $data);
	}
}

if (!function_exists('request')) {
	/**
	 * Return request or request data
	 *
	 * @param array|string $data — Get data from request
	 */
	function request($data = null)
	{
		if ($data) return app()->request()->get($data);
		return app()->request();
	}
}

if (!function_exists('requestBody')) {
	/**
	 * Get request body
	 *
	 * @param bool $safeData — Sanitize output
	 */
	function requestBody($safeOutput = true)
	{
		return request()->body($safeOutput);
	}
}

if (!function_exists('requestData')) {
	/**
	 * Get request data
	 *
	 * @param string|array $param The item(s) to get from request
	 * @param bool $safeData — Sanitize output
	 */
	function requestData($param, $safeOutput = true, $assoc = false)
	{
		$data = request()->get($param, $safeOutput);
		return $assoc && is_array($data) ? array_values($data) : $data;
	}
}

if (!function_exists('response')) {
	/**
	 * Return response or set response data
	 *
	 * @param array|string $data — The JSON response to set
	 */
	function response($data = null)
	{
		if ($data) return app()->response()->json($data);
		return app()->response();
	}
}

if (!function_exists('Route')) {
	/**
	 * @param string The request method(s)
	 * @param string The route to handle
	 * @param callable|string The handler for the route
	 */
	function Route($methods, $pattern, $fn)
	{
		app()->match($methods, $pattern, $fn);
	}
}

if (!function_exists('session')) {
	/**
	 * Get a session variable or the session object
	 *
	 * @param string|null $key The variable to get
	 */
	function session($key = null)
	{
		if ($key) {
			return \Leaf\Http\Session::get($key);
		}

		return (new \Leaf\Http\Session);
	}
}

if (!function_exists('sessionUser')) {
	/**
	 * Get the currently logged in user
	 */
	function sessionUser()
	{
		return session('AUTH_USER');
	}
}

if (!function_exists('setHeader')) {
	/**
	 * Set a response header
	 *
	 * @param string|array $key The header key
	 * @param string $value Header value
	 * @param bool $replace Replace header if exists
	 * @param mixed|null $code Status code
	 */
	function setHeader($key, $value = "", $replace = true, $code = 200)
	{
		app()->headers()->set($key, $value, $replace, $code);
	}
}

if (!function_exists('singular')) {
	function singular($value)
	{
		return Leaf\Str::singular($value);
	}
}

if (!function_exists('throwErr')) {
	/**
	 * @param mixed $error The error to output
	 * @param int $code Http status code
	 * @param bool $useMessage Use message in response body
	 */
	function throwErr($error, int $code = 500, bool $useMessage = false)
	{
		app()->response()->throwErr($error, $code, $useMessage);
	}
}

if (!function_exists('view')) {
	/**
	 * Return a blade view
	 *
	 * @param string $view The view to return
	 * @param array $data Data to pass into app
	 * @param array $mergeData
	 */
	function view(string $view, array $data = [])
	{
		app()->template->config(["path" => viewConfig("views_path")]);
		return app()->template->render($view, $data);
	}
}

// App

/**
 * Get app configuration
 */
function AppConfig($setting = null)
{
	$config = require __DIR__ . "/app.php";
	return !$setting ? $config : $config[$setting];
}

// Auth

/**
 * Get an auth configuration
 */
function AuthConfig($setting = null)
{
	$config = require __DIR__ . "/auth.php";
	return !$setting ? $config : $config[$setting];
}

// Views

/**
 * Get view configuration
 */
function viewConfig($setting = null)
{
	$config = require __DIR__ . "/view.php";
	return !$setting ? $config : $config[$setting];
}

// App paths as callable methods

/**
 * Get all app paths
 */
function app_paths($path = null, bool $slash = false)
{
	$paths = require __DIR__ . "/paths.php";
	$res = !$path ? $paths : $paths[$path] ?? "/";
	return $slash ? "/$res" : $res;
}

/**
 * Views directory path
 */
function views_path($path = null, bool $slash = true)
{
	return app_paths("views_path", $slash) . "/$path";
}

/**
 * Config directory path
 */
function config_path($path = null)
{
	return app_paths("config_path") . "/$path";
}

/**
 * Storage directory path
 */
function storage_path($path = null, bool $slash = false)
{
	return app_paths("storage_path", $slash) . "/$path";
}

/**
 * Commands directory path
 */
function commands_path($path = null)
{
	return app_paths("commands_path") . "/$path";
}

/**
 * Controllers directory path
 */
function controllers_path($path = null)
{
	return app_paths("controllers_path") . "/$path";
}

/**
 * Models directory path
 */
function models_path($path = null)
{
	return app_paths("models_path") . "/$path";
}

/**
 * Migrations directory path
 */
function migrations_path($path = null, bool $slash = true)
{
	return app_paths("migrations_path", $slash) . "/$path";
}

/**
 * Seeds directory path
 */
function seeds_path($path = null)
{
	return app_paths("seeds_path") . "/$path";
}

/**
 * Factories directory path
 */
function factories_path($path = null)
{
	return app_paths("factories_path") . "/$path";
}

/**
 * Routes directory path
 */
function routes_path($path = null)
{
	return app_paths("routes_path") . "/$path";
}

/**
 * Helpers directory path
 */
function helpers_path($path = null)
{
	return app_paths("helpers_path") . "/$path";
}

/**
 * Helpers directory path
 */
function lib_path($path = null)
{
	return app_paths("lib_path") . "/$path";
}

/**
 * Public directory path
 */
function public_path($path = null)
{
	return app_paths("public_path") . "/$path";
}
