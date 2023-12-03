<?php

use App\Services\Product\Presentation\CLI\ProductSeederCommand;
use Illuminate\Support\Facades\Artisan;

Artisan::command('product:generate', function () {
    $this->call(ProductSeederCommand::class);
})->purpose('Generate products dummy data');
