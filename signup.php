<?php // signup.php
require_once 'header.php';
echo <<<_END
<script>
function checkUser(user)
{
 if (user.value == '')
 {
 O('info').innerHTML = ''
 return
 }
 params = "user=" + user.value
 request = new ajaxRequest()
 request.open("POST", "checkuser.php", true)
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
$error = $user = $pass = $dob = $interest = $email = $phone = "";
if (isset($_SESSION['user'])) destroySession();
if (isset($_POST['user']))
{
 $user = sanitizeString($_POST['user']);
 $pass = sanitizeString($_POST['pass']);
 $dob = sanitizeString($_POST['dob']);
 $interest = sanitizeString($_POST['interest']);
 $email = sanitizeString($_POST['email']);
 $phone = sanitizeString($_POST['phone']);

 if ($user == "" || $pass == ""|| $dob == ""|| $interest == ""|| $email == ""|| $phone == "")
  $error = "Not all fields were entered<br /><br />";
  else
  {
  if (mysqli_num_rows(querymysql($dbserver, "SELECT * FROM members WHERE user='$user'")))
  $error = "That username already exists<br /><br />";
  else
  {
  querymysql($dbserver, "INSERT INTO members VALUES('$user', '$pass', '$dob', '$interest', '$email', '$phone')");
  die("<h4>Account created</h4>Please Log in.<br /><br />");
  }
  }
 }
 echo <<<_END

 <div class='main'><h3>Please enter your details to sign up</h3>
 <form class = 'uform' method='post' action='signup.php'>$error
 <input class = 'finput' type='text' maxlength='' name='user' placeholder='Enter Username' value='$user'onBlur='checkUser(this)'/><span id='info'></span><br/><br/>
 <input class = 'finput' type='text' maxlength='' name='email' placeholder='Enter Your Email Address' value='$email'/>
 <input class = 'finput' type='text' maxlength='' name='phone' placeholder='Enter Your Phone Number' value='$phone'/><br/><br/>
 <input class = 'finput' type='text' maxlength='' name='dob'  placeholder='Enter Your DOB' value='$dob'/>
 <label>Interests </label>
 <select class = 'finput' type='text' name="interest" size="5" multiple="multiple">

      <option value="Interest">Interest</option>
      <option value="A.I">Artificial Intelligence</option>
      <option value="War&Politics">War & Politics</option>
      <option value="Religion&Society">Religion & Society</option>
      <option value="Climate Change">Climate Change</option>
      </select><br/><br/>
 <input class = 'finput' type='password' maxlength='16' name='pass' placeholder='Enter Your Password' value='$pass'/>
 <input class = 'finput' type='password' maxlength='16' name='pass' placeholder='Re-enter Your Password' value='$pass' /><br/><br/>
  <button type='submit' value='Sign up'>Sign Up</button>
  <p><b>Registered User?</b> <a href='login.php'>Login iUtopia</a><br/><b>Forgot Password? </b><a href='pswdreset.php'> Reset Password </a><span></p>
  </form></div><br />

  </div>

 _END;

 include 'footer.php';
 ?>
