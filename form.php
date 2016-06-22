<?php  
include_once('inc/session.php');
include_once('inc/dbconfig.php');
include('inc/functions.php');

if( isset($_POST['invia'])) {
    $cod_fisc = $_POST['cod_fisc'];
    $p_iva = $_POST['p_iva'];
    $email = $_POST['email'];
    $prezzo = $_POST['prezzo'];

    if(codiceFiscale($cod_fisc)) {
        echo "Codice Fiscale: $cod_fisc Valido <br>";
    } else {
        echo "Codice Fiscale: $cod_fisc NON Valido <br>";
    }

    if(controllaPIVA($p_iva)) {
        echo "Partita IVA $p_iva Valida <br>";
    } else {
        echo "Partita IVA $p_iva NON Valida <br>";
    }

    if(email_inserimento($email)) {
        echo "E-Mail $email Valida <br>";
    } else {
        echo "E-Mail $email NON Valida <br>";
    }

    $prezzo_new = prezzo_inserimento($prezzo); 
    echo "Prezzo $prezzo Formattato: $prezzo_new  <br>";
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

            <!-- Alerts -->
              <div class="row">
                <?php if(!empty($_GET['success'])) { ?>
                  <!-- Inserire nota per salvataggio con successo -->
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Import eseguito con successo!
                  </div>
                <?php } ?>
              </div>


              <!-- Page Content -->
              <div class="row">
                <form method="post" action="" name="form">

                <div class="form-group col-md-6">
                    <label>Codice Fiscale</label>
                    <input type="text" required="required" maxlength="16" class="form-control" name="cod_fisc" placeholder="Codice Fiscale">
                </div>

                <div class="form-group col-md-6">
                    <label>PartitaIVA</label>
                    <input type="text" required="required" maxlength="11" class="form-control" name="p_iva" placeholder="Partita IVA">
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" required="required" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group col-md-6">
                    <label>Prezzo</label>
                    <input type="text" required="required" class="form-control" name="prezzo" placeholder="Prezzo">
                </div>

                <div class="col-md-12">
                  <button type="submit" name="invia" class="btn btn-default">Verifica Dati</button>
                </div>
                </form>
              </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- script section -->
    <?php include('html/layout/script.php'); ?>
</body>

</html>
