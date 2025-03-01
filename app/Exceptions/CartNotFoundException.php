<?php

namespace App\Exceptions;




use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class CartNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct("Koszyk nie został znaleziony.");
    }
}
