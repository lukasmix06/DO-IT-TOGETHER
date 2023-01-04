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
                <h2>
                    Twoje dane:
                </h2>
                <p>
                    Email: <?= "\t\t".$profile->getEmail() ?>
                </p>
                <p>
                    Telefon: <?= "\t\t".$profile->getPhone() ?>
                </p>
                <p>
                    Płeć: <?= "\t\t".$profile->getGender() ?>
                </p>
                <p>
                    Wiek: <?= "\t\t".$profile->getAge() ?>
                </p>
                <p>
                    Twoje punkty: <?= "\t\t".$profile->getPoints() ?>
                </p>
                <p>
                    Twój opis: <?= "\t\t".$profile->getSelfDescription() ?>
                </p>
            </section>
        </div>
    </div>
</body>

