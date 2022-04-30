<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","bioDb");
if(count($_POST)>0) {
$ENTRY=$_POST['Entry'];
$result = mysqli_query($conn,"SELECT * FROM Melanoma where Entry='$ENTRY' ");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<table>
<tr>
<td>No</td>
<td>ENTRY</td>
<td>ENTRY NAME</td>
<td>STATUS</td>
<td>PROTEIN NAMES</td>
<td>GENE NAMES</td>
<td>ORGANISM</td>
<td>LENGTH</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Entry"]; ?></td>
    <td><?php echo $row["Entry_name"]; ?></td>
    <td><?php echo $row["Status"]; ?></td>
    <td><?php echo $row["Protein_names"]; ?></td>
    <td><?php echo $row["Gene_names"]; ?></td>
    <td><?php echo $row["Organism"]; ?></td>
    <td><?php echo $row["Length"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>