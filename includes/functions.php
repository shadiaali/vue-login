<?php

include 'connect.php';

function validate_login($pdo, $user, $password) {
  $query = "SELECT * FROM users WHERE first_name = '$user'";

  $get_user = $pdo->query($query);
  $results = array();

  while($row =$get_user->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
    if ($row['password'] == $password){
      $row['password'] = 'XXXXXXXXXX';
      $results[] = $row;
    }else{
    $results[] = "false";
}
}
    return $results;
}


function get_single_user($pdo, $user) {
  $query = "SELECT * FROM users WHERE id = '$user'";

  $get_user = $pdo->query($query);
  $results = array();

  while($row =$get_user->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
    }

    return $results;
}

function get_all_users($pdo) {
  $query = "SELECT * FROM users";

  $get_user = $pdo->query($query);
  $results = array();

  while($row =$get_user->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
    }

    return $results;
}

 ?>
