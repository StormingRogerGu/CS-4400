

<?php

//header('Content-Type:text/html;charset=gb2312');

// $pdo = new PDO(
//     'mysql:host=academic-mysql.cc.gatech.edu;dbname=cs4400_Group_67',
//     'cs4400_Group_67',
//     '1tbVjAxq'
// );

// // $sdata = $pdo->query("SELECT T.BreezecardNum, T.BelongsTo, T.DateTime, T.UserName FROM(Select * from Breezecard  LEFT JOIN (SELECT BreezecardNum as s, DateTime, Username FROM Conflict) B ON Breezecard.BreezecardNum = B.s) T");
// $v = "Midtown";
// $sdata = $pdo->query("SELECT * FROM Station WHERE Name = '$v'");

// echo $sdata->fetch()['StopID'];

// echo "<table>";

// while($row = $sdata->fetch()){
//     echo "<tr><td>" . $row['Name'] . "</td><td> " . $row['StopID'] . "</td><td>" . $row['EnterFare'] . "</td><td>" . $row['ClosedStatus'] . "</td></tr>";
// }

// echo "</table>"

include "db_info.php";
$a = "7";
$b = "N12345";
$S = update_fare($a, $b);
echo $S;
//echo $S[0]['ClosedStatus'];

// for ($i = 0; $i < count($r); $i++){
// 	echo $r[$i]['BelongsTo'];

//echo $r;

// 	$usr = "1111";
// 	$a = Get_user_cardnum($usr);
// 	echo $a[0]['Value'];
        // $username = "111";
        // $email = "32432423";
        // $pwd = "2222";
        // $num = "342342342342344";
        // InsertNewUser($username, $pwd);
        // InsertPassenger($username, $email);
        // InsertBreezeCard($username, $num);
        // UpdateCardBelonging("222",$num);
        // InsertConflict($username, $num);
?>






