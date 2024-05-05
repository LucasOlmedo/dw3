<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    /**
     * @var string[]
     */
    protected $visible = [
        'id',
        'name',
        'description',
        'price',
        'created_at',
    ];
}
