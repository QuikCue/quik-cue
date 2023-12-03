<?php

namespace App\Infrastructure\Units;


use App\Infrastructure\Bus\UnitDispatcher;
use App\Infrastructure\Testing\MockMe;

abstract class Feature
{
    use MockMe;
    use UnitDispatcher;
}
