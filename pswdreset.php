<?php
require 'header.php';

echo <<<_END
<script>
function checkUser(user)
{
 if (username.value == '')
 {
 O('info').innerHTML = ''
 return
 }
 params = "user=" + username.value
 request = new ajaxRequest()
 request.open("POST", "checkprofile.php", true)
 request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
 request.setRequestHeader("Content-length", params.length)
 request.setRequestHeader("Connection", "close")
 request.onreadystatechange = function()
 {
 if (this.readyState == 4)
 if (this.status == 200)
 if (this.responseText != null)
 O('info').innerHTML = this.responseText
 }
 request.send(params)
}
function ajaxRequest()
{
 try { var request = new XMLHttpRequest() }
 catch(e1) {
 try { request = new ActiveXObject("Msxml2.XMLHTTP") }
 catch(e2) {
 try { request = new ActiveXObject("Microsoft.XMLHTTP") }
 catch(e3) {
 request = false
 } } }
 return request
}
</script>
_END;


$error = $user = $pass = $dob = $email = "";
if (isset($_POST['username']) && isset($_POST['email']))
{
 $user = sanitizeString($_POST['username']);
 $email = sanitizeString($_POST['email']);

 if (mysqli_num_rows(querymysql($dbserver,"SELECT * FROM members
 WHERE user='$user' AND email= '$email'")))
 $error = "<span class='available'>&nbsp;&#x2714; "."Correct";
 else $error = "<span class='taken'>&nbsp;&#x2718; "."The username/email you entered is incorrect/does'nt exist. </span>";
}

echo <<<_END
<div class='main'><h3>Reset Password</h3>
<form class = 'uform' method='post' action='pswdreset.php'>
<input class = 'finput' type='text' maxlength='16' name='username' placeholder='Enter Registered Username' value='$user' /><span>$error</span><br/><br/>
<input class = 'finput' type='text' maxlength='16' name='email' placeholder='Enter Registered Email' value='$email' /><span>$error</span><br/><br/>
<button type='submit' value='Reset'>Reset Password</button>
</form><br /></div>
_END;

  include 'footer.php';
  ?>
