<?php 
session_start();
require_once "../../config/database.php";
    
    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3>";
    }
    else {
        if($_GET['act']=='insert'){
            if(isset($_POST['Guardar'])){
                $codigo = $_POST['codigo'];
                $descrip_sector = $_POST['descrip_sector'];
    
                $query = mysqli_query($mysqli, "INSERT INTO sector (cod_sector, descrip_sector)
                VALUES ($codigo, '$descrip_sector')") or die(header("Location: ../../main.php?module=sector&alert=5"));
                
                if($query){
                    header("Location: ../../main.php?module=sector&alert=1");
                } else {
                    header("Location: ../../main.php?module=sector&alert=4");
                }
    
            }
        }
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $codigo = $_POST['codigo'];
                    $descrip_sector = $_POST['descrip_sector'];
                    
                    
                    $query = mysqli_query($mysqli, "UPDATE sector SET descrip_sector = '$descrip_sector'
                                                                        WHERE cod_sector = $codigo")
                                                                        or die('Error'.mysqli_error($mysqli));
    
                    if($query){
                    header("Location: ../../main.php?module=sector&alert=2");
                    } else {
                    header("Location: ../../main.php?module=sector&alert=4");
                    }                                                    
                }
            }
    
        }
        elseif($_GET['act']=='delete'){
            if(isset($_GET['cod_sector'])){
                $codigo = $_GET['cod_sector'];
    
                $query = mysqli_query($mysqli, "DELETE FROM sector
                                                WHERE cod_sector = $codigo")
                                                or die('Error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=sector&alert=3");
                } else {
                    header("Location: ../../main.php?module=sector&alert=4");
                }
            }
        }
    
    
    }
?>