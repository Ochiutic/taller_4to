<?php 
    if(isset($_SESSION['id_user'])){
        $query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_user='$_SESSION[id_user]'")
        or die('error'.mysqli_error($mysqli));
        $data = mysqli_fetch_assoc($query);
    }
?>

<section class="content-header">
    <h1>
        <i class=" fa fa-user icon-title"></i> Perfil de Usuario
    </h1>
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"> Inicio</i></a></li>
        <li class="active">Perfil de Usuario</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
        
            <?php 
                if(empty($_GET['alert'])){
                    echo "";
                }
                elseif($_GET['alert']==1){
                    echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check-circle'></i> Éxito</h4>
                    Los nuevos datos de usuario se han cambiado correctamente.
                    </div>";
                }
                elseif($_GET['alert']==2){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-times-circle'></i> Error</h4>
                    Asegúrese de que la imagen es del formato indicado.
                    </div>";
                }
                elseif($_GET['alert']==3){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-times-circle'></i> Error</h4>
                    El archivo debe ser menor a 1 MB.
                    </div>";
                }
                elseif($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-times-circle'></i> Error</h4>
                    Asegúrese de que el tipo de archivo es: *.JPG *.JPEG *.PNG
                    </div>";
                }

            ?>
            <div class="box box-primary">
                <form class="form-horizontal" role="form" method="POST" action="?module=form_perfil" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                <?php 
                                    if($data['foto']==""){ ?>
                                        <img style="border:1px solid #eaeaea;border-radius:50px" src="images/user/user-default.png" width="75">
                                    <?php } else { ?>
                                        <img style="border:2px solid #eaeaea;border-radius:50px" src="images/user/<?php echo $data['foto']; ?>" width="75">
                                    <?php }
                                ?>

                            </label>
                            <label style="font-size: 25px; marghin-top:10px;" class="col-sm-8"><?php echo $data['name_user']; ?></label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre de Usuario</label>
                            <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['username']; ?></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['email']; ?></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Teléfono</label>
                            <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['telefono']; ?></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Permisos de Acceso</label>
                            <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['permisos_accesos']; ?></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['status']; ?></label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary btn-submit" name="Modificar" value="Modificar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>