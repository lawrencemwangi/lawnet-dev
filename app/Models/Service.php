<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'categroy_id',
        'duration',
        'featured',
        'visibility',
        'price',
        'discout_priece',
    ];
    

    public function Service()
    {
        return $this->hasMany(Service::class);
    }
}
