<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
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

    /**
     * Get the resident that reported the incident
     */
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id', 'resident_id');
    }

    /**
     * Get the official assigned to the incident
     */
    public function official()
    {
        return $this->belongsTo(Official::class, 'official_id', 'official_id');
    }
}
