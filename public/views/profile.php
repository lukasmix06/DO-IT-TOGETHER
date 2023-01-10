<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <title>USER_PROFILE</title>
</head>

<?php
include_once "navbar.php";
?>

<body>
    <div class="base-container">
        <div class="profile">
            <h1 class="profile">Witaj <?= $profile->getName().' '.$profile->getSurname() ?> !</h1>
            <section class="user_data">
                <h2 class="profile">
                    Twoje dane:
                </h2>
                <div id="data">
                    <div class="data-item"
                        <label for="email">EMAIL:</label>
                        <input id="email" readonly value="<?=$profile->getEmail() ?>"><br>
                        <button type="button" onclick="getElementById().removeAttribute("readonly");">Zmień</button>

                    <label for="phone">TELEFON:</label>
                    <input id="phone" value="<?=$profile->getPhone() ?>"><br>

                    <label for="gender">PŁEĆ:</label>
                    <input id="gender" value="<?=$profile->getGender() ?>"><br>

                    <label for="age">WIEK:</label>
                    <input id="age" value="<?=$profile->getAge() ?>"><br>

                    <label for="points">PUNKTY:</label>
                    <input id="points" value="<?=$profile->getPoints() ?>"><br>

                    <label for="description">OPIS:</label>
                    <input id="description" value="<?=$profile->getSelfDescription() ?>">
                </div>
            </section>
        </div>
    </div>
</body>

