<?php
include('dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
    header(("location:signin.php"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,500;1,300&family=Open+Sans+Condensed:wght@300&family=Permanent+Marker&family=Roboto&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body onload="fetchdata2()">
    <?php
    if (isset($_GET['username'])) {
        $_SESSION['username'] = $_GET['username'];
        $user =  $_SESSION['username'];
        $_SESSION['user2'] = $user;
    }
    // echo $_SESSION['username'];
    ?>

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
                    <li class="nav-item">
                        
                    </li>
                </ul>

            </div>
        </nav>
    </div>
    <section id="section1">
        <div class="container-fluid cont">
            <div class="heading">

                <h1><span id="current_date"></span><span id="current_time"></span></h1>
                <!-- <h1><span id="current_date"></span></h1> -->

            </div>

            <div class="content">
                <button type="button" class=" btncreate" data-toggle="modal" data-target="#exampleModal">
                   CREATE JOB
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">CREATE JOB POST</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="jobform">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="admin" name="admin" value="<?php echo $_SESSION['username']; ?>" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jobcategory" class="col-sm-4 col-form-label">Job category</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="jobcategory" id="jobcategory">
                                                <option selected disabled>--Select the type--</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="Android Development">Android Development</option>
                                                <option value="Sales and Marketing">Sales and Marketing</option>
                                                <option value="product design">product design</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-4 col-form-label">Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="title" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-4 col-form-label">Role</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="role" name="role" cols="30" rows="4"></textarea>
                                            <!-- <input type="text" class="form-control" id="role" name="role"> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="duration" class="col-sm-4 col-form-label">Duration</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="duration" id="duration">
                                                <option selected>--Select the type--</option>
                                                <option value="1 month">1 months</option>
                                                <option value="2 month">2 months</option>
                                                <option value="3 month">3 months</option>
                                                <option value="6 month">6 months</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stipend" class="col-sm-4 col-form-label">Stipend (in Rs)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="stipend" name="stipend">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success " style="width: 120px; " name="submitjob" id="submitjob">CREATE</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <form class="form-inline w-50 m-auto">
                    <label for="category" class="col-lg-5 sortjobtitle">FIND JOB</label>
                    <select class="form-control col-lg-7" id="category" onchange='fetchdata()'>
                        <option selected>--Select the type--</option>
                        <option value="viewall">view all</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Android Development">Android Development</option>
                        <option value="Sales and Marketing">Sales and Marketing</option>
                        <option value="product design">product design</option>
                    </select>
                </form>
            </div>
            <div id="content-display" style="text-align:center; margin:20px auto;">
            </div>
        </div>
    </section>
    <script>
        function fetchdata() {
            var selectcategory = $("#category").val();
            $.ajax({
                type: "post",
                url: "jobcreation.php",
                data: {
                    category: selectcategory
                },
                success: function(s) {
                    $("#content-display").html(s);
                },
                Error: function(s) {
                    alert("error");
                }
            });
        }

        function fetchdata2() {
            var operation = "Fetching the data";
            $.ajax({
                type: "post",
                url: "jobcreation.php",
                data: {
                    operation: operation
                },
                success: function(s) {
                    $("#content-display").html(s);
                },
                Error: function(s) {
                    alert("error");
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // e.preventDefault(); 
            $("#submitjob").click(function() {

                var admin = $("#admin").val();
                var jobcategory = $("#jobcategory").val();
                var title = $("#title").val();
                var role = $("#role").val();
                var duration = $("#duration").val();
                var stipend = $("#stipend").val();
                if (admin == null || jobcategory == null || title == null || role == null || duration == null || stipend == null) {
                    alert("please fill in the required field");
                } else {
                    var datastring = "admin=" + admin + "&jobcategory=" + jobcategory + "&title=" + title + "&role=" + role + "&duration=" + duration + "&stipend=" + stipend;
                    $.ajax({
                        type: "post",
                        url: "jobcreation.php",
                        data: datastring,
                        success: function(s) {
                            alert("Job post created successfully");
                            $('#exampleModal').modal('hide');
                            document.getElementById('jobform').reset();
                            fetchdata2();
                        },
                        Error: function(s) {
                            alert("error");
                        }
                    });
                }

            })
            // $("#selectcategory").click(function(){
            //     var selectcategory=$("#category").val();
            //     var datastring2="selectedcategory=" +selectcategory;
            //     alert(datastring2);
            //     $.ajax({
            //         type: "post",
            //         url: "jobcreation.php",
            //         data: datastring2,
            //         success: function(s) {           
            //             fetch_data();
            //         },
            //         Error: function(s) {
            //             alert("error");
            //         }
            //     });
            // })
        });
    </script>


















    <script src="index.js"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>