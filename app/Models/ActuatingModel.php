<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActuatingModel extends Model
{
    use HasFactory;

    public function indexTask(){
        return DB::table('actuating')->get();
    }

    public function addtugas($data){
        return DB::table('actuating')->insert($data);
    }

    public function editTugas($id_actuating, $data)
    {
        DB::table('actuating')->where('id_actuating', '=' ,$id_actuating)->update($data);
    }

    public function deleteTugas($id_actuating)
    {
        DB::table('actuating')->where('id_actuating', $id_actuating)->delete();
    }
}
