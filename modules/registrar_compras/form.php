<?php
if ($_GET['form'] == 'add') { ?>
<section class= "content-header">
<h1>
<i class="fa fa-edit icon-title">Registrar y generar IVA de Compras</i>
</h1>
<ol class="breadcrumb">
            <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=registrar_compras"> Registrar y generar IVA de Compras</a></li>
            <li class="active"> Más</li>
</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                 <form role="form" class="form-horizontal" action="modules/registrar_compras/proses.php?act=insert"
                        method="POST">
                        <div class="box-body">
                            <?php
                        $query_id = mysqli_query($mysqli, "SELECT MAX(ped_cod) AS id FROM registrar_compra")
                                or die('error' . mysqli_error($mysqli));
                            $count = mysqli_num_rows($query_id);
                            if ($count <> 0) {
                                $data_id = mysqli_fetch_assoc($query_id);
                                $codigo = $data_id['id'] + 1;
                            } else {
                                $codigo = 1;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Codigo de Registro</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo;?>" readonly>
                                </div>
                                <label class="col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-2">
                                    <input type="text" name="usuario" class="form-control" value="<?php echo $_SESSION ['name_user']?>" readonly>
                                </div>
                                <label class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-2">
                                    <input type="text" name="estado_" class="form-control" value="pendiente" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Orden de compra Aprob.</label>
                                    <div class="col-sm-3">
                                       <select class="chosen-select" name="orden_com" data-placeholder="-- Seleccione la Orden --" autocomplete="off">
                                        <option value=""></option>
                                       <?php 
                                                $query_ordc = mysqli_query($mysqli,"SELECT ord_cod, ord_descrip
                                                FROM orden_compra
                                                ORDER BY ord_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_ord = mysqli_fetch_assoc($query_ordc)){
                                                    echo "<option value=\"$data_ord[ord_cod]\">$data_ord[ord_cod] | $data_ord[ord_descrip]</option>";
                                                }
                                            ?>
                                       </select>
                                    </div>
                                       <label class="col-sm-2 control-label">Descripcion de Registro</label>
                                       <div class="col-sm-3">
                                            <input type="text" class="form-control" name="registro" autocomplete="off" placeholder="Ingresa una Descripción" required>
                                        </div>                   
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 control-label">Proveedores</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="prv" data-placeholder="Seleccione Proveedor" autocomplete="off">
                                                <option value=""></option>
                                                <?php 
                                                $query_prv = mysqli_query($mysqli,"SELECT prv_cod, prv_razsoc
                                                FROM proveedor
                                                ORDER BY prv_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_prv = mysqli_fetch_assoc($query_prv)){
                                                    echo "<option value=\"$data_prv[prv_cod]\">$data_prv[prv_cod] | $data_prv[prv_razsoc]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Presupuesto Compra</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="precio" data-placeholder="-- Seleccione el Presupuesto" autocomplete="off">
                                            <option value=""></option>
                                            <?php 
                                                $query_presu = mysqli_query($mysqli,"SELECT presu_cod, precio
                                                FROM det_presu_prov
                                                ORDER BY presu_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_pre = mysqli_fetch_assoc($query_presu)){
                                                    echo "<option value=\"$data_pre[presu_cod]\">$data_pre[presu_cod] | $data_pre[precio]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</section>
<?php }?>