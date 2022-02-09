<?php
include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_POST["submitform"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username == null || $password == null) {
            echo "<script type='text/javascript'>alert(\"PLEASE ENTER TEXT!\");window.location='signin.php';</script>";
        } else {
            $sql_check = "SELECT * FROM login_details WHERE username='$username'";
            $result = mysqli_query($connect, $sql_check);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $db_info = mysqli_fetch_assoc($result);
                $db_pass = $db_info['password'];
                $_SESSION['username'] = $db_info['username'];
                if ($password == $db_pass) {

                    $username2 = $db_info['username'];

                    header("location:index.php?username=$username2");
                } else {?>
                <script>
                    alert("incorrect password");
                </script>
                    <!-- echo "<script type='text/javascript'>alert(\"INCORRECT PASSWORD!\");window.location='signin.php';</script>"; -->
                    <?php
                }
            } else {
                echo "<script type='text/javascript'>alert(\"INCORRECT USERID!\");window.location='signin.php';</script>";
            }
        }
    }

    ?>
    <div class="container signcont">
        <div class="heading">
            <h3>Sign In</h3>
        </div>
        <div class="login-details">
            <form action="signin.php" method="post" class="">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success btn-block" name="submitform">LOGIN</button>
            </form>
        </div>
    </div>
</body>

</html>