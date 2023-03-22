<?php 
session_start();
$session_id = session_id();
if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['cantidad'])){$cantidad = $_POST['cantidad'];}
if(isset($_POST['precio_costo_'])){$precio_costo_ = $_POST['precio_costo_'];}

require_once '../config/database.php';

if(!empty($id) and !empty($cantidad) and !empty($precio_costo_)){
    $insert_tmp = mysqli_query($mysqli, "INSERT INTO tmp3 (id_manufactura, cantidad_tmp, precio_tmp, session_id) 
    VALUES('$id', '$cantidad', '$precio_costo_','$session_id')");
}
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $delete=mysqli_query($mysqli, "DELETE FROM tmp3 WHERE id_tmp3='".$id."'");
}
?>
<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
        <th>Código</th>
        <th>Descripcion Manufactura</th>
        <th>Tipo de Manufactura</th>
        <th><span class="pull-right">Cantidad</span></th>
        <th><span class="pull-right">Precio</span></th>
        <th style="width: 36px;"></th>
    </tr>
    <?php 
        $suma_total=0;
        $sql=mysqli_query($mysqli, "SELECT * FROM manufactura, tmp3 WHERE manufactura.cod_manu=tmp3.id_manufactura and tmp3.session_id='".$session_id."'");
        while($row=mysqli_fetch_array($sql)){
            $id_tmp3=$row['id_tmp3'];
            $codigo_manufactura=$row['cod_manu'];
            $descri_manufactura=$row['descri_manu'];
            $tipo_manufactura=$row['tipo_manu'];
            $cantidad=$row['cantidad_tmp'];


            $precio_costo_=$row['precio_tmp'];
            $precio_costo_f=number_format($precio_costo_); //Formatear una variable (Poner ,)
            $precio_costo_r=str_replace(",","",$precio_costo_f);//Reemplazar la ,
            $precio_total=$precio_costo_r*$cantidad;
            $precio_total_f=number_format($precio_total);
            $precio_total_r=str_replace(",","",$precio_total_f);
            $suma_total+=$precio_total_r; //Sumador total
            ?>
            <tr>
                <td><?php echo $codigo_manufactura; ?></td>
                <td><?php echo $descri_manufactura; ?></td>
                <td><?php echo $tipo_manufactura; ?></td>
                <td><span class="pull-right"><?php echo $cantidad; ?></span></td>
                <td><span class="pull-right"><?php echo $precio_total_f; ?></span></td>
                <td><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp3; ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
            </tr>
       <?php }           
    ?>
            <tr>
                <input type="hidden" class="form-control" name="suma_total" value="<?php echo $suma_total; ?>">
                <?php if(empty($codigo_manufactura)){
                    $codigo_manufactura=0;
                }else {
                    $codigo_manufactura;
                } ?>
                <input type="hidden" class="form-control" name="codigo_manufactura" value="<?php echo $codigo_manufactura; ?>">
                <?php if(empty($cantidad)){
                    $cantidad=0;
                }else {
                    $cantidad;
                } ?>
                <input type="hidden" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>">
                <td colspan=4><span class="pull-right">Total Gs.</span></td>
                <td><stron><span class="pull-right"><?php echo number_format($suma_total); ?></span></strong></td>
            </tr>
</table>