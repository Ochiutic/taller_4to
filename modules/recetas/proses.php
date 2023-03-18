<?php 
    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
    }
    else{
        if($_GET['act']=='insert'){
            if(isset($_POST['Guardar'])){
                $codigo = $_POST['codigo']; 

                $materia_prima = $_POST['materia'];
                $cantidad=$_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_recetaS(cod_receta, cod_materia, cantidad) 
                                                        VALUES ( $codigo, $materia_prima, $cantidad)")
                or die('Error 22: '.mysqli_error($mysqli));



                $descri = $_POST['descri'];
                $tipo_receta = $_POST['tipo'];
                $producto = $_POST['producto'];
                $materia_prima = $_POST['materia'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $estado ='activo';
                $query = mysqli_query($mysqli, "INSERT INTO recetas (cod_recetas, descri, tipo_receta, fecha, hora, estado, cod_producto, cod_materia)
                VALUES ($codigo,'$descri','$tipo_receta','$fecha', '$hora', '$estado','$producto','$materia_prima' )") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=recetas&alert=1");
                }else{
                    header("Location: ../../main.php?module=recetas&alert=4");
                }
            }
        } 
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $descri_pedi = $_POST['descri_pedi'];
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];
                    $cod_razon = $_POST['cod_razon'];
                    $estado='activo';
                    $query = mysqli_query($mysqli, "UPDATE pedidos SET descri_pedi = '$descri_pedi',
                                                                            fecha =$fecha
                                                                            hora = $hora
                                                                            cod_razon = $cod_razon
                                                                        WHERE cod_pedi = $codigo")
                                                                        or die('error 29: '.mysqli_error($mysqli));
                    if($query){
                        header("Location: ../../main.php?module=pedidos&alert=2");
                    }else{
                        header("Location: ../../main.php?module=pedidos&alert=4");
                    }
                }
            }
        }
        elseif($_GET['act']=='anular'){
            if(isset($_GET['cod_pedi'])){
                $codigo = $_GET['cod_pedi'];

                $query = mysqli_query($mysqli, "UPDATE pedidos SET estado='anulado'
                                                WHERE cod_pedi = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=pedidos&alert=3");
                }else{
                    header("Location: ../../main.php?module=pedidos&alert=4");
                }
            }
        }
    }
?>