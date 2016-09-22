<?php
include_once('inc/session.php');
include_once('inc/dbconfig.php');


global $connection;
$sql_query = "SELECT * FROM vTickets WHERE OpRespId=$opSession";

$statoId = -1;
if(isset($_POST['btn-stato'])) {
    $statoId =  $_POST['statoId'];

    if($statoId>0) {
        $sql_query .= " AND StatoId=$statoId";
    }
}

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
                    <label>Stato</label>
                    <select name="statoId" class="form-control">
                      <option value="0">--- selezionare ---</option>
                      <?php
                        global $connection;
                        $sql_query = "SELECT ID, Nome FROM stati ORDER BY Nome";
                        $result = $connection->query($sql_query);
                        while($row = $result->fetch_array()) {
                          $stato_id = $row['ID'];
                          $stato_nome = $row['Nome'];

                          echo "<option value='$stato_id'>$stato_nome</option>";

                        }
                      ?>
                    </select>
                </div> 
                <button type="submit" name="btn-stato" class="btn btn-default">Cerca..</button>               
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
