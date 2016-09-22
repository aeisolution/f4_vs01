<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="bg-primary text-center">
                <span><?php echo $login_session; ?></span>
            </li>
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="clienti.php"><i class="fa fa-table fa-fw"></i> Clienti</a>
            </li>
            <li>
                <a href="operatori.php"><i class="fa fa-edit fa-fw"></i> Operatori</a>
            </li>
            <li>
                <a href="tickets_operatore.php"><i class="fa fa-edit fa-fw"></i> Ticket Operatore</a>
            </li>
            <li>
                <a href="tickets_open.php"><i class="fa fa-edit fa-fw"></i> Ticket Aperti</a>
            </li>
            <li>
                <a href="tickets_reparto.php"><i class="fa fa-edit fa-fw"></i> Ticket Reparti</a>
            </li>
            <li>
                <a href="tickets.php"><i class="fa fa-edit fa-fw"></i> Ticket</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrech fa-fw"></i> Parametri<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="categorie.php">Categorie</a>
                    </li>
                    <li>
                        <a href="comuni.php">Comuni</a>
                    </li>
                    <li>
                        <a href="reparti.php">Reparti</a>
                    </li>
                    <li>
                        <a href="stati.php">Stati Ticket</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
