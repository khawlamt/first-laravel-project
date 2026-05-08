<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    // Champs autorisés à être remplis via formulaire
    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',  // Ajouter user_id
    ];
    public function user()
    {
    return $this->belongsTo(User::class);
    // Cherche automatiquement user_id dans la table actuelle
    }
}
