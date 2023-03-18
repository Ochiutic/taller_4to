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
            $sql=mysqli_query($mysqli, "SELECT * FROM materia_prima, tmp WHERE materia_prima.cod_materia=tmp.id_materia");
            while($row = mysqli_fetch_array($sql)){
                $cod_materia= $row['id_materia'];
                $codt_materia= $row['cod_materia'];
                $cantidad= $row['cantidad_tmp'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_abastecimiento(cod_materia, cod_abastecimiento,
                cantidad) VALUES ( $cod_materia, $codigo, $cantidad)")
                or die('Error'.mysqli_error($mysqli));

                //Insertar abastecimiento
                $query = mysqli_query($mysqli, "SELECT * FROM stock WHERE cod_materia=$codigo") 
                or die('Error'.mysqli_error($mysqli));
                if($count = mysqli_num_rows($query)==0){
                    //Insertar
                    $insertar_stock = mysqli_query($mysqli, "INSERT INTO stock (cod_materia,cantidad)
                    VALUES ($codigo, $cantidad )")
                    or die('Error'.mysqli_error($mysqli));
                }else {
                    $actualizar_stock = mysqli_query($mysqli, "UPDATE stock SET cantidad = cantidad + $cantidad
                    WHERE cod_materia=$codigo")
                    or die('Error'.mysqli_error($mysqli));
                }
            }
            //Insertar cabecera de compra
            //Definir variable
            
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado='activo';
            $usuario = $_SESSION['id_user'];
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO abastecimiento (cod_abastecimiento, fecha, hora, id_user, estado)
            VALUES ($codigo, '$fecha', '$hora', $usuario, '$estado')")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=abastecimiento&alert=1");
            } else {
                header("Location: ../../main.php?module=abastecimiento&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_abastecimiento'])){
            $codigo = $_GET['cod_abastecimiento'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE abastecimiento SET estado='anulado' WHERE cod_abastecimiento=$codigo")
            or die('Error'.mysqli_error($mysqli));

            //Consultar detalle de compra con el código que llegó por get
            $sql = mysqli_query($mysqli, "SELECT * FROM detalle_abastecimiento WHERE cod_abastecimiento=$codigo");
            while($row = mysqli_fetch_array($sql)){
                $cod_materia = $row['cod_materia'];
                $cantidad = $row['cantidad'];

                $actualizar_stock = mysqli_query($mysqli, "UPDATE stock SET cantidad = cantidad - $cantidad
                WHERE cod_materia=$cod_materia")
                or die('Error'.mysqli_error($mysqli));
           }
            if($query){
                header("Location: ../../main.php?module=abastecimiento&alert=2");
            } else {
               header("Location: ../../main.php?module=abastecimiento&alert=3");
            }
       }
    }


}
?>