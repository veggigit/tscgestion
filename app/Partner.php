<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CivilStatus;
use App\Region;
use App\Office;

class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable = [
        'rut', 'first_name', 'second_name', 'first_surname', 'second_surname',
        'phone', 'personal_email', 'birthday', 'social_charges', 'civil_status_id', 'region_id', 'address', 'corporative_email', 'office_id', 'date_admission', 'partner_status_id'
    ];

    public function civil_status()
    {
        return $this->belongsTo(CivilStatus::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function tags()
    {
        return $this->belongsToMany(PartnerTag::class);
    }

    public function scopeStgoPartnersNews($query)
    {
        $query->where('region_id', 6)
            ->where('partner_status_id', 1)
            ->select('first_name as name', 'personal_email as email');
        return $query;
    }

    public function scopeRegionsPartnersNews($query)
    {
        $query->where('region_id', '!=', 6)
            ->where('partner_status_id', 1)
            ->select('first_name as name', 'personal_email as email');
        return $query;
    }
}
