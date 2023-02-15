<?php session_start(); 
if(!isset($_POST['submit'])){header("Location: admincompte.php"); exit;}
include_once 'connexion.php' ;

$act=$_POST['submit'];
$id=$_POST['id'];

if($act=='activer'){
$sql ="UPDATE eleves
 SET etat = 1
 WHERE id = '$id'";
}else{
$sql ="UPDATE eleves
 SET etat = 0
WHERE id = '$id'";
}
mysqli_query($connex,$sql);
header("Location: admincompte.php");


?>