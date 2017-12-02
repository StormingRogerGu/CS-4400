<!DOCTYPE html>
<html>


<head>
<style>

td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}
.selected {
    background-color: brown;
    color: #FFF;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>


<body>
<table class="tablesorter" style="width:80%" id="station" cellspacing="1">
  <caption>Monthly savings</caption>
  <thead>
    <tr>
    <th onclick="sortTable(0)">Station Name</th>
    <th onclick="sortTable(1)">Stop ID</th>
    <th onclick="sortValue()">Fare</th>
    <th onclick="sortTable(3)"">Status</th>
    </tr>
  </thead>
  <?php
    include 'db_info.php';
    $sdata = Grab_Station_info();

    //while($row = $sdata)
    for ($i = 0; $i < count($sdata); $i++){
      $row = $sdata[$i];
      echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['StopID'] . "</td><td>" . $row['EnterFare'] . "</td><td>" . $row['ClosedStatus'] . "</td></tr>";
    }
    ?>
</table>

<script>
//   $(document).ready(function() {
//     // call the tablesorter plugin
//     $("table").tablesorter({
//         // sort on the first column and third column, order asc
//         sortList: [[0,0],[2,0]]
//     });
// });
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("station");
  switching = true;
  dir = "asc";
  while (switching) {

    switching = false;
    rows = table.getElementsByTagName("TR");

    for (i = 1; i < (rows.length - 1); i++) {

      shouldSwitch = false;

      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];

      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {

          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;

      switchcount ++;
    } else {

      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function sortValue(){
    var tbl = document.getElementById("station").tBodies[0];
    var store = [];
    var dir = "asc"
    for(var i=0, len=tbl.rows.length; i<len; i++){
        var row = tbl.rows[i];
        var sortnr = parseFloat(row.cells[2].textContent || row.cells[2].innerText);
        if(!isNaN(sortnr)) store.push([sortnr, row]);
    }

    if (dir == "asc"){
      store.sort(function(x,y){
        return x[0] - y[0];
      });
      for(var i=0, len=store.length; i<len; i++){
        tbl.appendChild(store[i][1]);
      }
      store = null;
      dir = "desc"
    }
    else if (dir == "desc"){
      store.sort(function(x,y){
        return y[0] - x[0];
      });
      for(var i=0, len=store.length; i<len; i++){
        tbl.appendChild(store[i][1]);
      }
      store = null;
      dir = "asc"
    }

}
  var value;
  $(".tablesorter tr").click(function(){
   $(this).addClass('selected').siblings().removeClass('selected');
   value = $(this).find('td:first').html();

  });

  function pass_data(){
    if (typeof(value) != "undefined"){
      window.location.href = 'Station_Detail.php?var_value=' + value;

    }

  }

  function create_station(){
    window.location.href = 'Create_Station.php';
  }


</script>

<div>
  <button name="Create" onclick="create_station()">Create New Station</button>
  <button name="View" type="submit" onclick="pass_data()">View Station</button>
</div>

</body>
</html>



