<?php session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Passenger Flow Report</title>
</head>
<body>

<form action="#" method="post">
<br>
  Start time:
  <input type="datetime-local" name="start_time" step=1>

 </b>

<br>
  End Time:
  <input type="datetime-local" name="end_time" step=1>
</b>

<br>
  <input type="submit" name="update" value="update">
  <input type="submit" name="reset" value="reset">
  <input type="submit" name="back" value="Back">
</form>

<table class="table" style="width:80%" id="station">
  <caption>Passenger Flow Report</caption>
  <tr>
    <th>Station Name</th>
    <th># Passenger In</th>
    <th># Passenger Out</th>
    <th>Flow</th>
    <th>Revenue</th>
  </tr>
<?php
    include "redirect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
      include "db_info.php";
      $start_time = substr_replace($_POST['start_time'],' ',10,1);
      $end_time = substr_replace($_POST['end_time'],' ',10,1);


      if (validateInputs($start_time, $end_time) === TRUE){
        $row = passenger_flow_report($start_time, $end_time);
        // echo $row[0]['StartTime'];
        for ($j = 0; $j < count($row); $j++){
          echo "<tr><td>" . $row[$j]['Name'] . "</td><td> " . $row[$j]['passenger_in'] . "</td><td>" . $row[$j]['passenger_out'] . "</td><td>" . $row[$j]['flow'] ."</td><td>" . $row[$j]['revenue'] .  "</td></tr>";
        }
      }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['back'])){
      Redirect("admin.php");
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


