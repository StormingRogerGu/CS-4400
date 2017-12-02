<?php session_start();
    ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Cards</title>
<style>
td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}
.selected {
    background-color: brown;
    color: #FFF;
}
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
var value;
$(".table tr").click(function(){
 $(this).addClass('selected').siblings().removeClass('selected');
 value = $(this).find('td:first').html();

});

function pass_data(){
  if (typeof(value) != "undefined"){
    window.location.href = 'add_card.php?var_value=' + value;
  }
}
function pass_data2(){
  if (typeof(value) != "undefined"){
    window.location.href = 'delete_card.php?var_value=' + value;
  }
}

</script>
</head>


<body>
<center>

<p>Manage Cards</p>
<br /><br />

<table class="table" style="width: 70%" id="Breeze Cards">
	<caption>Breeze Cards</caption>
	<tr>
		<th>Card Number</th>
		<th>Value</th>
		<th>Remove</th>
	</tr>


 <?php

    if (isset($_SESSION['user'])){
        include "db_info.php";
        $usr = $_SESSION['user']["name"];
        $card_num_usr = Get_user_cardinfo($usr);

        for ($i = 0; $i < count($card_num_usr); $i++){
            $temp = $card_num_usr[$i];
            echo "<tr><td>" . $temp['BreezecardNum'] . "</td><td>" . $temp['Value'] . "</td><td>" . "<input type='submit' value='remove' onclick='deleteCard()'>". "</td></tr>";
        }
    }


 ?>


</table>


Please Enter a Breezecard:
<input type="text" id="card_number"><br>
<button type="submit" name="add_card"  onclick="addCard()">Add</button>

 <p>Add Value to Selected Card</p>

Credit Card #: <input type="text" name="creditcard_number"> <br /><br />
Value: <input type="text" id="credit_value"> <br /><br />
<button type="submit" name="usr" onclick="addValue()">Add Value</button>




<script>
var selected_card;
var cur_value;
$(".table tr").click(function(){
 $(this).addClass('selected').siblings().removeClass('selected');
 selected_card = $(this).find('td:nth-child(1)').html();
 cur_value = $(this).find('td:nth-child(2)').html();
});

function addCard(){
  var new_card = document.getElementById('card_number').value;
  //alert("Incorrect card length");
  if (new_card.length != 16){
    alert("Incorrect card length");
  }
  else{
    window.location.href = "backend.php?new_card=" + new_card;
  }
}

function addValue(){
  var extra_value = document.getElementById('credit_value').value;
  if (typeof(selected_card) != "undefined" && extra_value != ""){
    window.location.href = "backend.php?selected_cardmc=" + selected_card + "&cur_value=" + cur_value + "&extra_value=" + extra_value;
  }else{
    alert("Please Input correctly");
  }
}

function pass_data2(){
  if (typeof(selected_card) != "undefined"){
    window.location.href = 'delete_card.php?var_value=' + value;
  }
}

function deleteCard(){
  if (typeof(selected_card) != "undefined"){
    window.location.href = 'backend.php?selected_delete=' + selected_card;
  }
}
</script>






</body>
</html>
