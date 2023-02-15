<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updatestyle.css">
    <title>update</title>
</head>
<body>  
    
<?php if(!isset($_POST['submit']) ){header("Location: index.php"); exit;} 

    include_once 'connexion.php' ;
    $id=$_POST['id'];
    $_SESSION['idforupdate']=$id;
    $requete = "SELECT * FROM eleves where id = '$id'  ";
    $result = mysqli_query($connex,$requete);
    $row= mysqli_fetch_assoc($result);
       
 ?>
    
<a href="admincompte.php">retour au compte</a>    
<h1>:update:</h1>
<br><form action="./update2.php" method="POST" enctype="multipart/form-data">
<P>NOM:</P> <input class="text" required type="text" name="nom" value="<?php echo $row['nom'];?>"> <div class="photo" > <?php echo "<img  alt=\"image\" src=\"./photo/".$row['photo']."\" >"; ?> <input type="file" accept="image/png, image/jpeg" name="photo" ></div>
<P>PRENOM:</P><input class="text" required type="text" name="prenom" value="<?php echo $row['prenom'];?>">
<P>CNE:</P><input class="text" required type="text" name="cne" value="<?php echo $row['cne'];?>">
<P>VILLE:</P><input class="text" required type="text" name="ville" value="<?php echo $row['ville'];?>"><div></div>
<P>EMAIL:</P><input class="text" required type="email" name="email" value="<?php echo $row['email'];?>"><div></div>
<P>TEL:</P><input class="text" required type="tel" pattern="[0-9]{10}" name="tel" value="<?php echo $row['tel'];?>"><div></div>
<P>USERNAME:</P><input class="text" required type="text" name="username" value="<?php echo $row['user'];?>"><div></div>
<P>PASSWORD:</P><input class="text" type="password" name="password" placeholder="* * * * * * * * * *"><div></div>
<input class="submit" type="submit" name="submit" value="confirmer">

    </form>
    <br>
    <p style="color: red;">*les champs (photo et password) ne sont pas requises</p>
    <p style="color: red;">(s'ils sont remplient ils seront mise a jour) </p>
</body>
</html>