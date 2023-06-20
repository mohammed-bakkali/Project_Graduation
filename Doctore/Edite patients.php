<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Css -->
    <link rel="stylesheet" href="../admin/css/Dashbord.css">
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
            top: -5px;
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
        form .row .col input,textarea{
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
            margin-left: 7px;
}
    </style>
    

    <!-- SCRIPT PHP -->
    <?php
    session_start();
    if (isset($_SESSION['doctor'])) {
        $doctor = $_SESSION['doctor'];
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
            <h3>doctor</h3>
            <div class="nav-links">
            <a href="./doctor.php">
                <img src="../admin/images/icons8-home-48(1).png" alt="">
                    <span>Home</span>
            </a>
            <a href="./patients.php">
            <img src="../admin/images/icons8-patients-48.png" alt="" srcset="">
                    <span>patients</span>
            </a>
            <a href="#">
                <img src="../admin/images/icons8-search-48.png" alt="">
                    <span>Research</span>
            </a>
            
            <form action="" method="POST">
                <a href="#" id="logout">
                <img src="../admin/images/icons8-logout-48.png" alt="">
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
                    <h4><span>Hey</span>, <?php echo $doctor->Full_name;?></h4>
                        <h5>Admin</h5>
                </div>
                <div>
                    
                </div>
                <img src="../admin/images/profil.png" alt="" class="bx bx-menu" id="menu-icon">
                    <ul class="sub_navbar">
                        <li><a href="#Profil">Profil</a></li>
                        <li><a href="./Edit Profile.php">Eidite Profil</a></li>
                    </ul>
                    </div>
                
            </div>
            <!-- end Head -->
            <h1 class="p-relative">Dashboard</h1>

            <!-- SCRIPT PHP -->
            <div id="Doctor">
                <div>
                
                <?php
    include('connection.php');
    if (isset($_GET['edit'])) {
        $patientId = $_GET['edit'];
        $getPatient = $database->prepare("SELECT * FROM Patient_details WHERE ID_patient = :id");
        $getPatient->bindParam(":id", $patientId);
        $getPatient->execute();
        foreach ($getPatient as $data) {
            echo '<form method="POST" action="">';
            echo '<h2>Edit Patient</h2>';
            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div>';
            echo '<label for="full_name">Enter your full name</label>';
            echo '<input type="text" placeholder="Enter your full name" id="full_name" name="full_name" value="' . $data['Full_name'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col">';
            echo '<div>';
            echo '<label for="age">Enter your age</label>';
            echo '<input type="text" placeholder="Enter your age" id="age" name="age" value="' . $data['Age'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div>';
            echo '<label for="cin">Enter your Cin</label>';
            echo '<input type="text" placeholder="Enter your Cin" id="cin" name="cin" value="' . $data['CIN'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col">';
            echo '<div>';
            echo '<label for="gender">Enter your gender</label>';
            echo '<input type="text" placeholder="Enter your gender" id="gender" name="gender" value="' . $data['Patient_Gender'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div>';
            echo '<label for="phone">Enter your phone</label>';
            echo '<input type="text" placeholder="Enter your phone" id="phone" name="phone" value="' . $data['Phone'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col">';
            echo '<div>';
            echo '<label for="allergy">Enter allergies</label>';
            echo '<input type="text" placeholder="Enter allergies" id="allergy" name="allergy" value="' . $data['allergy'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div>';
            echo '<label for="surgery">Enter surgery</label>';
            echo '<input type="text" placeholder="Enter surgery" id="surgery" name="surgery" value="' . $data['surgery'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col">';
            echo '<div>';
            echo '<label for="current_medications">Enter current medications</label>';
            echo '<input type="text" placeholder="Enter current medications" id="current_medications" name="current_medications" value="' . $data['CurrMeds'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div>';
            echo '<label for="weight">Enter weight</label>';
            echo '<input type="text" placeholder="Enter weight" id="weight" name="weight">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col">';
            echo '<div>';
            echo '<label for="bloodPressure">Enter blood pressure</label>';
            echo '<input type="text" placeholder="Enter blood pressure" id="bloodPressure" name="bloodPressure">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div>';
            echo '<label for="temperature">Enter temperature</label>';
            echo '<input type="text" placeholder="Enter temperature" id="temperature" name="temperature">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col">';
            echo '<div>';
            echo '<label for="bloodSugar">Enter blood sugar</label>';
            echo '<input type="text" placeholder="Enter blood sugar" id="bloodSugar" name="bloodSugar">';
            echo '</div>';
            echo '</div>';
            echo '</div>';


            echo '<div class="row">';
            echo '<div class="col">';
            echo '<label for="biography">Enter your reports </label>'; 
            echo '<textarea name="reports" id="biography" cols="40" rows="4" placeholder="Enter the patient report"></textarea>';
            echo '</div>';
            echo '</div>';
            

            echo '<div class="text-right">';
            echo '<a href="./doctor.php" id="cancel">Cancel</a>';
            echo '<button type="submit" name="update" value="' . $data['ID_patient'] . '">Update</button>';
            echo '</div>';

            


            echo '</form>';
        }

        if (isset($_POST['update'])) {
            // Update patient details
            $update = $database->prepare("UPDATE Patient_details SET Full_name = :Full_name, Age = :Age, CIN = :CIN, Patient_Gender = :Patient_Gender, Phone = :Phone, allergy = :Allergy, surgery = :Surgery, CurrMeds = :Current_Medications WHERE ID_patient = :Id");
            $update->bindParam(":Full_name", $_POST['full_name']);
            $update->bindParam(":Age", $_POST['age']);
            $update->bindParam(":CIN", $_POST['cin']);
            $update->bindParam(":Patient_Gender", $_POST['gender']);
            $update->bindParam(":Phone", $_POST['phone']);
            $update->bindParam(":Allergy", $_POST['allergy']);
            $update->bindParam(":Surgery", $_POST['surgery']);
            $update->bindParam(":Current_Medications", $_POST['current_medications']);
            // $update->bindParam(":reports", $_POST['reports']);
            $update->bindParam(":Id", $_POST['update']);
            $update->execute();

            // Insert consultation data
            $doctorID = $_SESSION['doctor']->ID_Doctor;
            $patientID = $_POST['update']; // The patient ID from the form

            // Retrieve the necessary information for the consultation
            $weight = $_POST['weight'];
            $bloodPressure = $_POST['bloodPressure'];
            $currentMedications = $_POST['current_medications'];
            $temperature = $_POST['temperature'];
            $bloodSugar = $_POST['bloodSugar'];
            $reports = $_POST['reports'];

            // Prepare and execute the SQL statement to insert into the "Consulter" table
            $addData = $database->prepare("INSERT INTO consulter (ID_Doctor, ID_Patient, Weight, Blood_Pressure, Current_Medications, Temperature, Date_Modified, Blood_Sugar, reports)
                VALUES (:ID_Doctor, :ID_Patient, :Weight, :Blood_Pressure, :Current_Medications, :Temperature, NOW(), :Blood_Sugar, :reports)");
            $addData->bindParam(":ID_Doctor", $doctorID);
            $addData->bindParam(":ID_Patient", $patientID);
            $addData->bindParam(":Weight", $weight);
            $addData->bindParam(":Blood_Pressure", $bloodPressure);
            $addData->bindParam(":Current_Medications", $currentMedications);
            $addData->bindParam(":Temperature", $temperature);
            $addData->bindParam(":Blood_Sugar", $bloodSugar);
            $addData->bindParam(":reports", $reports);
            $update->bindParam(":reports", $_POST['reports']);
            $addData->execute();

            // Redirect or perform any other necessary actions
            // header("Location: consultation.php");
            exit();
        }

        // Redirect or display a success message here
    }
    ?>

            

                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT EDITE DATA DOCTOR -->


    <!-- Link JS -->
<script src="../admin/main.js"></script>

</body>
</html>




