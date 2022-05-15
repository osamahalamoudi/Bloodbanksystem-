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
<th>Cenetr name</th>
<th>email</th>
<th>rate center</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auth");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT center_id , center_name , center_email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["center_id"]. "</td><td>" . $row["center_name"] . "</td><td>"
. $row["center_email"]. "</td><td>
rate the center please 
<form action =ratingIndex.php' method = 'POST'></form>
<select>
<option> 1: bad </option>
<option> 2: normal </option>
<option> 3: good</option>
<option> 4: very good </option>
<option> 5: perfect </option>
</select>
<p> <input type= 'submit'  name='rate'> </p>

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
    alert("center rated sucessfully ");
  });
});
</script>
}  
</script>
</body>
<a href = "donorprofile.php"><button> your profile </button></a>
</html>