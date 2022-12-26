<!DOCTYPE html>

<head>
    <title>USER_PROFILE</title>
</head>

<?php
include_once "navbar.php";
?>

<body>
    <div class="base-container">
        <main class="profile">
            <h1 class="profile">Twoje dane:</h1>
            <section class="user_data">
                <h2>
                    Witaj <?= $profile->getName().' '.$profile->getSurname() ?> !
                </h2>
                <p>
                    Email: <?= $profile->getEmail() ?>
                </p>
                <p>
                    Telefon: <?= $profile->getPhone() ?>
                </p>
                <p>
                    Płeć: <?= $profile->getAge() ?>
                </p>
                <p>
                    Współrzędne: <?= $profile->getPlaceCoordinates() ?>
                </p>
                <p>
                    Twój opis: <?= $profile->getSelfDescription() ?>
                </p>
                <p>
                    Twoje punkty: <?= $profile->getPoints() ?>
                </p>
            </section>
        </main>
    </div>
</body>

