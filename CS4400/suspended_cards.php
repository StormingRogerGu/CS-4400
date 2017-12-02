<!DOCTYPE html>
<html>
<head>
<style>
table, th{
    border: 1px solid black;
    border-collapse: collapse;
}
th{
    padding: 5px;
    text-align: left;
}

td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}
.selected {
    background-color: brown;
    color: #FFF;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<table style="width:80%" id="station" class="table">
  <caption>Suspended Cards</caption>
  <tr>
    <th>Card #</th>
    <th>New Owner</th>
    <th>Date Suspended</th>
    <th>Previous Owner</th>
  </tr>

  <?php
    include 'db_info.php';
    $suspended_data = getSuspendedCards();

    //echo var_dump($sdata->fetch());
    for ($i = 0; $i < count($suspended_data); $i++){
      $row = $suspended_data[$i];
      echo "<tr><td>" . $row['BreezecardNum'] . "</td><td> " . $row['Username'] . "</td><td>" . $row['DateTime'] . "</td><td>" . $row['BelongsTo'] . "</td></tr>";
    }
    ?>
    
</table>

<div>
  <button name="new" type="submit" onclick="pass_data()">Assion Selected Card to New Owner</button>
  <button name="pre" type="submit" onclick="pass_data2()">Assign Selected Card to Previous Owner</button>
</div>

<p id="demo"></p>

<script type="text/javascript">
  var cardNum;
  var new_owner;
  var pre_owner;
  $(".table tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    cardNum = $(this).find('td:nth-child(1)').html(); 
    new_owner = $(this).find('td:nth-child(2)').html();
    //new_owner = decodeURIComponent(new_owner);    
    pre_owner = $(this).find('td:nth-child(4)').html();

  });

  function pass_data(){
   if (typeof(cardNum) != "undefined"){
      var url = "backend.php?assign_new=" + cardNum  + "&pre_owner=" + pre_owner + "&new_owner=" + new_owner;
      //document.getElementById("demo").innerHTML = url;
      window.location.href = url;
    }
  }

  function pass_data2(){
    if (typeof(cardNum) != "undefined"){
      //alert(cardNum);
      window.location.href = "backend.php?assign_old=" + cardNum + "&pre_owner=" + pre_owner;
      //window.location.href = 'Station_Detail.php'
    //});
    }

  }

</script>
</body>
</html>



