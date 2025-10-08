<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'category_id',
        'project_name',
        'thumbnail',
        'image',
        'description',
        'short_description'
    ];

    // Relationship
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }
}
