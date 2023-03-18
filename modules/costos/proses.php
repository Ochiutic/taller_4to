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
            //$sql=mysqli_query($mysqli, "SELECT * FROM manufactura");
           // while($row = mysqli_fetch_array($sql)){
                $cod_manu=$_POST['cod_manu'];
                $precio=$_POST['precio'];
                $cantidad=$_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_costos(cod_costos, cod_manu , cantidad, precio) 
                                                        VALUES ( $codigo, $cod_manu, $cantidad, $precio)")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar orden
                
           // }
            //Insertar cabecera de orden
            $suma_total=0;
            //Definir variable
            $cod_orden = $_POST['cod_orden'];
            $cod_pmat = $_POST['cod_pmat'];
            $descri_costos = $_POST['descri_costos'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado ='activo';
            $suma_total= $precio * $cantidad;
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO costos (cod_costos, descri_costos , fecha, hora, estado, cod_orden, cod_pmat, total)
            VALUES ($codigo, '$descri_costos','$fecha', '$hora', '$estado', $cod_orden, $cod_pmat,  $suma_total)")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=costos&alert=1");
            } else {
                header("Location: ../../main.php?module=costos&alert=3");
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