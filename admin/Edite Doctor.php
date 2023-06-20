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
        




            <div id="Doctor">
                <div>
                
                <?php
                include('connection.php');
                echo $_GET['edit'];


            if (isset($_GET['edit'])) {

                $doctorId = $_GET['edit'];
                $getDoctor = $database->prepare("SELECT * FROM doctor WHERE ID_Doctor = :id");
                $getDoctor->bindParam(":id", $_GET['edit']);
                $getDoctor->execute();

                foreach ($getDoctor as $data){
                    echo '<form method="POST" action="">';
                    echo '<h2>Edit Doctor</h2>';
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<div>';
                    echo '<label for="Enter your full name">Enter your full name</label>';
                    echo '<input type="text" placeholder="Enter your full name" id="Enter your full name" name="full_name" value="' . $data['Full_name'] . '">';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="col">';
                    echo '<div>';
                    echo '<label for="Enter your specialty">Enter your specialty</label>';
                    echo '<input type="text" placeholder="Enter your specialty" id="Enter your specialty" name="specialty" value="' . $data['Specialty'] . '">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<div>';
                    echo '<label for="Enter your Cin">Enter your Cin</label>';
                    echo '<input type="text" placeholder="Enter your Cin" id="Enter your Cin" name="cin" value="' . $data['CIN'] . '">';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="col">';
                    echo '<div>';
                    echo '<label for="Enter your Phone">Enter your Phone</label>';
                    echo '<input type="text" placeholder="Enter your Phone" id="Enter your Phone" name="phone" value="' . $data['Phone'] . '">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<div>';
                    echo '<label for="Enter your Email">Enter your Email</label>';
                    echo '<input type="text" placeholder="Enter your Email" id="Enter your Email" name="email" value="' . $data['Email'] . '">';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="col">';
                    echo '<div>';
                    echo '<label for="Enter your password">Enter your password</label>';
                    echo '<input type="password" placeholder="Enter your password" id="Enter your password" name="password" value="' . $data['Password'] . '">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    // echo '<p id="error" style="color: red; padding-left: 20px;">' . $error . '</p>';

                    echo '<div class="text-right">';
                    echo '<a href="./doctor.php" id="cancel">Cancel</a>';
                    echo '<button type="submit" name="update" value="' . $data['ID_Doctor'] . '">Update</button>';
                    echo '</div>';

                    echo '</form>';

                    if (isset($_POST['update'])) {
                        $update = $database->prepare("UPDATE doctor SET Full_name = :Full_name, Specialty = :Specialty, Email = :Email, CIN = :CIN, Phone = :Phone, Password = :Password WHERE ID_Doctor = :Id");
                        $update->bindParam(":Full_name", $_POST['full_name']);
                        $update->bindParam(":Specialty", $_POST['specialty']);
                        $update->bindParam(":Email", $_POST['email']);
                        $update->bindParam(":CIN", $_POST['cin']);
                        $update->bindParam(":Phone", $_POST['phone']);
                        $update->bindParam(":Password", $_POST['password']);
                        $update->bindParam(":Id", $_POST['update']); // Changed from $_POST['id'] to $_POST['update']
                        $update->execute();
                    
                        // Redirect or display a success message here
                    }
                }
            }
            ?>
            

                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT EDITE DATA DOCTOR -->

  
    <!-- Link JS -->
    <script src="./main.js"></script>

</body>
</html>




