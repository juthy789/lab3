<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Creating connection
$connection = new mysqli($servername, $username, $password, $dbname);


?>

<!DOCTYPE html>
<html>

<body><center>
    <h2>Data of the Students</h2>
    </center>

<center>
<div >

    <table >
        <thead style="color: white;background-color: black;">
        <th>UID</th>
        <th>Student Name</th>
        <th>Roll</th>
        <th>Father Name</th>
        <th>Date of Birth</th>

        
        <th>Address</th>
        <th>Email</th>
        
        <th>Phone Number</th>
        <th>Educational Qualification</th>
        </thead>
        <tbody style="color: white;background-color: gray;">

        <?php


        $string = "select * from members";
        $contact_list = $connection -> query($string);

        while($row=$contact_list->fetch_assoc())
        {

            echo "<tr><td>";

            echo $row['uid'];
            echo "</td><td>";

            echo $row['student_name'];
            echo "</td><td>";
            echo $row['roll'];
            

           
            echo "</td><td>";
            echo $row['father_name'];
           
             echo "</td><td>";
            echo $row['date_of_birth'];
            echo "</td><td>";


            
            echo $row['address'];
           
            echo "</td><td>";
            echo $row['email'];
            
           
             echo "</td><td>";
            echo $row['phone_number'];
            echo "</td><td>";
            echo $row['educational_qualification'];
            

            echo "</td></tr>";


        }

        ?>
        </tbody>
    </table>
</div>
</center>
</body>
</html>

