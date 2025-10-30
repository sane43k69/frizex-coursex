<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'phone', 'bio', 'portfolio_url', 'document_path', 'status', 'admin_note'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
