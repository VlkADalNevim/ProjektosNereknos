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
            <form method="POST" action="#" >
                <div class="movieHrefContent">
                  <table>
                    <td>
                      <a class="href" href="games.php?games_ID=<?php echo $res['id']?>">
                          <?php echo $res['gName']?>
                    </a>
                    </td>
                    <td>
                      <a href="gameUpdate.php?games_ID=<?php echo $res['id']?>" class="updt_btn">
                        UPDATE
                      </a>
                    </td>
                  </table>
                </div>
            </form>
        <?php
      }
    } else {
      ?>
        <div class='alert alert-danger mt-3 text-center' role='alert'>
          <div class="noNewResult">
            <a class="noResult"> No results </a> 
          </div>
        </div>
      <?php
      ;
    }
  }
?>
