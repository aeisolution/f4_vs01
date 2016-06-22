<?php
include_once('inc/session.php');
include_once('inc/dbconfig.php');

if(isset($_POST['btn-add'])) {
  $cognome  = ucwords(strtolower($_POST['cognome']));
  $nome     = ucwords(strtolower($_POST['nome']));
  $comuneId = $_POST['comuneId'];

  $sql_cmd = "INSERT INTO clienti (cognome, nome, comuneId) VALUES ('$cognome', '$nome', $comuneId) ";
  if($connection->query($sql_cmd)) {
    echo "<script>window.location.href='clienti.php?saved=true';</script>";
  } else {
    echo "<script>alert('Errore di salvataggio record.');</script>";
  }

}

?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php include('html/layout/head.php'); ?>
  <script>

  function loadLang() {
    var objSelect = document.getElementById('selectLang');

    var langArray = ['Italiano','Inglese','Francese','Tedesco', 'Spagnolo'];

    for(var i=0,len=langArray.length;i<len;i++)
    {
      console.log("%d - %s",i, langArray[i]);
      var opt = document.createElement("option");
      opt.value= i;
      opt.innerHTML = langArray[i]; // whatever property it has

      // then append it to the select element
      objSelect.appendChild(opt);
    }
  }


  </script>
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
                    <label>Parametro 1</label>
                    <input type="text" class="form-control" name="param1" placeholder="Parametro 1">
                </div>
                <div class="form-group col-md-6">
                    <label>Parametro 2</label>
                    <input type="text" class="form-control" name="param2" placeholder="Parametro 2">
                </div>
                <div class="form-group col-md-6">
                    <label>Selezione Lingua</label>
                    <select name="selectLang" id="selectLang" class="form-control">
                      <option value="0">--- selezionare ---</option>
                    </select>
                </div>
                <div class="col-md-12">
                  <button type="button" name="btn-add" class="btn btn-default" onClick="loadLang()">Carica elenco Lingue</button>
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
