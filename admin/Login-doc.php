<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link Css -->
    <link rel="stylesheet" href="./css/Login.css">
    <!-- Link icon siteweb -->
    <link rel="icon" href="images/icons8-medical-50.png">
    <!-- Link google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700;800;900&family=Public+Sans:wght@400;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <p>eeeeeeeeede</p>
<?php
    include('connection.php');
    $error = '';
        if (isset($_POST['login'])){
            $EMAIL = $_POST['email'];
            // $PASSWORD = sha1($_POST['password']); 
            $PASSWORD = $_POST['password'];

            $login = $database->prepare("SELECT * FROM doctor WHERE Email = :Email AND Password = :Password");
            $login->bindParam(":Email", $EMAIL);
            $login->bindParam(":Password", $PASSWORD); 
            $login->execute();  

        if ($login->rowCount()===1){
            session_start();
            $doctor = $login->fetchObject();
            $_SESSION['doctor'] = $doctor;
            echo $doctor->Full_name;
            header("../Location: Dach-doctor.php"); 
            exit();
            }
            else {
                $error = 'Password Or Email is incorrect';
        }
    }
?> 
<h5>eeeeeeeeeeeeee</h5>
    <!-- Start Login -->
    <div class="container">
        <div class="left">
            <img src="./images/bg-1.svg" alt="">
            <p>Dont have  an account</p>
            <a href="./sign up.php" class="sign-up">SIGN UP</a>
        </div>

        <div class="right">
                <form method="POST" action="">
                <img src="../images/LOGO.jpg" alt="" class="logo">
                    <h3>Hospital Management system</h3>
                    <h2>Login</h2>
                    <input type="text" placeholder="Enter your email" name="email">
                    <input type="Password" placeholder="enter your Password" name="password">
                    <?php echo '<p id="error" style="color: red;">' . $error . '</p>'; ?> 
                    <button name="login" >LOGIN</button>
                    <p href="">Forgot your password?</p>
            </form>
            </div>
        </div>
    <!-- End Login -->
</body>
</html>

