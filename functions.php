<?php // functions.php

$dbhost = 'c8u4r7fp8i8qaniw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$dbname = 'x9g2e7im7tcmaose';
$dbuser = 'ffi30ffxo5w3k8iu';
$dbpass = 'rz1hm2gcpzhizann';
$appname = "THE iDEA OF UTOPIA";

$dbserver = mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysqli_error($dbserver));
 mysqli_select_db($dbserver, $dbname) or die();


// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $dbserver = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// mysqli_select_db($dbserver, $cleardb_db) or die();
mysqli_select_db($dbserver, $dbname) or die();

function querymysql($dbserver, $query)
{
  $result = mysqli_query($dbserver, $query) or die(mysqli_error($dbserver));
 return $result;
}

function createTable($dbserver, $name, $query)
{
 querymysql($dbserver, "CREATE TABLE IF NOT EXISTS $name ($query)");
 echo "Table '$name' created or already exists.<br />";
}

function destroySession()
{
 $_SESSION=array();
 if (session_id() != "" || isset($_COOKIE[session_name()]))
 setcookie(session_name(), '', time()-2592000, '/');
 session_destroy();
}
function sanitizeString($var)
{
 $var = strip_tags($var);
 $var = htmlentities($var);
 $var = stripslashes($var);
 return ($var) ;
}
function showProfile( $dbserver, $user)
{
 if (file_exists("./img/$user.jpg"))
 echo "<img src='./img/$user.jpg' align='left' />";
 $result = querymysql($dbserver, "SELECT * FROM profiles WHERE username='$user'");
 if (mysqli_num_rows($result))
 {
 $row = mysqli_fetch_row($result);
 echo stripslashes($row[1]) . "<br clear=left /><br/>";
 }
}

function showArticle( $dbserver, $user)
{
 if (file_exists("./img/article/$user.jpg"))
 echo "<img src='./img/article/$user.jpg' align='left' />";
 $result = querymysql($dbserver, "SELECT * FROM articles WHERE username='$user'");
 if (mysqli_num_rows($result))
 {
 $row = mysqli_fetch_row($result);
 echo stripslashes($row[1]) . "<br clear=left /><br/>";
 }
}

function mysql_entities_fix_string($string)
{
 return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string)
{
 if (get_magic_quotes_gpc()) $string = stripslashes($string);
 return mysql_real_escape_string($string);
}
