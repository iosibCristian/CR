<?php
session_start();
?>
<?php
if( isset($_SESSION['ERRMSG_ARR']) &&
is_array($_SESSION['ERRMSG_ARR']) &&
count($_SESSION['ERRMSG_ARR']) >0 ) {
echo '<ul style="padding:0; color:red;">';
foreach($_SESSION['ERRMSG_ARR'] as $msg) {
echo '<li>',$msg,'</li>';
}
echo '</ul>';
unset($_SESSION['ERRMSG_ARR']);
}
?>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="login.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="reg.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="identifiant" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="pwd" required>

                <input type="submit" id='submit' value='LOGIN' >
             
            </form>
        </div>
    </body>
</html>