<?php 
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Code for add courses
if(isset($_POST['submit'])) {
    $coursecode = $_POST['cc'];
    $coursesn = $_POST['cns'];
    $coursefn = $_POST['cnf'];

    $query = "INSERT INTO courses (course_code, course_sn, course_fn) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sss', $coursecode, $coursesn, $coursefn);
    $stmt->execute();
    echo "<script>alert('Course has been added successfully');</script>";
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Add Courses</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom Styles -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .panel {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }

        .panel-body {
            padding: 30px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #444;
        }

        /* Input and Textarea styling */
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-group input[type="text"] {
            margin-bottom: 20px;
        }

        /* Button Styling */
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Responsive design */
        @media (max-width: 767px) {
            .form-control {
                font-size: 14px;
            }
            .page-title {
                font-size: 22px;
            }
        }
    </style>

</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Add Courses</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">Add Course Information</div>
                            <div class="panel-body">
                                <form method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Course Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cc" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Course Name (Short)</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cns" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Course Name (Full)</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cnf" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button class="btn btn-custom" type="submit" name="submit">Add Course</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
