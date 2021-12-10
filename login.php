<?php // login.php
include_once 'header.php';
echo "<div class='main'><h3>Please enter your details to log in</h3>";
$error = $user = $pass = "";
if (isset($_POST['user']))
{
 $user = sanitizeString($_POST['user']);
 $pass = sanitizeString($_POST['password']);
 if ($user == "" || $pass == "")
 {
 $error = "Not all fields were entered<br />";
 }
 else
 {
 $query = "SELECT user, password  FROM members
 WHERE user='$user' AND password='$pass'";
 if (mysqli_num_rows(querymysql($dbserver, $query)) == 0)
 {
 $error = "<span class='error'>Username/Password Invalid</span><br /><br />";
 }
 else
 {
 $_SESSION['user'] = $user;
 $_SESSION['password'] = $pass;
 die("You are now logged in. Please <a href='members.php?view=$user'>" .
 "click here</a> to continue.<br/><br/>");
 }
 }
}
echo <<<_END
<form class = 'uform' method='post' action='login.php'>$error
<input class = 'finput' type='text' maxlength='16' name='user' placeholder='Enter Username' value='$user' />
<input class = 'finput' type='password' maxlength='16' name='password' placeholder='Enter Your Password' value='$pass' /><br />
<button type='submit' value='Login'>Sign In</button>
<p><b>Forgot Password? </b><a href='pswdreset.php'> Reset Password </a><span> <br/><b>New User?</b> <a href='signup.php'>Join Community</a></p>
 </form><br /></div>



_END;

  include 'footer.php';
?>
