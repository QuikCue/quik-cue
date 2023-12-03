<?php

namespace App\Services\Product\Presentation\CLI;

use App\Infrastructure\Units\Command;
use App\Services\Product\Application\UseCases\Features\AddDummyProductFeature;

class ProductSeederCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $quantity = $this->ask('How many products do you want to generate?', 10);
        for ($i = 0; $i < $quantity; $i++) {
            $this->serve(AddDummyProductFeature::class);
        }
    }
}
