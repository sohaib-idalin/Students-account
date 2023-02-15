<?php session_start(); 
if(isset($_POST['decx'])){ session_unset();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>espace_admin</title> 
</head>
<body>
    <?php if(isset($_SESSION['admin']) ){
        header("Location: admincompte.php");
        exit;
    }
    
     ?>
<a class="nu" href="index.php">page d'accueil</a>

<br>
       
<center>
            <p class="ensat">espace admin</p>
        
            <form action="admincompte.php" method="POST" >
                <p class="name" >Username : </p>
                <input type="text" class="info" name="username" required value="<?php if(isset($_SESSION['log'])){ echo $_SESSION['log'];} ?>"> 
                <br>
                <p class="mp">Mot de passe : </p>
                <input type="password" class="info" name="password" required> <br><br><br>
                <input class="submit"  type="submit" name="submit" value="Login">
                <div><?php if(isset($_SESSION['mess'])){
                    echo $_SESSION['mess'];
                    unset($_SESSION['mess']);
                } ?></div>
            </form>
            
        </center> 
</body>
</html>