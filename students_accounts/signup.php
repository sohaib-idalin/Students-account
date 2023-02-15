<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signupstyle.css">
    <title>signup</title>
</head>
<body>  <div><?php if(isset($_SESSION['mess'])){
                    echo $_SESSION['mess'];
                    unset($_SESSION['mess']);} ?></div>
<a href="index.php">page d'acceuil</a>    
<h1>:inscription:</h1>
<br><form action="./signup2.php" method="POST" enctype="multipart/form-data">
<P>NOM:</P> <input class="text" required type="text" name="nom"> <div class="photo" ><img alt="image" src="./photo/photo.png" > <input type="file" accept="image/png, image/jpeg" name="photo" required></div>
<P>PRENOM:</P><input class="text" required type="text" name="prenom">
<P>CNE:</P><input class="text" required type="text" name="cne">
<P>VILLE:</P><input class="text" required type="text" name="ville"><div></div>
<P>EMAIL:</P><input class="text" required type="email" name="email"><div></div>
<P>TEL:</P><input class="text" required type="tel" pattern="[0-9]{10}" name="tel"><div></div>
<P>USERNAME:</P><input class="text" required type="text" name="username"><div></div>
<P>PASSWORD:</P><input class="text" required type="password" name="password"><div></div>
<input class="submit" type="submit" name="submit" value="confirmer">

    </form>
</body>
</html>