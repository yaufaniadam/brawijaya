<?php

namespace App\Controllers;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

use App\Models\KategoriModel;
use App\Models\TugasModel;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\SupervisorModel;
use App\Models\AbsenModel;
use CodeIgniter\Validation\Rules;

class Sidang extends BaseController
{
    protected $tugas_model;
    protected $kategori_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    protected $absen_model;
    public function __construct()
    {
        $this->tugas_model = new TugasModel();
        $this->kategori_model = new KategoriModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SupervisorModel();
        $this->absen_model = new AbsenModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Daftar Sidang',
            'page_header' => 'Daftar Sidang',
            'query' => $this->tugas_model->getSidang()
        ];

        return view('sidang/index', $data);
    }

    public function detail($id_sidang)
    {
        $data = [
            'title' => 'Sidang',
            'sidang' => $this->tugas_model->detailSidang($id_sidang),
            'daftar_hadir' => $this->tugas_model->daftarHadirSidang($id_sidang),
            'page_header' => 'Detail Sidang',
        ];

        // dd($data);

        return view('sidang/detail', $data);
        // dd($this->tugas_model->detailSidang($id_sidang));
    }

    public function absen()
    {
        $id_sidang = $this->request->getVar('id_sidang');
        // Create a basic QR code
        $qrCode = new QrCode(base_url('sidang/isiabsen/' . $id_sidang));
        // $qrCode = new QrCode('https://asdf.com');
        // $qrCode->setSize(300);
        // $qrCode->setMargin(10);

        // Set advanced options
        // $qrCode->setWriterByName('png');
        // $qrCode->setEncoding('UTF-8');
        // $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        // $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        // $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        // $qrCode->setLabel('Scan the code', 16, __DIR__ . '/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER());
        // $qrCode->setLogoPath(__DIR__ . '/../assets/images/symfony.png');
        // $qrCode->setLogoSize(150, 200);
        // $qrCode->setValidateResult(false);

        // Round block sizes to improve readability and make the blocks sharper in pixel based outputs (like png).
        // There are three approaches:
        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_MARGIN); // The size of the qr code is shrinked, if necessary, but the size of the final image remains unchanged due to additional margin being added (default)
        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_ENLARGE); // The size of the qr code and the final image is enlarged, if necessary
        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_SHRINK); // The size of the qr code and the final image is shrinked, if necessary

        // Set additional writer options (SvgWriter example)
        // $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

        // Directly output the QR code
        // header('Content-Type: ' . $qrCode->getContentType());
        // echo $qrCode->writeString();

        // Save it to a file
        // $qrCode->writeFile(base_url('/qr_code/qr.png'));
        // $qrCode->writeFile(__DIR__ . '/../../public/qr_code/qrcode.png');
        $qrCode->writeFile(FCPATH . 'qr_code/qrcode.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)


        $data = [
            'data_uri' => $qrCode->writeDataUri(),
            'title' => 'QR Code',
            'page_header' => 'QR Code',
        ];

        // dd($data);

        return view('sidang/absen', $data);
        // echo $qrCode->writeDataUri();
    }

    public function isiAbsen($id_sidang = 0)
    {
        $data = [
            'id_ppds' => session('user_id'),
            'id_sidang' => $id_sidang,
        ];

        // dd($this->absen_model->isAbsen($id_sidang));

        if ($this->absen_model->isAbsen($id_sidang) == false) {
            if ($this->absen_model->insert($data)) {
                return redirect()->to(base_url('sidang/' . $id_sidang))->with('success', 'Berhasil melakukan absensi!');
            }
        } else {
            return redirect()->to(base_url('sidang/' . $id_sidang))->with('warning', 'Anda sudah terabsen!');
        }
    }
}
