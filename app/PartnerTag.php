<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerTag extends Model
{
    protected $table = 'partner_tags';
    protected $fillable = ['name', 'description'];

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
}
