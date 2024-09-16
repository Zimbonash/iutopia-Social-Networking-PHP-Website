<?php // header.php
require 'functions.php';
session_start();
require 'functions.php';
echo <<<_END
<!DOCTYPE html>\n
<html>
<!--I, Tinashe Would like to challenge you to decode the meaning of the sliding message in Green and Yellow. Good luck! -->
  <head>

    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src='./assets/js/app.js'></script>

    <link rel='stylesheet' href='./assets/styles/styles.css' type='text/css'/>


    <title>$appname</title>
   </head>
    
_END;




$userstr = '';
if (isset($_SESSION['user']))
{
 $user = $_SESSION['user'];
 $loggedin = TRUE;
 $userstr = " ($user)";
}
else $loggedin = FALSE;


echo <<<_END

_END;

if ($loggedin == TRUE)
{

 echo <<<_END

      <body>
      <div class='header' style='background:none;' >



 <aside class='col2-header'><a href='index.php'><h1><span id='t1'>THE</span><span id='t2'> iDEA</span><span id='t3'> OF </span><span id='t4'>UTOPIA</span></h1></a></br>
 <p id='tagline' style='margin-top: -70px; '> #Exploring ideas around the vision for the Future.</p>
 <!--<input id='searchbar' name='Search Bar' placeholder='Type-In Search n Discover'> </input>-->
 </aside>


   <aside class='col3-header'>
  <!-- <button>Join The Community</button><br>-->
   <button style='margin-top: 30px;    opacity: 0;'> Donate </button>
   </aside>

      </div>


 <div class='menu-wrap'><br ><ul class='menu'>
 <li><a href='members.php?view=$user'>Home</a></li>
 <li><a href='members.php'>Members</a></li>
 <li><a href='friends.php'>Friends</a></li>
 <li><a href='messages.php'>Messages</a></li>
 <li><a href='articles+.php'>Post Article</a></li>
 <li><a href='profile.php'>Edit Profile</a></li>
 <li><a href='logout.php'>Log out</a></li></ul><br /></div>;
 _END;

}
else
{
 echo <<<_END

 
  <body>
    <div class='header' >

 <aside class='col1-header'>
 <marquee behavior='scroll' style='background: #020e05; z-index: 10; font-family: Microsoft JhengHei SYSTEM-UI; padding-top: 5px; margin-top: 50px; width: 250px; height: 25px; font-size: 15px;    border: 5px solid #000000;    color: #ffffff;    border: 1px solid #8ce27d;    grid-area: none;    border-radius: 10px;; grid-area: none;  outline-offset: revert;  perspective-origin: center;  border-radius: 10px;' direction='left' onmouseover='this.stop();' onmouseout='this.start();' >
      <script>document.write(new Date());</script>
 </marquee>

 </aside>

 <aside class='col2-header'><h1><span id='t1'>THE</span><span id='t2'> iDEA</span><span id='t3'> OF </span><span id='t4'>UTOPIA</span></h1></br>
 <p id='tagline'> #Exploring ideas around the vision for the Future.</p>
 <input id='searchbar' name='Search Bar' placeholder='Type-In Search n Discover'> </input>
 </aside>


   <aside class='col3-header'>
   <button><a href='signup.php'>Join The Community</a></button><br>
   <button><a href='#'> Donate</a> </button>
   </aside>
    </div>

    <div>

    <!--From I Tinashe, Well done for finding this. Now explore the code :) Goodluck -->
 <marquee behavior='scroll' style='background: #00430d;font-familY: WebDings; height: 30px; font-size: 28px; color: #d6a901;' direction='left' onmouseover='this.stop();' onmouseout='this.start();'>
 Exploring ideas around the vision for the Future.
 </marquee>


 <marquee behavior='scroll' style='background: #8aef92; font-family: arial; color: #000' direction='left' onmouseover='this.stop();' onmouseout='this.start();'>
 Welcome  Utopians from Distopia lol :D Did you know the above floating symbols are a message. I challenge you to decode the meaning :) Goodluck!!!

  </marquee>

    </div>
 <div class='menu-wrap'><br /><ul class='menu'>
 <li><a href='index.php'>Home</a></li>
 <li><a href='signup.php'>Sign up</a></li>
 <li><a href='login.php'>Log in</a></li></ul></br>
 <span class='info'>&#8658; You must be logged in to Add and Review Articles | Connect with Utopian Friends :).</span>.</div> ");

 _END;

}


?>
