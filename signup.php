<?php

$dbh = "not set";

try {
    #$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbh = new PDO("mysql:host=localhost;dbname=comp424proj2", "root", "root");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (!dbh) {
    echo "Not connecting.";
    exit(0);
}

$query= $dbh->query('SELECT sid, question FROM security_questions');
$security_questions;

if(!$query) {
    echo "<p>Query failed.</p>";
    exit(1);
}

$query->setFetchMode(PDO::FETCH_ASSOC);

while($row = $query->fetch()) {
    $security_questions[] = $row;
}

$dbh = null;

if (!empty($_POST['submit'])) {
    
    
    $dbh = new PDO("mysql:host=localhost;dbname=comp424proj2", "root", "root");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //insert stuff into database
    $form_info = array(
        "email"     => trim($_POST['email']),
        "pass"      => trim(crypt($_POST['pass'], "$2a$Ofdh8wa3fh3IHJLf38fh3f32fhezgr83QB")),
        "firstname" => trim($_POST['firstname']),
        "lastname"  => trim($_POST['lastname']),
        "month"     => trim($_POST['month']),
        "day"       => trim($_POST['day']),
        "year"      => trim($_POST['year']),
        "question1" => trim($_POST['question1']),
        "question2" => trim($_POST['question2']),
        "question3" => trim($_POST['question3']),
        "answer1"   => trim($_POST['answer1']),
        "answer2"   => trim($_POST['answer2']),
        "answer3"   => trim($_POST['answer3'])
    );
    
    try {
        #create user
        $sth = $dbh->prepare("INSERT INTO users (email, pass) values (:email, :pass)");
        $sth->bindParam(':email', $email);
        $sth->bindParam(':pass', $password);
        
        $email    = $form_info['email'];
        $password = $form_info['pass'];
        
        $sth->execute();
        
        #get uid that was just created
        $q = $dbh->query("SELECT uid FROM users WHERE email='" . $form_info['email'] . "' AND pass='" . $form_info['pass'] . "'");
        $q->setFetchMode(PDO::FETCH_ASSOC);
        
        $uid = $q->fetch();
        
        #create user info
        $sth = $dbh->prepare("INSERT INTO user_info (uid, fullname, birthday, security_questions, security_answers) "
                . "values (:uid, :fullname, :birthday, :security_questions, :security_answers)");
        
        $sth->bindParam(':uid', $userid);
        $sth->bindParam(':fullname', $fullname);
        $sth->bindParam(':birthday', $bday);
        $sth->bindParam(':security_questions', $questions);
        $sth->bindParam(':security_answers', $answers);
        
        $userid    = $uid['uid'];
        $fullname  = $form_info['firstname'] . " " . $form_info['lastname'];
        $bday      = $form_info['month'] . "/" . $form_info['day'] . "/" . $form_info['year'];
        $questions = $form_info['question1'] . ":::" . $form_info['question2'] . ":::" . $form_info['question3'];
        $answers   = $form_info['answer1'] . ":::" . $form_info['answer2'] . ":::" . $form_info['answer3'];
        
        $sth->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    echo "Created user: " . $form_info['email'];
    
}

require("signup.tpl");

#close the connection
$dbh = null;

?>
