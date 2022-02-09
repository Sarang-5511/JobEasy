<?php
include("dbconn.php");
session_start();


if (isset($_GET['sno'])) {
    $_SESSION['sno'] = $_GET['sno'];
}
// echo $_SESSION['sno'];
?>


<?php

if (isset($_POST['deleteid'])) {
    $titledelete = $_POST['deleteid'];
    $deletequery = "DELETE FROM jobs  where sno='$titledelete'";
    $deletequery_result = mysqli_query($connect, $deletequery);
    if ($deletequery_result) {
        echo "success";
    } else {
        echo "error";
    }
}
$admin = $_SESSION['username'];
$sqlext = "SELECT * FROM login_details WHERE username='$admin'";
$result4 = mysqli_query($connect, $sqlext);
$num2 = mysqli_num_rows($result4);
if ($num2 > 0) {
    while ($rowadmin = mysqli_fetch_assoc($result4)) {
        $adminemail = $rowadmin['email'];
        $_SESSION['adminemail'] = $adminemail;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB DETAILS</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,500;1,300&family=Open+Sans+Condensed:wght@300&family=Permanent+Marker&family=Roboto&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>
    <div class="container-fluid" style="background-color: black; color:wheat">
        <nav class="navbar navbar-expand-lg " style="width: 70%; color:white">
            <h2 class="navbar-brand">JobEasy</h2>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <p class="nav-link"><i class="fa fa-user-circle px-2"></i><span><?php echo  $_SESSION['username'] ?></span></p>
                        <!-- <a class="nav-link logouser" href="#"><i class="fa fa-user-circle px-2"></i><span><?php echo  $_SESSION['username'] ?></span></a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logouser" href="logout.php"><i class="fa fa-sign-out  px-2" aria-hidden="true"></i><span>Log Out</span></a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
    <section id="details-section">
        <div class="container">
            <div class="detials-job">

                <?php
                $sqlfetch = "SELECT * FROM jobs WHERE sno='{$_SESSION['sno']}'";
                $result3 = mysqli_query($connect, $sqlfetch);
                $num = mysqli_num_rows($result3);
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result3)) {
                ?>
                        <div class="intial-heading">
                            <h2><?php echo $row['title']; ?></h2>
                            <p>Posted by <?php echo $_SESSION['username'] ?> on <?php echo $row['createtime'] ?> </p>
                        </div>
                        <table style="width:80%;">
                            <tr>
                                <td class="title">Category:</td>
                                <td><?php echo $row['jobcategory']; ?></td>
                            </tr>

                            <tr>
                                <td class="title">Role:</td>
                                <td><?php echo $row['role']; ?></td>
                            </tr>
                            <tr>
                                <td class="title">Duration:</td>
                                <td><?php echo $row['duration']; ?></td>
                            </tr>
                            <tr>
                                <td class="title">Stipend:</td>
                                <td><?php echo $row['stipend']; ?></td>

                            </tr>
                            <tr>
                                <td class="title">Contact email:</td>
                                <td><?php echo $adminemail; ?></td>

                            </tr>
                        </table>
                        <a href="index.php?username=<?php echo  $admin?>" class="backbut">go back</a>
                <?php
                    }
                }
                ?>
            </div>
           
        </div>
    </section>
</body>

</html>