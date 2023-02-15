<?php session_start(); ?>
<?php 
if(!isset($_SESSION['admin'])){ 
    header("Location: index.php");
    exit;}
if(!isset($_POST['submit'])){ 
    header("Location: admincompte.php");
    exit;}

include_once 'connexion.php' ; 
$id=$_SESSION['idforupdate'];
    
    $nom = $_POST['nom'] ;
    $prenom = $_POST['prenom'] ;
    $cne = $_POST['cne'] ;
    $ville = $_POST['ville'] ;
    $email = $_POST['email'] ;
    $tel = $_POST['tel'] ;

    $username = $_POST['username'] ;
    
    

$sql ="UPDATE eleves
SET user = '$username',
  nom = '$nom',
  prenom = '$prenom',
  cne = '$cne',
  ville = '$ville',
  email = '$email',
  tel = '$tel'
WHERE id = '$id'";
$result = mysqli_query ($connex,$sql) ;

if($result){
    if(!empty($_POST['password'])){
      $password = ", pass = '". $_POST['password'] ."'";
    }else{$password =""; }
    
    $sql = "UPDATE comptes
    SET user = '$username'
         $password
    WHERE id = '$id' ";
mysqli_query ($connex,$sql) ;

if(!empty($_FILES['photo']['name'])){
    
    $file_tmp = $_FILES['photo']['tmp_name'];
    $photo= $id.".png";
    move_uploaded_file($file_tmp,"photo/".$photo);
    
    

}

 header("Location: admincompte.php");
 exit;

}
else
{
    $_SESSION['mess']="update failed:username ou cne ou email deja utilise veuillez ressayer";
    header("Location: admincompte.php");
    exit;
}


?>
