<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Application</title>
    <link rel="stylesheet" href="stylesret.css">
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "registrations";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM jobapplication WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $fullName = $row['full_name'];
                $email = $row['email'];
                $phone = $row['phone'];
    ?>
        <div class="container">
            <h1 style="margin-top: 70px; font-size: 52px;">Retrieve Application</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $fullName; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>
            </div>

            <br><br>
            
            <button type="button" onclick="window.location.href = 'index.php';">Back to Application</button>
            <button type="submit">Update Application</button>

        </form>
        <?php
            } else {
                echo '<p>No application found with the given ID.</p>';
            }

            $conn->close();
        } else {
            echo '<p>Please provide an Application ID.</p>';
        }
        ?>
    </div>
</body>
</html>
