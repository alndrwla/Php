<?php

include_once 'movie.php';

class ApiMovies
{
    function getAll()
    {
        $movie = new Movie();
        $movies = array();
        $movies['items'] = array();

        $res = $movie->getMovies();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'company' => $row['company'],
                    'year' => $row['year']
                );
                array_push($movies['items'], $item);
            }
            echo json_encode($movies);
        } else {
            echo json_encode(array('message' => 'Not elements register'));
        }

    }
}