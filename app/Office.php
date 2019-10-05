<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;
use App\Partner;

class Office extends Model
{
    protected $fillable = ['name', 'region_id'];

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function partners () {
        return $this->hasMany(Partner::class);
    }
}
