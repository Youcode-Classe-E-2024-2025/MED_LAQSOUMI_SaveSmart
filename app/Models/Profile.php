<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name','description','pin', 'avatar'];

    // Relation avec l'utilisateur principal
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function find($id)
    {
        return Profile::where('id', $id)->first();
    }

    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class);
    // }
}