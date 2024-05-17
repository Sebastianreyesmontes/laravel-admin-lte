<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'state',
        'project_leader',
        'company_client',
        'estimated_budget',
        'total_spent',
        'start_date',
        'end_date',
        'file_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('is_leader')->withTimestamps();
    }

    public function leader()
    {
        // return $this->users()->wherePivot('is_leader', true)->first();
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }

    public function processes()
    {
        return $this->hasMany(Project_processes::class, 'project_id');
    }
}
