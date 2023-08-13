<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

.bt, .btt {
    background-color: #d5cdc6;
    color: #343829;
    margin:18px;
    padding: 10px 20px;
    border-radius: 3px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.2s, color 0.2s;
}

.bt:hover, .btt:hover {
    background-color: #8c6352;
    color: #d5cdc6;
    border: 1px solid #6c755e;
    transform: scale(1.09);
}

</style>

</head>
<body style="background-image: url('https://i.pinimg.com/originals/b2/81/e1/b281e16cf1c5d3963eb1e70c4aa37f7f.jpg');">
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registrations";
    

    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $targetDir = "uploads/";
    $resume = basename($_FILES["resume"]["name"]);
    $targetFilePath = $targetDir . $resume;
    

    $sql = "INSERT INTO jobapplication (full_name, email, phone, resume) VALUES ('$fullName', '$email', '$phone', '$resume')";
    
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath); 
        $lastInsertId = $conn->insert_id;
        echo '<div style="text-align: center; font-size: 32px; margin-top: 320px; background-color: rgba(195, 183, 167, 0.5); color: #2e2c2d; padding: 10px; border-radius: 2px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">';
        echo 'Your application has been submitted successfully.<br>';
        echo 'Your ID is: <span style="font-weight: bold;">' . $lastInsertId . '</span>';
        echo '<div style="display: flex; justify-content: center; margin-top: 15px;">';
        echo '<a href="index.php" class="bt" style="margin-right: 10px;">Back to Application</a>';
        echo '<a href="proceed.php" class="btt">Proceed Further</a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      
    
    $conn->close();
}
?>