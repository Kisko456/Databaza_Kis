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
                <div class="panel-heading">Detail uzávery <a href="<?php
                    echo site_url('uzavery/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Dátum uzávery:</label>
                        <p><?php echo
                            !empty($uzavery['Datum_od'])?$uzavery['Datum_od']
                                :''; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Dátum otvorenia uzávery:</label>
                        <p><?php echo
                            !empty($uzavery['Datum_do'])?$uzavery['Datum_do']:'';
                            ?></p>
                    </div>
                    <div class="form-group">
                        <label>Začiatok uzávery:</label>
                        <p><?php echo
                            !empty($uzavery['Km_od'])?$uzavery['Km_od']:''; ?></p>
                    </div>


                        <div class="form-group">
                            <label>Koniec uzávery:</label>
                            <p><?php echo
                                !empty($uzavery['Km_do'])?$uzavery['Km_do']
                                    :''; ?></p>
                        </div>
                        <div class="form-group">
                            <label>Priemerné zdržanie v minútach:</label>
                            <p><?php echo
                                !empty($uzavery['Priemerne_zdrzanie'])?$uzavery['Priemerne_zdrzanie']:'';
                                ?></p>
                        </div>
                        <div class="form-group">
                            <label>Dôvod uzávery:</label>
                            <p><?php echo
                                !empty($uzavery['Dovod_uzavery'])?$uzavery['Dovod_uzavery']:''; ?></p>
                        </div>


                            <div class="form-group">
                                <label>Dĺžka obchádzky:</label>
                                <p><?php echo
                                    !empty($uzavery['Dlzka_obchadzky'])?$uzavery['Dlzka_obchadzky']
                                        :''; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Číslo cesty:</label>
                                <p><?php echo
                                    !empty($uzavery['idCesty'])?$uzavery['idCesty']:'';
                                    ?></p>
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
