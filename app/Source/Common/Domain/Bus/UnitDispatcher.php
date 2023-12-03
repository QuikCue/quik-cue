<?php

namespace App\Source\Common\Domain\Bus;

use App\Source\Common\Domain\Events\JobStarted;
use App\Source\Common\Domain\Events\OperationStarted;
use App\Source\Common\Domain\Testing\UnitMock;
use App\Source\Common\Domain\Testing\UnitMockRegistry;
use App\Source\Common\Domain\Units\Job;
use App\Source\Common\Domain\Units\Operation;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use ReflectionClass;
use ReflectionException;

trait UnitDispatcher
{
    use Marshal;
    use DispatchesJobs;

    /**
     * decorator function to be called instead of the
     * laravel function dispatchFromArray.
     * When the $arguments is an instance of Request
     * it will call dispatchFrom instead.
     *
     * @param mixed                         $unit
     * @param array|Request $arguments
     * @param array                          $extra
     *
     * @return mixed
     */
    public function run($unit, $arguments = [], $extra = [])
    {
        if (is_object($unit) && !App::runningUnitTests()) {
            $result = $this->dispatch($unit);
        } elseif ($arguments instanceof Request) {
            $result = $this->dispatch($this->marshal($unit, $arguments, $extra));
        } else {
            if (!is_object($unit)) {
                $unit = $this->marshal($unit, new Collection(), $arguments);

                // don't dispatch unit when in tests and have a mock for it.
            } elseif (App::runningUnitTests() && app(UnitMockRegistry::class)->has(get_class($unit))) {
                /** @var UnitMock $mock */
                $mock = app(UnitMockRegistry::class)->get(get_class($unit));
                $mock->compareTo($unit);

                // Reaching this step confirms that the expected mock is similar to the passed instance, so we
                // get the unit's mock counterpart to be dispatched. Otherwise, the previous step would
                // throw an exception when the mock doesn't match the passed instance.
                $unit = $this->marshal(
                    get_class($unit),
                    new Collection(),
                    $mock->getConstructorExpectationsForInstance($unit)
                );
            }

            $result = $this->dispatch($unit);
        }

        if ($unit instanceof Operation) {
            event(new OperationStarted(get_class($unit), $arguments));
        }

        if ($unit instanceof Job) {
            event(new JobStarted(get_class($unit), $arguments));
        }

        return $result;
    }

    /**
     * Run the given unit in the given queue.
     *
     * @param string $unit
     * @param array $arguments
     * @param string|null $queue
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function runInQueue($unit, array $arguments = [], $queue = 'default')
    {
        // instantiate and queue the unit
        $reflection = new ReflectionClass($unit);
        $instance = $reflection->newInstanceArgs($arguments);
        $instance->onQueue((string) $queue);

        return $this->dispatch($instance);
    }
}
