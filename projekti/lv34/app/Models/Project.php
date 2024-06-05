<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv_projekta', 
        'opis_projekta', 
        'cijena_projekta', 
        'obavljeni_poslovi',
        'datum_početka',
        'datum završetka'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teamMembers()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

}
