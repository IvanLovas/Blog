<?php include('db.php')?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $pol = $_POST['pol'];
    $sql = "INSERT INTO author (ime, prezime, pol) VALUES ('$ime', '$prezime', '$pol')";
    insertIntoDB($connection, $sql);
    // header('location: index.php');
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
            <form class="create-new-author" method="POST" action="create-author.php">
        
                <label>pol</label>
                <input type="radio" name="pol" required>M</textarea>
                <input type="radio" name="pol" required>Ž</textarea>

                <label>Ime</label>
                <input type="text" name="ime" required>

                <label>Prezime</label>
                <input type="text" name="prezime" required>
                <button>Add author</button>
            </form>
        </div>
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include ('footer.php') ?>
</body>
</html>
