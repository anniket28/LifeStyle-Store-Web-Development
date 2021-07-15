<?php
// This page updates the user password
require("includes/common.php");

// if (!isset($_SESSION['email'])) {
//     header('location: index.php');
// } else {
    // get user details
    // $user_id = $_SESSION["id"];
    // $email = $_SESSION["email"];

    $old_pass = $_POST['old_pass'];
    $old_pass = mysqli_real_escape_string($conn, $old_pass);
    $old_pass=md5($old_pass);

    $new_pass = $_POST['new_pass'];
    $new_pass = mysqli_real_escape_string($conn, $new_pass);
    $new_pass=md5($new_pass);

    $rep_pass = $_POST['retype_new_pass'];
    $rep_pass = mysqli_real_escape_string($conn, $rep_pass);
    $rep_pass=md5($rep_pass);
    $email=$_SESSION['email'];

    $query = "SELECT email, password FROM users WHERE email ='$email' AND password='$old_pass'";
    $result = mysqli_query($conn, $query) or die($mysqli_error($conn));
    $row = mysqli_num_rows($result);
    if ($row > 0 && $new_pass==$rep_pass){
        // $success = "<span class='green'>Password Changed</span>";
        $update_query = "UPDATE users SET password = '$new_pass' WHERE email = '$email'";
        $update_query_result = mysqli_query($conn , $update_query) or die(mysqli_error($conn));
        header("location:settings.php");
    }else{
        // $error = "<span class='red'>Invalid Credentials</span>";
        header("location:settings.php");
    }

    // //check old password and password taken from db
    // if ($new_pass != $rep_pass) {
    //     // echo "Passwords do not match.";
    //     header('location: settings.php?error=The two passwords don\'t match.');
    // } else {
    //     if ($old_pass == $orig_pass) {
    //         $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
    //         mysqli_query($conn, $query) or die($mysqli_error($conn));
    //         // echo "Password Updated Successfully";
    //         header('location: settings.php?error=Password Updated Successfully');
    //     } else
    //         // echo "Wrong Old Password.";
    //     header('location: settings.php?error=Wrong Old Password.');
    // }
// }
?>
