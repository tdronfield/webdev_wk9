<h1>Week 9 Web Development</h1>

<?php
    include('./config/database.php');

    $database = new Database();
    $db = $database->getConnection();

    var_dump($db);
?>
