<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "db_gestioncr";
$dbuser = "root";
$dbpass = "root";
// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
// new data
$VIS_MATRICULE = $_POST['identifiant'];
$VIS_MDP = $_POST['pwd'];
if($VIS_MATRICULE == '') {
$errmsg_arr[] = 'Vous devez mettre votre identifiant';
$errflag = true;
}
if($VIS_MDP == '') {
$errmsg_arr[] = 'Vous devez mettre votre mot de passe';
$errflag = true;
}
// query
$result = $conn->prepare("SELECT * FROM visiteur WHERE VIS_MATRICULE= :abab AND VIS_MDP= :asas");
//permet de s'indentifier en tant que visiteur en prennent les login et les mot de passe de la basse
$result->bindParam(':abab', $VIS_MATRICULE);
$result->bindParam(':asas', $VIS_MDP);
//dit ou les prendre
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
header("location: menuCR.html");
}
else{
$errmsg_arr[] = 'identifiant et mot de passe non trouvés';
$errflag = true;
}
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: index.php");
exit();
}
?>