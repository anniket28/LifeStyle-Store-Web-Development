<?php
require './includes/common.php';
// check if signed in
if (!isset($_SESSION["email"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Success</title>
    <style>
        .navst {
            margin-bottom: 0px !important;
            border-radius: 0px !important;
        }

        #banner-image {
            padding-top: 75px;
            padding-bottom: 50px;
            text-align: center;
            color: #f8f8f8;
            background: url("images/intro-bg_1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #banner_content {
            position: relative;
            padding-top: 6%;
            padding-bottom: 6%;
            margin: 12% auto;
            background-color: rgba(0, 0, 0, 0.7);
            max-width: 660px;
        }

        .panel-margin {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .text-centre {
            text-align: center;
        }

        .navst {
            margin-bottom: 0px !important;
            border-radius: 0px !important;
        }

        .imgmg {
            margin-top: 50px !important;
            margin-bottom: 50px !important;
        }

        .text {
            text-align: center;
        }

        .textp {
            text-align: center;
            font-size: 15px !important;
        }

        .imgc {
            margin-left: 510px;
        }

        footer {
            position:fixed;
            padding: 10px 0;
            text-align: center;
            bottom: 0;
            background-color: #101010;
            color: #9d9d9d;
            width: 100%;
        }
    </style>
    <!-- link to Bootstrap minified css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- link to Jquery minified-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- link to Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- link to external CSS -->
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <?php
    require './includes/header.php';

    // check all items to confirmed
    $user_id = $_SESSION["id"];
    $query = "SELECT item_id FROM users_items WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $item_id = $row["item_id"];
        $query1 = "UPDATE users_items SET status = 'Confirmed' WHERE item_id = '$item_id'";

        $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    }
    ?>
    <div class="container panel-margin">
        <div class="alert alert-success">
            Your order is confirmed. Thank you for shopping with us.
            <a href="products.php">Click here</a> to purchase any other item.
        </div>
    </div>
    <?php
    require './includes/footer.php';
    ?>
</body>

</html>