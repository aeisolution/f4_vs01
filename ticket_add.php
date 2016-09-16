<?php
include_once('inc/session.php');
include_once('inc/dbconfig.php');

if(isset($_POST['btn-add'])) {
  $clienteId = $_POST['clienteId'];
  $oggetto  = $_POST['oggetto'];
  $descrizione  = $_POST['descrizione'];
  $categoriaId = $_POST['categoriaId'];

  $sql_cmd = "INSERT INTO tickets (clienteId, oggetto, descrizione, categoriaId, operatoreId, statoId) VALUES ($clienteId, '$oggetto', '$descrizione', $categoriaId, 0, 1) ";
  if($connection->query($sql_cmd)) {
    echo "<script>window.location.href='tickets.php?saved=true';</script>";
  } else {
    echo "<script>alert('Errore di salvataggio record.');</script>";
  }

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
                <div class="form-group col-md-6">
                    <label>Cliente</label>
                    <select name="clienteId" class="form-control">
                      <option value="0">--- selezionare ---</option>
                      <?php
                        global $connection;
                        $sql_query = "SELECT ID, CONCAT(Cognome, ' ', Nome) AS Cliente FROM Clienti ORDER BY Cognome, Nome";
                        $result = $connection->query($sql_query);
                        while($row = $result->fetch_array()) {
                          $cliente_id = $row['ID'];
                          $cliente_nominativo = $row['Cliente'];

                          echo "<option value='$cliente_id'>$cliente_nominativo</option>";
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Categoria</label>
                    <select name="categoriaId" class="form-control">
                      <option value="0">--- selezionare ---</option>
                      <?php
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
                </div>
                <div class="form-group col-md-12">
                    <label>Oggetto</label>
                    <input type="text" required="required" minlength="4" class="form-control" name="oggetto" placeholder="Oggetto">
                </div>
                <div class="form-group col-md-12">
                    <label>descrizione</label>
                    <textarea class="form-control" required="required" 
                              rows="5" name="descrizione"></textarea>
                </div>
                <div class="col-md-12">
                  <button type="submit" name="btn-add" class="btn btn-default">Salva</button>
                </div>
              </form>


            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- script section -->
    <?php include('html/layout/script.php'); ?>
</body>

</html>
