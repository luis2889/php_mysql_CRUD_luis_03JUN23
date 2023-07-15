<?php
  include("database/db.php");
?>

<?php
  include("includes/header.php");
?>

@@ -36,7 +33,43 @@
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result_tasks)) {
          ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td class="resize-image">
              <img src="image.php?id=<?php echo $row['id'] ?>" alt="image" class="w-100">
            </td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary rounded-circle">
                <ion-icon name="create"></ion-icon>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <ion-icon name="trash"></ion-icon>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>