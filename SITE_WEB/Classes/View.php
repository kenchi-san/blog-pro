<?php

namespace App\Classes;

class View
{
    const FRONT_GABARIT = "/frontViews/gabarit.php";
    const BACK_GARARIT = "/backViews/gabarit.php";

    private $template;

    public function __construct($template)
    {
        $this->template = $template . ".php";
    }

    public function clean($value): string
    {
        return htmlspecialchars(trim($value), ENT_DISALLOWED);
    }

    public function renderView($params = [])
    {
        $session = new Session();

        $template = explode("/", $this->template, 3);
        extract($params);
        ob_start();
        include_once(VIEW . $this->template);
        $contentPage = ob_get_clean();
        if ($template[1] == 'frontViews') {
            include_once(VIEW . self::FRONT_GABARIT);
        } else {
            include_once(VIEW . self::BACK_GARARIT);
        }


    }

}