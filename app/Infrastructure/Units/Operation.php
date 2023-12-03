<?php

namespace App\Infrastructure\Units;


use App\Infrastructure\Bus\UnitDispatcher;
use App\Infrastructure\Testing\MockMe;

abstract class Operation
{
    use MockMe;
    use UnitDispatcher;
}
