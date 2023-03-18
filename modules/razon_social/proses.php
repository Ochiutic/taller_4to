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
                $descrip_razon = $_POST['descrip_razon'];
                $nom_cli = $_POST['nom_cli'];
                $ci_ruc = $_POST['ci_ruc'];
    
                $query = mysqli_query($mysqli, "INSERT INTO razon_social (cod_razon, descrip_razon, nom_cli, ci_ruc)
                VALUES ($codigo, '$descrip_razon', '$nom_cli', $ci_ruc)") or die(header("Location: ../../main.php?module=razon_social&alert=5"));
                
                if($query){
                    header("Location: ../../main.php?module=razon_social&alert=1");
                } else {
                    header("Location: ../../main.php?module=razon_social&alert=4");
                }
    
            }
        }
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $codigo = $_POST['codigo'];
                    $descrip_razon = $_POST['descrip_razon'];
                    $nom_cli = $_POST['nom_cli'];
                    $ci_ruc = $_POST['ci_ruc'];
                    
                    $query = mysqli_query($mysqli, "UPDATE razon_social SET descrip_razon = '$descrip_razon',
                                                                             nom_cli = '$nom_cli',
                                                                             ci_ruc = '$ci_ruc'
                                                                        WHERE cod_razon = $codigo")
                                                                        or die('Error'.mysqli_error($mysqli));
    
                    if($query){
                    header("Location: ../../main.php?module=razon_social&alert=2");
                    } else {
                    header("Location: ../../main.php?module=razon_social&alert=4");
                    }                                                    
                }
            }
    
        }
        elseif($_GET['act']=='delete'){
            if(isset($_GET['cod_razon'])){
                $codigo = $_GET['cod_razon'];
    
                $query = mysqli_query($mysqli, "DELETE FROM razon_social
                                                WHERE cod_razon = $codigo")
                                                or die('Error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=razon_social&alert=3");
                } else {
                    header("Location: ../../main.php?module=razon_social&alert=4");
                }
            }
        }
    
    
    }
?>