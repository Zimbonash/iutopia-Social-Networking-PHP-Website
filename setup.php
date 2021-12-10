<?php // setup.php
echo<<<_END
<html>
<head>
  <title>Setting up database</title>
</head>
<body>
<h3>Setting up...</h3>
_END;

include 'functions.php';

createTable($dbserver, $name = 'members',
 $query = 'memberID BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50),
 password VARCHAR(32),
 dob VARCHAR(16),
 interests VARCHAR(16),
 email VARCHAR(16),
 phone VARCHAR(16),
 lastUpdate VARCHAR(16),
 INDEX(username(6))');

createTable($dbserver, $name = 'messages',
 $query= 'id BIGINT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 auth VARCHAR(16),
 recip VARCHAR(16),
 pm CHAR(1),
 time INT UNSIGNED,
 message VARCHAR(4096),
 INDEX(auth(6)),
 INDEX(recip(6))');

createTable($dbserver, $name= 'friends',
$query= 'username VARCHAR(16),
 friend VARCHAR(16),
 INDEX(username(6)),
 INDEX(friend(6))');

 createTable($dbserver, $name = 'profiles',
 $query = 'username VARCHAR(16),
 text VARCHAR(4096),
 INDEX(username(6))');

 createTable($dbserver, $name = 'articles',
 $query = 'articleID BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(16),
 photo VARCHAR(16),
 username VARCHAR(16),
 content VARCHAR(4096),
 datePosted VARCHAR(16),
 INDEX(username(6))');

 createTable($dbserver, $name = 'reviews',
 $query = 'reviewID BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
 articleID VARCHAR(16),
 memberID VARCHAR(16),
 username VARCHAR(45),
 content VARCHAR(4096),
 datePosted VARCHAR(16),
 lastUpdate VARCHAR(16),
 INDEX(username(6))');

echo <<<_END
<p>...done.</p>
</body>
</html>
_END;
?>
