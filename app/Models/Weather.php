<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Weather extends Model
{
    use HasFactory;
    use QueryCacheable;

    protected $fillable = [
        'condition'
    ];

    public $timestamps = false;

    public function products() {
        return $this->belongsToMany(Product::class)->limit(2);
    }
}
