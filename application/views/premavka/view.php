<!DOCTYPE html>
<html lang="en-US">
<head>

    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

</head>
<body>





<div class="container">
    <div class="row">

        <div class="span12">

            <div class="well">
                <h1 style="text-align: center;"> Doprava na Slovensku </h1>


            </div>
        </div>
    </div>



    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="glyphicon glyphicon-globe" href="<?php echo site_url('oblast/index'); ?>" class="active"> Oblasti</a></li>
                    <li><a class="glyphicon glyphicon-filter" href="<?php echo site_url('kategorie/index'); ?>" class="active"> Kategórie</a></li>
                    <li><a class="glyphicon glyphicon-alert" href="<?php echo site_url('nehody/index'); ?>" class="active"> Nehody</a></li>
                    <li><a class="glyphicon glyphicon-exclamation-sign" href="<?php echo site_url('uzavery/index'); ?>" class="active"> Uzávery</a></li>
                    <li><a class="glyphicon glyphicon-road" href="<?php echo site_url('cesty/index'); ?>" class="active"> Cesty</a></li>
                    <li><a class="glyphicon glyphicon-transfer" href="<?php echo site_url('premavka/index'); ?>" class="active"> Premávka</a></li>

                </ul>


                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Hľadať">
                    </div>
                    <button type="submit" class="btn btn-default">Potvrdiť</button>
                </form>



            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Detail premávky <a href="<?php
                    echo site_url('premavka/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Počet áut denne:</label>
                        <p><?php echo
                            !empty($premavka['Pocet_aut_denne'])?$premavka['Pocet_aut_denne']
                                :''; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Rýchlosť premávky:</label>
                        <p><?php echo
                            !empty($premavka['Rychlost_premavky'])?$premavka['Rychlost_premavky']:'';
                            ?></p>
                    </div>
                    <div class="form-group">
                        <label>Dĺžka kolóny v KM:</label>
                        <p><?php echo
                            !empty($premavka['Dlzka_kolony'])?$premavka['Dlzka_kolony']:''; ?></p>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label>Zdržanie:</label>
                            <p><?php echo
                                !empty($premavka['Zdrzanie'])?$premavka['Zdrzanie']
                                    :''; ?></p>
                        </div>
                        <div class="form-group">
                            <label>Dátum:</label>
                            <p><?php echo
                                !empty($premavka['Datum'])?$premavka['Datum']:'';
                                ?></p>
                        </div>
                        <div class="form-group">
                            <label>Číslo cesty:</label>
                            <p><?php echo
                                !empty($premavka['idCesty'])?$premavka['idCesty']:''; ?></p>
                        </div>



                </div>
            </div>
        </div>
    </div>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#usertable').DataTable();
        });
    </script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!--
    <div class="row">
        <div class="span12">
            <div class="well">
                <center><h3> Copyright &copy; Michal Kis </center></h3>
            </div>
            </div>
            </div>
    </div>
    -->

</body>
</html>
