<?php 

session_start();
require_once "../../config/database.php";

if(empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else {
    if($_GET['act']=='insert'){
        if(isset($_POST['Guardar'])){
            $codigo = $_POST['codigo'];
            $descrip_producto = $_POST['descrip_producto'];
            $part_number = mysqli_real_escape_string($mysqli, trim($_POST['part_number']));

            $query = mysqli_query($mysqli, "INSERT INTO productos (cod_producto, descrip_producto, part_number)
            VALUES ($codigo, '$descrip_producto', '$part_number')") or die(header("Location: ../../main.php?module=productos&alert=5"));
            
            if($query){
                header("Location: ../../main.php?module=productos&alert=1");
            } else {
                header("Location: ../../main.php?module=productos&alert=4");
            }

        }
    }
    elseif($_GET['act']=='update'){
        if(isset($_POST['Guardar'])){
            if(isset($_POST['codigo'])){
                $codigo = $_POST['codigo'];
                $descrip_producto = $_POST['descrip_producto'];
                $part_number = $_POST['part_number'];
   
                
                $query = mysqli_query($mysqli, "UPDATE productos SET descrip_producto = '$descrip_producto',
                                                                     part_number = '$part_number'
                                                                    
                                                                    WHERE cod_producto = $codigo")
                                                                    or die('Error'.mysqli_error($mysqli));

                if($query){
                header("Location: ../../main.php?module=productos&alert=2");
                } else {
                header("Location: ../../main.php?module=productos&alert=4");
                }                                                    
            }
        }

    }
    elseif($_GET['act']=='delete'){
        if(isset($_GET['cod_producto'])){
            $codigo = $_GET['cod_producto'];

            $query = mysqli_query($mysqli, "DELETE FROM productos
                                            WHERE cod_producto = $codigo")
                                            or die('Error'.mysqli_error($mysqli));
            if($query){
                header("Location: ../../main.php?module=productos&alert=3");
            } else {
                header("Location: ../../main.php?module=productos&alert=4");
            }
        }
    }


}

?>