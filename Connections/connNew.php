<?php
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    // DEV
    $hostname_conn = "localhost";
    $database_conn = "dusit";
    $username_conn = "root";
    $password_conn = "root";
} else {
    $hostname_conn = "localhost";
    $database_conn = "5811011802082_project";
    $username_conn = "5811011802082";
    $password_conn = "27052539";
}
$conn = new mysqli($hostname_conn,$username_conn,$password_conn,$database_conn) or trigger_error(mysql_error(), E_USER_ERROR);
$conn->set_charset('utf8');
mysql_query("SET NAMES UTF8");
?>