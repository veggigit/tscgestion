<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Partner;

class CivilStatus extends Model
{
    protected $fillable = ['name'];

    public function partners () {
        return $this->hasMany(Partner::class);
    }
}
