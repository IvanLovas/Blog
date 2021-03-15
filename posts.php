<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";
        try {
            $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
    }
?>

<?php
    $sql = "SELECT * FROM posts ORDER BY created_at DESC;";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
    ?>


<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
</head>

<body>

<?php foreach ($posts as $post) { ?>
    <div class="blog-post">
        <a class="blog-post-title-link" href="<?php echo "single-post.php?post_id=" . $post['id'] ?>">
            <h2 class="blog-post-title"><?php echo $post['title'] ?></h2>
        </a>
        <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['author']; ?></a></p>
        <p><?php echo $post['body'] ?></p>
    </div>
<?php } ?>

</body>
</html>
