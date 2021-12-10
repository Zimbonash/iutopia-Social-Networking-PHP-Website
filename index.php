<?php // index.php
require_once 'header.php';

// if (isset($_GET['erase']))
//  $erase = sanitizeString($_GET['erase']);
//  querymysql($dbserver, "DELETE FROM messages WHERE id=$erase AND recip='$user'");
 
 $query = "SELECT * FROM articles ORDER BY datePosted DESC";
 $result = querymysql($dbserver, $query);
 $num = mysqli_num_rows($result);

 for ($j = 0 ; $j < $num ; ++$j)
 {
 $row = mysqli_fetch_row($result);
//  if ($row[3] == 0 || $row[1] == $user || $row[2] == $user)
//  {
    $saveto = "<img class='acover' src='./img/$row[0].jpg'/>";
  echo "<h1>Title: $row[1]</h1>";
 echo date('M jS \'y g:ia:', $row[4]);
 echo "Written By:<i> $row[2] </i>";
 echo "<div class='article'>$saveto<p>$row[3]</p></div><br/> 
 <span> <button>Read More</button></pan><span> <button> Add+ Review</button></pan> <span> <button> Edit Article</button></pan> ";
//  }
 }

require 'footer.php';

// //comment out html
// echo <<<_END
// <body>
// <div class='col1-body'>
// </div>

// <div class ='col2-body'>

// </div>

// <div class='col3-body'>
// </div>
// _END;
?>
