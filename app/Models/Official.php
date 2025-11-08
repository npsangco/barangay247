<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $table =  "tbl_officials";
    protected $primaryKey = 'official_id';

    protected $fillable = [
        'official_id',
        'official_name',
        'position',
        'contact_information'
    ];

    public $timestamps = true;
}
