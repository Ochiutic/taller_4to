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
            

            //Insertar detalle de compra
            $sql=mysqli_query($mysqli, "SELECT * FROM productos, tmp WHERE productos.cod_producto=tmp.id_productos");
            while($row = mysqli_fetch_array($sql)){
                $cod_producto= $row['id_productos'];
                $codigo_productos= $row['cod_producto'];
                $cantidad= $row['cantidad_tmp'];
                $operarios= $_POST['operarios'];
                $sectores= $_POST['sectores'];

                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_orden (cod_orden, cod_producto, cantidad, id_operario, cod_sector) 
                                                        VALUES ( $cod_producto, $codigo, $cantidad, $operarios, $sectores)")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar orden
                
            }
            //Insertar cabecera de orden
            //Definir variable
            $descri_orden = $_POST['descri_orden'];
            $presup = $_POST['presup'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado_ ='activo';
            $fecha_ini= $_POST['inicio'];
            $fecha_fin= $_POST['fin'];
            
            
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO orden_produccion (cod_orden, descri_orden, fecha, hora, estado_, cod_presu, 
            fecha_ini, fecha_fin)
            VALUES ($codigo, '$descri_orden','$fecha', '$hora', '$estado_', $presup, '$fecha_ini', '$fecha_fin' )")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=orden_produccion&alert=1");
            } else {
                header("Location: ../../main.php?module=orden_produccion&alert=3");
            }
        }
    }

    /*elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_orden'])){
            $codigo = $_GET['cod_orden'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_='anulado' WHERE cod_orden=$codigo")
            or die('Error'.mysqli_error($mysqli));

            //Consultar detalle de compra con el código que llegó por get
           
            if($query){
                header("Location: ../../main.php?module=orden_produccion&alert=2");
            } else {
               header("Location: ../../main.php?module=orden_produccion&alert=3");
            }
       }
    }*/

    elseif ($_GET['act']=='on') {
        if (isset($_GET['cod_orden'])) {
            
            $cod_orden = $_GET['cod_orden'];
            $cod_pedi = $_GET['cod_pedi'];
            $estado_ = "activo";
            $estado = "activo";

        
            $query = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_  = '$estado_'
                                                         WHERE cod_orden = '$cod_orden'")
                                            or die('error: '.mysqli_error($mysqli));
            $query2 = mysqli_query($mysqli, "UPDATE pedidos SET estado  = '$estado'
                                            WHERE cod_pedi = '$cod_pedi'")
            or die('Error : '.mysqli_error($mysqli));

  
            if ($query) {
               
                header("location: ../../main.php?module=orden_produccion&alert=5");
            }
        }
    }


    elseif($_GET['act']=='anular'){
        if (isset($_GET['cod_orden'])) {
            
            $cod_orden = $_GET['cod_orden'];
            $cod_pedi = $_GET['cod_pedi'];
            $estado  = "anulado";
        
            $query = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_  = '$estado'
                                                             WHERE cod_orden = '$cod_orden'")
                                            or die('Error : '.mysqli_error($mysqli));
            
            $query2 = mysqli_query($mysqli, "UPDATE pedidos SET estado  = '$estado'
                                                    WHERE cod_pedi = '$cod_pedi'")
            or die('Error : '.mysqli_error($mysqli));

        
            if ($query) {
              
                header("location: ../../main.php?module=orden_produccion&alert=4");
            }
        }
    }


}
?>