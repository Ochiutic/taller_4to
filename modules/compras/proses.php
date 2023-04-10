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

               //Insertar detalle de compra
               $materia = $_POST['materia'];
               $depo= $_POST['depo'];
               $cantidad= $_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_pedido_compra (ped_cod, cod_materia, cod_deposito) 
                                                        VALUES ( $codigo, $materia, $depo)")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar orden
                
            
            



                $descrip_com = $_POST['descrip_com'];
                $fecha = $_POST['fecha'];
                $estado ='activo';
                $sucursal = $_POST['sucursal'];
                $proveedor = $_POST['proveedor'];
                $query = mysqli_query($mysqli, "INSERT INTO pedido_compra (ped_cod, descrip_com, fecha, estado, cod_sucursal, prv_cod)
                VALUES ($codigo,'$descrip_com','$fecha', '$estado', '$sucursal', '$proveedor')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=compras&alert=1");
                }else{
                    header("Location: ../../main.php?module=compras&alert=4");
                }
            }
        } 
        
        //Insertar Stock
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
     //Actualizar Stock
     $query= mysqli_query($mysqli, "SELECT * FROM stock WHERE cod_materia = $materia AND cod_deposito = $depo ")
     or die('Error'.mysqli_error($mysqli));
     if($count = mysqli_num_rows($query)== 0)
     //Insertar
     $insertar_stock= mysqli_query($mysqli, "INSERT INTO stock (cod_materia, cod_deposito, cantidad)
     VALUES ($materia, $depo, $cantidad )")
     or die('Error'.mysqli_error($mysqli));
     //actualizar stock
     $actualizar_stock= mysqli_query($mysqli, "UPDATE stock SET cantidad = cantidad
     WHERE cod_materia= $materia
     AND cod_deposito= $depo")
     or die('Error'.mysqli_error($mysqli))
?>