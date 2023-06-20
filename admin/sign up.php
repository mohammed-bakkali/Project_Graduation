<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link Css -->
    <!-- <link rel="stylesheet" href="./css/sign up.css"> -->
    <link rel="stylesheet" href="./css/sign up.css?=<php echo time();?>">
    <!-- Link icon siteweb -->
    <link rel="icon" href="images/icons8-medical-50.png">
    <!-- Link google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700;800;900&family=Public+Sans:wght@400;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<?php
    include('connection.php');
    $error = '';

    if (isset($_POST['sign_up'])) {
        $NOM = $_POST['Full_name'];
        $EMAIL = $_POST['email'];
        $CIN = $_POST['cin'];
        $PHONE = $_POST['phone'];
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $password = $_POST['password'];

        
        // Validate password
        if (empty($_POST['password'])) {
            $error = "Password is required.";
        } elseif (strlen($_POST['password']) < 8) {
            $error = "Password should be at least 8 characters long.";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $_POST['password'])) {
            $error = "Password should contain at least one uppercase letter, one lowercase letter, and one numeric digit.";
        }

        // Validate phone number
        if (empty($PHONE)) {
            $error = "Phone number is required.";
        } elseif (!preg_match("/^[0-9]{10}$/", $PHONE)) {
            $error = "Invalid phone number. Please enter a 10-digit number.";
        }

        // Validate CIN
        if (empty($CIN)) {
            $error = "CIN is required.";
        } elseif (!preg_match("/^[0-9]{8}$/", $CIN)) {
            $error = "Invalid CIN. Please enter an 8-digit number.";
        }

        // Validate full name
        if (empty($NOM)) {
            $error = "Full name is required.";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $NOM)) {
            $error = "Only letters and spaces are allowed in the full name.";
        }

        // Proceed with registration if no errors
        if (empty($error)) {
            $checkEmail = $database->prepare("SELECT * FROM Admin WHERE Email = :Email");
            $checkEmail->bindParam(":Email", $EMAIL);
            $checkEmail->execute();

            if ($checkEmail->rowCount() > 0) {
                $error = "Email already exists.";
            } else {
                $checkCIN = $database->prepare("SELECT * FROM Admin WHERE CIN = :CIN");
                $checkCIN->bindParam(":CIN", $CIN);
                $checkCIN->execute();

                if ($checkCIN->rowCount() > 0) {
                    $error = "CIN already exists.";
                } else {
                    $addData = $database->prepare("INSERT INTO Admin (Full_name, Email, CIN, Phone, password, Dt_create_account) 
                    VALUES (:Full_name, :Email, :CIN, :Phone, :password, NOW())");
                    $addData->bindParam(":Full_name", $NOM);
                    $addData->bindParam(":Email", $EMAIL);
                    $addData->bindParam(":CIN", $CIN);
                    $addData->bindParam(":Phone", $PHONE);
                    $addData->bindParam(":password", $password);
                    $addData->execute();
                    header("Location: Login.php");
                    exit();
                }
            }
        }
    }
?>


<!-- Start Login -->
<div class="container">
    <div class="right">
        <form method="POST" action="">
            <img src="./images/LOGO.jpg" alt="" class="logo">
            <h3>Hospital Management system</h3>
            <h2>Login</h2>
            <input type="text" placeholder="Enter your full name" name="Full_name" value="<?php echo isset($_POST['Full_name']) ? htmlspecialchars($_POST['Full_name']) : ''; ?>">
            <input type="text" placeholder="Enter your Email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <input type="text" placeholder="Enter your CIN" name="cin" value="<?php echo isset($_POST['cin']) ? htmlspecialchars($_POST['cin']) : ''; ?>">
            <input type="text" placeholder="Enter your Phone" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
            <input type="password" placeholder="Enter your Password" name="password">
            <?php echo '<p id="error" style="color: red;">' . $error . '</p>'; ?> 


            <button href="" name="sign_up">Sign up</button>
            <p href="">Forgot your password?</p>
        </form>
    </div>
    <div class="left">
        <img src="./images/bg-1.svg" alt="">
        <p>Don't have an account</p>
        <a href="./Login.php" class="sign-up">SIGN UP</a>
    </div>
</div>

<!-- End Login -->

<!-- End Login -->



</body>
</html>

