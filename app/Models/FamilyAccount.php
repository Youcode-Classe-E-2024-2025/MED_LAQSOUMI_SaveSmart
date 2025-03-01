<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilyAccount extends Model
{
    use HasFactory;
    protected $fillable = ['family_name'];

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
