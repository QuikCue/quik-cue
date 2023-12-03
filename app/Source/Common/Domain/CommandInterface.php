<?php

namespace App\Source\Common\Domain;

use App\Source\Common\Domain\Exceptions\UnauthorizedUserException;

interface CommandInterface
{
    /**
     * @throws UnauthorizedUserException
     */
    public function execute();
}
