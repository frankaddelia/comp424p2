<?php

if (!defined("TOP_SECRET")) {
    print("Access denied.");
    exit(0);
}

function register($user, $pass) {
    
    $link = mysqli_connect($db_host, $db, $db_user, $$db_pass);
    $query_str = "SELECT username, password FROM users WHERE username = '" . $user . "'";
    $query = mysqli_query($link, $query_str);
    $result = mysqli_fetch_row($query);

    if ($result == null) {
        
    } else {
        if ($result[1] == $user && $result[2] == hash("sha256", $pass)) {
            mysqli_close($link);
            return true;
        }
    }

    return false;
}

?>
