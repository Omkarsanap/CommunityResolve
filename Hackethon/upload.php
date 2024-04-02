<!DOCTYPE html>
<html>

<head>
    <title>Photo Upload to Database</title>
    <style>
        /* CSS styles */
        /* General body styles */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
            height: 100vh;
            /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container for the form */
        .container {
            width: 50%;
            /* Adjust width as needed */
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Style for the form */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Style for form elements */
        input[type='file'],
        textarea {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 10px;
            cursor: pointer;
            margin-bottom: 20px;
            border-radius: 4px;
            background-color: #fff;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type='file']:hover,
        input[type='file']:focus,
        textarea:hover,
        textarea:focus {
            border-color: #007bff;
        }

        input[type='submit'] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type='submit']:hover {
            background-color: #0056b3;
        }

        /* Style for headings */
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Upload Photo</h1>

        <?php
        // Database connection parameters
        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "compdb";

        // Create connection
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
            $uploadOk = 1;

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if ($check === false) {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Allow only certain file formats
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if ($uploadOk == 1) {
                $photoData = file_get_contents($_FILES["photo"]["tmp_name"]);
                $photoData = $conn->real_escape_string($photoData);

                // Get description from form
                $description = $_POST['description'];

                // Insert photo data and description into database
                $sql = "INSERT INTO photos (photo_data, description) VALUES ('$photoData', '$description')";
                if ($conn->query($sql) === TRUE) {
                    echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded to database with description: $description";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $conn->close();
        ?>

        <form method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="photo" id="photo">
            Description:
            <textarea name="description" rows="4" cols="50" placeholder="Enter description..."></textarea>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</body>

</html>