<?php
include_once('inc/session.php');
include_once('inc/dbconfig.php');

$id = 0;
// Lettura dati ticket da DB
if(isset($_GET['view_id'])) {
  $id = $_GET['view_id'];
}

if(isset($_POST['btn-add']) && $id!=0) {
  $statoId = $_POST['statoId'];
  $operatoreId  = $_POST['operatoreId'];
  $repartoId  = $_POST['repartoId'];
  $note = $_POST['note'];

  $sql_cmd = "INSERT INTO tickets_work (ticketId, statoId, operatoreId, repartoId, note) VALUES ($id, $statoId, $operatoreId, $repartoId, '$note')";
  if(!$connection->query($sql_cmd)) {
    echo "<script>alert('Errore di salvataggio record.');</script>";
  } else {
    $sql_cmd = "UPDATE tickets SET repartoId=$repartoId, statoId=$statoId, operatoreId=$operatoreId WHERE ID=$id";
    if(!$connection->query($sql_cmd)) {
        echo "<script>alert('Errore di aggiornamento ticket.');</script>";
    }
  }
}

  $sql_query = "SELECT * FROM vTickets WHERE ID=$id";
  if($result = $connection->query($sql_query)) {
    $row = $result->fetch_array();
  }


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

            <!-- /.row -->
            <div class="row">
              <!-- Page Content -->

              <form action="#" method="POST">
                <div class="form-group col-md-3">
                    <label>ID</label>
                    <input type="text" readonly class="form-control" value="<?php echo $row['ID']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Data Apertura</label>
                    <input type="text" readonly class="form-control" value="<?php echo $row['Data']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Stato</label>
                    <input type="text" readonly class="form-control" value="<?php echo $row['Stato']; ?>">
                </div>

                <div class="form-group col-md-6">
                    <label>Cliente</label>

                       <div class="input-group">
                           <input type="text" readonly class="form-control" value="<?php echo $row['Cliente']; ?>">
                          <span class="input-group-btn">
                            <a class="btn btn-default" href="/f4_vs01/cliente_edit.php?edit_id=<?php echo $row['ClienteId']; ?>">...</a>
                          </span>
                        </div><!-- /input-group -->

                </div>
                <div class="form-group col-md-6">
                    <label>Categoria</label>
                    <input type="text" readonly class="form-control" value="<?php echo $row['Categoria']; ?>">

                    <!--
                    <select name="categoriaId" class="form-control">
                      <option value="0">--- selezionare ---</option>
                      <php
                        global $connection;
                        $sql_query = "SELECT ID, Nome FROM Categorie ORDER BY Nome";
                        $result = $connection->query($sql_query);
                        while($row = $result->fetch_array()) {
                          $categoria_id = $row['ID'];
                          $categoria_nome = $row['Nome'];

                          echo "<option value='$categoria_id'>$categoria_nome</option>";
                        }
                      ?>
                    </select>
                    -->
                </div>
                <div class="form-group col-md-12">
                    <label>Oggetto</label>
                    <input type="text" readonly class="form-control" value="<?php echo $row['Oggetto']; ?>">
                </div>
                <div class="form-group col-md-12">
                    <label>descrizione</label>
                    <textarea class="form-control" readonly
                              rows="5"><?php echo $row['Descrizione']; ?></textarea>
                </div>
              </form>


            </div>
            <!-- /.row -->

            <div class="row">
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myTicketWork">
              Aggiorna Ticket
            </button>



            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Operatore</th>
                        <th>Reparto</th>
                        <th>Stato</th>
                        <th>Note</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        // Estrazione dati tickets_work
                        $sql_query = "SELECT * FROM vTickets_work WHERE ticketId=$id ORDER BY ID DESC";
                        $result = $connection->query($sql_query);

                        if($result->num_rows==0) {
                          echo "<tr><td colspan='5'>nessun record trovato</td></tr>";
                        } else {
                          while($row = $result->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $row['Data'] . "</td>";
                            echo "<td>" . $row['Operatore'] . "</td>";
                            echo "<td>" . $row['Reparto'] . "</td>";
                            echo "<td>" . $row['Stato'] . "</td>";
                            echo "<td>" . $row['Note'] . "</td>";
                            echo "</tr>";
                         }
                        }
                      ?>

                    </tbody>
                  </table>            
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="myTicketWork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="POST">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Aggiorna Ticket</h4>
              </div>
              <div class="modal-body">
                    <div class="form-group col-md-4">
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
                    <div class="form-group col-md-4">
                        <label>Operatori</label>
                        <select name="operatoreId" class="form-control">
                          <option value="0">--- selezionare ---</option>
                          <?php
                            global $connection;
                            $sql_query = "SELECT ID, Cognome, Nome FROM Operatori ORDER BY Cognome, Nome";
                            $result = $connection->query($sql_query);
                            while($row = $result->fetch_array()) {
                              $operatore_id = $row['ID'];
                              $operatore_cognome = $row['Cognome'];
                              $operatore_nome = $row['Nome'];

                              echo "<option value='$operatore_id'>$operatore_cognome $operatore_nome</option>";
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
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
                    <div class="form-group col-md-12">
                        <label>Note</label>
                        <textarea class="form-control" name="note"
                                  rows="5"></textarea>
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="btn-add"  class="btn btn-primary">Salva</button>
              </div>
          </form>

        </div>
      </div>
    </div>


    <!-- script section -->
    <?php include('html/layout/script.php'); ?>
</body>

</html>
