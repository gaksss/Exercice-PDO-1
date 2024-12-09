<?php
require_once './utils/connect_db.php';

$sql = "SELECT lastName, firstName, birthDate, card, cardNumber FROM clients ORDER BY lastName ASC;";

try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ol>
        <h1>Types de spectacles :</h1>

        <?php
        foreach ($users as $user) {
        ?>
            <li>Nom : <?= $user['lastName']  ?><br> 
            Prénom :  <?= $user['firstName'] ?> <br> 
            Date de naissance : <?= $user['birthDate'] ?> <br> 
            Carte de fidélité : <?php if($user['card'] == 1){ echo "Oui";}else {echo "Non";} ?><br> 
            Numéro de carte : <?= $user['cardNumber'] ?>  </li><br>

        <?php
        }

        ?>

    </ol>

</body>

</html>