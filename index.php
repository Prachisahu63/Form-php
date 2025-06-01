<?php
$insert = false;
if(isset($_POST['name'])) {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("connection to this database failed due to " .
        mysqli_connect_error());
    }
    //echo "success connecting to the db";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO  `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `orher`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
       // echo "Successfully inserted";
       // Flag for successful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip form</h1>
        <p> Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'> Thanks for submitting your form. We are happy to see you joining us for the US trip </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="js/index.js"></script>
    
</body>
</html>    