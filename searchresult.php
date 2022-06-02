<?php
  session_start();
  require_once "db.php";
 
  if (isset($_POST['query'])) {
      $search = mysqli_real_escape_string($con, $_POST["query"]);
      $query = "SELECT * FROM movie WHERE mname LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        ?>
          <a class="movieHref" href="movie.php?id=<?php echo $res['id']?>">
            <div class="movieBox">
              <div class="movieTitle"><?php echo $res['mName']?></div>
              <div class="spaceBetween"> </div>
              <div class="movieRating"><?php echo $res['mRating']?></div>
            </div>
          </a>
        <?php
      }
    } else {
      ?>
        <div class='alert alert-danger mt-3 text-center' role='alert'>
          <a class="noResult"> No result </a> 
          <a href="movieCreation.php" class="createNewRecordA">
            <div class="createNewRecord">Create a new record</div>
          </a>
        </div>
      <?php
      ;
    }
  }
?>