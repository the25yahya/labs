<?php
session_start();

$page = $_SERVER['REQUEST_URI'];
$email = $_SESSION['email'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f9;
            padding: 20px;
        }
        h2, h3 {
            color: #333;
        }
        .form-container {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="file"] {
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        #profilePhotoDisplay {
            margin-top: 20px;
            text-align: center;
        }
        #profilePhotoDisplay img {
            max-width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h2>Welcome to your account, <?php echo htmlspecialchars($email); ?></h2>
    <h2>This is the user interface</h2>
    <div class="form-container">
        <h3>Please upload a profile photo</h3>
        <form id="uploadForm" method="POST" enctype="multipart/form-data">
            <label for="profilePhoto">Profile Photo:</label>
            <input type="file" name="profilePhoto" id="profilePhoto" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
        <div id="responseMessage"></div>
    </div>

    <div id="profilePhotoDisplay">
        <h3>Your Profile Photo</h3>
        <img id="profilePhotoImg" src="<?php echo $_SESSION['profilePhoto'] ?? 'default-profile.png'; ?>" alt="Your Profile Photo">
    </div>

    <script>
        document.getElementById("uploadForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);

            try {
                const response = await fetch("upload.php", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();
                if (result.success) {
                    document.getElementById("responseMessage").textContent = "File uploaded successfully!";
                    document.getElementById("responseMessage").style.color = "green";

                    // Update the profile photo dynamically
                    document.getElementById("profilePhotoImg").src = result.filePath;
                } else {
                    document.getElementById("responseMessage").textContent = result.message;
                    document.getElementById("responseMessage").style.color = "red";
                }
            } catch (error) {
                document.getElementById("responseMessage").textContent = "An error occurred. Please try again.";
                document.getElementById("responseMessage").style.color = "red";
            }
        });
    </script>
</body>
</html>
