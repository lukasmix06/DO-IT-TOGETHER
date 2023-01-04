<!DOCTYPE html>

<head>
    <script type="text/javascript" src="./public/js/map-addact.js" defer></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>ACTIVITIES</title>
</head>

<?php
include_once "navbar.php";
?>

<body>
    <div class="base-container">
        <main>
            <div class="basic-content">
                <section class="activity-form">
                    <h1>WRZUĆ NOWĄ AKTYWNOŚĆ</h1>
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <form action="addActivity" method="POST" ENCTYPE="multipart/form-data"> <!--enctype, bo wysyłamy także plik-->
                        <input name="title" type="text" placeholder="Nowa aktywność">
                        <textarea name="description" rows="3" placeholder="Tutaj umieść opis swojego wydarzenia"></textarea>
                        <div id="geocoder"></div><!--<input name="place" type="text" placeholder="Miejsce aktywnosci">-->
                        <input name="place" type="text" id="geocoder-btn" value="Pokaż" readonly onclick="getElementById('geocoder-btn').value = addMarker()"></input>
                        <input name="sport" type="text" placeholder="Dyscyplina sportowa">
                        <input name="date" type="text" placeholder="Data">
                        <input name="time" type="text" placeholder="Czas">
                        <input type="file" name="file">
                        <button type="submit">Wyślij</button>
                    </form>
                </section>
                <section class="map">
                    <div id='map'></div>
                </section>
            </div>
        </main>
    </div>
</body>