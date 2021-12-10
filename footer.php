<?php


if ($loggedin == FALSE)
{
echo <<<_END
<div class='footer'>
 <div class='col1-footer'>
   <h2> What's going on here?</h2>
   <p> This is a social networking platform for
visionaries to share reviews and some
fun ideas of there vision of the future. <br> Feel free to share a review on
this website’s content. </p>
 </div>
 <div class='col2-footer'>
   <h2> Meta tags</h2>
   <p>#Artificial Intelligence
#Cyber Security   #BlockChain
#Green Planet   #SDG2030
#WarsAndPolitics   #ReligionandSociety
</p>
 </div>
 <div class='col3-footer'>
   <h2>Contribute</h2>
   <button> <a href='signup.php'>Join The Community</a></button>
   <button><a href='#'>Donate</a>  </button>
 <div>
</div>


</body>

</html>
_END;
}else{
  echo <<<_END
  <div class='footer2'>
  <p>&copy iUtopia</p>
  </div>


  </body>

  </html>
  _END;
}
 ?>
