<?php
// Simulating backend to handle the user's file selection
$design = isset($_GET['design']) ? $_GET['design'] : 'design-1.webp'; // Default to design-1 if nothing is provided

// Path to the designs folder
$designPath = 'designs/' . basename($design);

// Simple validation to ensure that we are working with known files only (this is insecure for demonstration purposes)
if (!in_array($design, ['design-1.webp', 'design-2.webp', 'design-3.webp'])) {
    $design = 'design-1.webp';  // Default to design-1 if input is invalid
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local File Inclusion</title>
</head>
<body>
    <style>
        div img{
            margin: 10px;
            width: 400px;
        }
        .container img:hover{
            cursor: pointer;
            border: 1px solid black;
            transition: .2s;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .container div{
            display: flex;
            flex-direction: column;
        }
        .input{
            display: flex;
            align-items: center;
        }
        .input button{
            margin: 0px 5px 0px 5px;
            background-color: black;
            text: white;
            padding: 4px 8px 4px 8px;
        }
    </style>
    <h1>Welcome to our CMS!</h1>
    <h2>Choose one of our designs to get started:</h2>

    <!-- Form to input the design choice -->
    <form method="get" action="">
        <input type="text" name="design" placeholder="Type your choice here" value="<?php echo htmlspecialchars($design); ?>">
        <button type="submit">Submit</button>
    </form>

    <div class="container">
        <div class="input">
            <h1>design-1.webp</h1>
            <img src="designs/design-1.webp" alt="Design 1">
        </div>
        <div>
            <h2>design-2.webp</h2>
            <img src="designs/design-2.webp" alt="Design 2">
        </div>
        <div>
            <h2>design-3.webp</h2>
            <img src="designs/design-3.webp" alt="Design 3">
        </div>
    </div>

    <h3>Your Selected Design:</h3>
    <div class="choice">
        <!-- Display the selected design -->
        <img src="<?php echo $designPath; ?>" alt="Selected Design">
    </div>

</body>
</html>
