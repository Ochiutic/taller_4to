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
            $sql=mysqli_query($mysqli, "SELECT * FROM materia_prima, tmp1 WHERE materia_prima.cod_materia=tmp1.id_materia");
            while($row = mysqli_fetch_array($sql)){
                $cod_materia= $row['id_materia'];
                $codigo_materia= $row['cod_materia'];
                $cantidad= $row['cantidad_tmp'];
                $depo= $_POST['deposito'];

                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_pmat (cod_pmat, cod_materia, cantidad, cod_deposito) 
                                                        VALUES ( $cod_materia, $codigo_materia, $cantidad, $depo)")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar orden
                
            }
            //Insertar cabecera de orden
            //Definir variable
            
            $descri_pmat = $_POST['descri_pmat'];
            $presu = $_POST['presu'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado ='activo';
            
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO pedido_material (cod_pmat, descri_pmat, fecha, hora, estado, cod_presu)
            VALUES ($codigo, '$descri_pmat','$fecha', '$hora', '$estado', $presu)")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=pedido_material&alert=1");
            } else {
                header("Location: ../../main.php?module=pedido_material&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_pmat'])){
            $codigo = $_GET['cod_pmat'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE pedido_material SET estado='anulado' WHERE cod_pmat=$codigo")
            or die('Error'.mysqli_error($mysqli));

            //Consultar detalle de compra con el código que llegó por get
           
            if($query){
                header("Location: ../../main.php?module=pedido_material&alert=2");
            } else {
               header("Location: ../../main.php?module=pedido_material&alert=3");
            }
       }
    }


}
?>