<?php

namespace App\Source\Common\Domain\Exceptions;

final class UnauthorizedUserException extends \Exception
{
    public function __construct()
    {
        parent::__construct('The user is not authorized to access this resource');
    }
}
