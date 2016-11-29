<?php

DEFINE("TOP_SECRET", "Very secret");
require("init.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $dbh = "not set";

    try {
        $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if (!dbh) {
        echo "Not connecting.";
        exit(0);
    }

    #select user in database
    try {
        $query = $dbh->query("SELECT users.uid, users.email, users.pass, user_info.fullname, user_info.numlogins, user_info.current_login "
                . "FROM users "
                . "LEFT JOIN user_info "
                . "ON user_info.uid=users.uid "
                . "WHERE users.email='$email'"
        );

        if (!$query) {
            echo "<p>Query failed.</p>";
            exit(1);
        }

        #change the fetch mode for query
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetch();

        #if not user, let them know
        if (!$result) {
            echo 'You are not a user in our system. <a href="signup.php">Click here to sign up.</a>';
        }   
        
        #if user, send to index.php
        if ($result['email'] == $email) {

            if(!password_verify($pass, $result['pass'])) {
                echo "<p>Incorrect password</p>";
                exit;
            }
            
            #update number of logins
            #get last login BEFORE updating last login to the current date! (Since we would care more about the time before the most recent!)
            try {

                #select user's current info
                
                $sth = $dbh->prepare("UPDATE user_info "
                        . "SET numlogins=:numlogins, last_login=:last_login, current_login=NOW() "
                        . "WHERE uid='" . $result['uid'] . "'"
                );
                
                $last_login= $result['current_login']; //"', current_login=" . NOW() 
                $result['numlogins']++;
                $sth->bindParam(':numlogins', $result['numlogins']);
                $sth->bindParam(':last_login', $last_login);

                $sth->execute();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            #send to home page
            require("index.tpl");
        } else {
            echo "User name and/or password incorrect. Try again.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    #close connection
    $dbh = null;
    exit;
}

require("login.tpl");
