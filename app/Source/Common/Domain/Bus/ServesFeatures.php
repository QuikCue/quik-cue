<?php

namespace App\Source\Common\Domain\Bus;

use App\Source\Common\Domain\Events\FeatureStarted;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Collection;

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
