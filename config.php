<?php
//$connectionID = mysqli_connect('127.0.0.1:3306', 'root','amakurukisetina3', 'aims') or die ("Unable to connect to database.");
//$connectionID = mysqli_connect('localhost', 'www',null, 'siyaleader_arm') or die ("Unable to connect to database.");
$txtDebug = "Line ".__LINE__." in ".__FILE__;
$db_conn = array(
	 'host'=>getenv("DB_HOST")
	, 'port'=>getenv("DB_PORT")
	, 'name'=>getenv("DB_NAME")
	, 'user'=>getenv("DB_USER")
	, 'pass'=>getenv("DB_PASSWORD")
);
$db_conn['host'] = "localhost";
$db_conn['name'] = "siyaleader_lonmin_db";
$db_conn['user'] = "root";
$db_conn['pass'] = Null;
$txtDebug .= "\n  \$db_conn - ".print_r($db_conn, 1);
//echo "<pre>{$txtDebug}</pre>";
//$connectionID = mysqli_connect('localhost:3307', 'root',null, 'siyaleader_arm_dev') or die ("Unable to connect to database.");
$connectionID = mysqli_connect($db_conn['host'], $db_conn['user'],$db_conn['pass'], $db_conn['name']) or die ("Unable to connect to database.");
?>