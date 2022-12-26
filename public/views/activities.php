<!DOCTYPE html>

<head>
    <script type="text/javascript" src="./public/js/searching.js" defer></script>
    <script type="text/javascript" src="./public/js/participation.js" defer></script>
    <script type="text/javascript" src="./public/js/map.js" defer></script>


    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

    <title>ACTIVITIES</title>
</head>

<?php
include_once "navbar.php";
?>

<body>
    <div class="base-container">
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
                <div id='map' style='width: 400px; height: 300px;'></div>
                <script>
                    mapboxgl.accessToken = 'YOUR_MAPBOX_ACCESS_TOKEN';
                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/streets-v11'
                    });
                </script>
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
