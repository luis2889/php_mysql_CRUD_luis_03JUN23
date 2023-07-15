<?php
include("database/db.php");
$title = "";
$description = '';
$image = '';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
    $image = $row['image'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = getimagesize($_FILES['image']['tmp_name']);
  if($image !== false){
    $image = $_FILES['image']['tmp_name'];
    $img_content = addslashes(file_get_contents($image));
  } else {
    $img_content = "";
  }

  $query = "UPDATE task set title = '$title', description = '$description', image = '$img_content' WHERE id = $id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message-type'] = 'warning';
  header('Location: index.php');
}

include("includes/header.php");
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title" autofocus>
          </div>
          <div class="form-group mb-3">
            <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description; ?></textarea>
          </div>
          <div class="form-group mb-3">
            <input type="file" name="image" class="form-control mb-3">
            <img src="image.php?id=<?php echo $row['id'] ?>" alt="image" class="w-100 rounded-3">
          </div>
          <button class="btn btn-success w-100" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</main>


<?php include("includes/footer.php"); ?>
