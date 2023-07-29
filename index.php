<?php
    session_start();

    include("database/db.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(!empty($email) && !empty($pass) && !is_numeric($email)){
            $query = "select * from exp where email = '$email' limit 1";
            $result = mysqli_query($con,$query);

            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass']==$pass){
                        header("location: expenseTracker/app.php");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> 
                alert('Invalid credentials!');
            </script>";
        }
        else{
            echo "<script type='text/javascript'> 
                alert('Invalid credentials!');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login | Expense Tracker</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Girassol&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <header>
        <span><h2>Welcome to Expense Tracker </h2></span>
    </header>
    <main>
        <form action="" method="POST">
            <p class="Username"><i class="fa-regular fa-envelope"></i> Username/Email address</p>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" required autofocus>
            <p>Enter password</p>
            <input type="password" name="pass" id="pass" placeholder="Enter password" required>
            <input type="submit" id="submit" value="Login">
           <span> <p id="reg">New user? <a href="expenseTracker/register.php">Create an account</a></p></span>
        </form>
    </main>
   
</body>
</html>