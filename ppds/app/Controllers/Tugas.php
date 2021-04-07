<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TugasModel;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\SupervisorModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use App\Libraries\Notif;

use CodeIgniter\Validation\Rules;

class Tugas extends BaseController
{
    protected $tugas_model;
    protected $kategori_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    protected $notif;

    public function __construct()
    {
        $this->tugas_model = new TugasModel();
        $this->kategori_model = new KategoriModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SupervisorModel();
        $this->notif = new Notif();
    }

    public function view()
    {
        return redirect()->to(base_url('/tugas/index'));
    }

    public function index($jenis_tugas = 'semua_tugas')
    {
        if ($jenis_tugas == 'ilmiah') {
            $data = [
                'title' => 'Daftar Ilmiah',
                'query' => $this->tugas_model->getAllIlmiah(),
                'page_header' => 'Daftar Ilmiah',
                'stase' => $this->stase_model->getAllStase(),
                'class' => 'semua-ilmiah'
            ];
        } elseif ($jenis_tugas == 'tugas_besar') {
            $data = [
                'title' => 'Tugas Besar',
                'query' => $this->tugas_model->getAllTugasBesar(),
                'page_header' => 'Tugas Besar',
                'class' => 'tugas-besar',
            ];
        } else {
            $data = [
                'title' => 'Semua Tugas',
                'query' => $this->tugas_model->getAlltugas(),
                'page_header' => 'Semua Tugas',
            ];
        }

        return view('tugas/index', $data);
    }

    public function saya($jenis_tugas = 0)
    {
        if ($jenis_tugas == 'ilmiah') {
            $data = [
                'title' => 'Ilmiah Saya',
                'query' => $this->tugas_model->getMyIlmiah(),
                'page_header' => 'Daftar Ilmiah Saya',
                'stase' => $this->stase_model->getAllStase(),
                'class' => ''
            ];
        } elseif ($jenis_tugas == 'tugas_besar') {
            $data = [
                'title' => 'Tugas Besar Saya',
                'query' => $this->tugas_model->getMyTugasBesar(),
                'page_header' => 'Tugas Besar Saya',
                'stase' => $this->stase_model->getAllStase(),
                'class' => ''
            ];
        } else {
            $data = [
                'title' => 'Tugas Saya',
                'query' => $this->tugas_model->getMyTugas(),
                'page_header' => 'Daftar Semua Tugas Saya',
                'stase' => $this->stase_model->getAllStase(),
                'class' => ''
            ];
        }
        return view('tugas/index', $data);
    }

    public function tambah($jenis_tugas = 0)
    {
        $db      = \Config\Database::connect();
        $id_ppds = session('user_id');
        $jumlah_tahap_selesai = $db->query(
            "SELECT 
            COUNT(id) 
            AS jumlah_tahap_selesai
            FROM tahap_ppds
            WHERE id_user = $id_ppds
            AND tanggal_selesai != 0"
        )->getRowObject()->jumlah_tahap_selesai;

        if ($jumlah_tahap_selesai == 4) {
            $semua_tahap_selesai = true;
        } else {
            $semua_tahap_selesai = false;
        }

        if ($semua_tahap_selesai) {
            return redirect()->back()->with('danger', 'tidak ada tugas besar atau ilmiah yang perlu diunggah lagi');
        } else {
            if ($jenis_tugas == 'ilmiah') {
                $data = [
                    'title' => 'Tambah Tugas',
                    'page_header' => 'Ilmiah',
                    'validation' => \Config\Services::validation(),
                    'kategori' => $this->kategori_model->getAllIlmiahKategories(),
                    'penguji' => $this->spv_model->getAllSpv(),
                ];
            } elseif ($jenis_tugas == 'tugas_besar') {
                $data = [
                    'title' => 'Tambah Tugas',
                    'page_header' => 'Tugas Besar',
                    'validation' => \Config\Services::validation(),
                    'kategori' => $this->kategori_model->getAllTugasBesarKategories(),
                    'penguji' => $this->spv_model->getAllSpv(),
                ];
            }
            return view('tugas/tambah', $data);
        }
        // dd($this->kategori_model->getAllTugasBesarKategories());
    }

    public function post()
    {
        $jenis_tugas = $this->request->getVar('jenis_tugas');

        if ($jenis_tugas == 'ilmiah') {
            $jenis = 1;
        } elseif ($jenis_tugas == 'tugas_besar') {
            $jenis = 2;
        }

        if ($jenis == 2) {
            $rules = [
                'judul' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'judul tugas wajib diisi'
                    ]
                ],
                'deskripsi' => [
                    'rules' => ['required'],
                    // |mime_in[photo,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.presentationml.presentation]'
                    'errors' => [
                        'required' => 'deskripsi wajib diisi'
                    ]
                ],
                'id_kategori' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'kategori wajib diisi',
                    ]
                ],
                // 'file' => [
                //     'rules' => ['required'],
                //     'errors' => [
                //         'required' => 'file tugas wajib diisi',
                //     ]
                // ],
                'penguji_1' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'wajib memilih penguji satu',
                    ]
                ],
                // 'penguji_2' => [
                //     'rules' => ['required'],
                //     'errors' => [
                //         'required' => 'wajib memilih penguji dua',
                //     ]
                // ],
                // 'pembimbing_1' => [
                //     'rules' => ['required'],
                //     'errors' => [
                //         'required' => 'wajib memilih pembimbing satu',
                //     ]
                // ],
                // 'pembimbing_2' => [
                //     'rules' => ['required'],
                //     'errors' => [
                //         'required' => 'wajib memilih pembimbing dua',
                //     ]
                // ],
                'jadwal_sidang' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'jadwal sidang wajib diisi',
                    ]
                ],
            ];
        } elseif ($jenis == 1) {
            $rules = [
                'judul' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'judul tugas wajib diisi'
                    ]
                ],
                'deskripsi' => [
                    'rules' => ['required'],
                    // |mime_in[photo,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.presentationml.presentation]'
                    'errors' => [
                        'required' => 'deskripsi wajib diisi'
                    ]
                ],
                'id_kategori' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'kategori wajib diisi',
                    ]
                ],
                // 'file' => [
                //     'rules' => ['required'],
                //     'errors' => [
                //         'required' => 'file tugas wajib diisi',
                //     ]
                // ],
                'jadwal_sidang' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'jadwal sidang wajib diisi',
                    ]
                ],
            ];

            $db      = \Config\Database::connect();
            $builder = $db->table('ci_users');
            $builder->where('id', session('user_id'));
            $id_spv = $builder->get()->getRowObject()->spv;
        }

        // dd($id_spv);

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $file = $this->request->getFile('file');
        $encrypted_file_name = $file->getRandomName();

        $file_pre = $this->request->getFile('file_pre');
        $encrypted_file_pre_name = $file_pre->getRandomName();

        // $id_kategori = $this->request->getVar('id_kategori');

        $penguji_1 = $jenis == 2 ? $this->request->getVar('penguji_1') : 0;
        $penguji_2 = $jenis == 2 ? $this->request->getVar('penguji_2') : 0;

        $data = [
            'id_ppds' => session('user_id'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'file' => $encrypted_file_name,
            'file_presentasi' => $encrypted_file_pre_name,
            'jadwal_sidang' => $this->request->getVar('jadwal_sidang'),
            'id_pembimbing_1' => $this->request->getVar('pembimbing_1'),
            'id_pembimbing_2' => $this->request->getVar('pembimbing_2'),
            'id_penguji_1' => $jenis == 2 ? $this->request->getVar('penguji_1') : 0,
            'id_penguji_2' => $jenis == 2 ? $this->request->getVar('penguji_2') : 0,
            'id_stase' => $this->stase_ppds_model->getCurrentUserStase(),
            'jenis_tugas' => $jenis
        ];

        $result = $this->tugas_model->insert($data);

        if ($jenis_tugas == 'tugas_besar') {
            $url = base_url('/tugas/saya/tugas_besar');
        } elseif ($jenis_tugas == 'ilmiah') {
            $url = base_url('/tugas/saya/ilmiah');
        }

        if ($result) {
            $file->move('ppds_tugas', $encrypted_file_name);
            $file_pre->move('ppds_presentasi', $encrypted_file_pre_name);

            $file_pdf_loc = realpath('ppds_tugas/' . $encrypted_file_name);
            $file_pre_loc = realpath('ppds_presentasi/' . $encrypted_file_pre_name);

            $attachment = [
                'dokumen' => $file_pdf_loc,
                'presentasi' => $file_pre_loc
            ];

            $db      = \Config\Database::connect();
            $builder = $db->table('ci_users');

            $builder->select("email");
            $builder->where('role !=', 4);
            $result = $builder->get()->getResultArray();
            $user_emails = $result;

            $this->notif->send_mail($user_emails, 'tugas ppds', 'ppds mengunggah tugas baru', $attachment);

            // mengirim notifikasi lokal
            if ($jenis == 2) {
                $receivers = [
                    ['id' => $this->request->getVar('pembimbing_1')],
                    ['id' => $this->request->getVar('pembimbing_2')],
                    ['id' => $penguji_1],
                    ['id' => $penguji_2],
                ];
            } else {
                $receivers = [
                    ['id' => $this->request->getVar('pembimbing_1')],
                    ['id' => $this->request->getVar('pembimbing_2')],
                ];
            }
            $id_tugas = $this->tugas_model->getInsertID();
            $isi = base_url('tugas/' . $id_tugas);
            $this->notif->send_notif($receivers, 'Tugas Baru', $isi, base_url());
            // 

            if ($jenis == 1) {
                return redirect()->to(base_url('tugas/saya/ilmiah'))->with('success', 'Ilmiah berhasil diunggah!');
            } else {
                return redirect()->to(base_url('tugas/saya/tugas_besar'))->with('success', 'Tugas Besar berhasil diunggah!');
            }
        } else {
            return redirect()->to($url)->with('danger', 'terjadi kesalahan saat mengunggah tugas!');
        }
    }

    public function delete($id_tugas)
    {
        $data_tugas = $this->tugas_model->getSpecificTugas($id_tugas);
        if ($data_tugas['id_ppds'] == session('user_id') || session('role') == 1) {
            if (($data_tugas['nilai_1'] + $data_tugas['nilai_2'] + $data_tugas['nilai_3'] + $data_tugas['nilai_4']) / 4 == 0) {
                $result = $this->tugas_model->delete($id_tugas);
                if ($result) {
                    return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
                }
            }
        } else {
            return redirect()->to(base_url('/tugas/index'))->with('danger', 'Anda tidak punya hak untuk menghapus file ini!');
        }
    }

    public function detail($id_tugas)
    {
        $detail = $this->tugas_model->detailTugas($id_tugas);

        if ($detail['jenis_tugas'] == 1) {
            $data = [
                'title' => 'Ilmiah',
                'page_header' => 'Detail Ilmiah',
                'tugas' => $detail,
                'class' => 'semua-ilmiah'
            ];
        } else {
            $data = [
                'title' => 'Tugas Besar',
                'page_header' => 'Detail Tugas Besar',
                'tugas' => $detail,
                'class' => 'tugas-besar'
            ];
        }

        if ($this->tugas_model->detailTugas($id_tugas)) {
            return view('tugas/detail', $data);
        } else {
            return redirect()->to(base_url())->with('warning', 'tugas tidak ditemukan');
        }
    }

    public function bimbinganSaya($jenis_tugas = 0)
    {
        if ($jenis_tugas == 'ilmiah') {
            $data = [
                'title' => 'Ilmiah',
                'query' => $this->tugas_model->getMyBimbinganIlmiah(),
                'page_header' => 'Daftar Ilmiah',
                'stase' => $this->stase_model->getAllStase()
            ];
        } elseif ($jenis_tugas == 'tugas_besar') {
            $data = [
                'title' => 'Tugas Besar',
                'query' => $this->tugas_model->getMyBimbinganTugasBesar(),
                'page_header' => 'Daftar Tugas Besar',
                'stase' => $this->stase_model->getAllStase()
            ];
        } else {
            $data = [
                'title' => 'Semua Tugas',
                'query' => $this->tugas_model->getMyTugas(),
                'page_header' => 'Daftar Semua Tugas',
                'stase' => $this->stase_model->getAllStase()
            ];
        }
        // dd($data);
        return view('tugas/index', $data);
    }


    public function postNilai()
    {
        $id_tugas = $this->request->getVar('hidden_tugas_id');
        $nilai_1 =  $this->request->getVar('nilai_1');
        $nilai_2 =  $this->request->getVar('nilai_2');
        $nilai_3 =  $this->request->getVar('nilai_3');
        $nilai_4 =  $this->request->getVar('nilai_4');
        $data = [
            'nilai_1' => $nilai_1 == null ? $this->request->getVar('hidden_nilai_1') : $nilai_1,
            'nilai_2' => $nilai_2 == null ? $this->request->getVar('hidden_nilai_2') : $nilai_2,
            'nilai_3' => $nilai_3 == null ? $this->request->getVar('hidden_nilai_3') : $nilai_3,
            'nilai_4' => $nilai_4 == null ? $this->request->getVar('hidden_nilai_4') : $nilai_4,
        ];

        $result = $this->tugas_model->postNilai($id_tugas, $data);

        if ($result) {
            return redirect()->back()->with('success', 'Nilai berhasil dimasukkan!');
        }
    }

    public function edit($id_tugas = 0)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tugas');

        $result = $builder->getWhere(['id' => $id_tugas])->getRowObject();
        $id_ppds = $result->id_ppds;

        $nilai_1 = $result->nilai_1;
        $nilai_2 = $result->nilai_2;
        $nilai_3 = $result->nilai_3;
        $nilai_4 = $result->nilai_4;

        $average = ($nilai_1 + $nilai_2 + $nilai_3 + $nilai_4) / 4;

        if ($average != 0) {
            return redirect()->back()->with('danger', 'tugas yang sudah dinilai tidak bisa diedit');
        }

        if (session('role') != 1) {
            if ($id_ppds != session('user_id')) {
                return redirect()->back()->with('danger', 'anda tidak mempunyai hak untuk menggunakan fitur ini ');
            }
        }

        $jenis_tugas = $builder->getWhere(['id' => $id_tugas])->getRowObject()->jenis_tugas;

        if ($jenis_tugas == 2) {
            $data = [
                'title' => 'Edit Tugas',
                'page_header' => 'Edit Tugas',
                'validation' => \Config\Services::validation(),
                'kategori' => $this->kategori_model->getAllKategoriesBasedOnJenisTugas($id_tugas),
                'data_tugas' => $this->tugas_model->getSpecificTugas($id_tugas),
                'penguji' => $this->spv_model->getAllSpv(),
                'class' => 'tugas-besar'
            ];
        } else {
            $data = [
                'title' => 'Edit Ilmiah',
                'page_header' => 'Edit Ilmiah',
                'validation' => \Config\Services::validation(),
                'kategori' => $this->kategori_model->getAllKategoriesBasedOnJenisTugas($id_tugas),
                'data_tugas' => $this->tugas_model->getSpecificTugas($id_tugas),
                'penguji' => $this->spv_model->getAllSpv(),
                'class' => 'semua-ilmiah'
            ];
        }
        // dd($this->tugas_model->getSpecificTugas($id_tugas));
        return view('/tugas/edit', $data);
    }

    public function update()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tugas');

        $id_tugas = $this->request->getVar('id_tugas');
        $jenis_tugas = $db->query("SELECT * FROM tugas WHERE id = $id_tugas")->getRowObject()->jenis_tugas;

        $rules = [
            'file' => [
                'rules' => ['mime_in[file,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.presentationml.presentation]'],
                'errors' => [
                    'required' => 'format file tidak didukung'
                ]
            ],
            'file_pre' => [
                'rules' => ['mime_in[file,application/vnd.openxmlformats-officedocument.presentationml.presentation]'],
                'errors' => [
                    'required' => 'format file tidak didukung'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        } else {
            if ($this->request->getFile('file') != '') {
                // $file_name = $this->request->getVar('hidden_file');
                $file = $this->request->getFile('file');
                $encrypted_file_name = $file->getRandomName();
            }

            if ($this->request->getFile('file_pre') != '') {
                // $file_name = $this->request->getVar('hidden_file');
                $file_pre = $this->request->getFile('file_pre');
                $encrypted_file_pre_name = $file_pre->getRandomName();
            }

            if ($jenis_tugas == 1) {
                $data = [
                    'judul' => $this->request->getVar('judul'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'id_kategori' => $this->request->getVar('id_kategori'),
                    'file' => ($this->request->getFile('file') == '' ? $this->request->getVar('hidden_file') : $encrypted_file_name),
                    'file_presentasi' => ($this->request->getFile('file_pre') == '' ? $this->request->getVar('hidden_file_pre') : $encrypted_file_pre_name),
                    'jadwal_sidang' => $this->request->getVar('jadwal_sidang'),
                    'id_pembimbing_1' => $this->request->getVar('pembimbing_1') == '' ? $this->request->getVar('hidden_pembimbing_1') : $this->request->getVar('pembimbing_1'),
                    'id_pembimbing_2' => $this->request->getVar('pembimbing_2') == '' ? $this->request->getVar('hidden_pembimbing_2') : $this->request->getVar('pembimbing_2'),
                ];
            } else {
                $data = [
                    'judul' => $this->request->getVar('judul'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'id_kategori' => $this->request->getVar('id_kategori'),
                    'file' => ($this->request->getFile('file') == '' ? $this->request->getVar('hidden_file') : $encrypted_file_name),
                    'file_presentasi' => ($this->request->getFile('file_pre') == '' ? $this->request->getVar('hidden_file_pre') : $encrypted_file_pre_name),
                    'jadwal_sidang' => $this->request->getVar('jadwal_sidang'),
                    'id_penguji_1' => $this->request->getVar('penguji_1') == '' ? $this->request->getVar('hidden_penguji_1') : $this->request->getVar('penguji_1'),
                    'id_penguji_2' => $this->request->getVar('penguji_2') == '' ? $this->request->getVar('hidden_penguji_2') : $this->request->getVar('penguji_2'),
                    'id_pembimbing_1' => $this->request->getVar('pembimbing_1') == '' ? $this->request->getVar('hidden_pembimbing_1') : $this->request->getVar('pembimbing_1'),
                    'id_pembimbing_2' => $this->request->getVar('pembimbing_2') == '' ? $this->request->getVar('hidden_pembimbing_2') : $this->request->getVar('pembimbing_2'),
                ];
            }

            // dd($file_pre->getClientMimeType());
            // dd($data);

            if ($this->tugas_model->updateTugas($id_tugas, $data)) {
                if ($this->request->getFile('file') != '') {
                    $file->move('ppds_tugas', $encrypted_file_name);
                }
                if ($this->request->getFile('file_pre') != '') {
                    $file_pre->move('ppds_presentasi', $encrypted_file_pre_name);
                }
                if ($jenis_tugas == 1) {
                    return redirect()->to(base_url('tugas/saya/ilmiah'))->with('success', 'data tugas berhasil dirubah');
                } else {
                    return redirect()->to(base_url('tugas/saya/tugas_besar'))->with('success', 'data tugas berhasil dirubah');
                }
            }
        }
    }

    public function sidangMailer($subject, $message, $file,  $file_pre)
    {
        require_once "vendor/autoload.php";

        $db      = \Config\Database::connect();
        $builder = $db->table('ci_users');

        $builder->select("email");
        $builder->where('role !=', 4);
        $result = $builder->get()->getResultArray();
        $user_emails = $result;

        // $info_ppds = $this->user_model->userProfile();
        // $email_ppds = $info_ppds->email;

        //PHPMailer Object
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

        $mail->From = "admin@mcvupdate.com";
        $mail->FromName = "Admin";

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@mcvupdate.com';                     // SMTP username
        $mail->Password   = 'rumahsakit';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        foreach ($user_emails as $user_email) {

            //Recipients
            $mail->ClearAllRecipients();
            $mail->setFrom('bokergaming002@gmail.com', 'Mailer');
            $mail->addAddress($user_email['email']);     // Add a recipient

            // Attachments
            if ($file) {
                $mail->addAttachment($file);         // Add attachments
                $mail->addAttachment($file_pre);         // Add attachments
            }

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tugas baru';
            $mail->Body    = "Tugas baru ditambahkan oleh PPDS";

            try {
                $mail->send();
                echo "Message has been sent successfully";
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    }
}
