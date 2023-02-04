<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/users.css">
    <script type="text/javascript" src="./public/js/friendship.js" defer></script>
    <script type="text/javascript" src="./public/js/searching-users.js" defer></script>
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
                <div id="filters">
                    <div id="different-filters">
                        <input id="friends" type="checkbox" value="friends">
                        <label for="friends">Moi znajomi</label>
                    </div>
                </div>
            </header>
                <section class="users">
                    <?php $isFirst = true;
                    foreach($users as $user):
                        if($isFirst == true) {
                            $style = "unique";
                            $isFirst = false;
                        }
                        else {
                            $style = "casual";
                        }?>
                        <div class="user-box <?= $style?>" id="<?= $user->getId(); ?>">
                            <img src="public/uploads/users/<?= $user->getImage() ?>">
                            <div>
                                <h2 class="name-surname"><?= $user->getName().' '.$user->getSurname() ?></h2>
                                <p class="description"><?= $user->getAge()." lat, ".$user->getGender() ?><br>
                                <?= $user->getSelfDescription() ?></p>
                                <div class="social-section">
                                    <?php if(in_array($user->getId(), $user_friends_id)) { $id="remove"; $action="Usun";}
                                    else { $id="add"; $action="Dodaj";} ?>
                                    <i class="fa-solid fa-hand-sparkles" id="<?= $id ?>"><?=$action?></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
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
