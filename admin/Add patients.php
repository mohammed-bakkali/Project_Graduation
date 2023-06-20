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
    include('connection.php');
    $error = '';

    if (isset($_POST['add'])) {
        $full_name = $_POST['full_name'];
        $age = $_POST['Age'];
        $cin = $_POST['CIN'];
        $patient_gender = $_POST['Patient_Gender'];
        $phone = $_POST['phone'];
        $allergy = $_POST['allergy'];
        $surgery = $_POST['surgery'];
        $current_medications = $_POST['Current_medications'];
        
        // Validate phone number
        if (empty($phone)) {
            $error = "Phone number is required.";
        } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
            $error = "Invalid phone number. Please enter a 10-digit number.";
        }

        // Validate CIN
        if (empty($cin)) {
            $error = "CIN is required.";
        } elseif (!preg_match("/^[0-9]{8}$/", $cin)) {
            $error = "Invalid CIN. Please enter an 8-digit number.";
        }

        // Validate full name
        if (empty($full_name)) {
            $error = "Full name is required.";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
            $error = "Only letters and spaces are allowed in the full name.";
        }

        // Proceed with registration if no errors
        if (empty($error)) {
            $checkCIN = $database->prepare("SELECT * FROM patient_details WHERE CIN = :CIN");
            $checkCIN->bindParam(":CIN", $cin);
            $checkCIN->execute();

            if ($checkCIN->rowCount() > 0) {
                $error = "CIN already exists.";
            } else {
                $adminID = $_SESSION['admin']->ID_admin;
                $addData = $database->prepare("INSERT INTO Patient_details (Full_name, Age, CIN, Patient_Gender, Phone, Date_of_visit, allergy, surgery, CurrMeds, ID_admin) 
                VALUES (:Full_name, :Age, :CIN, :Patient_Gender, :Phone, NOW(), :allergy, :surgery, :current_medications, :ID_admin)");
                $addData->bindParam(":Full_name", $full_name);
                $addData->bindParam(":Age", $age);
                $addData->bindParam(":CIN", $cin);
                $addData->bindParam(":Patient_Gender", $patient_gender);
                $addData->bindParam(":Phone", $phone);
                $addData->bindParam(":allergy", $allergy);
                $addData->bindParam(":surgery", $surgery);
                $addData->bindParam(":current_medications", $current_medications);
                $addData->bindParam(":ID_admin", $adminID);
                $addData->execute();
                // header("Location: patients.php");
                exit();
            }
        }
    }
?>


<div id="Doctor">
    <div>
        <form method="POST" action="">
            <h2>Add a new patient</h2>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="Enter  full name">Enter  full name patient</label>
                        <input type="text" placeholder="Enter  full name" id="Enter  full name" name="full_name">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="Enter  specialty">Enter  Age patient</label>
                        <input type="text" placeholder="Enter  Age" id="Enter  Age" name="Age">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="Enter  Cin">Enter  Cin patient</label>
                        <input type="text" placeholder="Enter  Cin" id="Enter  Cin" name="CIN">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="Enter  Phone">Enter  Gender patient</label>
                        <input type="text" placeholder="Enter  Gender" id="Enter  Gender" name="Patient_Gender">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="Enter  Phone">Enter  Phone patient</label>
                        <input type="text" placeholder="Enter  Phone" id="Enter  Email" name="phone">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="Enter  password">Enter  allergy patient </label>
                        <input type="text" placeholder="Enter  allergy" id="Enter  allergy" name="allergy">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div>
                        <label for="Enter  surgery">Enter  surgery patient </label>
                        <input type="text" placeholder="Enter  surgery" id="Enter  Email" name="surgery">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="Enter  Current medications">Enter  Current medications patient</label>
                        <input type="text" placeholder="Enter  Current medications" id="Enter  Current medications" name="Current_medications">
                    </div>
                </div>
            </div>
            <?php echo '<p id="error" style="color: red; padding-left: 20px;">' . $error . '</p>'; ?> 
            <div class="text-right">
                <a href="./doctor.php" id="add">Cancel</a>
                <button id="add" name="add">Add</button>
            </div>
        </form>
    </div>
</div>
    <!-- Link JS -->
    <script src="./main.js"></script>
</body>
</html>




