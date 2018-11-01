<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");
$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database - and webhooks are working now :)");
}

/* Select queries return a resultset */
if ($result = $connection->query("SELECT * FROM mytable")) {
    //printf("Select returned %d rows.\n", $result->num_rows);

    
    echo "<p><strong>Num Rows:</strong> " . $result->num_rows . "</strong></p>";
    echo "<ul>";

    while ($row = $result->fetch_object()){
       //dar($row);
       echo "<li>" . $row->id . " : " . $row->val . "</li>";
    }

    echo "</ul>";
    /* free result set */
    $result->close();
}

$connection->close();


function dar($data) {

    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

?>
