<?php
require_once "settings.php";
$dbconn = @mysqli_connect ($host,$user,$pwd,$sql_db); //connecting to the database
if (!$dbconn) { //check if connection to db is successful?
    echo "<p>Unable to connect to the database</p>";
}
else {
    $query = "SELECT *FROM cars";//mysql query
    $result = mysqli_query($dbconn, $query); //execute and store the result of the query
    if($result){ //check if the query was true / successful
        echo "<table border='5'>";
        echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year of Manufacture</th></tr>"; //Genai"Help me with creating this table"
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>"; }  
    echo "</table>";}
else {
    echo"<p>Unable to connect to the database</p>"; //if $result is false, print this message
}
    mysqli_close ($dbconn); //best practise to close / free up resources
}
?>