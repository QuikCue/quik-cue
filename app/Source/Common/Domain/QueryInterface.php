<?php

namespace App\Source\Common\Domain;

use App\Source\Common\Domain\Exceptions\UnauthorizedUserException;

interface QueryInterface
{
    /**
     * @throws UnauthorizedUserException
     */
    public function handle(): mixed;
}
