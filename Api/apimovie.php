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
            $this->printJSON($movies);
        } else {
          $this->error('Not elemeents register');
        }
    }

    function getById($id)
    {
        $movie = new Movie();
        $movies = array();
        $movies['items'] = array();

        $res = $movie->getMovie($id);

        if ($res->rowCount() == 1) {
            $row = $res->fetch();

            $item = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'company' => $row['company'],
                'year' => $row['year']
            );
            array_push($movies['items'], $item);
            $this->printJSON($movies);
        } else {
          $this->error('Not elemeents register');
        }
    }

    function printJSON($array)
    {
      echo '<code>'. json_encode($array).'</code>';
    }

    function error($message)
    {
      echo '<code>'.json_encode(array('message'=>$message)).'</code>';
    }

}