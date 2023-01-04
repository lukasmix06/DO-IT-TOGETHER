<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/activities.css"> <!-- TODO menu bedzie trzeba przeniesc z activities do glownego pliku-->
    <script src="https://kit.fontawesome.com/11ac319bc2.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&display=swap" rel="stylesheet">

    <!--<title>NAVBAR</title>-->
</head>

<body>
    <div>
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
    </div>
</body>

