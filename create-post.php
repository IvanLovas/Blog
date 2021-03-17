<?php include('db.php')?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['body'];
    $author = $_POST['author_id'];
    $sql = "INSERT INTO posts (title, body, created_at, author_id) VALUES ('$title', '$content', now(), '$author')";
    insertIntoDB($connection, $sql);
    // header('location: index.php');
}

    $authorSql = "SELECT * FROM author";
    $allAuthors = getAuthors($connection, $authorSql);
    
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
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>

<?php include('header.php') ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <form class="create-new-post" method="POST" action="create-post.php">
                <!-- <textarea name="post-content" id="" cols="30" rows="10"></textarea> -->
                <label>Title</label>
                <input type="text" name="title"  required>

                <label>Content</label>
                <textarea name="content" cols="30" rows="10" required></textarea>

                <!-- <label>Author</label>
                <input type="text" name="author" required> -->
                <select class="<?php if($author['pol'] === 'M') { echo 'is-male'; } else if(($author['pol'] === 'Z')) { echo 'is-female';} ?>">
                <?php
                    foreach ($allAuthors as $author) {
                    ?>

                    
                        <option value="<?php echo ($author['id']) ?>"><?php echo ($author['ime'] . ' ' . $author['prezime'] ); ?></option>
                    
                    

                        <?php
                    }
                    ?>
              </select>
                <button>Add post</button>
            </form>
        </div>
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include ('footer.php') ?>
</body>
</html>
