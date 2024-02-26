<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'testdb';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM category WHERE category LIKE '%".$searchTerm."%' ORDER BY category ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['category'];
}
//return json data
$data2 = json_encode($data);
echo $data2;
?>