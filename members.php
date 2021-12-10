<?php // members.php
include_once 'header.php';
if (!$loggedin) die();
echo "<div class='main'>";
if (isset($_GET['view']))
{
 $view = sanitizeString($_GET['view']);
 if ($view == $user) $name = "Your";
 else $name = "$view's";
 echo "<h3>$name Profile</h3>";
 showProfile($dbserver, $view);
 echo "<a class='button' href='messages.php?view=$view'>" .
 "View $name messages</a><br /><br />";
 die("</div></body></html>");
}
if (isset($_GET['add']))
{
 $add = sanitizeString($_GET['add']);
 if (!mysqli_num_rows(querymysql($dbserver, "SELECT * FROM friends WHERE username='$add' AND friend='$user'")))
 querymysql($dbserver, "INSERT INTO friends VALUES ('$add', '$user')");
}
elseif (isset($_GET['remove']))
{
 $remove = sanitizeString($_GET['remove']);
 querymysql($dbserver, "DELETE FROM friends WHERE username ='$remove' AND friend='$user'");
}
$result = querymysql($dbserver, "SELECT user FROM members ORDER BY user");
$num = mysqli_num_rows($result);
echo "<h3>Other Members</h3><ul>";
for ($j = 0 ; $j < $num ; ++$j)
{
 $row = mysqli_fetch_row($result);
 if ($row[0] == $user) continue;
 echo "<li><a href='members.php?view=$row[0]'>$row[0]</a>";
 $follow = "follow";
 $t1 = mysqli_num_rows(querymysql($dbserver,"SELECT * FROM friends
  WHERE username='$row[0]' AND friend='$user'"));
 $t2 = mysqli_num_rows(querymysql($dbserver,"SELECT * FROM friends
 WHERE username='$user' AND friend='$row[0]'"));
 if (($t1 + $t2) > 1) echo " &harr; is a mutual friend";
 elseif ($t1) echo " &larr; you are following";
 elseif ($t2) { echo " &rarr; is following you";
  $follow = "follow back"; }
  if (!$t1) echo " [<a href='members.php?add=".$row[0] . "'>$follow</a>]";
  else echo " [<a href='members.php?remove=".$row[0] . "'>unfollow</a>]";
 }


  require 'footer.php';
 ?>
