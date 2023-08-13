<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 style="margin-top:70px; font-size:52px;">Complete your application</h1>
        <form action="further_action.php" method="post">
            <div class="form-group">
                <label for="further_info">Additional Information</label>
                <input type="text" id="further_info" name="further_info" rows="4" required>
            </div>
            <div class="form-group">
                <label for="skills">Skills and Qualifications</label>
                <input type="text" id="skills" name="skills" required>
            </div>
            <div class="form-group">
                <label for="references">References</label>
                <input type="text" id="references" name="references" required>
            </div>
            <div class="form-group">
                <label for="availability">Availability</label>
                <input type="text" id="availability" name="availability" required>
            </div>
            <div class="form-group">
                <button type="submit">Complete Application</button>
            </div>
        </form>
    </div>

    <script>
        
    </script>
</body>
</html>
