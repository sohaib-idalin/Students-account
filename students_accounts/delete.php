<?php session_start(); 
if(!isset($_POST['submit'])){ 
    header("Location: index.php");
    exit;} 
include_once 'connexion.php' ; 
$id=$_POST['id'];
$sql = "SELECT photo FROM eleves where id = '$id'  ";
$result=mysqli_query ($connex,$sql) ;
$row=mysqli_fetch_assoc($result);
$file="./photo/".$row['photo'];
unlink($file);
$sql ="DELETE FROM eleves WHERE id = '$id'";
mysqli_query ($connex,$sql) ;
$sql ="DELETE FROM comptes WHERE id = '$id'";
mysqli_query ($connex,$sql) ;


header("Location: admincompte.php");
    
?>