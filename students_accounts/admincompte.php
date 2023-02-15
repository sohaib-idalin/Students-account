<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincompte.css">
    <title>espace admin</title>
</head>
<body>
<div><?php if(isset($_SESSION['mess'])){
                    echo $_SESSION['mess'];
                    unset($_SESSION['mess']);} ?></div>
    <?php
    include_once 'connexion.php' ;
    $user="sohaib";
    $pass="idalin";
    
    if(isset($_SESSION['admin']) ){
        
        goto D;
    }
    

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
    
        


        if($username==$user && $password==$pass) // nom d'utilisateur et mot de passe correctes
        { $_SESSION['admin']= 1;
          
            D:
            $requete = "SELECT * FROM eleves";
            $result = mysqli_query($connex,$requete);
            
            echo "<form action='admin.php' method='post'> <input class='decx' type='submit' name='decx' value='Deconnexion'></form>
            <h1>:LISTE DES ETUDIANT:</h1>";
            
            echo "<center><table >";
            echo "<tr>
            <th>PHOTO</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>CNE</th>
            <th>VILLE</th>
            <th>EMAIL</th>
            <th>TEL</th>
            <th>ETAT</th>
            <th>UPDATE</th>
            <th>DELETE</th>
            </tr>";
            while($row= mysqli_fetch_assoc($result)){
                if($row['etat']==0){$act= 'activer';}else{$act= 'desactiver';}
                echo "<tr class='data'>
                <td><img  alt=\"image\" src=\"./photo/".$row['photo']."\" ></td>
                <td>".$row['nom']."</td>
                <td>".$row['prenom']."</td>
                <td>".$row['cne']."</td>
                <td>".$row['ville']."</td>
                <td>".$row['email']."</td>
                <td>".$row['tel']."</td>
                <td><form action='activation.php' method='POST'> <input type='hidden' name='id' value='".$row['id']."'><input class='act' type='submit' name='submit' value='$act'></form></td>
                <td><form action='update.php' method='POST'> <input type='hidden' name='id' value='".$row['id']."'><input class='update' type='submit' name='submit' value='update'></form></td>
                <td><form action='delete.php' method='POST'> <input type='hidden' name='id' value='".$row['id']."'><input class='delete' type='submit' name='submit' value='delete'></form></td>
                
                </tr>";
            }
            echo "</table></center>";
        mysqli_close($connex);
            

        }
        else
        {   $_SESSION['mess']="incorrect username or password";
            $_SESSION['log']=$username;
            header("Location: admin.php");
            exit;
            
        }
    
    }
    else{
        header("Location: index.php");
        exit;
    }
    
    



    ?>
    



</div>
</body>
</html>