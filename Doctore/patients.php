<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../admin/css/Dashbord.css">
    <!-- Link font awsome -->
    <link rel="stylesheet" href="../admin/css/all.css">
    <!-- Link icon siteweb -->
    <link rel="icon" href="../admin/images/icons8-medical-50.png">
    <!-- Link google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700;800;900&family=Public+Sans:wght@400;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <style>
        .table_Doctor{
            margin-left: 15px;
            margin-right: 15px;
        }
        .table_Doctor .box form{
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        @media (max-width: 420px){
            .table_Doctor .box{
                flex-direction: column;
            }
        }
        table{
            width: 100%;
        }
        .table_header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgb(240, 240, 240);
        }
        .table_header p{
            color: #000000;
        }
        button{
            outline: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            padding: 10px;
            color: #ffffff;
        }
        td button:nth-child(1){
            background-color: #0298cf;
            display: none;
        }
        /* td button:nth-child(2){
            
        } */

        #add_new{
            padding: 10px 20px;
            color: #fff;
            background-color: #0298cf;
            cursor: pointer;
            border-radius: 6px;
            display: none;
        }
        input{
            padding: 10px 20px;
            outline: none;
            border: 1px solid #0298cf;
            border-radius: 6px;
            color: #0298cf;
        }
        @media (max-width: 420px){
            input{
                margin-bottom: 5px;
            }
        }

        
        .table_section{
            background: white;
            box-shadow: 0 0 10px #ddd;
            overflow: auto;
        }

        table{
            width: 100%;
            
            min-width: 1000px;
            border-collapse: collapse;
        }
        thead th{
            position: sticky;
            top: 0;
            background-color: 1px #f6f9fc;
            color: #8493a5;
            font-size: 15px;
        }
        th,td{
            border-bottom: 1px solid #dddddd;
            padding: 10px 20px;
            word-break: break-all;
            text-align: center;
        }
        tr:hover td{
            color: #0298cf;
            cursor: pointer;
            background-color: #f6f9fc;
        }
        ::placeholder{
            color: #0298cf;
        }
        ::-webkit-scrollbar{
            height: 5px;
            width: 5px;
        }
        ::-webkit-scrollbar-track{
            box-shadow: inset 0 0 6px rgb(0, 0, 0,3);
        }
        ::-webkit-scrollbar-thumb{
            box-shadow: inset 0 0 6px rgb(0, 0, 0,3);
        }



    </style>
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
            <!-- SCRIPT PHP -->
            <form action="" method="POST">
                <a href="#" id="logout">
                <img src="../admin/images/icons8-logout-48.png" alt="">
            <button id="logoutt" name="logout">Logout</button>
                </a>
            </form>
            <!-- <button name="logout"><span>Logout</span></button> -->
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




<div class="table_Doctor">
    <div class="table">
        <div class="box">
            <form method="POST" action="">
                
                <!-- <button type="submit" name="search">Search</button> -->

                <input type="text" name="search" id="" placeholder="Search ...">
                <a id="add_new" href="./Add patients.php">+Add New</a>
            </form>
</div>
</div>
<div class="table_section">
    <table>
        <thead>
            <tr>
                <!-- <th>S. NO</th> -->
                <th>Nom</th>
                <th>Age</th>
                <th>CIN</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>allergy</th>
                <th>surgery</th>
                <th>Current <br> medications</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connection.php');
            if (isset($_POST['search'])) {
                $search = $database->prepare('SELECT * FROM patient_details WHERE CIN LIKE :value');
                $search_value = "%" . $_POST['search'] . "%";
                $search->bindParam(":value", $search_value);
                $search->execute();

                foreach ($search as $data) {
                    echo "<tr>";
                    // echo "<td>1</td>";
                    echo "<td>" . $data['Full_name'] . "</td>";
                    echo "<td>" . $data['Age'] . "</td>";
                    echo "<td>" . $data['CIN'] . "</td>";
                    echo "<td>" . $data['Patient_Gender'] . "</td>";
                    echo "<td>" . $data['Phone'] . "</td>";
                    echo "<td>" . $data['allergy'] . "</td>";
                    echo "<td>" . $data['surgery'] . "</td>";
                    echo "<td>" . $data['CurrMeds'] . "</td>";
                    

                    echo "<td>";
                    echo "<form action=''>"; 
                    echo "<button><i class='fa-solid fa-pen-to-square'></i></button>";
                    echo "<button><i class='fa-solid fa-trash'></i></button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                include('connection.php');
                $SELECT_DATA = $database->prepare("SELECT * FROM patient_details");
                $SELECT_DATA->execute();
                // $results = $SELECT_DATA->fetchAll();
                foreach ($SELECT_DATA as $result) {
                    echo "<tr>";
                    // echo "<td>1</td>";
                    echo "<td>" . $result['Full_name'] . "</td>";
                    echo "<td>" . $result['Age'] . "</td>";
                    echo "<td>" . $result['CIN'] . "</td>";
                    echo "<td>" . $result['Patient_Gender'] . "</td>";
                    echo "<td>" . $result['Phone'] . "</td>";
                    echo "<td>" . $result['allergy'] . "</td>";
                    echo "<td>" . $result['surgery'] . "</td>";
                    echo "<td>" . $result['CurrMeds'] . "</td>";
                    
                    echo "<td>";
                    echo "<form method='POST' action=''>"; 
                    echo '<a href="Edite patients.php?edit=' . $result['ID_patient'] . '"><i class="fa-solid fa-pen-to-square"></i></a>';
                    // echo "<button type='submit' name='remove' value='" . $result['ID_patient'] . "'><i class='fa-solid fa-trash'></i></button>";
                    echo "<button type='submit' name='result' value='" . $result['ID_patient'] . "'><i class='fa-solid fa-eye'></i></button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<!-- SCRIPT REMOVE DATA -->
<?php
if (isset($_POST['remove'])) {
    include('connection.php');
    
    $removePatient = $database->prepare("DELETE FROM patient_details WHERE ID_patient = :id");
    $getID = $_POST['remove'];
    $removePatient->bindParam(":id", $getID);

    if ($removePatient->execute()) {
        echo 'Patient removed successfully.';
    } else {
        echo 'Failed to remove the patient.';
    }
}
?>


<?php
if (isset($_POST['result'])) {
    $getID = $_POST['result'];

    $fetch = $database->prepare("SELECT consulter.*, doctor.Full_name AS doctor_name, patient_details.Full_name AS patient_name
                                FROM consulter
                                LEFT JOIN doctor ON consulter.ID_Doctor = doctor.ID_Doctor
                                LEFT JOIN patient_details ON consulter.ID_Patient = patient_details.ID_Patient  WHERE patient_details.ID_patient = :id");
    $fetch->bindParam(':id', $getID);
    $fetch->execute();
    $results = $fetch->fetchAll(PDO::FETCH_ASSOC);

    // Access the shared and unshared columns
    foreach ($results as $row) {
        // $idConsultation = $row['ID_Consultation'];
        $idDoctor = $row['doctor_name'];
        $idPatient = $row['patient_name'];

        $weight = $row['Weight'];
        $bloodPressure = $row['Blood_Pressure'];
        $currentMedications = $row['Current_Medications'];
        $temperature = $row['Temperature'];
        $dateModified = $row['Date_Modified'];
        $bloodSugar = $row['Blood_Sugar'];
        $modifierDate = $row['Modifier_Date'];
        $doctorName = $row['doctor_name']; // Shared column from the doctor table
        $patientName = $row['patient_name']; // Shared column from the patient_details table
        $reports = $row['reports'];

        ?>

        <div class="card" style="width: 18rem;     width: 18rem;
    margin-left: auto;
    margin-right: auto;
    margin-top: 62px;" >
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <!-- <h5 class="list-group-item"><?php echo $idConsultation; ?></h5> -->
                <li class="list-group-item">Doctor: <?php echo $doctorName; ?></li>
                <li class="list-group-item">Patient: <?php echo $patientName; ?></li>
                <li class="list-group-item">Weight: <?php echo $weight; ?></li>
                <li class="list-group-item">Blood Pressure: <?php echo $bloodPressure; ?></li>
                <li class="list-group-item">Current Medications: <?php echo $currentMedications; ?></li>
                <li class="list-group-item">Temperature: <?php echo $temperature; ?></li>
                <li class="list-group-item">Date Modified: <?php echo $dateModified; ?></li>
                <li class="list-group-item">Blood Sugar: <?php echo $bloodSugar; ?></li>
                <li class="list-group-item">Modifier Date: <?php echo $modifierDate; ?></li>
                <li class="list-group-item">reports: <?php echo $reports; ?></li>
                </ul>
            </div>
        </div>
        <br>

    <?php
    }
}
?>

<!-- Link JS -->
<script src="../admin/main.js"></script>
</body>
</html> 