<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script type="text/javascript" src="./public/js/profile.js" defer></script>
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
                    <form action="changeUserData" method="POST">
                        <label for="email">EMAIL:</label>
                        <input name="email" class="user-input" id="email" readonly value="<?=$profile->getEmail() ?>">
                        <button type="button" class="edit-btn">Edytuj</button>
                        <button type="submit" class="submit-btn">Zatwierdź</button>
                    </form>
                    <form action="changeUserData" method="POST">
                        <label for="phone">TELEFON:</label>
                        <input name="phone" class="user-input" id="phone" readonly value="<?=$profile->getPhone() ?>">
                        <button type="button" class="edit-btn">Edytuj</button>
                        <button type="submit" class="submit-btn">Zatwierdź</button>
                    </form>
                    <form action="changeUserData" method="POST">
                        <label for="gender">PŁEĆ:</label>
                        <input name="gender" class="user-input" id="gender" readonly value="<?=$profile->getGender() ?>">
                        <button type="button" class="edit-btn">Edytuj</button>
                        <button type="submit" class="submit-btn">Zatwierdź</button>
                    </form>
                    <form action="changeUserData" method="POST">
                        <label for="age">WIEK:</label>
                        <input name="age" class="user-input" id="age" readonly value="<?=$profile->getAge() ?>">
                        <button type="button" class="edit-btn">Edytuj</button>
                        <button type="submit" class="submit-btn">Zatwierdź</button>
                    </form>
                    <form action="changeUserData" method="POST">
                        <label for="self_description">OPIS:</label>
                        <input name="self_description" class="user-input" id="self_description" readonly value="<?=$profile->getSelfDescription() ?>">
                        <button type="button" class="edit-btn">Edytuj</button>
                        <button type="submit" class="submit-btn">Zatwierdź</button>
                    </form>
                    <div id="pointsBox">
                        <label for="points">PUNKTY:</label>
                        <p id="points"><?=$profile->getPoints() ?></p>
                    </div>
            </section>
        </div>
    </div>
</body>

