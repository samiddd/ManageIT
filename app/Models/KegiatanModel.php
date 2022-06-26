<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KegiatanModel extends Model
{

    //protected $table = 'KegiatanModel';
    public function allData()
    {

        return DB::table('kegiatan')->get();
    }

    public function detailData($id_kegiatan)
    {
        return DB::table('planning')->join('kegiatan', 'planning.id_kegiatan', '=', 'kegiatan.id_kegiatan')->select(
            'planning.*',
            'kegiatan.nama_kegiatan',
            'kegiatan.tanggal_kegiatan',
            'kegiatan.waktu_kegiatan',
            'planning.id_kegiatan as id_kegiatan'
        )->where('planning.id_kegiatan', $id_kegiatan)->first();
    }

    public function getDataKegiatanById($id)
    {
        return DB::table('kegiatan')->where('id_kegiatan', $id)->first();
    }

    public function addData($data)
    {
        DB::table('kegiatan')->insert($data);
    }

    public function editData($id_kegiatan, $data)
    {
        DB::table('kegiatan')->where('id_kegiatan', $id_kegiatan)->update($data);
    }

    public function deleteData($id_kegiatan)
    {
        DB::table('kegiatan')->where('id_kegiatan', $id_kegiatan)->delete();
    }
}
