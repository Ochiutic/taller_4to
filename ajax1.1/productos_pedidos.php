<?php
require_once '../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli, (strip_tags($_REQUEST['x'],ENT_QUOTES)));
    $aColumns= array('cod_producto', 'descrip_producto','part_number');
    $sTable="productos";
    $sWhere= "";
    if($_GET['x'] != ""){
        $sWhere= "WHERE (";
        for ($i=0; $i<count($aColumns); $i++){
            $sWhere .=$aColumns[$i]." LIKE '%".$x."%' OR ";
        }
        $sWhere = substr_replace($sWhere, "", -3);
        $sWhere .= ')';
    }
    include 'paginacion.php';
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 5;
    $adjacents = 4;
    $offset = ($page -1) * $per_page;

    $count_query = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable $sWhere");
    $row=mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows/$per_page);
    $reload='./index.php';

    $sql = "SELECT * FROM $sTable $sWhere LIMIT $offset, $per_page";
    $query = mysqli_query($mysqli,$sql);

    if($numrows>0){ ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
            <tr class="warning">
                    <th>Código</th>
                    <th>Descripcion</th>
                     <th>Orden de Produccion</th>
                    <th><span class="pull-right">Cantidad</span></th>
                    <th style="width:36px;">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $id_materia=$row['cod_producto'];
                    $descrip_productos=$row['descrip_producto'];

                    $part_number=$row['part_number'];
                         ?>
                <tr>
                    <td><?php echo $id_materia; ?></td>
                    <td><?php echo $descrip_productos; ?></td>
                    <td><?php echo $part_number; ?></td>
                    <td class="col-xs-1">
                    <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_materia;?>" value="1">
                        </div>
                        </td>
                    <td>
                        <span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_materia; ?>')"><i class="glyphicon glyphicon-plus"></i></a></span>
                    </td>
                </tr>    
                <?php }
                ?>
                <tr>
                    <td colspan=5><span class="pull-right">
                    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </span></td>
                </tr>
            </table>
        </div>

                <?php }
}
?>