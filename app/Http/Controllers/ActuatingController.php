<?php

namespace App\Http\Controllers;
use App\Models\ActuatingModel;
use App\Models\KegiatanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class ActuatingController extends Controller
{

    public function __construct()
    {
        $this->ActuatingModel = new ActuatingModel();
        $this->KegiatanModel = new KegiatanModel();
    }
    public function indexTask($id_kegiatan){
        $data = [
            'tugas' => $this->ActuatingModel->indexTask(),
            'kegiatan' => $this->KegiatanModel->getDataKegiatanById($id_kegiatan),
        ];
        //dd($data);
        return view('actuating.actuating_index', $data);
    }

    public function addTugas($id_kegiatan)
    {
        Request()->validate([
            'nama_tugas' => 'required|unique:actuating,nama_tugas',
            'id_actuating' => 'unique:actuating',
        ], [
            'nama_tugas.required' => 'Nama tugas harus diisi!',
            'nama_tugas.unique' => 'Nama tugas sudah ada, silahkan tambahkan keterangan lainnya.',
        ]);

        $data = [
            'nama_tugas' => Request()->nama_tugas,
            'id_kegiatan' => $id_kegiatan,
            'id_prioritas' => Request()->id_prioritas,
            'tanggal_tugas' => Request()->tanggal_tugas,
            'waktu_tugas' => Request()->waktu_tugas,
        ];
         //dd($data);  
        $this->ActuatingModel->addTugas($data);
        return redirect()->route('kegiatan.actuating.indexTask', $id_kegiatan)->with('pesan', 'Tugas berhasil ditambahkan!');
    }

    public function editTugas($id_actuating)
    {
        Request()->validate([
            'nama_tugas' => 'required|unique:actuating,nama_tugas',
            'id_actuating' => 'unique:actuating',
        ], [
            'nama_tugas.required' => 'Nama tugas harus diisi!',
            'nama_tugas.unique' => 'Nama tugas sudah ada, silahkan tambahkan keterangan lainnya.',
        ]);

        $data = [
            'nama_tugas' => Request()->nama_tugas,
            'id_prioritas' => Request()->id_prioritas,
            'tanggal_tugas' => Request()->tanggal_tugas,
            'waktu_tugas' => Request()->waktu_tugas,
        ];
        // dd($data); 
        $this->ActuatingModel->editTugas($id_actuating, $data);
        // dd($update);
        return redirect()->back()->withInput()->with('pesan', 'Tugas berhasil diedit!');
    }

    public function deleteTugas($id_actuating)
    {
        $this->ActuatingModel->deleteTugas($id_actuating);
        return redirect()->back()->withInput()->with('pesan', 'Data Berhasil di Hapus!');
    }

}
