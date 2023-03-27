<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){
        if(isset($_POST['Guardar'])){
                 $codigo = $_POST['codigo'];
                $total_iva=0;

                $precio= $_POST['precio'];
                $iva= $_POST['iva'];
                $proveedor=$_POST['prv'];
                $total_iva= $precio / $iva;
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_registro ( ped_cod, presu_cod , iva ,prv_cod, total_iva) 
                                                        VALUES ( $codigo, $precio, $iva, $proveedor, $total_iva)")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar orden
                
           // }
            //Insertar cabecera de orden
            //Definir variable
            $orde_compra = $_POST['orden_com'];
            $des_regis = $_POST['registro'];
            $usuario = $_POST['usuario'];
            $_fecha=$_POST['fecha'];
            $estado = $_POST['estado_'];
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO registrar_compra (ped_cod, ped_descri , ped_fecha, id_user, estado, ord_cod)
            VALUES ($codigo, '$des_regis','$_fecha', '$usuario', '$estado', $orde_compra)")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=registrar_compras&alert=1");
            } else {
                header("Location: ../../main.php?module=registrar_compras&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_costos'])){
            $codigo = $_GET['cod_costos'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE costos SET estado='anulado' WHERE cod_costos=$codigo")
            or die('Error'.mysqli_error($mysqli));

            //Consultar detalle de compra con el código que llegó por get
           
            if($query){
                header("Location: ../../main.php?module=costos&alert=2");
            } else {
               header("Location: ../../main.php?module=costos&alert=3");
            }
       }
    }


}
?>