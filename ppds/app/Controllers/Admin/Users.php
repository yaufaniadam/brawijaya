<?php

namespace App\Controllers\Admin;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TahapModel;
use App\Models\SupervisorModel;
use App\Controllers\BaseController;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\NotifModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users extends BaseController
{
    protected $user_model;
    protected $role_model;
    protected $tahap_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    protected $notif_model;
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->role_model = new RoleModel();
        $this->tahap_model = new TahapModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SuperVisorModel();
        $this->notif_model = new NotifModel();
    }

    public function view()
    {
        $data['title'] = 'Daftar User';
        $data['query'] = $this->user_model->getAll();
        $data['page_header'] = 'Users list';
        return view('admin/users/index', $data);
    }

    public function show()
    {
        $data = [
            'title' => 'Tambah Pengguna Baru',
            'page_header' => 'Tambah Pengguna Baru',
            'validation' => \Config\Services::validation(),
            'role' => $this->role_model->findAll(),
            'spv' => $this->user_model->getSpv(),
            'stase' => $this->stase_model->getAllStase(),
        ];
        return view('admin/users/add', $data);
    }

    public function post()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');
        $supervisor = $this->request->getVar('spv');
        $stase = $this->request->getVar('stase');

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[ci_users.username]',
                'errors' => [
                    'required' => 'username cant be empty',
                    'is_unique' => 'username already taken'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[ci_users.email]',
                'errors' => [
                    'required' => 'email cant be empty',
                    'is_unique' => 'email already taken'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password cant be empty',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'role cant be empty',
                ]
            ],
            // 'spv' => [
            //     'rules' => ['']
            // ]
        ])) {
            // dd(session());

            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role,
            'spv' => $supervisor,
            'stase' => $stase,
        ];

        $is_supervisor_exist = $this->spv_model->getSpecificSpv($supervisor);

        if ($data['role'] == 4) {
            if ($is_supervisor_exist) {
                if ($this->user_model->insert($data)) {
                    date_default_timezone_set('Asia/Jakarta');
                    $ppds_id = $this->user_model->getInsertID();
                    $dataForTahap = [
                        'id_user' => $ppds_id,
                        'id_tahap' => 1,
                        'tanggal_mulai' => date("Y-m-d")
                    ];
                    $this->tahap_model->insert($dataForTahap);

                    $dataForStase = [
                        'id_user' => $ppds_id,
                        'id_stase' => 1,
                        'tanggal_mulai' => date("Y-m-d")
                    ];
                    $this->stase_ppds_model->insert($dataForStase);
                    return redirect()->to('/admin/users')->with('success', 'Pengguna baru berhasil ditambahkan!');
                }
            } else {
                return redirect()->back()->withInput()->with('danger', 'Data supervisor tidak ditemukan!');
            }
        } else {
            if ($this->user_model->insert($data)) {
                return redirect()->to('/admin/users')->with('success', 'Pengguna baru berhasil ditambahkan!');
            }
        }
    }

    public function delete($user_id)
    {
        $result = $this->user_model->delete($user_id);
        if ($result) {
            return redirect()->to(base_url('admin/users'))->with('success', 'Pengguna berhasil dihapus!');
        } else {
            return redirect()->to(base_url('admin/users'))->with('danger', 'Terjadi kesalahan saat menghapus data :(');
        }
    }

    public function detail($id_ppds)
    {
        $data = [
            'title' => 'Detail User',
            'page_header' => 'Detail User',
            'data_user' => $this->user_model->userProfile($id_ppds),
            'validation' => \Config\Services::validation(),
        ];

        // dd($data);
        return view('admin/users/detail', $data);
    }

    public function lobby()
    {
        $data = [
            'title' => 'Lobby PPDS',
            'page_header' => 'Lobby PPDS',
            'query' => $this->user_model->getPpdsWithoutStase(),
        ];

        // dd($data);

        return view('admin/ppds/lobby', $data);
    }

    public function postPpdsStase()
    {
        $data = [
            'id' => $this->request->getVar('id_stase_ppds'),
            'id_stase' => $this->request->getVar('id_stase'),
            'id_user' => $this->request->getVar('id_ppds'),
        ];

        if ($this->stase_ppds_model->changePpdsStase($data)) {
            // $this->notif_model->insert();
            return redirect()->back()->with('success', 'Stase PPDS berhasil diubah');
        }
    }

    public function ppdsPerStase()
    {
        $data = [
            'title' => 'PPDS Stase Saya',
            'page_header' => 'Daftar PPDS',
            'query' => $this->user_model->getPpdsByStase(),
        ];

        return view('admin/ppds/index', $data);

        // dd($data);
    }

    public function ppdsPerSpv()
    {
        $data = [
            'title' => 'PPDS Bimbingan Saya',
            'page_header' => 'Daftar PPDS',
            'query' => $this->user_model->getPpdsBySpv(),
        ];

        return view('admin/ppds/index', $data);

        // dd($data);
    }

    public function ppds($id_tahap)
    {
        $data = [
            'title' => 'PPDS',
            'page_header' => 'Daftar PPDS',
            'query' => $this->user_model->getPpdsByTahap($id_tahap),
        ];
        // dd($this->user_model->getPpdsByTahap($id_tahap));
        return view('admin/ppds/index', $data);
    }

    public function detailppds($id_ppds)
    {
        $db = \Config\Database::connect();

        $current_tahap_ppds = $db->query(
            "SELECT id_tahap FROM tahap_ppds WHERE id = (
                SELECT MAX(id) FROM tahap_ppds WHERE id_user = $id_ppds
            )"
        )->getRowObject()->id_tahap;

        $jumlah_stase_ppds_on_current_tahap = $db->query(
            "SELECT COUNT(stase_ppds.id) AS jumlah_stase FROM stase_ppds
            LEFT JOIN stase ON stase.id = stase_ppds.id_stase
            WHERE stase_ppds.id_user = $id_ppds AND stase.id_tahap = $current_tahap_ppds"
            //  AND stase_ppds.tanggal_selesai != 0
        )->getRowObject()->jumlah_stase;

        $jumlah_stase_per_tahap = $db->query(
            "SELECT COUNT(id) AS jumlah_stase FROM stase WHERE id_tahap = $current_tahap_ppds"
        )->getRowObject()->jumlah_stase;

        if ($jumlah_stase_ppds_on_current_tahap == $jumlah_stase_per_tahap) {
            $tahap_selesai = true;
        } else {
            $tahap_selesai = false;
        }

        // dd($jumlah_stase_ppds_on_current_tahap);

        $data = [
            'title' => 'Detail User',
            'page_header' => 'Detail User',
            'ppds' => $this->user_model->getUserById($id_ppds),
            'validation' => \Config\Services::validation(),
            'tahap' => $db->query("SELECT * FROM tahap")->getResultArray(),
            'tahap_selesai' => $tahap_selesai,
        ];

        return view('admin/ppds/detail', $data);
        // dd($data);
    }

    // public function sendNotif($data)
    // {
    //     
    // }

    public function staseSelesai()
    {
        $id_ppds = $this->request->getVar('id_ppds');
        $tahap_ppds = $this->tahap_model->getPpdsTahap($id_ppds);
        $jumlah_stase_per_tahap = $this->stase_model->countStasePerTahap($tahap_ppds);
        $jumlah_ppds_stase = $this->stase_ppds_model->countPpdsStaseByTahap($id_ppds, $tahap_ppds);

        // dd($this->request->getVar());

        if ($this->request->getVar('type') == 'stase') {
            if ($this->user_model->staseSelesai($id_ppds)) {
                date_default_timezone_set('Asia/Jakarta');
                $dataForStase = [
                    'id_user' => $id_ppds,
                    'id_stase' => 25,
                    'tanggal_mulai' => date("Y-m-d")
                ];

                $datanotif = [
                    'sender' => session('user_id'),
                    'receiver' => $id_ppds,
                    'title' => 'stase selesai',
                    'isi' => 'stase selesai',
                ];
                $this->naikTahapOrStaseMailer($id_ppds);
                $this->stase_ppds_model->insert($dataForStase);
                $this->notif_model->insert($datanotif);
                return redirect()->to(base_url('/admin/ppds/lobby'))->with('success', 'PPDS telah menyelesaikan stase');
            }
        } elseif ($this->request->getVar('type') == 'tahap') {
            if ($tahap_ppds < 4) {
                if ($this->user_model->staseSelesai($id_ppds)) {
                    date_default_timezone_set('Asia/Jakarta');
                    $dataForStase = [
                        'id_user' => $id_ppds,
                        'id_stase' => 25,
                        'tanggal_mulai' => date("Y-m-d")
                    ];
                    $this->naikTahapOrStaseMailer($id_ppds);
                    $this->stase_ppds_model->insert($dataForStase);
                    if ($this->user_model->tahapSelesai($id_ppds)) {
                        $dataForTahap = [
                            'id_user' => $id_ppds,
                            'id_tahap' => $tahap_ppds + 1,
                            'tanggal_mulai' => date("Y-m-d")
                        ];

                        $this->naikTahapOrStaseMailer($id_ppds);
                        $this->tahap_model->insert($dataForTahap);

                        return redirect()->to(base_url('/admin/ppds/lobby'))->with('success', 'PPDS dinyatakan naik ke tahap selanjutnya');
                    }
                }
            }
        }
    }

    public function naikTahapOrStaseMailer($id_ppds)
    {
        require_once "vendor/autoload.php";

        $info_ppds = $this->user_model->userProfile($id_ppds);
        $email_ppds = $info_ppds->email;

        //PHPMailer Object
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

        //From email address and name
        $mail->From = "admin@miokard.solusidesain.net";
        $mail->FromName = "Full Name";

        //To address and name
        $mail->addAddress($email_ppds); //Recipient name is optional

        //Address to which recipient will reply
        // $mail->addReplyTo("reply@yourdomain.com", "Reply");

        //CC and BCC
        $mail->addCC("cc@example.com");
        $mail->addBCC("bcc@example.com");

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Subject Text";
        $mail->Body = "<i>Mail body in HTML</i>";
        $mail->AltBody = "This is the plain text version of the email content";

        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
