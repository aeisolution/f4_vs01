<?php
include_once('inc/dbconfig.php');


global $connection;

//Conteggio Clienti
$sql_query = "SELECT COUNT(ID) AS Totale FROM Clienti";
$result = $connection->query($sql_query);
$row = $result->fetch_array();
$countClienti = $row['Totale'];

//Conteggio Operatori
$sql_query = "SELECT COUNT(ID) AS Totale FROM Operatori";
$result = $connection->query($sql_query);
$row = $result->fetch_array();
$countOperatori = $row['Totale'];

//Conteggio Tickets
$sql_query = "SELECT COUNT(ID) AS Totale FROM Tickets";
$result = $connection->query($sql_query);
$row = $result->fetch_array();
$countTickets = $row['Totale'];

//Conteggio Tickets Aperti
$sql_query = "SELECT COUNT(ID) AS Totale FROM Tickets WHERE StatoId=1";
$result = $connection->query($sql_query);
$row = $result->fetch_array();
$countTickets_open = $row['Totale'];



?>
<div class="row">

    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-ticket fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $countTickets_open; ?></div>
                        <div>Tickets Aperti</div>
                    </div>
                </div>
            </div>
            <a href="/f4_vs01/tickets_open.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $countTickets; ?></div>
                        <div>Tickets</div>
                    </div>
                </div>
            </div>
            <a href="/f4_vs01/tickets.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $countClienti; ?></div>
                        <div>Clienti</div>
                    </div>
                </div>
            </div>
            <a href="/f4_vs01/clienti.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-headphones fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $countOperatori; ?></div>
                        <div>Operatori</div>
                    </div>
                </div>
            </div>
            <a href="/f4_vs01/operatori.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


</div>
<!-- /.row -->