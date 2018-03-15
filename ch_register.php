<?php

$error_message = "";



    //checking if any of the fields are empty or not
    if ($_POST['student_name'] == "")
        {$error_message = "please enter student name!<br>";
    echo $error_message;}
    if ($_POST['roll'] == "")
       { $error_message = "please  enter roll!<br>";
    echo $error_message;}
    if ($_POST['phone_number'] == "")
       { $error_message = "please enter  phone number!<br>";
    echo $error_message;}
    if ($_POST['father_name'] == "")
       {$error_message = "please enter Fathers name!<br>";
    echo $error_message;}
    if ($_POST['address'] == "")
      { $error_message = "please enter  Address!<br>";
    echo $error_message;}
    if ($_POST['email'] == "")
       { $error_message = "please enter email address!<br>";
    echo $error_message;}
    if ($_POST['date_of_birth'] == "")
        {$error_message = "please enter Date of Birth!<br>";
    echo $error_message;}
    if ($_POST['educational_qualification'] == "")
       { $error_message = "please enter Educational qualification!<br>";
    echo $error_message;}


    /***validation part starts ***/
    //CSE RU student's roll must be at a number and must be at least 8 digit
    if (!is_numeric($_POST['roll']) || (strlen($_POST['roll']) < 8 || strlen($_POST['roll']) >10)) {
        $error_message = "Invalid Roll Number!<br>";
        echo $error_message;
    } //phone number must be a digit and at least 11 digit
    if (!is_numeric($_POST['phone_number']) || strlen($_POST['phone_number']) != 11)
        $error_message = "Invalid Phone Number!<br>";
    echo $error_message;

    //built in function to validate email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format!<br>";
        echo $error_message;
    }


    //checking if student is over 18 years or not
    $given_year = new DateTime($_POST['date_of_birth']);
    $current_year = new DateTime();
    $diff = $given_year->diff($current_year);

    if ($diff->y < 18)
        $error_message = "Student must be at least 18 years!!<br>";
echo $error_message;

    //if no error found, save to database
    if (strlen($error_message) == 0) {
        //saving to database

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "data";

        // Creating connection
        $connection = new mysqli($servername, $username, $password, $dbname);

        $student_name = $_POST['student_name'];
        $roll = $_POST['roll'];
        $phone_number = $_POST['phone_number'];
        $father_name = $_POST['father_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $date_of_birth = $_POST['date_of_birth'];
        $educational_qualification = $_POST['educational_qualification'];
        $uid = uniqid(); //creating a unique id


        $query_string = "INSERT INTO MEMBERS VALUES('$student_name','$roll','$phone_number'
                        ,'$father_name','$address','$email','$date_of_birth'
                        ,'$educational_qualification'
                        ,'$uid')";

        $connection -> query($query_string);
        
        echo "you have registered successfully !!!<br>";
        
    }



    





?>

<!DOCTYPE html>
<html>
<body>
<?php  if (strlen($error_message) != 0)echo "fill up the form again appropiately"; ?>

<a href="register.html"> <button>BACK</button> </a>


</body>
</html>
