<html>
<style>
.dbresult{
border: 2px solid black;
width: 500px;
height: 250px;
padding: 5px;
margin: auto;
}
.dbresult td,.dbresult th{
border:1px solid red;
border-collapse: collapse;
padding: 5px;
text-align: center;
font-size: 22px;
}
.dbresult th{
background-color: green;
}
.dbresult tr:nth-child(odd){
background-color: peachpuff;
}
.dbresult tr:nth-child(even){
background-color: powderblue;
}
</style>
4
<?php
$link = mysqli_connect('localhost','root','','phpcrud');
if(!$link){
die('conection Error: '.mysqli_connect_error());
}else{
echo'connection successfully.';
echo ' ';
}
$query = "select id,pname,quantity,price from product10";
$result = mysqli_query($link,$query);
$numrow = mysqli_num_rows($result);
if($numrow>0){
echo '<table class="dbresult">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>PNAME</th>';
echo '<th>QUANTITY</th>';
echo '<th>PRICE</th>';
echo '<th>DELETE</th>';
echo '</tr>';
while($row = mysqli_fetch_assoc($result)){
$id = $row['id'];
echo '<tr>';
echo '<td>' . $row['id'] . '</td>';
echo '<td>' . $row['pname'] . '</td>';
echo '<td>' . $row['quantity'] . '</td>';
echo '<td>' . $row['price'] . '</td>';
echo '<td><a href="delete1.php?id='.$id.' ">Delete</a></td>';
echo '</tr>';
}
echo '<tr><td><a href="inputForm.php">Go Back</a></td></tr>';
echo '</table>';
//echo $numrow.'Records Found';
}else{
echo 'Record Not Found';
}
?>
</html>