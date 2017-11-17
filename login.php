<?php

header('Content-Type:text/html;charset=gb2312');

$pdo = new PDO(
    'mysql:host=academic-mysql.cc.gatech.edu;dbname=cs4400_Group_67',
    'cs4400_Group_67',
    '1tbVjAxq'
);


$usr = $_POST['username'];
$pwd = $_POST['inputPassword'];

$sth = $pdo->query("SELECT * FROM User where Username = '$usr' and Password = '$pwd'");
//echo var_dump($sth->fetch());

if ($sth->fetch()){
	echo "Mathced\n";
	exit;
}else{
	echo "wrong\n";
}

?>