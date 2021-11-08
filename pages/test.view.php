<!DOCTYPE html>
<html>

<head>
	<title>Welcome to Leaf 3!</title>
	<meta charset="utf-8" />
	<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0" name="viewport" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700;display=swap">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="pages/styles.css">
</head>

<body class="flex center-all h-screen">
	<div class="container">
		<div class="mt-3">
			<div class="flex center-start">
				<img src="https://www.leafphp.dev/logo-circle.png" alt="">
				<h4 style="font-size: 22px;">Welcome to Leaf <span class="green">3</span></h4>
			</div>
			<div class="flex card mt-3">
                <?php
                    foreach ($data as $item) {
                        // You can use another view in here to include bare UI partials
                        view("components/card", [
                            "icon" => $item["icon"],
                            "title" => $item["title"],
                            "description" => $item["description"],
                            "link" => $item["link"],
                            "linkText" => $item["linkText"],
                        ]);
                    }
                ?>
			</div>
		</div>
	</div>
</body>

</html>
