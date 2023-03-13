<!DOCTYPE html>
<html>
<head>	
		<cente>
			<h1>Mise à jour du FORMULAIRE</h1>
		</cente>  
</head>
<?php
 require("fonctionPDO.php");

 //on récupère et on vérifie que l'id figure dans l'URL
if ( isset($_POST['id']) && !empty($_POST['id'])){
 $id = $_POST['id'] ;
 $salarie = getCountry($id);
}
?>
    <form action="formulaire.php" method="post" >
    <fieldset>
    <legend> <i>Informations du <?php echo $desPays ?></i></legend>

        <div class="form-group col-md-7 col-sm-7">
		    <br><h4>Population :</h4></br>
            <input type="text" name="nom" required value="<?php echo $country->Population; ?>" /> <br />
        </div>

        <div class="form-group col-md-7 col-sm-7">
			<br><h4>Capital :</h4></br>
            <input type="text" name="prenom" required value="<?php echo $city->Name; ?>" /> <br />
        </div>
            <i>Dates : </i><br />

        <div class="form-group col-md-7 col-sm-7">
			<br><h4>Years of Independance :</h4></br>
            <input type="date" name="naissance" value="<?php echo $country->Indep_Year; ?>"/> <br />
        </div>

        <div class="form-group col-md-7 col-sm-7">
			<br><h4>Head of state :</h4></br>
            <input type="text" name="" value="<?php echo $salarie->date_embauche; ?>"/> <br />
        </div>

        <div class="form-group col-md-7 col-sm-7">
			<br><h4>Salaire :</h4></br>
            <input type="number" name="salaire" value="<?php echo $salarie->salaire; ?>"/> <br />
        </div>

        <div class="form-group col-md-7 col-sm-7">
			<br><h4>Continent :</h4></br>
            <select name="Continent">
            <option value="Africa">Africa</option>
            <option value="Antarcia">Antarcia</option>
            <option value="Asia">Asia</option>
            <option value="Europe">Europe</option>
            <option value="North America">North America</option>
            <option value="Oceania">Oceania</option>
            <option value="South America">South America</option>
            </select>
            <input type="hidden" name="id" value="<?php echo $country->Continent ?> ">
        </div>

    <fieldset>
        <input type="submit" value="Mettre à jour" />
    </form>
<html>

<?php
require_once("connectionPDO.php");
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_POST['nom']) && !empty($_POST['nom'])){
	$nom = $_POST['nom'] ;
}

require_once("connectionPDO.php");
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_POST['prenom']) && !empty($_POST['prenom'])){
	$prenom = $_POST["prenom"];
}
require_once("connectionPDO.php");
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_POST['date_naissance']) && !empty($_POST['date_naissance'])){
	$date_naissance = $_POST["date_naissance"];
}
require_once("connectionPDO.php");
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_POST['date_embauche']) && !empty($_POST['date_embauche'])){
	$date_embauche = $_POST["date_embauche"];
}
require_once("connectionPDO.php");
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_POST['salaire']) && !empty($_POST['salaire'])){
	$salaire = $_POST["salaire"];
}
require_once("connectionPDO.php");
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_POST['prenom']) && !empty($_POST['prenom'])){
	$service = $_POST["service"];
}

$host='localhost';
$bd='salaries';
$login='root';
$password='';

$sql = "INSERT INTO salaries(nom,prenom,date_naissance,date_embauche,salaire,servie) VALUES (':nom', ':prenom', ':date_naissance', ':date_embauche', ':salaire', ':service');";
echo $sql;

try {
	//on prépare la requête avec les données reçues
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
	$statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
	$statement->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
	$statement->bindParam(':date_embauche', $date_embauche, PDO::PARAM_STR);
	$statement->bindParam(':salaire', $salaire, PDO::PARAM_INT);
	$statement->bindParam(':service', $service, PDO::PARAM_STR);
	$statement->execute();
	//On renvoie vers la liste des salaries
	 header("Location:listeSalariesPDO.php");
	}
	
global $pdo;
?>