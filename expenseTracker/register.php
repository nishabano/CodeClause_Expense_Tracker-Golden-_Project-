<?php
    session_start();

    include("../database/db.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        if($cpass!=$pass){
            echo "<script type='text/javascript'>
                    alert('Passwords do not match!');
                </script>";
        }
        else {
            $query = "insert into exp (name,email,pass,cpass) values ('$name','$email','$pass','$cpass')";

            mysqli_query($con,$query);

            echo "<script type='text/javascript'> 
                alert('Registered Successfully!');
                window.location = '../index.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registration | Expense Tracker</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
    
</head>
<body>
    <header>
        <h2>Expense Tracker Registration</h2>
    </header>
    <main>
        <form action="" method="POST" id="regform">
            <p>Enter your name</p>
            <input type="text" name="name" id="name" placeholder="Enter name" required autofocus>
            <p>Enter email address</p>
            <input type="email" name="email" id="email" placeholder="Enter Email" required>
            <p>Create password</p>
            <input type="password" name="pass" id="pass" placeholder="Enter password" required>
            <p>Confirm password</p>
            <input type="password" name="cpass" id="cpass" placeholder="Enter password" required>
            <input type="submit" id="submit" value="Register">
           <span> <p id="reg">Already a user ? <a href="../index.php">Login here</a></p></span>
        </form>
    </main>
   
</body>
</html>