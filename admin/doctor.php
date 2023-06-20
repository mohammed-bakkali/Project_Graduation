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
        }
        td button:nth-child(2){
            background-color: red;
        }

        #add_new{
            padding: 10px 20px;
            color: #fff;
            background-color: #0298cf;
            cursor: pointer;
            border-radius: 6px;
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
            <!-- SCRIPT PHP -->
        
            <form action="" method="POST">
                <a href="#" id="logout">
                <img src="./images/icons8-logout-48.png" alt="">
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




<div class="table_Doctor">
    <div class="table">
        <div class="box">
            <form method="POST" action="">
                
                <!-- <button type="submit" name="search">Search</button> -->

                
                <input type="text" name="search" id="" placeholder="Search ...">
                <a id="add_new" href="./Add doctor.php">+Add New</a>
            </form>
        </div>
    </div>
    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>S. NO</th>
                    <th>Nom</th>
                    <th>Doctor specialty</th>
                    <th>Email</th>
                    <th>Cin</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connection.php');
                if (isset($_POST['search'])) {
                    $search = $database->prepare('SELECT * FROM doctor WHERE CIN LIKE :value');
                    $search_value = "%" . $_POST['search'] . "%";
                    $search->bindParam(":value", $search_value);
                    $search->execute();

                    foreach ($search as $data) {
                        echo "<tr>";
                        echo "<td>1</td>";
                        echo "<td>" . $data['Full_name'] . "</td>";
                        echo "<td>" . $data['Specialty'] . "</td>";
                        echo "<td>" . $data['Email'] . "</td>";
                        echo "<td>" . $data['CIN'] . "</td>";
                        echo "<td>" . $data['Phone'] . "</td>";
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
                    $SELECT_DATA = $database->prepare("SELECT * FROM doctor");
                    $SELECT_DATA->execute();
                    // $results = $SELECT_DATA->fetchAll();

                    foreach ($SELECT_DATA as $result) {
                        echo "<tr>";
                        echo "<td>1</td>";
                        echo "<td>" . $result['Full_name'] . "</td>";
                        echo "<td>" . $result['Specialty'] . "</td>";
                        echo "<td>" . $result['Email'] . "</td>";
                        echo "<td>" . $result['CIN'] . "</td>";
                        echo "<td>" . $result['Phone'] . "</td>";
                        echo "<td>";
                        echo "<form method='POST' action=''>"; 
                        echo '<a href="Edite Doctor.php?edit=' . $result['ID_Doctor'] . '"><i class="fa-solid fa-pen-to-square"></i></a>';
                        echo "<button type='submit' name='remove' value='" . $result['ID_Doctor'] . "'><i class='fa-solid fa-trash'></i></button>";
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
    
    $removeDoctor = $database->prepare("DELETE FROM doctor WHERE ID_Doctor = :id");
    $getID = $_POST['remove'];
    $removeDoctor->bindParam(":id", $getID);

    if ($removeDoctor->execute()) {
        echo 'Doctor removed successfully.';
    } else {
        echo 'Failed to remove the doctor.';
    }
}
?>


        <!-- Link JS -->
        <script src="./main.js"></script>
</body>
</html> 