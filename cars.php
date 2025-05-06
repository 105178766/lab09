<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 9</title>

    <style>
.car-table {
    border-collapse: collapse; /* removes white space between table cells */  
}
.car-table th, /*table header cells*/
.car-table td { /*table data cells*/
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}
</style>

</head>
<body>
   
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
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='car-table'>"; //create a table to display the results
            echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year of Manufacture</th></tr>"; //Genai"Help me with creating this table"
            
            //print each row in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['yom'] . "</td>";
                echo "</tr>"; 
            } 

            echo "</table>";
        } else {
                echo "<p>There are no cars to display.</p>"; //if no records are found, print this message
               } 
            
        } else {
                echo"<p>Unable to connect to the database.</p>"; //if $result is false, print this message
               }
}
mysqli_close ($dbconn); //best practise to close / free up resources
?>

</body>
</html>
