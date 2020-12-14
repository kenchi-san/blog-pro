<?php
namespace App\Exception;

class ForbiddenAccessException extends \Exception
{
    protected $message = "Vous n'avez pas les droits pour accéder à cette page";
}