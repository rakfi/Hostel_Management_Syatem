<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Code for update email id
if($_POST['update']) {
    $email = $_POST['emailid'];
    $aid = $_SESSION['id'];
    $udate = date('Y-m-d');
    $query = "UPDATE admin SET email=?, updation_date=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssi', $email, $udate, $aid);
    $stmt->execute();
    echo "<script>alert('Email id has been successfully updated');</script>";
}

// Code for change password
if(isset($_POST['changepwd'])) {
    $op = $_POST['oldpassword'];
    $np = $_POST['newpassword'];
    $ai = $_SESSION['id'];
    $udate = date('Y-m-d');
    $sql = "SELECT password FROM admin WHERE password=?";
    $chngpwd = $mysqli->prepare($sql);
    $chngpwd->bind_param('s', $op);
    $chngpwd->execute();
    $chngpwd->store_result();
    $row_cnt = $chngpwd->num_rows;
    if($row_cnt > 0) {
        $con = "UPDATE admin SET password=?, updation_date=? WHERE id=?";
        $chngpwd1 = $mysqli->prepare($con);
        $chngpwd1->bind_param('ssi', $np, $udate, $ai);
        $chngpwd1->execute();
        $_SESSION['msg'] = "Password Changed Successfully !!";
    } else {
        $_SESSION['msg'] = "Old Password does not match !!";
    }
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
    <title>Admin Profile</title>
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
            background-color: #f4f7fc;
            color: #333;
            line-height: 1.6;
        }

        .panel {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }

        .panel-body {
            background-color: #fff;
            border-radius: 0 0 8px 8px;
            padding: 30px;
        }

        .page-title {
            font-size: 30px;
            font-weight: bold;
            color: #4caf50;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 15px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        }

        .form-group label {
            font-weight: bold;
            color: #444;
        }

        /* Button Styles */
        .btn-custom {
            background-color: #4caf50;
            color: #fff;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .btn-cancel {
            background-color: #f44336;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }

        .btn-cancel:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }

        /* Form Alignment */
        .panel-body .form-horizontal .form-group {
            margin-bottom: 20px;
        }

        .col-sm-10, .col-sm-8 {
            display: flex;
            justify-content: space-between;
        }

        .col-sm-6 {
            display: flex;
            justify-content: flex-start;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .form-control {
                font-size: 14px;
                padding: 12px;
            }

            .btn-custom, .btn-cancel {
                font-size: 14px;
                padding: 10px 18px;
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
                        <h2 class="page-title">Admin Profile</h2>
                        <?php
                        $aid = $_SESSION['id'];
                        $ret = "SELECT * FROM admin WHERE id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $aid);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        while ($row = $res->fetch_object()) {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Admin Profile Details</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="<?php echo $row->username; ?>" disabled class="form-control">
                                                    <span class="help-block m-b-none">Username can't be changed.</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $row->email; ?>" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Reg Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" value="<?php echo $row->reg_date; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button type="button" class="btn btn-cancel">Cancel</button>
                                                    <input type="submit" name="update" class="btn btn-custom" value="Update Profile">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Change Password -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Change Password</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal" name="changepwd" id="change-pwd" onSubmit="return valid();">
                                            <?php if (isset($_POST['changepwd'])) { ?>
                                                <p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Old Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="oldpassword" id="oldpassword" class="form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">New Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="newpassword" id="newpassword" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="cpassword" id="cpassword" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button type="button" class="btn btn-cancel">Cancel</button>
                                                    <input type="submit" name="changepwd" class="btn btn-custom" value="Change Password">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
    <script>
    function valid() {
        if(document.changepwd.newpassword.value != document.changepwd.cpassword.value) {
            alert("Password and Re-Type Password Field do not match!!");
            document.changepwd.cpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</body>
</html>
