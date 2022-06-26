<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanModel;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->KegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'kegiatan' => $this->KegiatanModel->allData(),
        ];
        return view('my-event', $data);
    }

    public function detail($id_kegiatan)
    {
        $data = [
            'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
        ];
        return view('kegiatan.detail_kegiatan', $data);
    }

    //ga perlu panggil view karna kita pake modal
    // public function edit($id_kegiatan)
    // {
    //     return view('edit_kegiatan')
    // }

    public function kelola($id_kegiatan)
    {

        $data = [
            // 'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan), 
            'id' => $id_kegiatan
        ];
        return view('kegiatan.kelola_kegiatan', $data);
    }



    public function organizing($id_kegiatan)
    {
        $data = [
            'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
        ];
        return view('kegiatan.organizing_panitia', $data);
    }

    public function add()
    {
        Request()->validate([
            'nama_kegiatan' => 'required|unique:kegiatan,nama_kegiatan|max:35',
            'tanggal_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib di isi',
            'nama_kegiatan.max:35' => 'Nama kegiatan terlalu panjang',
            'tanggal_kegiatan.required' => 'Tanggal kegiatan wajib di isi',
            'waktu_kegiatan.required' => 'Jam kegiatan wajib di isi',
        ]);

        $data = [
            'nama_kegiatan' => Request()->nama_kegiatan,
            'tanggal_kegiatan' => Request()->tanggal_kegiatan,
            'waktu_kegiatan' => Request()->waktu_kegiatan,
        ];

        $this->KegiatanModel->addData($data);
        return redirect()->route('/kegiatan')->with('pesan', 'Kegiatan berhasil di tambahkan!');
    }

    public function editData($id_kegiatan)
    {
        Request()->validate([
            'nama_kegiatan' => 'required|unique:kegiatan,nama_kegiatan|max:35',
            'tanggal_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib di isi',
            'nama_kegiatan.max:35' => 'Nama kegiatan terlalu panjang',
            'tanggal_kegiatan.required' => 'Tanggal kegiatan wajib di isi',
            'waktu_kegiatan.required' => 'Jam kegiatan wajib di isi',
        ]);

        $data = [
            'nama_kegiatan' => Request()->nama_kegiatan,
            'tanggal_kegiatan' => Request()->tanggal_kegiatan,
            'waktu_kegiatan' => Request()->waktu_kegiatan,
        ];

        $this->KegiatanModel->editData($id_kegiatan, $data);
        return redirect()->route('/kegiatan')->with('pesan', 'Kegiatan berhasil di edit!');
    }

    public function delete($id_kegiatan)
    {
        $this->KegiatanModel->deleteData($id_kegiatan);
        return redirect()->route('/kegiatan')->with('pesan', 'Data Berhasil di Hapus!');
    }

    public function planning($id_kegiatan)
    {
        $data = [
            'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
        ];
        return view('kegiatan.planing_ketua', $data);
    }

    public function calendar()
    {   
        return view('calendar');
    }
}
