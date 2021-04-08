<html>
<head>
<meta http-equiv="refresh" content="10">
<style>
table, th, td {
   
  border-collapse: collapse;
  border: 0px solid black;
}
p {
    font-size:30px;
}

h1{
    font-size:40px;
}

h2{
    font-size:160px;
}

</style>
</head>
<body>

<?php

/*House points for seaton high school
*date: 23Feb2021
*creator: Rob Barnard
*/

include 'db.php' ;  //connect to DB


//Total term for blue
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from blue ";
$ttb = $conn->query($sql);

//Total term for orange
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from orange ";
$tto = $conn->query($sql);

//total term White
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from white ";
$ttw = $conn->query($sql);



echo '
<table style="height: 99%" width="99%">
<tbody>
<tr style="height: 25%; background-color: #6699cc;">
<td style="width: 33%; height: 25%;">&nbsp;<img src="http://localhost/house/seaton.png" alt="" /></td>
<td style="width: 33%; height: 25%;">&nbsp;</td>
<td style="width: 33%; height: 25%;"><h1 style="text-align: center;"><span style="color: #ffffff;"><strong>2021 HOUSE SHIELD</strong></span></h1>
<h1 style="text-align: center;"><span style="color: #ffffff;"><strong>LEADER BOARD</strong></h1></td>
</tr>
<tr >
<td style="width: 33%; background-color: orange; height: 25%;"><p style="text-align: center;"><span style="color: #ffffff;"><strong>ORANGE</strong</p></td>
<td style="width: 33%; height: 25%;"><p style="text-align: center;"><strong>WHITE</strong></p></td>
<td style="width: 33%; height: 25%; background-color: #003366;"><p style="text-align: center;"><span style="color: #ffffff;"><strong>BLUE</strong</p></td>
</tr>
<tr >
<td style="width: 33%; background-color: orange; height: 75%;"><h2 style="text-align: center;"><span style="color: #ffffff;"><strong>';
if ($tto->num_rows > 0) {  //prints term total for orange
    while($row = $tto->fetch_assoc()) {
        echo  $row["termtotal"]; 
    }
}; 
echo '</strong></h2></td>
<td style="width: 33%; height: 75%;"><h2 style="text-align: center; "><span style="color: #000000;"><strong>';
if ($ttb->num_rows > 0) { //prints term total for white
    while($row = $ttw->fetch_assoc()) {
        echo  $row["termtotal"]; 
    }
}; 
echo '</strong></h2></td>
<td style="width: 33%; height: 75%; background-color: #003366;"><h2 style="text-align: center;"><span style="color: #ffffff;"><strong>'; 
if ($ttb->num_rows > 0) { //prints term total for blue
    while($row = $ttb->fetch_assoc()) {
        echo  $row["termtotal"]; 
    }
}; 
echo '</strong></h2></td>
</tr>
</tbody>
</table>
';

?>

</body>
</html>

