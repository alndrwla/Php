<?php

include_once 'connection.php';

class Movie extends DB
{

    function getMovies()
    {
        $query = $this->connect()->query('SELECT * FROM movie');
        return $query;
    }

}