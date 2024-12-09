<?php
require_once './utils/connect_db.php';

$sql = "SELECT title, performer, date, startTime FROM `shows` ORDER BY title ASC";

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
            <li><?= $user['title']  ?> par <?= $user['performer'] ?> , le <?= $user['date'] ?> à <?= $user['startTime'] ?></li>

        <?php
        }

        ?>

    </ol>

</body>

</html>