<?php
  session_start();
  require_once "db.php";
 
  if (isset($_POST['query'])) {
      $search = mysqli_real_escape_string($con, $_POST["query"]);
      $query = "SELECT * FROM movie WHERE mname LIKE '%{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        ?>
          <a class="movieHref" href="movie.php?movie_ID=<?php echo $res['id']?>">
            <div class="movieHrefContent">
              <td><?php echo $res['mName']?></td>
            </div>
          </a>
        <?php
      }
    } else {
      ?>
        <div class='alert alert-danger mt-3 text-center' role='alert'>
          <div class="noNewResult">
            <a class="noResult"> No results </a> 
            <a class="createNewRecordHref" href="movieCreation.php">
              <div class="createNewRecord">
                <td>Create a new record</td>
              </div>
            </a>
          </div>
        </div>
      <?php
      ;
    }
  }
?>