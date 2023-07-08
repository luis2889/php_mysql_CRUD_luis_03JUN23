<?php

include('database/db.php');

if(isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = getimagesize($_FILES['image']['tmp_name']);
  if($image !== false){
    $image = $_FILES['image']['tmp_name'];
    $img_content = addslashes(file_get_contents($image));
  } else {
    $img_content = "";
  }

  $query = "INSERT INTO task(title, description, image) VALUES('$title', '$description', '$img_content')";
  $result = mysqli_query($conn, $query);

  if(!$result) {
    die(mysqli_error($mysqli));
    //die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>