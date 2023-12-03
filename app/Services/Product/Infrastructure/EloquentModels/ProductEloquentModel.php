<?php

namespace App\Services\Product\Infrastructure\EloquentModels;


use Illuminate\Database\Eloquent\Model;

class ProductEloquentModel extends Model
{

    protected $fillable = ['name', 'description', 'type', 'status'];
    protected $table = 'products';

}
