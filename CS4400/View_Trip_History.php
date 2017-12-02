<?php session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>View Trip History</title>
</head>
<body>

<form action="#" method="post">
<br>
  Start time:
  <!-- <input type="datetime-local" name="start_time" value="2016-12-30T23:59:59" step=1> -->
  <input type="datetime-local" name="start_time" step=1>
 </b>

<br>
  End Time:
  <input type="datetime-local" name="end_time" step=1>
  <!-- <input type="datetime-local" name="end_time" value="2018-01-01T01:01:01" step=1> -->
</b>

<br>
  <input type="submit" name="update" value="update">
  <input type="submit" name="reset" value="reset">
  <input type="submit" name="back" value="Back">
</form>

<table class="table" style="width:80%" id="station">
  <caption>View Trip History</caption>
  <tr>
    <th>Time</th>
    <th>Source</th>
    <th>Destination</th>
    <th>Fare Paid</th>
    <th>Card Number</th>
  </tr>
<?php
    include "redirect.php";

    if (isset($_SESSION['user'])){
      include "db_info.php";
      $usr = $_SESSION['user']["name"];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
      //include "db_info.php";
      $start_time = substr_replace($_POST['start_time'],' ',10,1);
      $end_time = substr_replace($_POST['end_time'],' ',10,1);

      // $usr = 'jackefe1';

      if (validateInputs($start_time, $end_time) === TRUE){
        $row = GetTripHistory($usr, $start_time, $end_time);
        // echo $row[0]['StartTime'];
        for ($j = 0; $j < count($row); $j++){
          if($row[$j]['Name2'] != ''){
            echo "<tr><td>" . $row[$j]['StartTime'] . "</td><td> " . $row[$j]['Name1'] . "</td><td>" . $row[$j]['Name2'] . "</td><td>" . $row[$j]['TripFare'] ."</td><td>" . $row[$j]['BreezecardNum'] .  "</td></tr>";
          }
          else{
            echo "<tr><td>" . $row[$j]['StartTime'] . "</td><td> " . $row[$j]['Name1'] . "</td><td>" . 'NULL' . "</td><td>" . $row[$j]['TripFare'] ."</td><td>" . $row[$j]['BreezecardNum'] .  "</td></tr>";
          }
        }
      }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['back'])){
      Redirect("Welcome_to_Passengers.php");
    }

    function validateInputs($start_time, $end_time){
      if ($start_time === ' ' OR $end_time === ' '){
        return TRUE;
      }
      if ($start_time > $end_time){
        echo "<script type='text/javascript'>alert('End time should be later than start time!');</script>";
        return FALSE;
      }
      return TRUE;
    }
?>
</table>

</body>
</html>


