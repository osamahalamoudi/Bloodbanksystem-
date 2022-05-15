<!DOCTYPE html>
<html>
<head>
<title>display patients </title>
<link rel="stylesheet" type="text/css" href="mys.css">
</head>
<body>
<table>
<tr>
<th>Id</th>
<th> patient name</th>
<th>patient phone number </th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "addpatient");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, phonenumber FROM patient";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["phonenumber"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>