<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlanningModel extends Model
{

    protected $table = 'planning';

    protected $fillable = [
        'latar_belakang_kegiatan',
        'tujuan_kegiatan',
        'deskripsi_kegiatan',
        'sasaran_kegiatan',
        'tempat_kegiatan',
        'id_kegiatan',
    ];
    public function detailData($id_kegiatan)
    {
        return DB::table('planning')->join('tabel_kegiatan', 'planning.id_kegiatan', '=', 'tabel_kegiatan.id_kegiatan')->select(
            'planning.*',
            'tabel_kegiatan.nama_kegiatan',
            'planning.id_kegiatan as id_kegiatan'
        )->where('planning.id_kegiatan', $id_kegiatan)->first();
    }

    public function detailKegiatan($id_kegiatan)
    {
        $data = [
            'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
        ];
        return view('kegiatan.detail_kegiatan', $data);
    }

    public function detailPlanning($id_kegiatan)
    {
        return DB::table('planning')->where('id_kegiatan', $id_kegiatan)->first();
    }


    public function UpdateInsert($id_planning, $data)
    {
        DB::table('planning')->where('id_planning', $id_planning)->updateOrInsert($data);
    }

    public function addData($data)
    {
        DB::table('planning')->insert($data);
    }

    public function editData($id_kegiatan, $data)
    {
        DB::table('planning')->where('id_kegiatan', $id_kegiatan)->update($data);
    }
}
