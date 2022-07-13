<?php

class AppController {
    private $request;
    //protected static $user = 1;

    public static $current_user;

    public static function setUser($user) {
        self::$current_user = $user;
    }

    public static function getUser() {
        return self::$current_user;
    }

    public static function unsetUser() {
        self::$current_user = null;
    }

    public function __construct()
    {
        $this->request = $_SERVER["REQUEST_METHOD"]; //pobiera info czy get czy post
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }

    protected function render(string $template = null, array $variables = [])
    {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';
                
        if(file_exists($templatePath)){
            extract($variables);
            
            ob_start(); //otwieranie bufora
            include $templatePath; //wczytanie ścieżki do pliku html
            $output = ob_get_clean(); //wyrzuca zapis bufora
        }
        print $output;
    }
}

?>