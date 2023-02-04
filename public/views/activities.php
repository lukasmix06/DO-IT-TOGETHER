<!DOCTYPE html>

<head>
    <script type="text/javascript" src="./public/js/searching.js" defer></script>
    <script type="text/javascript" src="./public/js/participation.js" defer></script>
    <script type="text/javascript" src="./public/js/map.js" defer></script>
    <script type="text/javascript" src="./public/js/my-activities.js" defer></script>
    <link rel="stylesheet" type="text/css" href="public/css/activities.css">

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!--TO MOŻE BYĆ PROBLEM BO NIE WIEM O CO CHODZI-->

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
                <div id="filters">
                    <div id="different-filters">
                        <div>
                            <input id="my-activities" type="checkbox" value="my-activities">
                            <label for="my-activities">Moje aktywności</label>
                        </div>
                        <input id="sport" name="sport" placeholder="Dyscyplina" list="sports">
                        <datalist id="sports">
                            <option value="Bieganie">
                            <option value="Rower">
                            <option value="Rolki">
                            <option value="Siatkówka">
                            <option value="Piłka nożna">
                            <option value="Pływanie">
                            <option value="Koszykówka">
                        </datalist>
                    </div>
                    <div id="date-filters">
                        <div class="date-box">
                            <label for="date-from">Od:</label>
                            <input id="date-from" type="date" value="<?php $date_from = new DateTime;echo $date_from->format('Y-m-d');?>">
                        </div>
                        <div class="date-box">
                            <label for="date-to">Do:</label>
                            <input id="date-to" type="date" value="<?php $date_to = $date_from->modify('+1 month'); echo $date_to->format('Y-m-d');?>">
                        </div>
                    </div>
                </div>
                <div class="add-activity">
                    <a href="addActivity">
                        <i class="fas fa-plus"></i>
                        Dodaj
                    </a>
                </div>
            </header>
            <div class="basic-content">
                <section class="activities">
                    <?php foreach($activities as $activity): ?>
                        <div id="<?= $activity->getId(); ?>">
                            <img src="public/uploads/<?= $activity->getImage() ?>">
                            <div>
                                <h2><?= $activity->getTitle() ?></h2>
                                <p class="description"><?= $activity->getDate()." ".$activity->getTime()?><br>
                                <?= $activity->getPlace() ?><br>
                                <?= $activity->getDescription() ?></p>
                                <div class="social-section">
                                    <?php if(in_array($activity->getId(), $user_activities_id)) { $id="resign"; }
                                    else { $id="join"; } ?>
                                    <i id="<?= $id ?>" class="fas fa-male"><?=$activity->getParticipants()." / ".$activity->getParticipantsMax()?></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
                <section class="map">
                    <div id='map'></div>
                </section>
            </div>
        </main>
    </div>
</body>

<template id="activity-template">
    <div class="activity-id" id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p id="datetime"></p>
            <p id="place"></p>
            <p id="description"></p>
            <div class="social-section">
                <i id="join" class="fas fa-male">0</i>
            </div>
        </div>
    </div>
</template>
