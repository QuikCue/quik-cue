<?php

namespace App\Infrastructure\Bus;

use App\Infrastructure\Events\FeatureStarted;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;

trait ServesFeatures
{
    use Marshal;
    use DispatchesJobs;

    /**
     * Serve the given feature with the given arguments.
     *
     * @param string $feature
     * @param array  $arguments
     *
     * @return mixed
     */
    public function serve($feature, $arguments = [])
    {
        event(new FeatureStarted($feature, $arguments));

        return $this->dispatch($this->marshal($feature, new Collection(), $arguments));
    }
}
