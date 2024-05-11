<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deadline',
    ];

    public function employees() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_employee')->withTimestamps();
    }
}
