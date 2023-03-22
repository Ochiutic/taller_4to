<?php

session_start();
$session_id = session_id();
if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['cantidad'])){$cantidad = $_POST['cantidad'];}

require_once '../config/database.php';

if(!empty($id) and !empty($cantidad)){
    $insert_tmp1 = mysqli_query($mysqli, "INSERT INTO tmp1 (id_materia, cantidad_tmp, session_id)  
    VALUES('$id', '$cantidad','$session_id')");
}

if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $delete=mysqli_query($mysqli, "DELETE FROM tmp1 WHERE id_tmp1='".$id."'");
}

?>

<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
    <th>Código</th>
    <th>Descripcion de Material</th>
    <th>Tipo de Material</th>
     <th><span class="pull-right">Cantidad</span></th>
     <th style="width:36px;">Seleccionar</th>
        <th style="width: 36px;"></th>
    </tr>

    <?php
        $suma_total=0;
        $sql=mysqli_query($mysqli,"SELECT * FROM materia_prima, tmp1 WHERE materia_prima.cod_materia=tmp1.id_materia and tmp1.session_id='".$session_id."'");

        while($row=mysqli_fetch_array($sql)){
            $id_tmp=$row['id_tmp1'];
            $codigo_materia=$row['cod_materia'];
            $descri_materia=$row['descri_materia'];
            $tipo_materia=$row['tipo_materia'];
            $cantidad=$row['cantidad_tmp'];

            $descri_materia=$row['descri_materia'];
            $sql_dmateria = mysqli_query($mysqli, "SELECT descri_materia FROM materia_prima WHERE descri_materia='$descri_materia'");
            $rw_dmateria= mysqli_fetch_array($sql_dmateria);
            $dpmateria_nombre= $rw_dmateria['descri_materia'];

            $tipo_materia=$row['tipo_materia'];
            $sql_tipo_materia= mysqli_query($mysqli, "SELECT tipo_materia FROM materia_prima WHERE tipo_materia='$tipo_materia'");
            $rw_tipo_materia= mysqli_fetch_array($sql_tipo_materia);
            $tipo_materia_nombre= $rw_tipo_materia['tipo_materia'];
            ?>

<tr>
                <td><?php echo $codigo_materia; ?></td>
                <td><?php echo $dpmateria_nombre; ?></td>
                <td><?php echo $tipo_materia_nombre; ?></td>
                
                <td><span class="pull-right"><?php echo $cantidad; ?></span></td>
                <td><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp; ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
            </tr>


        <?php }
    ?>

</table>