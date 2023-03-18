<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=pedidos">Pedidos</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Pedidos de Cliente
    <a class="btn btn-primary btn-social pull-right" href="?module=form_pedidos&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar Pedidos de Cliente
    </a>
</h1>
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
                <section class="content-header">
                    
                </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Recetas de Produccion.</h2>
                        <thead>
                            <tr>
                                <th class="center">N° de Pedido</th>
                                <th class="center">Pedido a Producir</th>
                                <th class="center">Cliente</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Usuario</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM v_pedidos ")
                            or die('Error'.mysqli_error($mysqli));

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
                               <td class='center' width='150'>
                               <div>";?>
                            <a data-toggle="tooltip" data-placement="top" title="Anular Pedido de Cliente" class="btn btn-danger btn-sm"
                             href="modules/pedidos/proses.php?act=anular&cod_pedi=<?php echo $data['cod_pedi']; ?>"
                             onclick = "return confirm('Estas seguro/a de anular <?php echo $data['descri_pedi']; ?>  <?php echo $data['nom_cli']; ?> <?php echo $data['fecha']; ?> <?php echo $data['hora']; ?> <?php echo $data['estado']; ?>?');">
                                <i style="color_#000" class="glyphicon glyphicon-trash "></i>
                             </a>

                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de Pedidos" class="btn btn-warning btn-sm"
                              href="modules/pedidos/print.php?act=imprimir&cod_pedi=<?php echo $data['cod_pedi']; ?>" target="_blank">
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