<?php 
    if($_GET['form']=='add'){ ?>
      <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Agregar Operarios</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=operarios"> Operarios</a></li>
        <li class="active">Más</li>
      </ol>
      </section>      

      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/operarios/proses.php?act=insert" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT MAX(id_operario) as id FROM operarios")
                                                        or die('Error'.mysqli_error($mysqli));

                                $count = mysqli_num_rows($query_id);  
                                if($count <> 0){
                                    $data_id = mysqli_fetch_assoc($query_id);
                                    $codigo = $data_id['id']+1;
                                } else{
                                    $codigo=1;
                                }                      
                            ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Código</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nombre" pleaceholder="Ingrese su Nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Apellidos</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="apellido" pleaceholder="Ingrese su Apellido" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ci</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="ci" onKeyPress="return goodchars(event,'0123456789',this)"  pleaceholder="Ingrese N° de CI" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Numero de Legajo</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="numero_legajo" onKeyPress="return goodchars(event,'0123456789',this)"  pleaceholder="Ingrese N° de CI" required>
                                </div>
                            </div>
                            <!--combo para seleccionar un sector   -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sectores de Trabajo</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="cod_sector" data-placeholder="-- Seleccionar  Sectores --"
                                    autocomplete="off" required>
                                        <option value=""></option>
                                        <?php 
                                            $query_dep = mysqli_query($mysqli, "SELECT cod_sector, descrip_sector
                                            FROM sector
                                            ORDER BY cod_sector ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_sec = mysqli_fetch_assoc($query_dep)){
                                                echo "<option value=\"$data_sec[cod_sector]\">$data_sec[cod_sector] | $data_sec[descrip_sector]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=operarios" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
      
      </section>  

    <?php }
    elseif($_GET['form']=='edit'){
      if(isset($_GET['id'])){
          $query = mysqli_query($mysqli, "SELECT * FROM operarios WHERE id_operario = '$_GET[id]'")
                                                    or die('Error'.mysqli_error($mysqli));
          $data = mysqli_fetch_assoc($query);                                          
      }?> 
    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Modificar Operarios</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=operarios"> Operarios</a></li>
        <li class="active">Modificar</li>
      </ol>
    </section>  
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/operarios/proses.php?act=update" method="POST">
                        <div class="box-body">
                       
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Código</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $data['id_operario']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Apellidos</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="apellido" value="<?php echo $data['apellidos']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CI</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="ci" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['ci']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Numero de Legajo</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="ci" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['numero_legajo']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sectores de Trabajo</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="cod_sector" data-placeholder="-- Seleccionar  Sectores --"
                                    autocomplete="off" required>
                                        <option value=""></option>
                                        <?php 
                                            $query_dep = mysqli_query($mysqli, "SELECT cod_sector, descrip_sector
                                            FROM sector
                                            ORDER BY cod_sector ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_sec = mysqli_fetch_assoc($query_dep)){
                                                echo "<option value=\"$data_sec[cod_sector]\">$data_sec[cod_sector] | $data_sec[descrip_sector]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=operarios" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
      
      </section>  

   <?php }

?>