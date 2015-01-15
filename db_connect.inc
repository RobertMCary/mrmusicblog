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

$db_connect = mysqli_connect("localhost", "root", "c1u2r3r4y", "dbMusicBlog");
if (!db_connect) {
    die(‘Connection unsuccessful:
        ‘ . mysqli_connect_errno());
    }
    echo ‘Connection successful’;

?>