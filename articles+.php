<?php // signup.php
include 'header.php';

$error = $articleID = $title = $image =  $content = $dateposted = $username="";
if (!$loggedin) die();
if (isset($_SESSION['username'])) $_SESSION['username'] =  $username;
if (isset($_POST['title']))
{
 $articleID = sanitizeString($_POST['articleID']);
 $title = sanitizeString($_POST['title']);
 $content = sanitizeString($_POST['content']);
 $content = preg_replace('/\s\s+/', ' ', $content);
 // $dateposted = sanitizeString($_POST['dateposted']) ;
 $time =time();
 if ( $title != ""||  $username != ""|| $content != ""|| $dateposted != "")
querymysql($dbserver, "INSERT INTO $dbname.articles (articleID, title, username, contents) VALUES( '$articleID', '$title', '$username', '$content');");
}


$content = stripslashes(preg_replace('/\s\s+/', ' ', $content));
if (isset($_FILES['image']['name'])){
$saveto = "./img/$username.jpg";
move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
$typeok = TRUE;
switch($_FILES['image']['type'])
 {
 case "image/gif": $src = imagecreatefromgif($saveto); break;
 case "image/jpeg":; // Allow both regular and progressive jpegs;
 case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
 case "image/png": $src = imagecreatefrompng($saveto); break;
 default: $typeok = FALSE; break;
 }
 if ($typeok)
 {
 list($w, $h) = getimagesize($saveto);
 $max = 100;
 $tw = $w;
 $th = $h;
 if ($w > $h && $max < $w)
 {
 $th = $max / $w * $h;
 $tw = $max;
 }
 elseif ($h > $w && $max < $h)
 {
 $tw = $max / $h * $w;
 $th = $max;
 }
 elseif ($max < $w)
 {
 $tw = $th = $max;
 }
 $tmp = imagecreatetruecolor($tw, $th);
 imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
 // imageconvolution($tmp, array(array(−1, −1, −1),
 // array(−1, 16, −1), array(−1, −1, −1)), 8, 0);
 imagejpeg($tmp, $saveto);
 imagedestroy($tmp);
 imagedestroy($src);
 }

}

  echo <<<_END
 <div class='main'><h3>Post an Article </h3>
 <form class = 'uform' method='post' action='articles+.php'>$error
 <input class = 'finput' type='text' style='display:none;' maxlength='' name='articleID' placeholder='Article ID' value='$articleID'onBlur='checkUser(this)'/><span id='info'></span><br /><br/>
 <input  class = 'finput' type='text' maxlength='' name='title' placeholder='Article Title' value='$title'></input>
 <input class = 'finput' type='file' name='image' value='$image' /><br/><br/>
 <textarea class = 'finput' type='textarea' maxlength='' name='content' placeholder='Type or Paste Article' value='$content' width='100%'></textarea><br/><br/>
 <span class='fieldname'>&nbsp;</span><br/><br/>
 <button type='submit' value='Post Article'>Post Article</>
 </form></div><br/>
  </div>

 _END;

  require 'footer.php';
 ?>
