<?php
require_once '../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli, (strip_tags($_REQUEST['x'],ENT_QUOTES)));
    $aColumns= array('cod_materia', 'descri_materia','tipo_materia');
    $sTable="materia_prima";
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
                    <th>Descripcion de Material</th>
                    <th>Tipo de Material</th>
                    <th><span class="pull-right">Cantidad</span></th>
                     <th style="width:36px;">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $id_materia=$row['cod_materia'];
                    $dpmateria_nombre=$row['descri_materia'];
                    $tipo_materia_nombre=$row['tipo_materia'];
                         ?>
                <tr>
                    <td><?php echo $id_materia; ?></td>
                    <td><?php echo $dpmateria_nombre; ?></td>
                    <td><?php echo $tipo_materia_nombre; ?></td>
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