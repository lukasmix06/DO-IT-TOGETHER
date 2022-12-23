<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/activities.css">
    <script src="https://kit.fontawesome.com/11ac319bc2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searching.js" defer></script>
    <script type="text/javascript" src="./public/js/participation.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&display=swap" rel="stylesheet">

    <title>ACTIVITIES</title>
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
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="wyszukaj aktywność">
                </div>
                <div class="add-activity">
                    <a href="addActivity">
                        <i class="fas fa-plus"></i>
                        Dodaj
                    </a>
                </div>
            </header>
            <section class="activities">
                <?php foreach($activities as $activity): ?>
                <div id="<?= $activity->getId(); ?>">
                    <img src="public/uploads/<?= $activity->getImage() ?>">
                    <div>
                        <h2><?= $activity->getTitle() ?></h2>
                        <p><?= $activity->getDate()." ".$activity->getTime() ?></p>
                        <p class="description"><?= $activity->getDescription() ?></p>
                        <div class="social-section">
                            <i id="join" class="fas fa-male">
                                <?= $activity->getParticipants()." / ".$activity->getParticipantsMax() ?>
                            </i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
            <section class="map">
            </section>
        </main>
    </div>
</body>

<template id="activity-template">
    <div id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
            <div class="social-section">
                <i class="fas fa-male">0</i>
            </div>
        </div>
    </div>
</template>
