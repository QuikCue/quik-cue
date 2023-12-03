<?php

namespace App\Source\Common\Domain\Units;

use App\Source\Common\Domain\Bus\UnitDispatcher;
use App\Source\Common\Domain\Testing\MockMe;

abstract class Feature
{
    use MockMe;
    use UnitDispatcher;
}
