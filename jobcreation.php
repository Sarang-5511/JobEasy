<?php
include("dbconn.php"); 
session_start();
$user3=$_SESSION['user2'];?>
<link rel="stylesheet" href="style2.css">
<?php
if (isset($_POST['admin']) && isset($_POST['jobcategory']) && isset($_POST['title']) && isset($_POST['role']) && isset($_POST['duration'])  && isset($_POST['stipend'])) {
    $admin = $_POST['admin'];

    $jobcategory = $_POST['jobcategory'];
    $title = $_POST['title'];
    $role = $_POST['role'];
    $duration = $_POST['duration'];
    $stipend = $_POST['stipend'];


  
    $sqladd = "INSERT INTO `jobs` (`admin`,`jobcategory`,`title`,`role`,`duration`,`stipend`)
VALUES ('$admin','$jobcategory','$title', '$role','$duration','$stipend')";

    $result = mysqli_query($connect, $sqladd);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}

//fetch

if (isset($_POST['category'])) {
    $categorydisplay = $_POST['category'];
    if ($categorydisplay == "viewall") {

        $sql = "SELECT * FROM jobs WHERE admin='$user3';";
        $result2 = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result2);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {

?>
                <div class="card mx-2 my-3" style="width:20em;padding:10px;border:none;box-shadow: rgba(41, 39, 39, 0.35) 0px 5px 15px; margin:auto; display:inline-block;">
                    <div class="card-body" style="padding: 10px; text-align:left;">
                        <span style="font-size: 1.15em; font-weight:bold ;padding-bottom:15px;">Job Category</span>
                        <h5 class="card-title"><?php echo $row['jobcategory']; ?></h5>
                        <span style="font-size: 1.15em; font-weight:bold ;padding-bottom:15px;">Title</span>
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>

                        <a href="jobdetails.php?sno=<?php echo $row['sno'] ?>" class="btnviewmore">view details</a><br>
                        <div class="edit-buttons">
                            <button class="btnupdate" onclick="">UPDATE</button>
                            <button class="btndelete" onclick="Delete(<?php echo $row['sno'] ?>)">DELETE</button>
                        </div>

                    </div>
                </div>
            <?php
            }
        } else {
            echo "No jobs found in this domain";
        }
    } else {


        $sql = "SELECT * FROM jobs WHERE jobcategory='{$categorydisplay}' AND admin='$user3';";
        $result2 = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result2);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {

            ?>
                <div class="card mx-2 my-3" style="width:20em;padding:10px;border:none;box-shadow: rgba(41, 39, 39, 0.35) 0px 5px 15px; margin:auto; display:inline-block;">
                    <div class="card-body" style="padding: 10px; text-align:left;">
                        <span style="font-size: 1.15em; font-weight:bold ;padding-bottom:15px;">Job Category</span>
                        <h5 class="card-title"><?php echo $row['jobcategory']; ?></h5>
                        <span style="font-size: 1.15em; font-weight:bold ;padding-bottom:15px;">Title</span>
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>

                        <a href="jobdetails.php?sno=<?php echo $row['sno'] ?>" class="btnviewmore">view details</a><br>
                        <div class="edit-buttons">
                            <button class="btnupdate" onclick="Update(<?php echo $row['sno'] ?>)">UPDATE</button>
                            <button class="btndelete" onclick="Delete(<?php echo $row['sno'] ?>)">DELETE</button>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo "No jobs found in this domain";
        }
    }
}

//fetch body

if (isset($_POST['operation'])) {


    $sql = "SELECT * FROM jobs WHERE admin='$user3';";
    $result2 = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result2);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {

            ?>
            <div class="card mx-2 my-3" style="width:20em;padding:10px;border:none;box-shadow: rgba(41, 39, 39, 0.35) 0px 5px 15px; margin:auto; display:inline-block;">
                <div class="card-body" style="padding: 10px; text-align:left;">
                    <span style="font-size: 1.15em; font-weight:bold ;padding-bottom:15px;">Job Category</span>
                    <h5 class="card-title"><?php echo $row['jobcategory']; ?></h5>
                    <span style="font-size: 1.15em; font-weight:bold ;padding-bottom:15px;">Title</span>
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>

                    <a href="jobdetails.php?sno=<?php echo $row['sno'] ?>" class="btnviewmore">view details</a>
                    <div class="edit-buttons">
                        <button class="btnupdate" onclick="">UPDATE</button>
                        <button class="btndelete" onclick="Delete(<?php echo $row['sno'] ?>)">DELETE</button>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "No jobs found in this domain";
    }
}
?>




<script>
    function Delete(deleteid) {


        var conf = confirm("Are you sure ?");
        if (conf == true) {
            $.ajax({
                type: 'post',
                url: 'jobdetails.php',
                data: {
                    deleteid: deleteid
                },
                success: function(s) {
                    alert("deleted sucessfully");
                    fetchdata2();
                },
                Error: function(s) {
                    alert("error");
                }
            });
        }


    }

</script>