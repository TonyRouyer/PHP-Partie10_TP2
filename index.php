<?php
$lastnameRegex = '/^[a-zA-Z]{2,}$/';
$firstnameRegex = '/^[a-zA-ZéÉ]?([a-zA-Zéèïç\- ]+)+$/';
$ageRegex = '/^[1-9]([0-9]|[0-1]\d|20)?$/';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Partie 10 Tp2</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="lastname">Nom : <input type="text" id="lastname" name="lastname" value="<?php if (!empty($_POST['lastname'])) { echo $_POST['lastname'];} ?>"></label>
        <?php
        if (!empty($_POST['lastname'])) {
            if (preg_match($lastnameRegex, $_POST['lastname'])) {
            $lastname = htmlspecialchars($_POST['lastname']);
            } else { ?>
            <p class='fail'><?= 'Votre nom de famille est incorrect'; ?></p>
            <?php }
        } else {  
        }?>

        <label for="firstname">Prenom : <input type="text" id="firstname" name="firstname" value="<?php if (!empty($_POST['firstname'])) { echo $_POST['firstname'];} ?>"></label>
        <?php
        if (!empty($_POST['firstname'])) {
            if (preg_match($firstnameRegex, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
            } else { ?>
            <p class='fail'><?= 'Votre prenom est incorrect'; ?></p>
            <?php }
        } else {
        }?>

        <label for="age">Age : <input type="number" id="age" name="age" value="<?php if (!empty($_POST['age'])) { echo $_POST['age'];} ?>"></label>
        <?php
        if (!empty($_POST['age'])) {
            if (preg_match($ageRegex, $_POST['age'])) {
            $age = htmlspecialchars($_POST['age']);
            } else { ?>
            <p class='fail'><?= 'Votre age est incorrect'; ?></p>
            <?php }
        } else {
        }?>

        <label for="society">Nom de la société : <input type="text" id="society" name="society" value="<?php if (!empty($_POST['society'])) { echo $_POST['society'];} ?>"></label>
        <?php
        if (!empty($_POST['society'])) { 
            $society = htmlspecialchars($_POST['society']);
        } else { ?>
        <p class='fail'><?= 'Nom de societer incorrecte'; ?></p>
        <?php }?>

        <input type="submit" value="Validation">
    </form>
    <?php
        if (isset($_POST['firstname']) && preg_match($firstnameRegex, $_POST['firstname']) &&
            isset($_POST['lastname']) && preg_match($lastnameRegex, $_POST['lastname']) &&
            isset($_POST['age']) && preg_match($ageRegex, $_POST['age']) &&
            isset($_POST['society'])) { ?>
                <p class="success"><?= 'Votre formulaire a bien été valider' ?></p>
               <p><?= 'Nom : ' . $lastname; ?></p>
               <p><?= 'Prenom : ' . $firstname; ?></p>
               <p><?= 'Age : ' . $age; ?></p>
               <p><?= 'Société : ' . $society; ?></p>
            <?php } ?>
</body>
</html>