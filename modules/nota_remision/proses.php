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
               $pedido = $_POST['pedido'];
               $materia= $_POST['materia'];
               $cantidad= $_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_nota_remision (cod_nota, ped_cod, cod_materia, cantidad) 
                                                        VALUES ( $codigo, $pedido, $materia, $cantidad)")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar orden
                
            
            



                $nota = $_POST['nota'];
                $fecha = $_POST['fecha'];
                $usuario = $_POST['usuario'];
                $estado ='activo';
                $query = mysqli_query($mysqli, "INSERT INTO nota_remision (cod_nota, descrip_nota, id_user, fecha, estado)
                VALUES ($codigo,'$nota', '$usuario','$fecha', '$estado')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=nota_remision&alert=1");
                }else{
                    header("Location: ../../main.php?module=nota_remision&alert=4");
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