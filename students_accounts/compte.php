<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="comptestyle.css">
    <title>espace etuduant</title>
</head>
<body>
    
    <?php
    include_once 'connexion.php' ;
    
    if(isset($_SESSION['id']) ){
        $id=$_SESSION['id'];
        goto D;
    }
    

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
    
        $requete = "SELECT id FROM comptes where user = '$username' and pass = '$password' ";
        $result = mysqli_query($connex,$requete);
        $resultcheck = mysqli_num_rows($result);
        $row= mysqli_fetch_assoc($result);


        if($resultcheck>0) // nom d'utilisateur et mot de passe correctes
        { $_SESSION['id']= $row['id'];
          $id=$row['id'];
          $_SESSION['log']=$username;
            
          
          
          D:

            $requete = "SELECT * FROM eleves where id = '$id'  ";
            $result = mysqli_query($connex,$requete);
            $row= mysqli_fetch_assoc($result);
            if($row['etat']==0){
                session_unset();
                $_SESSION['mess']="votre compte n'est pas encore active";
                $_SESSION['log']=$username;
                header("Location: index.php");
                exit;
            }
            echo "<form action='index.php' method='post'> <input type='submit' name='decx' value='Deconnexion'></form>
            
            <h1>:votre espace:</h1>
            <br><div class=\"cont\">
            <P>NOM:</P> <div class=\"info\"> ".$row['nom']." </div> <div class=\"photo\" ><img  alt=\"image\" src=\"./photo/".$row['photo']."\" ><br> <p class='username'>".$row['user']." </p></div>
            <P>PRENOM:</P><div class=\"info\"> ".$row['prenom']."</div>
            <P>CNE:</P><div class=\"info\"> ".$row['cne']." </div>
            <P>VILLE:</P><div class=\"info\"> ".$row['ville']." </div><div></div>
            <P>EMAIL:</P><div class=\"info\"> ".$row['email']." </div><div></div>
            <P>TEL:</P><div class=\"info\"> ".$row['tel']." </div><div></div>";

        }
        else
        {   $_SESSION['mess']="incorrect username or password";
            $_SESSION['log']=$username;
            header("Location: index.php");
            exit;
            
        }
    
    }
    else{
        header("Location: index.php");
        exit;
    }
    
    mysqli_close($connex);



    ?>



</div>
</body>
</html>