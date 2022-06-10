<?php
  session_start();
  require_once "db.php";
 
  if (isset($_POST['query'])) {
      $search = mysqli_real_escape_string($connection, $_POST["query"]);
      $query = "SELECT * FROM games WHERE gName LIKE '%{$_POST['query']}%' LIMIT 20";
      $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        ?>
          <a class="movieHref" href="games.php?games_ID=<?php echo $res['id']?>">
            <div class="gameHrefContent">
              <td><?php echo $res['gName']?></td>
            </div>
          </a>
        <?php
      }
    } else {
      ?>
        <div class='alert alert-danger mt-3 text-center' role='alert'>
          <div class="noNewResult">
            <a class="noResult"> No results </a> 
            <a class="createNewRecordHref" href="gamesCreation.php">
              <div class="createNewGameRecord">
                <td>Create new game record</td>
              </div>
            </a>
          </div>
        </div>
      <?php
      ;
    }
  }
?>