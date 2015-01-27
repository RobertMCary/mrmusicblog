<?php
/*$db_connect = mysql_connect(‘localhost’, ‘root’, ‘c1u2r3r4y’);
if (!db_connect) {
    die(‘Connection unsuccessful:
        ‘ . mysql_error());
    }
    echo ‘Connectionsuccessful’;
    $db_select = mysql_select_db(‘dbMusicBlog’, $db_connect);
    if (!db_select) {
        die(‘Unable to access database:
            ‘ . mysql_error());
        }
        echo ‘Database selected’;*/

/*$db_connect = new mysqli_connect("localhost", "root", "c1u2r3r4y", "dbMusicBlog");
if (!db_connect) {
    die(‘Connection unsuccessful:
        ‘ . mysqli_connect_errno());
    }
    echo ‘Connection successful’;*/

$servername = "localhost";
$username = "root";
$password = "c1u2r3r4y";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dbMusicBlog", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>