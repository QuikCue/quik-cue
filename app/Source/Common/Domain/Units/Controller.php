<?php

namespace App\Source\Common\Domain\Units;

use App\Source\Common\Domain\Bus\ServesFeatures;
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
