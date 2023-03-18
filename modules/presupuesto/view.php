<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=presupuesto">Presupuesto</a></li>
</ol><br><hr>

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
                <h4>  <i class='icon fa fa-check-circle'></i> Exitoso!</h4>
                Datos registrados correctamente
                </div>";
            }
          
            elseif($_GET['alert']==2){
                echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Existoso</h4>
                Datos anulados correctamente
                </div>";
            }
            ?>

            <div class="box box-primary">
                <div class="box-body">
                <section class="content">
    <div class="row">
        <div class="col-md-12">
            <!------------------------------------------->
            <div class="box box-primary">
                    <div class="box-body">
                        <!------------------------------------------->
                        <form role="form" class="form-horizontal" method="POST">
                            <div class="form-group">
                            <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-social btn-submit" style="width:170px">
                                        <i class="fa fa-file-text-o icon-title"></i>
                                        Pedidos en General
                                        <?php 

                                            $query_val = mysqli_query($mysqli, "SELECT * FROM v_pedidos
                                                                                ORDER BY cod_pedi ASC") or die ('Error'.mysqli_error($mysqli));

                                        ?>
                                    </button>
                                </div>
                            </div>
                            <!------------------------------------------->
                            <div class="form-group">
                                <!------------------------------------------->
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="codigo_materia" data-placeholder= "-- Seleccionar  Pedidos de Materia --"
                                    autocomplete="off">
                                        <option value=""></option>
                                        <?php 
                                            $query_dep = mysqli_query($mysqli, "SELECT cod_pedi, descri_pedi
                                                                                FROM pedidos
                                                                                ORDER BY cod_pedi ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_mat = mysqli_fetch_assoc($query_dep)){

                                                echo "<option value=\"$data_mat[cod_pedi]\">$data_mat[cod_pedi] | $data_mat[descri_pedi]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!------------------------------------------->
                                <div class="col-sm-3">
                                    <button tyoe="submit" class="btn btn-primary btn-social btn-submit" style="width:170px">
                                        <i class="fa fa-file-text-o icon-title"></i>
                                        Buscar Pedidos de Clientes
                                    </button>
                                </div>
                                <?php 
                                    if(!empty($_POST['codigo_materia'])){
                                        $codigo_materia = $_POST['codigo_materia'];
                                        $query_val = mysqli_query($mysqli, "SELECT * FROM v_pedidos WHERE cod_pedi = $codigo_materia
                                                                            ORDER BY cod_pedi ASC") or die ('Error'.mysqli_error($mysqli));
            
                                    }
                                ?>
                    
                            </div>

                        </form>
                        <!------------------------------------------->
                    <section class="content-header">
                        
                    

                        <table id="dataTables1" class="table table-bordered table-striped table-hover">

                        <!------------------------------------------->
                        <h2>Pedidos de Clientes</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">N° de Pedido</th>
                                <th class="center">Pedido a Producir</th>
                                <th class="center">Cliente</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Usuario</th>
                                <th class="center">Estado</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                if(isset($codigo_materia)){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_pedidos WHERE cod_pedi = $codigo_materia
                                    ORDER BY cod_pedi ASC")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_pedidos ;")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $cod = $data['cod_pedi'];
                                    $descri_pedi = $data['descri_pedi'];
                                    $nom_cli = $data['nom_cli'];
                                    $name_user = $data['name_user'];
                                    $fecha = $data['fecha'];
                                    $hora = $data['hora'];
                                    $estado = $data['estado'];
     
     
     
                                    echo "<tr>
                                    <td class='center'>$cod</td>
                                    <td class='center'>$descri_pedi</td>
                                    <td class='center'>$nom_cli</td>
                                    <td class='center'>$fecha</td>
                                    <td class='center'>$hora</td>
                                    <td class='center'>$name_user</td>
                                    <td class='center'>$estado</td>
                                            </tr>
                                                
                                            ";
                                
                                }
                            ?>
                        </tbody>
                        <!------------------------------------------->
                        </table>
                  </section>

                  <section class="content-header">
                        
                    

                        <table id="dataTables1" class="table table-bordered table-striped table-hover">

                        <!------------------------------------------->
                        <h2>Detalles Pedidos de Clientes</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">N° de Pedido</th>
                                <th class="center">Producto</th>
                                <th class="center">Part Number</th>
                                <th class="center">Cantidad</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                if(isset($codigo_materia)){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_pedi_cli WHERE cod_pedi = $codigo_materia
                                    ORDER BY cod_pedi ASC")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_pedi_cli ;")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }

                                while($data2 = mysqli_fetch_assoc($query)){
                                    $codigo1= $data2['cod_pedi'];
                                    $descrip_producto= $data2['descrip_producto'];
                                    $part_number= $data2['part_number'];
                                    $cantidad = $data2['cantidad'];
     
     
     
                                    echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='100' align='left'>$descrip_producto</td>
                                    <td width='100' align='center'>$part_number</td>
                                    <td width='150' align='center'>$cantidad</td>
                                            </tr>
                                                
                                            ";
                                
                                }
                            ?>
                        </tbody>
                        <!------------------------------------------->
                        </table>
                  </section>
                </div>
            </div>

        </div>
    </div>
</section>
                
                <section class="content-header">
                    
                </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Presupuesto</h2>
                        <h1>
    <i class="fa fa-folder icon-title"></i>Datos de Presupuesto
    <a class="btn btn-primary btn-social pull-right" href="?module=form_presupuesto&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar
    </a>
</h1>
                        <thead>
                            <tr>
                                <th class="center">N° de Presupuesto</th>
                                <th class="center">Desc. del Presupuesto</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM presupuesto")
                            or die('Error'.mysqli_error($mysqli));

                            while($data = mysqli_fetch_assoc($query)){
                               $cod = $data['cod_presu'];
                               $descri_presu = $data['descri_presu'];
                               $fecha = $data['fecha'];
                               $hora = $data['hora'];
                               $estado = $data['estado'];



                               echo "<tr>
                               <td class='center'>$cod</td>
                               <td class='center'>$descri_presu</td>
                               <td class='center'>$fecha</td>
                               <td class='center'>$hora</td>
                               <td class='center'>$estado</td>
                               <td class='center' width='80'>
                               <div>";?>
                                                    
           <!-- <?php
                                    if ($data['estado']=='aprobado') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="bloqueado" style="margin-right:5px" 
                            class="btn btn-warning btn-sm" href="modules/presupuesto/proses.php?act=anular&cod_presu=<?php echo $data['cod_presu'];?>&cod_pedi=<?php echo $data['cod_pedi'];?>">
                            <i class="glyphicon glyphicon-remove"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="aprobado" style="margin-right:5px" 
                            class="btn btn-success btn-sm" href="modules/presupuesto/proses.php?act=on&cod_presu=<?php echo $data['cod_presu'];?>&cod_pedi=<?php echo $data['cod_pedi'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
                            <?php
                          }
                          ?>!-->
                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de compra" class="btn btn-warning btn-sm"
                              href="modules/presupuesto/print.php?act=imprimir&cod_presu=<?php echo $data['cod_presu']; ?>" target="_blank">
                                <i style="color:#000" class="fa fa-print"></i>
                              </a>
                                <?php echo "</div>
                                </td>
                                </tr>" ?>
                            <?php }                               
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>