<?php

require 'inc/db-pg.php';

$database = new PgSql();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recruitment Task</title>

    <!-- Bootstrap core CSS -->
    <link href="inc/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Recruitment Task</h1>
            <p class="lead">Click on the movie title to get movie info or you can click on the actor to get his info and all movies he played in</p>
        </div>
        <div class="col-lg-6 text-center">
            <h2 class="mt-5">Movies</h2>
            <?php

                $query = "SELECT title FROM movies";
                foreach($database->getRows($query) as $row) {
                    echo '<h4 class="mt-5"><a href="#" class="get-movie">'.$row->title.'</a></h4>';
                }
            ?>
        </div>
        <div class="col-lg-6 text-center">
            <h2 class="mt-5">Actors</h2>
            <?php

                $query = "SELECT actor_name FROM actors";
                foreach($database->getRows($query) as $row) {
                    echo '<h4 class="mt-5"><a href="#" class="get-actor">'.$row->actor_name.'</a></h4>';
                }
            ?>
        </div>
        <div id="result" class="col-lg-12 text-center">

        </div>
    </div>
</div>

<?php $database->close(); ?>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="inc/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="inc/scripts-pg.js"></script>

</body>
</html>

