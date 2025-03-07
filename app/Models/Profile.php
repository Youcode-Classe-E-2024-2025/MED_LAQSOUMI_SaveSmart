<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name','description','pin', 'avatar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function findProfileById($id)
    {
        return Profile::where('id', $id)->get();
    }

    public static function find($id)
    {
        return Profile::where('id', $id)->get();
    }

    public static function findProfileByUserId($id)
    {
        return Profile::where('user_id', $id)->get();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}