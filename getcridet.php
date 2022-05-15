<!DOCTYPE html>
<html>
<head>
<title>centers You Donated to</title>

</head>
<link rel="stylesheet" type="text/css" href="mys.css">
<body>
<table>
<tr>
<th>Id</th>
<th>donor name</th>
<th> donor email</th>
<th>give credit</th>
</tr>
 <span> Give credit to a donor</span> 
<?php
$conn = mysqli_connect("localhost", "root", "", "auth");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT donor_id , donor_name , donor_email FROM donors";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["donor_id"]. "</td><td>" . $row["donor_name"] . "</td><td>"
. $row["donor_email"]. "</td><td>

<form action =getcridet.php' method = 'POST'></form>


<p> <input type= 'submit'  name='cridet' value = 'give credit to this donor'> </p>

</form>





</td></tr>" ;
}


echo "</table>";
} else { echo "0 results"; }



?>


</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("p").click(function(){
    alert("credit given to the donor  ");
  });
});
</script>
}  
</script>
</body>
<a href ="profile.php"><button> your profile </button></a>
</html>