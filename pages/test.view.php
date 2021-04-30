<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?php echo views_path('styles.css'); ?>">
</head>

<body>
    <header>
        <a href="https://leafphp.netlify.app/#/" style="text-decoration: none">
            <img src="https://leaf-docs.netlify.app/images/logo.png" alt="Leaf PHP Framework" style="width: 110px;">
        </a>
    </header>
    <h1><?php echo $title; ?></h1>
    <p>
        Congratulations! Your Leaf application is running. If this is
        your first time using Leaf, start with this <a href="https://leafphp.netlify.app/#/2.1/intro/first" target="_blank">"Hello World" Tutorial</a>.
    </p>
    <?php
        // You can use another render in here to include bare UI partials
        render("body", [
            "communityTitle" => "Leaf Framework Community"
        ]);
    ?>
    <a href="https://github.com/leafsphp" target="_blank">
        View other Leaf projects
    </a>
</body>

</html>
