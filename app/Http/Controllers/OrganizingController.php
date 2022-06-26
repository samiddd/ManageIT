<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizingModel;
use App\Models\KegiatanModel;
use App\Models\UserModel;
use Symfony\Contracts\Service\Attribute\Required;

class OrganizingController extends Controller
{
    public function __construct()
    {
        $this->OrganizingModel = new OrganizingModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->UserModel = new UserModel();
    }

    public function indexDivisi($id_kegiatan)
    {
        $data = [
            'divisi' => $this->OrganizingModel->divisiThisEvent($id_kegiatan),
            'kegiatan' => $this->KegiatanModel->getDataKegiatanById($id_kegiatan),
            'user' => $this->UserModel->allUser(),
        ];
        // dd($data);
        return view('organizing.organizing_divisi', $data);
    }

    public function addDivisi($id_kegiatan)
    {
        Request()->validate([
            'nama_divisi' => 'required|unique:divisi,nama_divisi',
            'id_divisi' => 'unique:divisi',
        ], [
            'nama_divisi.required' => 'Nama divisi harus diisi!',
            'nama_divisi.unique' => 'Nama divisi sudah ada!',
        ]);

        $data = [
            'nama_divisi' => Request()->nama_divisi,
            'id_kegiatan' => $id_kegiatan,
        ];

        $this->OrganizingModel->addDivisi($data);
        return redirect()->route('kegiatan.organizing.indexDivisi', $id_kegiatan)->with('pesan', 'Divisi berhasil ditambahkan!');
    }

    public function editDivisi($id_divisi)
    {
        Request()->validate([
            'nama_divisi' => 'required',
        ], [
            'nama_divisi.required' => 'Nama divisi harus diisi!',
        ]);

        $data = [
            'nama_divisi' => Request()->nama_divisi,
            // 'divisi' => $this->OrganizingModel->allDivisi(),
            'id_user' => Request()->id_user,
            ];

        // return dd($data); 

        $this->OrganizingModel->editDivisi($id_divisi, $data);
        // return redirect()->route('kegiatan.organizing.index', $id_kegiatan)->with('pesan', 'Divisi berhasil ditambahkan!');
        return redirect()->back()->withInput()->with('pesan', 'Divisi berhasil diedit!');
    }

    public function editPICDivisi($id_divisi)
    {
        $data = [
            'id_user' => Request()->id_user,
            'status_pic' => 1,
            ];

        // return dd($data); 

        $this->OrganizingModel->editDivisi($id_divisi, $data);
        // return redirect()->route('kegiatan.organizing.index', $id_kegiatan)->with('pesan', 'Divisi berhasil ditambahkan!');
        return redirect()->back()->withInput()->with('pesan', 'Divisi berhasil diedit!');
    }

    public function deleteDivisi($id_divisi)
    {
        $this->OrganizingModel->deleteDivisi($id_divisi);
        return redirect()->back()->withInput()->with('pesan', 'Data Berhasil di Hapus!');
    }

    public function indexTask($id_divisi){
        $data = [
            'tugas' => $this->OrganizingModel->taskThisDivisi($id_divisi),
            'divisi' => $this->OrganizingModel->getDivisiById($id_divisi),
            'pic' => $this->OrganizingModel->getPICDivisi($this->OrganizingModel->getDivisiById($id_divisi)->id_user),
            'user' => $this->UserModel->allUser(),
            'user1' => $this->UserModel->allUser(),
            'user2' => $this->UserModel->allUser(),
        ];
        //   dd($data);
        return view('organizing.tugas.organizing_tugasDivisi', $data);
    }

    public function addTugas($id_divisi)
    {
        Request()->validate([
            'nama_tugas' => 'required|unique:tugas,nama_tugas',
            'id_tugas' => 'unique:tugas',
        ], [
            'nama_tugas.required' => 'Nama tugas harus diisi!',
            'nama_tugas.unique' => 'Nama tugas sudah ada, silahkan tambahkan keterangan lainnya.',
        ]);

        $divisi = $this->OrganizingModel->getDivisiById($id_divisi);

        $data = [
            'nama_tugas' => Request()->nama_tugas,
            'id_divisi' => $id_divisi,
            'id_prioritas' => Request()->id_prioritas,
            'tanggal_tugas' => Request()->tanggal_tugas,
            'waktu_tugas' => Request()->waktu_tugas,
            'id_user' => Request()->id_user,
            'status' => 0,
            'id_kegiatan' => $divisi->id_kegiatan,
        ];
         //dd($data);  
        $this->OrganizingModel->addTugas($data);
        return redirect()->route('kegiatan.organizing.indexTask', $id_divisi)->with('pesan', 'Tugas berhasil ditambahkan!');
    }

    public function editTugas($id_tugas)
    {
        Request()->validate([
            'nama_tugas' => 'required|unique:tugas,nama_tugas',
            'id_tugas' => 'unique:tugas',
        ], [
            'nama_tugas.required' => 'Nama tugas harus diisi!',
            'nama_tugas.unique' => 'Nama tugas sudah ada, silahkan tambahkan keterangan lainnya.',
        ]);
        
        $data = [
            'nama_tugas' => Request()->nama_tugas,
            'id_prioritas' => Request()->id_prioritas,
            'tanggal_tugas' => Request()->tanggal_tugas,
            'waktu_tugas' => Request()->waktu_tugas,
            'id_user' => Request()->id_user,
            'id_divisi' => Request()->id_divisi,
            
        ];
        // dd($data); 
        $update = $this->OrganizingModel->editTugas($id_tugas, $data);
        // dd($update);
        return redirect()->back()->withInput()->with('pesan', 'Tugas berhasil diedit!');
    }

    public function deleteTugas($id_tugas)
    {
        $this->OrganizingModel->deleteTugas($id_tugas);
        return redirect()->back()->withInput()->with('pesan', 'Data Berhasil di Hapus!');
    }

    
}
