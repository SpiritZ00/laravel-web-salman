<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'portofolio_1181';

    protected $fillable = ['title', 'description', 'image_url', 'project_url'];
}
