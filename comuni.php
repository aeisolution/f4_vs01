<?php
include_once('inc/session.php');
include_once('inc/dbconfig.php');

global $connection;

if(isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  
  $sql_cmd = "DELETE FROM Comuni WHERE ID=$id";
  if($connection->query($sql_cmd)) {
    $deleted = true;
  }
}


$sql_query = "SELECT * FROM Comuni";
if(isset($_GET['search'])) {
  $sql_query .= " WHERE Nome LIKE '%" . $_GET['search'] .  "%'";
}
$sql_query .= " ORDER BY Nome";

$result = $connection->query($sql_query);
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php include('html/layout/head.php'); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('html/layout/navbar.php'); ?>

        <div id="page-wrapper">
            <?php include('html/layout/pageHeader.php'); ?>

            <!-- Alerts -->
              <div class="row">
                <?php if(isset($deleted)) { ?>
                  <!-- Inserire nota per salvataggio con successo -->
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Record cancellato con successo!
                  </div>
                <?php } ?>

                <?php if(isset($_GET['saved'])) { ?>
                  <!-- Inserire nota per salvataggio con successo -->
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Record salvato con successo!
                  </div>
                <?php } ?>
              </div>

              <!-- Toolbar -->
              <div class="row">

                <div class="pull-right col-md-4">
                  <form action="#" method="GET">
                    <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div><!-- /input-group -->
                  </form>
                </div>
              </div>

              <!-- Page Content -->
              <div class="row">

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Comune</th>
                        <th>Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if($result->num_rows==0) {
                          echo "<tr><td colspan='5'>nessun record trovato</td></tr>";
                        } else {
                          while($row = $result->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['Nome'] . "</td>";
                            echo "<td><a href='comuni.php?edit_id=".$row['ID']."' class='btn btn-default btn-sm'>modifica</a> ";
                            echo "<a href='comuni.php?delete_id=".$row['ID']."' class='btn btn-danger btn-sm'>cancella</a></td>";
                            echo "</tr>";
                         }
                        }
                      ?>

                    </tbody>
                  </table>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- script section -->
    <?php include('html/layout/script.php'); ?>
</body>

</html>
