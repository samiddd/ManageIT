<?php

namespace App\Http\Controllers;
use App\Models\KegiatanModel;
use App\Models\UserModel;
use App\Models\ControllingModel;
use App\Models\OrganizingModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

// require 'vendor/autoload.php';

class ControllingController extends Controller
{
    public function __construct()
    {
        $this->ControllingModel = new ControllingModel();
        $this->OrganizingModel = new OrganizingModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->UserModel = new UserModel();
    }

    public function updateProgressDivisi($id_divisi)
    {
        $data = [
            'progress' => Request()->OrganizingModel->countProgress($id_divisi),
        ];

        $this->OrganizingModel->editDivisi($id_divisi, $data);
        // return redirect()->route('kegiatan.organizing.index', $id_kegiatan)->with('pesan', 'Divisi berhasil ditambahkan!');
        return redirect()->back()->withInput()->with('pesan', 'Divisi berhasil diedit!');
    }

    public function indexDivisi($id_kegiatan)
    {
        $data = [
            'divisi' => $this->OrganizingModel->divisiThisEvent($id_kegiatan),
            'kegiatan' => $this->KegiatanModel->getDataKegiatanById($id_kegiatan),
            //'countProgress' => $this->OrganizingModel->countProgress($id_divisi),
        ];
        // dd($data);
        
        return view('controlling.controlling_divisi', $data);
    }

    public function indexTask($id_divisi){
        $data = [
            'upcomingTask' => $this->OrganizingModel->upcomingTaskThisDivisi($id_divisi),
            'taskDone' => $this->OrganizingModel->taskDoneThisDivisi($id_divisi),
            'divisi' => $this->OrganizingModel->getDivisiById($id_divisi),
            'user' => $this->UserModel->allUser(),
            'countTaskDone' => $this->OrganizingModel->countTaskDoneThisDivisi($id_divisi),
            'allTask' => $this->OrganizingModel->countTaskThisDivisi($id_divisi),
            'countProgress' => $this->OrganizingModel->countProgress($id_divisi),
            
        ];
        $update = [
            'progress' => $this->OrganizingModel->countProgress($id_divisi),
        ];

        $this->OrganizingModel->editDivisi($id_divisi, $update);

        return view('controlling.indexTask', $data);
        return redirect()->back()->withInput()->with('pesan', 'Tugas berhasil diedit!');
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
            'id_divisi' => Request()->id_divisi
        ];
        // dd($data); 
        $update = $this->OrganizingModel->editTugas($id_tugas, $data);
        // dd($update);
        return redirect()->back()->withInput()->with('pesan', 'Tugas berhasil diedit!');
    }

    public function tugasSelesai($id_tugas)
    {
        $data = [
            'status' => 1,
        ];

        $this->OrganizingModel->editTugas($id_tugas, $data);
        return redirect()->back()->withInput()->with('pesan', 'Tugas telah diselesaikan!');
    }

    public function tugasundo($id_tugas)
    {
        $data = [
            'status' => 0,
        ];

        $this->OrganizingModel->editTugas($id_tugas, $data);
        return redirect()->back()->withInput()->with('pesan', 'Tugas telah diselesaikan!');
    }

    public function hitungProgress($id_divisi){
        $count = $this->OrganizingModel->TaskThisDivisi($id_divisi)->count();
        dd($count);
    }

    public function showData($id_divisi=1){
        $events =  $this->OrganizingModel->taskThisDivisi($id_divisi);
        
        return response()->json($events);
    }

    public function calendar($id_kegiatan)
    {   $events = array();
        $data = $this->OrganizingModel->taskThisKegiatan($id_kegiatan);
        $kegiatan = $this->KegiatanModel->getDataKegiatanById($id_kegiatan);
        foreach ($data as $data) {
            $events[] = [
                'title' => $data->nama_tugas,
                'start' => $data->tanggal_tugas,
            ];
        }
        
        return view('calendar', ['events' =>$events], ['kegiatan'=>$kegiatan]);
    }
}
