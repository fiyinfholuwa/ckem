<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChurchMember extends Model
{
    use HasFactory;
    public function branch_name()
    {
        return $this->hasOne(User::class, 'id', 'branch_id');
    }
}
