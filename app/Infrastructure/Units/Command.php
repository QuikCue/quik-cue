<?php

namespace App\Infrastructure\Units;

use App\Infrastructure\Bus\ServesFeatures;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Base controller.
 */
class Command extends \Illuminate\Console\Command
{
    use ValidatesRequests;
    use ServesFeatures;
}
