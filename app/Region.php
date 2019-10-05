<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;
use App\Partner;

class Region extends Model
{
    protected $fillable = ['name'];

    public function offices() {
        return $this->hasMany(Office::class);
    }

    public function partners () {
        return $this->hasMany(Partner::class);
    }
}
