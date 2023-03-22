<?php 
session_start();
$session_id = session_id();
if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['precio_costo_'])){$precio_costo_ = $_POST['precio_costo_'];}

require_once '../config/database.php';

if(!empty($id) and !empty($cantidad) and !empty($precio_costo_)){
    $insert_tmp = mysqli_query($mysqli, "INSERT INTO tmp2 (id_pedidos, precio_tmp, session_id) 
    VALUES('$id', '$precio_costo_','$session_id')");
}
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $delete=mysqli_query($mysqli, "DELETE FROM tmp2 WHERE id_tmp2='".$id."'");
}
?>
<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
    <th>Código</th>
    <th>Producto</th>
    <th>cantidad</th>
    <th><span class="pull-right">Precio</span></th>
        <th style="width: 36px;"></th>
    </tr>
    <?php 
        $suma_total=0;
        $sql=mysqli_query($mysqli, "SELECT * FROM det_pedido_cli, tmp2 WHERE det_pedido_cli.cod_pedi=tmp2.id_pedidos and tmp2.session_id='".$session_id."'");
        while($row=mysqli_fetch_array($sql)){
            $id_tmp2=$row['id_tmp'];
            $cod_pedi=$row['cod_pedi'];
            $cod_producto=$row['cod_producto'];
            $cantidad=$row['cantidad'];


            $precio_costo_=$row['precio_tmp'];
            $precio_costo_f=number_format($precio_costo_); //Formatear una variable (Poner ,)
            $precio_costo_r=str_replace(",","",$precio_costo_f);//Reemplazar la ,
            $precio_total=$precio_costo_r*$cantidad;
            $precio_total_f=number_format($precio_total);
            $precio_total_r=str_replace(",","",$precio_total_f);
            $suma_total+=$precio_total_r; //Sumador total
            ?>
            <tr>
                <td><?php echo $cod_pedi; ?></td>
                <td><?php echo $cod_producto; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><span class="pull-right"><?php echo $precio_total_f; ?></span></td>
                <td><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp2; ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
            </tr>
       <?php }           
    ?>
            <tr>
                <input type="hidden" class="form-control" name="suma_total" value="<?php echo $suma_total; ?>">
                <?php if(empty($cod_pedi)){
                    $cod_pedi=0;
                }else {
                    $cod_pedi;
                } ?>
                <input type="hidden" class="form-control" name="codigo_manufactura" value="<?php echo $cod_pedi; ?>">
                <?php if(empty($cantidad)){
                    $cantidad=0;
                }else {
                    $cantidad;
                } ?>
                <td colspan=4><span class="pull-right">Total Gs.</span></td>
                <td><stron><span class="pull-right"><?php echo number_format($suma_total); ?></span></strong></td>
            </tr>
</table>