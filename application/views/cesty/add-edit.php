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
        <div class="row"><br></div>
        <div class="col-xs-12">
            <?php
            if(!empty($success_msg)){
                echo '<div class="alert alert-success">'.$success_msg.'</div>';
            }elseif(!empty($error_msg)){
                echo '<div class="alert alert-danger">'.$error_msg.'</div>';
            }
            ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $action; ?> cestu <a href="<?php echo site_url('cesty/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                    <div class="panel-body">
                        <form method="post" action="" class="form">

                            <div class="form-group">
                                <?php echo form_label('Názov oblasti:'); ?>
                                <?php echo form_dropdown('idOblast', $oblast, $oblast_selected, 'class="form-control"'); ?>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Názov kategórie:'); ?>
                                <?php echo form_dropdown('idKategorie', $kategorie, $kategorie_selected, 'class="form-control"'); ?>
                            </div>

                            <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť"/>
                        </form>
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
