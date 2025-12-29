<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Official extends Model
{
    use SoftDeletes;

    protected $table =  "tbl_officials";
    protected $primaryKey = 'official_id';

    protected $fillable = [
        'official_id',
        'official_name',
        'position',
        'contact_information'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->hasOne(User::class, 'official_id', 'official_id');
    }
}
