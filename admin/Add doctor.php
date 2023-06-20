<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Css -->
    <link rel="stylesheet" href="./css/Dashbord.css">
    <!-- Link font awsome -->
    <link rel="stylesheet" href="./css/all.css">
    <!-- Link icon siteweb -->
    <link rel="icon" href="images/icons8-medical-50.png">
    <!-- Link google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700;800;900&family=Public+Sans:wght@400;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <style>
        #Doctor{
            margin-left: auto;
            margin-right: auto;
            width: 70%;
            padding: 26px;
            box-shadow: 1px 1px 10px #a49d9d;
            background: white;
            position: relative;
            top: -40px;
        }
        .row{
            display: flex;
            margin-bottom: 1rem;
        }
        @media (max-width: 1265px){
            .row{
                flex-direction: column;

            }
        }
        .col{
            flex: 1;
            margin-left: 20px;
        margin-right: 20px;
        margin-bottom: 21px;
        }
        form h2{
            display: block;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 27px;
            color: #777;
            font-weight: 100;
        }
        label{
            display: flex;
            margin-bottom: 13px;
        }
        form .row .col input{
            padding: 10px 20px;
            outline: none;
            border: 1px solid #0298cf;
            border-radius: 6px;
            color: #0298cf;
            width: 100%;
        }
        .text-right{
            text-align: right;
            margin-right: 17px;
        }
        .text-right a:nth-child(1) {
            padding: 8px 17px;
            border-radius: 6px;
            color: #fff;
            background-color: #5a6268;
            border-color: #545b62;
        }
        .text-right button:nth-child(2){
            border-radius: 6px;
            color: beige;
            padding: 8px 17px;
            background: #0298cf;
}
    </style>

    <!-- SCRIPT PHP -->
    <?php
    session_start();
    if (isset($_SESSION['admin'])) {
        $admin = $_SESSION['admin'];
    }

    if (isset($_POST['logout'])) {
    // Perform any necessary cleanup or logout actions here
    
    // Clear the session data
    session_unset();
    session_destroy();
    
    // Redirect to the login page or any other desired page
    header("Location: Login.php");
    exit();
}     
    ?>
    <div class="Dach">
        <div class="sidebar">
            <h3>Admin</h3>
            <div class="nav-links">
            <a href="./Dashboard.php">
                <img src="./images/icons8-home-48(1).png" alt="">
                    <span>Home</span>
            </a>
            <a href="./doctor.php">
                <img src="./images/icons8-doctor-48.png" alt="" srcset="">
                    <span>Doctors</span>
            </a>
            <a href="./patients.php">
            <img src="images/icons8-patients-48.png" alt="" srcset="">
                    <span>patients</span>
            </a>
            <a href="#">
                <img src="images/icons8-search-48.png" alt="">
                    <span>Research</span>
            </a>
            
            <form action="" method="POST">
                <a href="#" id="logout">
                <img src="./images/icons8-logout-48.png" alt="">
            <button id="logoutt" name="logout">Logout</button>
                </a>
            </form>
            
        </div>
        </div>


        <div class="content">
            <!--  Start Head  -->
            <div class="head">
                <div class="box" style="padding-right: 19px;">
                    <div class="box-1">
                    <h4><span>Hey</span>, <?php echo $admin->Full_name;?></h4>
                        <h5>Admin</h5>
                </div>
                <div>
                    
                </div>
                <img src="./images/profil.png" alt="" class="bx bx-menu" id="menu-icon">
                    <ul class="sub_navbar">
                        <li><a href="#Profil">Profil</a></li>
                        <li><a href="./Edit Profile.php">Eidite Profil</a></li>
                    </ul>
                    </div>
                
            </div>
            <!-- end Head -->
            <h1 class="p-relative">Dashboard</h1>



            <!-- SCRIPT PHP -->
<?php
    $admin->ID_admin;
    include('connection.php');
    $error = '';
    if (isset($_POST['add'])) {
        $NOM = $_POST['full_name'];
        $SPECIALTY = $_POST['specialty'];
        $EMAIL = $_POST['email'];
        $CIN = $_POST['cin'];
        $PHONE = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
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
            $checkEmail = $database->prepare("SELECT * FROM doctor WHERE Email = :Email");
            $checkEmail->bindParam(":Email", $EMAIL);
            $checkEmail->execute();

            if ($checkEmail->rowCount() > 0) {
                $error = "Email already exists.";
            } else {
                $checkCIN = $database->prepare("SELECT * FROM doctor WHERE CIN = :CIN");
                $checkCIN->bindParam(":CIN", $CIN);
                $checkCIN->execute();

                if ($checkCIN->rowCount() > 0) {
                    $error = "CIN already exists.";
                } else {
                    $adminID = $_SESSION['admin']->ID_admin;
                    $addData = $database->prepare("INSERT INTO doctor (Full_name, Specialty, Email, CIN, Phone, Password, Dt_create_account, ID_admin) 
                    VALUES (:Full_name, :Specialty, :Email, :CIN, :Phone, :Password, NOW(), :ID_admin)");
                    $addData->bindParam(":Full_name", $NOM);
                    $addData->bindParam(":Specialty", $SPECIALTY);
                    $addData->bindParam(":Email", $EMAIL);
                    $addData->bindParam(":CIN", $CIN);
                    $addData->bindParam(":Phone", $PHONE);
                    $addData->bindParam(":Password", $password);
                    $addData->bindParam(":ID_admin", $adminID);
                    $addData->execute();
                    // header("Location: Add doctor.php");

                    // Retrieve the doctor ID from the last inserted row in the `doctor` table
                    $doctorID = $database->lastInsertId();

                    // Prepare and execute the SQL statement to insert into the `AdminDoctor` table
                    $addAdminDoctorData = $database->prepare("INSERT INTO admindoctor (ID_admin, ID_Doctor) VALUES (:ID_admin, :ID_Doctor)");
                    $addAdminDoctorData->bindParam(":ID_admin", $adminID);
                    $addAdminDoctorData->bindParam(":ID_Doctor", $doctorID);
                    $addAdminDoctorData->execute();
                    exit();
                }
            }
        }
    }
?>


            <div id="Doctor">
                <div>
                <form method="POST" action="">
                    <h2>Add a new Doctor</h2>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label for="Enter your full name">Enter your full name</label>
                                    <input type="text" placeholder="Enter your full name" id="Enter your full name" name="full_name">
                                </div>
                            </div>

                                <div class="col">
                                    <div>
                                        <label for="Enter your specialty">Enter your specialty</label>
                                        <input type="text" placeholder="Enter your specialty" id="Enter your specialty" name="specialty">
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label for="Enter your Cin">Enter your Cin</label>
                                    <input type="text" placeholder="Enter your Cin" id="Enter your Cin" name="cin">
                                </div>
                            </div>

                                <div class="col">
                                    <div>
                                        <label for="Enter your Phone">Enter your Phone</label>
                                        <input type="text" placeholder="Enter your Phone" id="Enter your Phone" name="phone">
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label for="Enter your Email">Enter your Email</label>
                                    <input type="text" placeholder="Enter your Email" id="Enter your Email" name="email">
                                </div>
                            </div>

                                <div class="col">
                                    <div>
                                        <label for="Enter your password">Enter your password</label>
                                        <input type="password" placeholder="Enter your password" id="Enter your password" name="password">
                                        </div>
                                </div>
                        </div>
                        <?php echo '<p id="error" style="color: red; padding-left: 20px;">' . $error . '</p>'; ?> 
                        <div class="text-right">
                            <a  href="./doctor.php" id="add">Cancel</a>
                            <button id="add" name="add">Add</button>
                        </div>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Link JS -->
    <script src="./main.js"></script>
</body>
</html>




