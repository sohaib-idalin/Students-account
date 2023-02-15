<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
</head>
<body>
    <?php if(isset($_POST['submit'])){ 
include_once 'connexion.php' ; 

$nom = $_POST['nom'] ;
$prenom = $_POST['prenom'] ;
$cne = $_POST['cne'] ;
$ville = $_POST['ville'] ;
$email = $_POST['email'] ;
$tel = $_POST['tel'] ;


$username = $_POST['username'] ;
$password = $_POST['password'] ; 

$sql = "INSERT INTO eleves(user,nom,prenom,cne,ville,email,tel,etat) VALUES ('$username','$nom' ,'$prenom','$cne','$ville','$email','$tel',0);";
$result = mysqli_query ($connex,$sql) ;
if($result==1){
    $file_tmp = $_FILES['photo']['tmp_name'];
    
    $requete = "SELECT id FROM eleves where user = '$username' ";
    $result = mysqli_query($connex,$requete);
    $row= mysqli_fetch_assoc($result);
    $id= $row['id'];
    $photo= $id.".png";
    move_uploaded_file($file_tmp,"photo/".$photo);
 $sql1 = "INSERT INTO comptes(id,user,pass) VALUES ('$id','$username' ,'$password' );";
 $sql2 ="UPDATE eleves
      SET photo = '$photo'
      WHERE id = '$id' ";
 mysqli_query ($connex,$sql1) ;
 mysqli_query ($connex,$sql2) ;

 $_SESSION['mess']="vous etes enregistrer avec succes";
 header("Location: index.php");
 exit;

}else{
    $_SESSION['mess']="username ou cne ou email deja utilise veuillez ressayer";
    header("Location: signup.php");
    exit;
}
}
else{
    header("Location: index.php");
    exit;
}


?>



</body>
</html>
