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
                $descri_sucursal = $_POST['descri_sucursal'];

                $query = mysqli_query($mysqli, "INSERT INTO sucursal (cod_sucursal, descri_sucursal)
                VALUES ($codigo, '$descri_sucursal')") or die(  header("Location: ../../main.php?module=sucursal&alert=5"));
                if($query){
                    header("Location: ../../main.php?module=sucursal&alert=1");
                }else{
                    header("Location: ../../main.php?module=sucursal&alert=4");
                }
            }
        } 
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $codigo = $_POST['codigo']; 
                    $descri_sucursal = $_POST['descri_sucursal'];
                    $query = mysqli_query($mysqli, "UPDATE sucursal SET descri_sucursal = '$descri_sucursal'
                                                                            WHERE cod_sucursal = $codigo")
                                                                              or die('Error'.mysqli_error($mysqli));
                    if($query){
                        header("Location: ../../main.php?module=sucursal&alert=2");
                    }else{
                        header("Location: ../../main.php?module=sucursal&alert=4");
                    }
                }
            }
        }
        elseif($_GET['act']=='delete'){
            if(isset($_GET['cod_sucursal'])){
                $codigo = $_GET['cod_sucursal'];

                $query = mysqli_query($mysqli, "DELETE FROM sucursal
                                                WHERE cod_sucursal = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=sucural&alert=3");
                }else{
                    header("Location: ../../main.php?module=sucursal&alert=4");
                }
            }
        }
    }
?>