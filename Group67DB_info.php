<?php
$usr = $_POST["username"];
$pwd = $_POST["inputPassword"];

$pdo = new PDO(
    'mysql:host=academic-mysql.cc.gatech.edu;dbname=cs4400_Group_67',
    'cs4400_Group_67',
    '1tbVjAxq'
);

// $sth = $pdo->query('SELECT * FROM User');
// var_dump($sth->fetch());
$db_usr = $pdo->query('SELECT username FROM User');
echo($db_usr->fetch());

// $db_pwd = $pdo->query('SELECT Password FROM User');
// var_dump($db_pwd->fetch());

// if (in_array($usr, $db_usr) And in_array($pwd, $db_pwd)){
// 	echo "Matched";
// }else{
// 	echo "Not Matched";
// }

?>