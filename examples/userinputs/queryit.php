<?php
$servername = "localhost";
//$username = "admin";
//$password = "M0n@rch$";
$username = "root";
$password = "";
$dbname = "mysqltest";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$oppName = $_POST["opponentName"];
//$oppName = mysqli_real_escape_string($conn, $oppName);

$sql = "SELECT * FROM oduScores where opponent='$oppName';";

print "DEBUGGING: query executed below<br>$sql<br><br>";

$result = $conn->query($sql);
echo "<html><body>\n";
if ($result->num_rows > 0) {
    echo "<table padding=2 border=1>\n";
    echo "<tr><th>ID<th>opponent<th>visitor points<th>odu points<th>date\n";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "<td>" . $row["opponent"] . "<td>" . $row["visitorPoints"] . "<td>" . $row["oduPoints"] . "<td>" . $row["notes"] . "\n";
    }
} else {
    echo "0 results";
}
$conn->close();
echo "</body></html>";
?>
