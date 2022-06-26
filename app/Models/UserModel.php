<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Database\Factories\Administration\UserFactory;

class UserModel extends Model
{   
    use HasFactory;
    // public function newFactory()
    // {
    //     return UserFactory::new();
    // }
    
    public function allUser()
    {
        return DB::table('users')->get();
    }
}
