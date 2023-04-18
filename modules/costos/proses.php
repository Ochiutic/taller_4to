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

            //Detalle de costos de Orden

            $suma_total1=0;
                
                $orden=$_POST['cod_orden'];
                $precio=$_POST['precio_orden'];
                $cantidad=$_POST['detalle_orden'];
                $suma_total1= $precio * $cantidad;
                $total_orden= $suma_total1;
                $insert_orden = mysqli_query($mysqli, "INSERT INTO detalle_costos_orden(cod_costos, cod_orden , cantidad, precio_orden, total_orden) 
                                                        VALUES ( $codigo, $orden, $cantidad, $precio, '$total_orden')")
                or die('Error 22: '.mysqli_error($mysqli));

                //Detalle costo Pedido Material
                $suma_total2= 0;

                $pmaterial=$_POST['pmaterial'];
                $cantidad_materia=$_POST['cantidad_materia'];
                $precio_materia=$_POST['precio_materia'];
                $suma_total2= $precio_materia * $cantidad_materia;
                $total_materia= $suma_total2;
                $insert_material = mysqli_query($mysqli, "INSERT INTO det_costos_materia(cod_costos, cod_pmat , cantidad_materia, precio_materia, total) 
                                                        VALUES ( $codigo, $pmaterial, $cantidad_materia, $precio_materia, '$total_materia')")
                or die('Error 22: '.mysqli_error($mysqli));

                //Detalle costo de recetas

                $suma_total3= 0;

                $receta=$_POST['receta'];
                $cantidad_recetas=$_POST['cantidad_recetas'];
                $precio_receta=$_POST['precio_receta'];
                $suma_total3= $precio_receta * $cantidad_recetas;
                $total_receta= $suma_total3;
                $insert_recetas = mysqli_query($mysqli, "INSERT INTO det_costos_recetas(cod_recetas, descri , cantidad_receta, precio_receta, total_receta) 
                                                        VALUES ( $codigo, $receta, $cantidad_materia, $precio_materia, '$total_materia')")
                or die('Error 22: '.mysqli_error($mysqli));

                //Detalle de salario de operarios

                $suma_total4= 0;

                $sectores=$_POST['sectores'];
                $cantidad_ope=$_POST['cantidad_ope'];
                $salario=$_POST['salario'];
                $suma_total4= $cantidad_ope * $salario;
                $total_operario= $suma_total4;
                $insert_operarios = mysqli_query($mysqli, "INSERT INTO det_costos_salario(cod_sector, sectores , cantidad_sector, precio_salario, total_salario) 
                                                        VALUES ( $codigo, $receta, $cantidad_ope, $salario, '$total_operario')")
                or die('Error 22: '.mysqli_error($mysqli));
                
           
            //Definir variable
            $descri_costos = $_POST['descri_costos'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado ='activo';
            $total_costos= $total_orden + $total_materia + $total_receta + $total_operario;
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO costos (cod_costos, descri_costos , fecha, hora, estado, total)
            VALUES ($codigo, '$descri_costos','$fecha', '$hora', '$estado', $total_costos)")
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