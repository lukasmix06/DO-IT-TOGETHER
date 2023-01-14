<?php

class AppController {
    private $request;

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", 'image/jpeg'];
    protected $messages = []; //będziemy tu dodawali nasze zmienne


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

    protected function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = "File is too large for destination file system.";
            return false;
        }

        if(!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = "File type is not supported";
            return false;
        }

        return true;
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