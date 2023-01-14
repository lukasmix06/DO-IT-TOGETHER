<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER</title>
</head>

<body>
<div class="container">
    <div class="logo" id="big">
        <div class="text-component">
            <div class="logo-text" id="text1">
                DO<br>IT<br>TOGETHER
                <div class="logo-text" id="text2">
                    DO<br>IT<br>TOGETHER
                </div>
            </div>
        </div>
    </div>
    <!--<div class="logo">
        <img src="public/img/logo-small.svg">
    </div>-->
    <div class="login-container">
        <form class="register" action="register" method="POST">
            <?php if(isset($messages) && $messages[0]!='') { ?>
                <div class="messages">
                    <?php foreach ($messages as $message) {
                        echo $message;
                    }?>
                </div>
            <?php } ?>
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <input name="confirmedPassword" type="password" placeholder="confirm password">
            <input name="name" type="text" placeholder="name">
            <input name="surname" type="text" placeholder="surname">
            <input name="phone" type="text" placeholder="phone">
            <button type="submit">REGISTER</button>
        </form>
    </div>
</div>
</body>