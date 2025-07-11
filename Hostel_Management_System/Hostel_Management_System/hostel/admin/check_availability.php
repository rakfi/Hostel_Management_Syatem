<?php 
session_start();
$aid = $_SESSION['id'];
require_once("includes/config.php");

// Check if room number is provided
if(!empty($_POST["roomno"])) {
    $roomno = $_POST["roomno"];
    $result = "SELECT count(*) FROM registration WHERE roomno=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('i', $roomno);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if($count > 0) {
        echo "<span class='error-message'><i class='fa fa-times-circle'></i> $count. Seats already full.</span>";
    } else {
        echo "<span class='success-message'><i class='fa fa-check-circle'></i> All Seats are Available</span>";
    }
}

// Check if old password is provided
if(!empty($_POST["oldpassword"])) {
    $pass = $_POST["oldpassword"];
    $result = "SELECT password FROM userregistration WHERE password=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $pass);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $opass = $result;
    if($opass == $pass) {
        echo "<span class='success-message'><i class='fa fa-check-circle'></i> Password matched.</span>";
    } else {
        echo "<span class='error-message'><i class='fa fa-times-circle'></i> Password Not matched</span>";
    }
}

// Check if email is provided
if(!empty($_POST["emailid"])) {
    $email = $_POST["emailid"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "<span class='error-message'><i class='fa fa-times-circle'></i> Error: You did not enter a valid email.</span>";
    } else {
        $result = "SELECT count(*) FROM userRegistration WHERE email=?";
        $stmt = $mysqli->prepare($result);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        if($count > 0) {
            echo "<span class='error-message'><i class='fa fa-times-circle'></i> Email already exists. Please try again.</span>";
        }
    }
}

// Check if registration number is provided
if(!empty($_POST["regno"])) {
    $regno = $_POST["regno"];
    $result = "SELECT count(*) FROM userRegistration WHERE regNo=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $regno);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if($count > 0) {
        echo "<span class='error-message'><i class='fa fa-times-circle'></i> Registration number already exists. Please try again.</span>";
    }
}
?>

<!-- Enhanced CSS for Feedback Styling -->
<style>
    .error-message {
        color: #D32F2F; /* Red for errors */
        font-size: 16px;
        font-weight: bold;
        background-color: #F8D7DA;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
        display: inline-block;
        width: 100%;
        border: 1px solid #D32F2F;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .success-message {
        color: #388E3C; /* Green for success */
        font-size: 16px;
        font-weight: bold;
        background-color: #C8E6C9;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
        display: inline-block;
        width: 100%;
        border: 1px solid #388E3C;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .fa {
        margin-right: 8px;
    }
</style>

<!-- Optional: You can include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
