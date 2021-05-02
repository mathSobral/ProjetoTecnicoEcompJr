<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuniorCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'federation_id'
    ];

    public function federation(){
        return $this->belongsTo('App\Models\Federation');
    }
}
