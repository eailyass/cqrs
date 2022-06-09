<?php

namespace App\Blog\Article\Application\Exception;

use Throwable;


class ArticleNotFoundException extends \Exception{
    
    function __construct($message, $code = 0, Throwable $previous = null){

        $this->message = $message;
        parent::__construct($message, $code, $previous);
    }
}