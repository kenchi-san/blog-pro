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
        return htmlspecialchars(trim($value));
    }

    public function renderView($params = [])
    {
        $session = new Session();
        $template = explode("/", $this->template, 3);

        extract($params);
        ob_start();
        include_once(VIEW . $this->template);
        $contentPage = ob_get_clean();
        switch ($template[1]) {
            case "frontViews":
                include_once(VIEW . self::FRONT_GABARIT);
                break;
            case "backViews":
                include_once(VIEW . self::BACK_GARARIT);
                break;
            case "mail":
                return $contentPage;
                break;
            default:
                throw  new \LogicException();
        }

        return true;

    }

}