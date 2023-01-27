<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> for resposive design-->
    <title>LOGIN PAGE</title>
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
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <?php if(isset($messages) && $messages[0]!='') {
                    if($if_message_positive) { $category = "happy";}
                    else { $category = "sad";} ?>
                    <div class="<?=$category?> messages">
                        <?php foreach ($messages as $message) {
                            echo $message;
                        }?>
                    </div>
                <?php } ?>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit" class="classic">Zaloguj się</button>
                <text>Nie masz jeszcze konta?</text>
                <a href="register" class="button">Zarejestruj się</a>
            </form>
        </div>

    </div>
</body>