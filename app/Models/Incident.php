<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table =  "tbl_incidents";
    protected $primaryKey = 'incident_id';

    protected $fillable = [
        'incident_id',
        'resident_id',
        'official_id',
        'incident_type',
        'incident_details',
        'date_reported'
    ];

    public $timestamps = true;
}
