<?php

include_once 'connection.php';

class Movie extends DB
{

    function getMovies()
    {
      $query = $this->connect()->query('SELECT * FROM movie');
      return $query;
    }

    function getMovie($id)
    {
      $query = $this->connect()->prepare('SELECT * FROM movie WHERE id = :id');
      $query->execute(['id'=>$id]);
      return $query;
    }

}