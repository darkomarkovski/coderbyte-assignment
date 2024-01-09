<?php require_once 'functions.php' ?>
<html lang="en">
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<form action="index.php" method="GET">
    <label>
        <input type="text" name="author" placeholder="Enter author name..."
               value="<?php echo $_GET['author'] ?? ""; ?>"/>
    </label>
    <input type="submit" name="submit" value="Search" />
    <?php if(isset($_GET['author'])) { echo buildListView(); } ?>
</form>
</body>
</html>
