<?php

include_once 'apimovie.php';

$api = new ApiMovies();

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  if (is_numeric($id)) {
    $api->getById($id);
  }else {
    $api->error('The incorrect params');
  }
}else {
  $api->getAll();
}
