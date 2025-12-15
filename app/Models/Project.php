<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table =  "tbl_projects";
    use SoftDeletes;
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_id',
        'project_name',
        'project_description',
        'start_date',
        'end_date',
        'project_status',
        'image_path'
    ];

    public $timestamps = true;

    

}
