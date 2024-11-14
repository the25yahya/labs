<?php
// Database connection
$host = '192.168.1.137';
$db = 'blog_xss';
$user = 'newuser';
$pass = 'newpassword'; // Enter your MySQL password here
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve query parameter from the URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

if ($query) {
    // Prepare SQL query to search for posts with the query in the title
    $sql = "SELECT * FROM posts WHERE title LIKE :query";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['query' => '%' . $query . '%']); // Adding wildcard for searching
    $posts = $stmt->fetchAll();
} else {
    // If no query parameter, fetch all posts
    $sql = "SELECT * FROM posts";
    $stmt = $pdo->query($sql);
    $posts = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'xss1'; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1><span>hello, this is a </span><span class="span-2">search functionality</span>
        <span>for our blog!</span></h1>
        <div class="search">
            <input id="search-field" placeholder="search anything!" type="text">
            <button id="search-btn">search</button>
        </div>

        <?php
        // Display the query if provided
        if ($query) {
            echo "<h3>Results for: " . htmlspecialchars($query) . "</h3>";
        }

        // Display posts if found
        if ($posts) {
            foreach ($posts as $post) {
                echo '<div class="post">';
                echo '<img src="' . $post['image'] . '" alt="">';
                echo '<h2>' . $post['title'] . '</h2>';
                echo '<p>' . $post['description'] . '</p>';
                echo '<button>learn more</button>';
                echo '</div>';
            }
        } else {
            echo '<p>No posts found.</p>';
        }
        ?>
    </div>
    <script src="js/index.js"></script>
</body>
</html>
