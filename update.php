<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

.bt{
    background-color: #d5cdc6;
    color: #343829;
    margin:18px;
    padding: 10px 20px;
    border-radius: 3px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.2s, color 0.2s;
}

.bt:hover{
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
    $id = $_POST["id"];
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

    $sql = "UPDATE jobapplication SET full_name = '$fullName', email = '$email', phone = '$phone' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<div style="text-align: center; font-size: 32px; margin-top: 320px; background-color: rgba(195, 183, 167, 0.5); color: #2e2c2d; padding: 10px; border-radius: 2px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">';
        echo "Application updated successfully.";
        echo '<div style="display: flex; justify-content: center; margin-top: 15px;">';
        echo '<a href="index.php" class="bt" style="margin-right: 10px;">Back to Application</a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "Error updating application: " . $conn->error;
    }

    $conn->close();
}
?>
