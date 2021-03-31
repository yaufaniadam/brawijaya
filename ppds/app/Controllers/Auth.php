<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TahapModel;
use App\Models\SupervisorModel;
use App\Controllers\BaseController;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\NotifModel;

use App\Libraries\Notif;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once "vendor/autoload.php";

class Auth extends BaseController
{
    protected $auth_model;
    protected $user_model;
    protected $role_model;
    protected $tahap_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    protected $notif_model;
    protected $notif;
    public function __construct()
    {
        $this->auth_model = new AuthModel();
        $this->user_model = new UserModel();
        $this->role_model = new RoleModel();
        $this->tahap_model = new TahapModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SuperVisorModel();
        $this->notif_model = new NotifModel();
        $this->notif = new Notif();
    }

    public function login_view()
    {
        if (session('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        } else {
            return view('login');
        }
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $result = $this->auth_model->login($data);

        // dd($result);

        if ($result == true) {
            if ($result['role'] == 3) {
                $user_data = [
                    'user_id' => $result['id'],
                    'user_name' => $result['username'],
                    'role' => $result['role'],
                    'stase_spv' => $result['stase'],
                    'isLoggedIn' => true,
                    'stase' => $result['stase'] != '' ? $result['stase'] : '',
                ];
            } else {
                $user_data = [
                    'user_id' => $result['id'],
                    'user_name' => $result['username'],
                    'role' => $result['role'],
                    'isLoggedIn' => true,
                    'stase' => $result['stase'] != '' ? $result['stase'] : '',
                ];
            }
            $session->set($user_data);
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->back()->with('warning', 'username atau password salah atau akun belum diaktivasi');
        }
        // dd($result);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'spv' => $this->user_model->getSpv(),
        ];
        return view('register', $data);
    }

    public function register_post()
    {
        // dd($this->request->getVar());

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[ci_users.username]',
                'errors' => [
                    'required' => 'username tidak boleh kosong',
                    'is_unique' => 'username sudah terpakai'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[ci_users.email]|valid_email',
                'errors' => [
                    'required' => 'email tidak boleh kosong',
                    'is_unique' => 'email sudah terpakai',
                    'valid_email' => 'email tidak valid',
                ]
            ],
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lengkap wajib diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                ]
            ],
            're_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'konfirmasi password anda',
                    'matches' => 'password tidak cocok',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kolom wajib diisi',
                ]
            ],
            'spv' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'anda belum memilih supervisor',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            "username" => $this->request->getVar("username"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_BCRYPT),
            "email" => $this->request->getVar("email"),
            "nama_lengkap" => $this->request->getVar("nama_lengkap"),
            "jenis_kelamin" => $this->request->getVar("jenis_kelamin"),
            "role" => 4,
            "spv" => $this->request->getVar("spv"),
        ];

        $last_id = $this->user_model->insert($data);
        if ($last_id) {

            //send notif ke email dan notif admin

            $receivers = 3; //id admin
            $isi = 'Registrasi Pengguna Baru';
            $redirect = base_url('/admin/users/' . $last_id);

            $this->notif->send_notif($receivers, 'Registrasi Pengguna baru', $isi, $redirect);

            return redirect()->to(base_url('/login'))->with('success', 'Pendaftaran akun baru berhasil dilakukan, mohon tunggu konfirmasi dari admin.');
        }
    }

    public function forgot_password()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('forgot_password', $data);
    }

    public function send_link_reset_pass()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'email tidak boleh kosong',
                    'is_unique' => 'email sudah terpakai',
                    'valid_email' => 'email tidak valid',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $db      = \Config\Database::connect();
        $builder = $db->table('ci_users');

        $email = $this->request->getVar('email');

        $builder->select('*,email');
        $builder->where(
            [
                'email' => $email,
                'aktif' => 1
            ]
        );
        $is_email_exist_and_aktif = ($builder->countAllResults() > 0 ? true : false);

        $token = base64_encode(random_bytes(32));


        if ($is_email_exist_and_aktif) {

            $builder->where('email', $email);
            $builder->set(['password_reset_code' => $token]);
            $builder->update();

            $link = base_url("reset_password?email=$email" . '&token=' . urlencode($token));

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                // $mail->Username   = 'bokergaming002@gmail.com';                     // SMTP username
                // $mail->Password   = 'harustauapa?';                               // SMTP password
                $mail->Username   = 'admin@mcvupdate.com';                     // SMTP username
                $mail->Password   = 'rumahsakit';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('admin@mcvupdate.com', 'miokardmalang.com');
                $mail->addAddress("$email");     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body    = "Untuk mereset password Anda, silahkan klik link berikut: <br> 
                                 <a href='$link'>Reset Password</a>. <br>
                                 Jika Anda memiliki kendala untuk klik link di atas, silahkan copy URL di bawah ini ke browser Anda: <br>
                                 $link <br>
                                 Jika Anda tidak meminta reset password, Anda bisa abaikan email ini.";

                $mail->send();
                // echo 'Message has been sent';
                return redirect()->back()->with('success', 'Link untuk mereset password telah dikirimkan ke email anda.');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                // return redirect()->to(base_url('/forgot_password'))->with('warning', 'Terjadi kesalahan.');
            }
        } else {
            return redirect()->to(base_url('/forgot_password'))->with('warning', 'Email tidak ditemukan atau belum aktif');
        }
    }

    public function reset_password()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ci_users');

        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $builder->select('*');
        $builder->where(['password_reset_code' => $token]);
        $result = $builder->countAllResults();
        $is_valid = ($result > 0 ? true : false);

        session()->destroy();

        if ($is_valid) {
            $data = [
                'validation' => \Config\Services::validation(),
                'token' => $token,
                'email' => $email
            ];
            return view('reset_password', $data);
        } else {
            return redirect()->to(base_url('/login'))->with('warning', 'link tidak ditemukan');
        }
    }

    public function save_new_pass()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'kolom wajib diisi',
                    'matches' => 'password tidak cocok',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $db      = \Config\Database::connect();
        $builder = $db->table('ci_users');

        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');

        // dd($this->request->getVar());

        $builder->select('*');
        $builder->where(
            [
                'email' => $email,
                'password_reset_code' => $token
            ]
        );
        $is_email_and_token_correct = ($builder->countAllResults() > 0 ? true : false);

        if ($is_email_and_token_correct) {
            $builder->where(
                [
                    'email' => $email,
                    'password_reset_code' => $token
                ]
            );
            $builder->set(['password' => password_hash($password, PASSWORD_BCRYPT)]);
            $result = $builder->update();

            if ($result) {
                $builder->where(
                    [
                        'email' => $email,
                        'password_reset_code' => $token
                    ]
                );
                $builder->set(['password_reset_code' => '']);
                $result = $builder->update();

                return redirect()->to(base_url('/login'))->with('success', 'Password berhasil diubah. Silahkan login kembali.');
            }
        } else {
            return redirect()->to(base_url('/login'))->with('warning', 'link tidak ditemukan');
        }
    }
    //--------------------------------------------------------------------

}
