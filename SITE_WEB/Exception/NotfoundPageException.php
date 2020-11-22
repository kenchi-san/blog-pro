<?php
namespace App\Exception;

class NotfoundPageException extends \Exception
{
  protected  $message = "Cette page n'existe pas";
}