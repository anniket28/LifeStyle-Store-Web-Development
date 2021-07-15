<?php
    require "./includes/common.php";
    // get details
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    // hash password
    $email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $contact_regex = "/^[789][0-9]{9}$/";
    $select_query = "SELECT * from users WHERE email = '$email'";
    $select_query_result = mysqli_query($conn , $select_query) or die(mysqli_error($conn));
    $select_rows = mysqli_num_rows($select_query_result);
    if($select_rows!=0){
        $error = "<span>Email Already Exists</span>";
        header('location:signup.php?m1='.$error);
    }else if(!preg_match($email_regex , $email)){
        $error = "<span>Incorrect Email Id</span>";
        header('location:signup.php?m1='.$error);
    }else if(!preg_match($contact_regex , $contact )){
        $error = "<span>Incorrect Contact Number</span>";
        header('location:signup.php?m2='.$error);
    }
    //if not then add to DB
    else{
        $insert_query = "INSERT INTO users (name,email,password,contact,city,address) VALUES ('$name','$email','$password','$contact','$city','$address')";
        $inser_query_result = mysqli_query($conn , $insert_query) or die(mysqli_error($conn));
        $user_id = mysqli_insert_id($conn);
        $_SESSION['id'] = $user_id;
        $_SESSION['email'] = $email;
        header('location:products.php');
    }

    
    // $query1 = "SELECT id FROM users WHERE email = '$email'";
    // $query2 = "INSERT INTO users (name, email, password, contact, city, address) VALUES ('$name', '$email', '$hashed_password', '$contact', '$city', '$address')";

    // // check if already registered user
    // $result = mysqli_query($conn, $query1);
    // if(mysqli_num_rows($result) > 0){
    //     // email already exists
    //     echo "Email id already exists";
    // }else{
    //     // perform query operation
    //     $result = mysqli_query($conn, $query2);
    //     $_SESSION["email"] = $email;
    //     $_SESSION["id"] = mysqli_insert_id($conn);

    //     // redirect to products page
    //     header("location: products.php");
    // }
    
?>
