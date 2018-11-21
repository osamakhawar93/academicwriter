<?php
mysqli_connect("localhost", "root", "") or die(mysqli_connect_errno());
mysql_select_db("radiance") or die(mysql_error());
$search = $_POST["name"];

$players = mysql_query("SELECT * FROM case_details WHERE fname LIKE '%{$search}%'");
while($player = mysql_fetch_array($players)) {
    echo "<div>" . $players["fname"] . "</div>";
}
?>