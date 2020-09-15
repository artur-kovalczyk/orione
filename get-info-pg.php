<?php
require_once 'inc/db-pg.php';

if(isset($_GET['type']) && !empty($_GET['type']) && isset($_GET['name']) && !empty($_GET['name'])) {

    $type=strip_tags($_GET['type']);
    $name=urldecode(strip_tags($_GET['name']));

    switch ($type) {
        case "movie": echo getMovies($name);
            break;
        case "actor": echo getActorsMovies($name);
            break;
        default:
            echo "<p>Please Enter A day Of The Week</p>";
    }

} else {
    echo "Error";
}

function getMovies($name){
    header('Content-type: application/json');
    $result_array = array();
    $database = new PgSql();
    $query = "SELECT f.title, f.premiere_year, ARRAY_TO_STRING(array_agg(distinct act.actor_name), ',')as Actors FROM movies as f left join actor_starred_in as fa on fa.movie_id = f.movie_id left join actors act on act.actor_id = fa.actor_id where (f.title LIKE '%".$name."%') GROUP BY f.title,f.premiere_year";
        foreach($database->getRows($query) as $row) {
            array_push($result_array, $row);
        }
        return json_encode($result_array);

    $database->close();
}

function getActorsMovies($name){
    header('Content-type: application/json');
    $result_array = array();
    $database = new PgSql();
    $query = "SELECT act.actor_name, ARRAY_TO_STRING(array_agg(distinct act.born_year),' ') as born_year, ARRAY_TO_STRING(array_agg(distinct act.born_where),' ') as born_where, string_agg(f.title, ',') as movies FROM actors as act left join actor_starred_in as fa on fa.actor_id = act.actor_id left join movies f on f.movie_id = fa.movie_id WHERE (act.actor_name LIKE '%".$name."%') GROUP BY act.actor_name";
    foreach($database->getRows($query) as $row) {
        array_push($result_array, $row);
    }
    return json_encode($result_array);

    $database->close();
}
