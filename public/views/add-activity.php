<!DOCTYPE html>

<head>
    <title>ACTIVITIES</title>
</head>

<?php
include_once "navbar.php";
?>

<body>
    <div class="base-container">
        <main>
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
                    <input name="place" type="text" placeholder="Miejsce aktywnosci">
                    <input name="sport" type="text" placeholder="Dyscyplina sportowa">
                    <input name="date" type="text" placeholder="Data">
                    <input name="time" type="text" placeholder="Czas">
                    <input type="file" name="file">
                    <button type="submit">Wyślij</button>
                </form>
            </section>
        </main>
    </div>
</body>