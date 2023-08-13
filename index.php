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
        <h1 style="margin-top:70px; font-size:52px;">Join Our Team</h1>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            
            <div class="form-group">
                <label for="resume">Upload Your Resume (PDF or DOCX)</label>
                <label for="resume" class="custom-file-input">Choose File</label>
                <input type="file" id="resume" name="resume" accept=".pdf,.docx" required>
                <span id="file-name" style="color: rgba(65, 46, 11, 0.5)">File once submitted cannot be edited later</span>
            </div>
                
            <div class="form-group">
                <button type="button" id="retrieveButton">Retrieve</button>
                <button type="submit">Submit Application</button>
            </div>

        </form>
    </div>

    <script>
        const resumeInput = document.getElementById('resume');
        const fileNameSpan = document.getElementById('file-name');

        resumeInput.addEventListener('change', function () {
            if (resumeInput.files.length > 0) {
                fileNameSpan.textContent = resumeInput.files[0].name;
            } else {
                fileNameSpan.textContent = 'No file chosen';
            }
        });
        const retrieveButton = document.getElementById('retrieveButton');
    
        retrieveButton.addEventListener('click', function () {
            const applicationId = prompt('Enter your Application ID:');
            if (applicationId !== null) {
                window.location.href = `retrieve.php?id=${applicationId}`;
            }
        });

    </script>

</body>
</html>
