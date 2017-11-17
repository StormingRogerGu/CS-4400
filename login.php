<?php

header("Content-Type: text/html; charset=utf8");

$pdo = new PDO(
    'mysql:host=academic-mysql.cc.gatech.edu;dbname=cs4400_Group_67',
    'cs4400_Group_67',
    '1tbVjAxq'
);



$usr = 'admin3443';
$pwd = '0192023a7bbd73250516f069df18b500';

$sth = $pdo->query("SELECT * FROM User where Username = '$usr' and Password = '$pwd'");
//echo var_dump($sth->fetch());

if ($sth->fetch()){
	echo "Mathced\n";
	exit;
}else{
	header("refresh:0;url=sign_in.html");
	echo "wrong \n";
}




?>