<?php

namespace App\Classes;

class View
{
    private $template;

    public function __construct($template = null)
    {
        $this->template = $template;
    }

    public function renderView($params = null)
    {

        $params = ['cle' => 2, 'cle2' => 3];
        extract($params);
        $cle = $params['cle'];
        $cle2 = $params['cle2'];

        if (empty($params)){

            $template = $this->template;
            ob_start();
            include_once(VIEW . $template . '.php');
            $contentPage = ob_get_clean();
            include_once(VIEW . 'gabarit.php');
        }else{
            extract($params);
            $template = $this->template;
            ob_start();
            include_once(VIEW . $template . '.php');
            $contentPage = ob_get_clean();
            include_once(VIEW . 'gabarit.php');
        }

    }

}