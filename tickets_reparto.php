<?php
include_once('inc/session.php');
include_once('inc/dbconfig.php');


$repartoId = -1;
if(isset($_POST['btn-reparto'])) {
    $repartoId =  $_POST['repartoId'];
}

global $connection;
$sql_query = "SELECT * FROM vTickets WHERE RepartoId=$repartoId";

echo $sql_query;

if(isset($_GET['search'])) {
  $sql_query .= " AND Cliente LIKE '%" . $_GET['search'] .  "%'";
}
$sql_query .= " ORDER BY Data";


$resultTickets = $connection->query($sql_query);
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
                <!--
                <a href="ticket_add.php" class="btn btn-success">Nuovo</a>
                -->
                <form action="#" method="POST">
                   <div class="form-group col-md-6">
                    <label>Reparto</label>
                    <select name="repartoId" class="form-control">
                      <option value="0">--- selezionare ---</option>
                      <?php
                        global $connection;
                        $sql_query = "SELECT ID, Nome FROM reparti ORDER BY Nome";
                        $result = $connection->query($sql_query);
                        while($row = $result->fetch_array()) {
                          $reparto_id = $row['ID'];
                          $reparto_nome = $row['Nome'];

                          echo "<option value='$reparto_id'>$reparto_nome</option>";

                        }
                      ?>
                    </select>
                </div> 
                <button type="submit" name="btn-reparto" class="btn btn-default">Cerca..</button>               
                </form>


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
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Oggetto</th>
                        <th>Categoria</th>
                        <th>Stato</th>
                        <th>Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if($resultTickets->num_rows==0) {
                          echo "<tr><td colspan='7'>nessun record trovato</td></tr>";
                        } else {
                          while($row = $resultTickets->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['Data'] . "</td>";
                            echo "<td>" . $row['Cliente'] . "</td>";
                            echo "<td>" . $row['Oggetto'] . "</td>";
                            echo "<td>" . $row['Categoria'] . "</td>";
                            echo "<td>" . $row['Stato'] . "</td>";
                            echo "<td><a href='ticket_view.php?view_id=".$row['ID']."' class='btn btn-default btn-sm'>visualizza</a> ";
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
