<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use SoftDeletes;

    protected $table =  "tbl_residents";
    protected $primaryKey = 'resident_id';

    protected $fillable = [
        'resident_id',
        'resident_name',
        'date_of_birth',
        'gender',
        'contact_information',
        'address'
    ];

    public $timestamps = true;
}
