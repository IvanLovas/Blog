<?php include('db.php') ?>
<?php 

if (isset($_GET['post_id'])) {
    $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";
    $singlePost = getDataFromSinglePost($connection, $sql);
    }

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
            <div  class="blog-post">
                <h2 class="blog-post-title"><?php echo($singlePost['title'])?></h2>
                <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?><a href="#"><?php echo($singlePost['ime'] . ' ' . $singlePost['prezime']) ?></a></p>
                <p><?php echo($singlePost['body']) ?></p>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->
    <?php include('comments.php')?>

</main><!-- /.container -->

<?php include ('footer.php') ?>
</body>
</html>
