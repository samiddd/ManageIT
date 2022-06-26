<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ControllingModel extends Model
{
    use HasFactory;

    public function allDivisi()
    {
        return DB::table('divisi')->get();
    }

    public function divisiThisEvent($id_kegiatan)
    {
        return DB::table('divisi')->where('id_kegiatan', $id_kegiatan)->get();
    }

    public function getDivisiById($id)
    {
        return DB::table('divisi')->where('id_divisi', $id)->first();
    }

    public function taskThisDivisi($id_divisi)
    {
        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.nomor_whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->get();
    }

    public function editTugas($id_tugas, $data)
    {
        DB::table('tugas')->where('id_tugas', '=' ,$id_tugas)->update($data);
    }

}
