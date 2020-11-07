<?php

namespace App\Controllers;

use App\Models\LogbookModel;

class Logbook extends BaseController
{
    protected $logbook_model;

    public function __construct()
    {
        $this->logbook_model = new LogbookModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Logbook',
            'page_header' => 'Logbook PPDS',
            'query' => $this->logbook_model->getLogbook()
        ];

        return view('logbook/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Logbook',
            'page_header' => 'Logbook PPDS',
            'validation' => \Config\Services::validation(),
        ];

        return view('logbook/tambah', $data);
    }

    public function post()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'judul tugas wajib diisi'
                ]
            ],
            'keterangan' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'keterangan wajib diisi'
                ]
            ],
            'waktu' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'waktu wajib diisi',
                ]
            ],
            'pasien' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'nama pasien wajib diisi',
                ]
            ],
            'usia' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'usia pasien wajib diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'jenis kelamin pasien wajib diisi',
                ]
            ],
            'jenis_tindakan' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'jenis tindakan wajib diisi',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_ppds' => session('user_id'),
            'waktu' => $this->request->getVar('waktu'),
            // 'id_spv' => $this->request->getVar('id_spv'),
            'pasien' => $this->request->getVar('pasien'),
            'usia' => $this->request->getVar('usia'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            // 'rekam_medik' => $this->request->getFile('rekam_medik'),
            'jenis_tindakan' => $this->request->getVar('jenis_tindakan'),
        ];
        // dd($data);
        if ($this->logbook_model->insert($data)) {
            return redirect()->to(base_url('/logbook'))->with('success', 'logbook baru berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('warning', 'terjadi kesalahan :(');
        }
    }

    public function detail($id_logbook)
    {
        $data = [
            'title' => 'Detail Logbook',
            'page_header' => 'Detail Logbook',
            'query' => $this->logbook_model->detail($id_logbook),
        ];
        dd($data);
    }
}
