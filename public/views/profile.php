<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/activities.css"> <!-- TODO menu bedzie trzeba przeniesc z activities do glownego pliku-->
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script src="https://kit.fontawesome.com/11ac319bc2.js" crossorigin="anonymous"></script>
    <title>USER_PROFILE</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo-small.svg">
            <div class="dropdown">
                <i id="dropbtn" class="fas fa-bars"></i>
                <ul>
                    <li>
                        <i class="fas fa-user-circle"></i>
                        <a href="profile" class="button">Profil</a>
                    </li>
                    <li>
                        <i class="fas fa-bahai"></i>
                        <a href="activities" class="button">Aktywności</a>
                    </li>
                    <li>
                        <i class="fas fa-user-friends"></i>
                        <a href="#" class="button">Ludzie</a>
                    </li>
                    <li>
                        <i class="fas fa-comments"></i>
                        <a href="#" class="button">Wiadomości</a>
                    </li>
                    <li>
                        <i class="fas fa-sign-out-alt"></i>
                        <a href="logout" class="button">Wyloguj</a>
                    </li>
                </ul>
            </div>
        </nav>

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

