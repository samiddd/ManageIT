<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanningModel;
use App\Models\KegiatanModel;

class PlanningController extends Controller
{
    public function __construct()
    {
        $this->PlanningModel = new PlanningModel();
        $this->KegiatanModel = new KegiatanModel();
    }

    public function index($id_planning)
    {
        $kegiatan =  $this->KegiatanModel->detailData($id_planning);
        $planning = $this->PlanningModel->detailPlanning($id_planning);

        if ($kegiatan == null) {
            $kegiatan = $this->KegiatanModel->getDataKegiatanById($id_planning);

            $data = [
                'kegiatan' => $kegiatan,
            ];

            return view('kegiatan.planing_create', $data);
        } else {

            $planning = $this->PlanningModel->detailPlanning($id_planning);
            $data = [
                'kegiatan' => $kegiatan,
                'planning' => $planning,
            ];

            return view('kegiatan.planing_edit', $data);
        }
    }

    public function addData($id_kegiatan)
    {
        Request()->validate([
            'latar_belakang_kegiatan' => 'required',
            'tujuan_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'sasaran_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'id_kegiatan' => 'unique:planning',
        ], [
            'latar_belakang_kegiatan.required' => 'Latar belakang kegiatan wajib di isi',
            'tujuan_kegiatan.required' => 'Tujuan kegiatan wajib di isi',
            'deskripsi_kegiatan.required' => 'Deskripsi kegiatan wajib di isi',
            'sasaran_kegiatan.required' => 'Sasaran kegiatan wajib di isi',
            'tempat_kegiatan.required' => 'Tempat kegiatan wajib di isi',
        ]);

        $data = [
            'latar_belakang_kegiatan' => Request()->latar_belakang_kegiatan,
            'tujuan_kegiatan' => Request()->tujuan_kegiatan,
            'deskripsi_kegiatan' => Request()->deskripsi_kegiatan,
            'sasaran_kegiatan' => Request()->sasaran_kegiatan,
            'tempat_kegiatan' => Request()->tempat_kegiatan,
            'id_kegiatan' => $id_kegiatan,
        ];

        $this->PlanningModel->addData($data);
        return redirect()->route('kegiatan.planning.index', $id_kegiatan)->with('pesan', 'Data Berhasil di Simpan');
    }

    public function editData($id_kegiatan)
    {
        Request()->validate([
            'latar_belakang_kegiatan' => 'required',
            'tujuan_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'sasaran_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
        ], [
            'latar_belakang_kegiatan.required' => 'Latar belakang kegiatan wajib di isi',
            'tujuan_kegiatan.required' => 'Tujuan kegiatan wajib di isi',
            'deskripsi_kegiatan.required' => 'Deskripsi kegiatan wajib di isi',
            'sasaran_kegiatan.required' => 'Sasaran kegiatan wajib di isi',
            'tempat_kegiatan.required' => 'Tempat kegiatan wajib di isi',
        ]);

        $data = [
            'latar_belakang_kegiatan' => Request()->latar_belakang_kegiatan,
            'tujuan_kegiatan' => Request()->tujuan_kegiatan,
            'deskripsi_kegiatan' => Request()->deskripsi_kegiatan,
            'sasaran_kegiatan' => Request()->sasaran_kegiatan,
            'tempat_kegiatan' => Request()->tempat_kegiatan,
        ];

        $this->PlanningModel->editData($id_kegiatan, $data);
        return redirect()->route('kegiatan.planning.index', $id_kegiatan)->with('pesan', 'Data Berhasil di Edit');
    }
}
