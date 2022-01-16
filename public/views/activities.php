<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/activities.css">
    <script src="https://kit.fontawesome.com/11ac319bc2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searching.js" defer></script>
    <title>ACTIVITIES</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo-small.svg">
            <ul>
                <li>
                    <i class="fas fa-user-circle"></i>
                    <a href="#" class="button">Profil</a>
                </li>
                <li>
                    <i class="fas fa-bahai"></i>
                    <a href="#" class="button">Aktywności</a>
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
                    <i class="fas fa-cog"></i>
                    <a href="#" class="button">Ustawienia</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="wyszukaj aktywność">
                </div>
                <div class="add-activity">
                    <i class="fas fa-plus"></i> 
                    Dodaj
                </div>
            </header>
            <section class="activities">
                <?php foreach($activities as $activity): ?>
                <div id="activity-1">
                    <img src="public/uploads/<?= $activity->getImage() ?>">
                    <div>
                        <h2><?= $activity->getTitle() ?></h2>
                        <p><?= $activity->getDescription() ?></p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 500</i>
                            <i class="fas fa-minus-square"> 232</i>
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
                <i class="fas fa-heart"> 500</i>
                <i class="fas fa-minus-square"> 232</i>
            </div>
        </div>
    </div>
</template>
