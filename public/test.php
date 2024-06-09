<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$servername = "database";
$username = "root";
$password = "superSecr3t";

try {
  $conn = new PDO("mysql:host=$servername;dbname=app", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['submit'])) {
      $conn->query('insert into `form` (field) value ("'.$_POST['field'].'")');
  }

  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$field = $conn->prepare('select * from `form` limit 1');

$field->execute();

$rr = $field->fetch();

echo $rr['field'];

?>


<form method="post">
    <input type="text" name="field"/>
    <button name="submit">Send</button>
</form>
</body>
</html>