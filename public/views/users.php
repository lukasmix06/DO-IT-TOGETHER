<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/users.css">
    <!--<script type="text/javascript" src="./public/js/searching.js" defer></script>-->
    <script src="https://kit.fontawesome.com/11ac319bc2.js" crossorigin="anonymous"></script>
    <title>USERS</title>
</head>

<?php
include_once "navbar.php";
?>

<body>
    <div class="base-container">
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="Wyszukaj użytkownika">
                </div>
            </header>
            <div class="basic-content">
                <section class="users">
                    <?php foreach($users as $user): ?>
                        <div id="<?= $user->getId(); ?>">
                            <img src="public/uploads/users/<?= $user->getImage() ?>">
                            <div>
                                <h2><?= $user->getName().' '.$user->getSurname() ?></h2>
                                <p><?= $user->getAge() ?></p>
                                <p class="description"><?= $user->getSelfDescription() ?></p>
                                <div class="social-section">
                                    <i class="fa-solid fa-hand-sparkles">Dodaj do przyjaciół</i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </main>
    </div>
</body>

<template id="user-template">
    <div id="">
        <img src="">
        <div>
            <h2>Name</h2>
            <p>age</p>
            <p>description</p>
            <div class="social-section">
                <i class="fas fa-hand-sparkles">
                    Dodaj do przyjaciół
                </i>
            </div>
        </div>
    </div>
</template>
