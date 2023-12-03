<?php

namespace App\Infrastructure\Units;

use App\Infrastructure\Bus\ServesFeatures;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Base controller.
 */
class Controller extends BaseController
{
    use ValidatesRequests;
    use ServesFeatures;
}
