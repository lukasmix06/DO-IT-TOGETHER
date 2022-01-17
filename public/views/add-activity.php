<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/activities.css">
    <script src="https://kit.fontawesome.com/11ac319bc2.js" crossorigin="anonymous"></script>
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
                    <a href="login" class="button">Wyloguj</a>
                </li>
            </ul>
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
            <section class="activity-form">
                <h1>UPLOAD ACTIVITY</h1>
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