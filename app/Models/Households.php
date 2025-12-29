<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Households extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tbl_households";

    protected $primarykey = 'household_id';

    protected $fillable = [
        'household_head',
        'address',
        'contact_information',
        'number_of_members',
        'image_path'
    ];

    public $timestamps = true;
}
