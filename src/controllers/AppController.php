<?php

class AppController {

    protected function render(string $template = null/*, array $variables = []*/)
    {
        $templatePath = 'public/views/'.$template.'.html';
        $output = 'File not found';
                
        if(file_exists($templatePath)){
            /*extract($variables);*/
            
            ob_start(); //otwieranie bufora
            include $templatePath; //wczytanie ścieżki do pliku html
            $output = ob_get_clean(); //wyrzuca zapis bufora
        }
        print $output;
    }
}

?>