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
                $proveedor = $_POST['proveedor'];
                $cantidad=$_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_pedido_compra(ped_cod, cod_materia, prv_cod, cantidad) 
                                                        VALUES ( $codigo, $materia_prima,$proveedor, $cantidad)")
                or die('Error 22: '.mysqli_error($mysqli));



                $descrip_com = $_POST['descrip_com'];
                $fecha = $_POST['fecha'];
                $estado ='activo';
                $sucursal = $_POST['sucursal'];
                $query = mysqli_query($mysqli, "INSERT INTO pedido_compra (ped_cod, descrip_com, fecha, estado, cod_sucursal)
                VALUES ($codigo,'$descrip_com','$fecha', '$estado', '$sucursal')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=compras&alert=1");
                }else{
                    header("Location: ../../main.php?module=compras&alert=4");
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