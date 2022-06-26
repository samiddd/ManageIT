<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganizingModel extends Model
{
    protected $casts = [
        'tanggal_tugas' => 'date:Y-m-d',
    ];

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

    public function getPICDivisi($id){
        // return DB::table('divisi')->join('users', 'divisi.id_user', '=', 'users.id')->select(
        //     'divisi.*',
        //     'users.nama_user',
        //     'divisi.id_user as id'
        // )->where('divisi.id_user', $id)->get();
        return DB::table('users')->where('id', $id)->first();
    }

    public function addDivisi($data)
    {
        DB::table('divisi')->insert($data);
    }

    public function editDivisi($id_divisi, $data)
    {
        DB::table('divisi')->where('id_divisi', $id_divisi)->update($data);
    }

    public function deleteDivisi($id_divisi)
    {
        DB::table('divisi')->where('id_divisi', $id_divisi)->delete();
    }

    public function TaskThisDivisi($id_divisi)
    {
        // return DB::table('tugas')->where('id_divisi', $id_divisi)->get();

        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->get();
    }

    public function countTaskThisDivisi($id_divisi)
    {
        // return DB::table('tugas')->where('id_divisi', $id_divisi)->get();

        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->count();
    }

    public function upcomingTaskThisDivisi($id_divisi)
    {
        // return DB::table('tugas')->where('id_divisi', $id_divisi)->get();

        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->where('tugas.status', 0)->get();
    }

    public function taskDoneThisDivisi($id_divisi)
    {
        // return DB::table('tugas')->where('id_divisi', $id_divisi)->get();

        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->where('tugas.status', 1)->get();
    }

    public function countTaskDoneThisDivisi($id_divisi)
    {
        // return DB::table('tugas')->where('id_divisi', $id_divisi)->get();

        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->where('tugas.status', 1)->count();
    }

    public function countProgress($id_divisi){
        $allTask = DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->count();
        
        $taskDone = DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_divisi', $id_divisi)->where('tugas.status', 1)->count();

$countProgress = round($taskDone/$allTask*100,0);

return $countProgress;
    }

    public function addTugas($data)
    {
        DB::table('tugas')->insert($data);
    }

    public function editTugas($id_tugas, $data)
    {
        DB::table('tugas')->where('id_tugas', '=' ,$id_tugas)->update($data);
    }

    public function deleteTugas($id_tugas)
    {
        DB::table('tugas')->where('id_tugas', $id_tugas)->delete();
    }

    public function TaskThisKegiatan($id_kegiatan)
    {
        // return DB::table('tugas')->where('id_divisi', $id_divisi)->get();

        return DB::table('tugas')->join('users', 'tugas.id_user', '=', 'users.id')->select(
            'tugas.*',
            'users.nama_user',
            'users.whatsapp',
            'tugas.id_user as id'
        )->where('tugas.id_kegiatan', $id_kegiatan)->get();
    }
}
