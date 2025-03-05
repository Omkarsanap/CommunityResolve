<!DOCTYPE html>

<?php
include('connection.php');
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Complaint</title>
    <link rel="stylesheet" href="bookform.css">
</head>

<body>
    <form name="compaintfrm" method="post" enctype="multipart/form-data"> <!-- Add enctype attribute for file upload -->


        <div class="compaintdetails"><br>
            <h4>&emsp;&emsp;&emsp;&emsp; INFORMATION </h4>

            &emsp;&emsp;&emsp;&emsp;<label for="reportdate" class="labelsize">Report date</label>&emsp;&nbsp;&nbsp;
            <input type="date" id="reportdate" name="reportdate" onchange="updatePrice()" class="expsize" required>&emsp;

            &emsp;&emsp;&emsp;&emsp;<label class="labelsize"> Choose Department</label>
            <select name="typeOfRoom" id="typeOfRoom" onchange="updatePrice()" class="expsize" required>
                <option value="roadsafety">Road Safety</option>
                <option value="water">Water </option>
                <option value="general">General Administration</option>
                <option value="fire">Fire</option>
                <option value="electricity">Electricity</option>
            </select><br><br>

            <!-- Add file input field for photograph 
            <label class="labelsize">Upload Photograph</label>
            <input type="file" name="photograph" accept="image/*" required>-->
        </div>

        <div class="guestdetails"> <br>

            <!-- Input fields for place details -->
            <h4>&emsp;&emsp;&emsp;&emsp;Place Details</h4>

            &emsp;&emsp;&emsp;&emsp;<input type="text" id="fname" name="fname" placeholder="First Name" class="size" pattern="[A-Za-z]+" title="Please enter Alphabets only" required> &nbsp;
            <input type="text" id="lname" name="lname" placeholder="Last Name" class="size" pattern="[A-Za-z]+" title="Please enter Alphabets only" required><br><br>
            &emsp;&emsp;&emsp;&emsp;<input type="email" id="email" name="email" placeholder="Email Address" class="size"> &nbsp;
            <input type="text" name="phno" id="phno" placeholder="Phone Number" class="size" maxlength="10" pattern="\d{10}" title="Please enter Numbers only" required><br><br>

            &emsp;&emsp;&emsp;&emsp;<input type="text" id="country" name="country" placeholder="Country" class="size" pattern="[A-Za-z]+" title="Please enter Alphabets only" required><br><br>
            &emsp;&emsp;&emsp;&emsp;<input type="text" id="address" name="address" placeholder="Address line1" class="size"> &nbsp;
            <input type="text" id="address" name="address" placeholder="Address line2" class="size"><br><br>
            &emsp;&emsp;&emsp;&emsp;<input type="text" id="city" name="city" placeholder="City" class="size" pattern="[A-Za-z]+" title="Please enter Alphabets only" required> &nbsp;
            <input type="text" id="state" name="state" placeholder="State" class="size" pattern="[A-Za-z]+" title="Please enter Alphabets only" required><br><br>
            &emsp;&emsp;&emsp;&emsp;<input type="text" id="zipcode" name="zipcode" placeholder="Zip Code" class="size" pattern="[0-9]+" title="Please enter Numbers only" required>
        </div><br>

        <button class="button" type="submit" name="sub">Confirm</button></a>
    </form>
</body>

<?php
if (isset($_POST['sub'])) {
    $reportdate = $_POST['reportdate'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];

    // File upload handling
    // $photograph = $_FILES['photograph']['name'];
    //$temp_name = $_FILES['photograph']['tmp_name'];
    //$upload_dir = 'uploads/'; // Change the directory according to your setup
    //$upload_path = $upload_dir . $photograph;

    // Move the uploaded file to the desired directory
    //move_uploaded_file($temp_name, $upload_path);

    // Connect to your database
    $db = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user inputs for security
    $reportdate = mysqli_real_escape_string($db, $reportdate);
    $fname = mysqli_real_escape_string($db, $fname);
    $lname = mysqli_real_escape_string($db, $lname);
    $email = mysqli_real_escape_string($db, $email);
    $phno = mysqli_real_escape_string($db, $phno);
    $address = mysqli_real_escape_string($db, $address);
    $city = mysqli_real_escape_string($db, $city);
    $state = mysqli_real_escape_string($db, $state);
    $zipcode = mysqli_real_escape_string($db, $zipcode);
    //$photograph = mysqli_real_escape_string($db, $photograph);

    // Attempt insert query execution
    $q = "INSERT INTO report_detail (reportdate, fname, lname, email, phno, address, city, state, zipcode)
       VALUES ('$reportdate', '$fname', '$lname', '$email', '$phno', '$address', '$city', '$state', '$zipcode')";

    if (mysqli_query($db, $q)) {
        echo "<script>alert('complaint Successful')</script>";
        // Redirect to photoupload.php
        header('Location: upload.php');  // Change: Redirect to photoupload.php

        die(); // Change: Make sure to exit after redirection
    } else {
        echo "<script>alert('complaint Failed')</script>";
    }


    // Close connection
    mysqli_close($db);
}
?>

</body>

</html>