<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'iframe',
        'description',
        'link'
    ];

    public function Project()
    {
        return $this->hasMany(Projectr::class);
    }
}
