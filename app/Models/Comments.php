<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'text',
        'file_name',
        'file_path',
        'parent_id',
    ];

    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }
}
