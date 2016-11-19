<?php

DEFINE("TOP_SECRET", "Very secret");
require("init.php");

$link = mysqli_connect($db_host, $db_user, $db_pass, $db);

if (!$link) {
    echo "Not connecting.";
    exit(0);
}

$query = "SELECT <something> FROM users";
$q = mysqli_query($link, $query);

if ($q) {
    require("index.tpl");
} else {
    /*
    echo "Not querying: " . mysqli_error($link);
    exit(0);
     */
}

mysqli_close($link);
?>