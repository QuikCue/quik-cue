<?php

namespace App\Source\Common\Domain\Units;

use App\Source\Common\Domain\Bus\ServesFeatures;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Base controller.
 */
class Command extends \Illuminate\Console\Command
{
    use ValidatesRequests;
    use ServesFeatures;
}
