<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use SoftDeletes;

    protected $table =  "tbl_incidents";
    protected $primaryKey = 'report_id';

    protected $fillable = [
        'report_id',
        'resident_id',
        'official_id',
        'incident_type',
        'incident_details',
        'date_reported'
    ];

    public $timestamps = true;

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id', 'resident_id');
    }

    public function official()
    {
        return $this->belongsTo(Official::class, 'official_id', 'official_id');
    }
}
