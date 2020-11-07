<?php

namespace App\Models;

use CodeIgniter\Model;

class LogbookModel extends Model
{
    protected $table = 'log_book';
    protected $allowedFields = [
        'judul',
        'keterangan',
        'id_ppds',
        'waktu',
        'pasien',
        'jenis_kelamin',
        'usia',
        'jenis_tindakan'
    ];

    public function getLogbook()
    {
        $db = \Config\Database::connect();

        return $db->query(
            "SELECT *,ci_users.nama_lengkap FROM log_book
            LEFT JOIN ci_users ON ci_users.id = log_book.id_ppds
            "
        )->getResultArray();
    }

    public function detail($id_logbook)
    {
        $db = \Config\Database::connect();

        return $db->query(
            "SELECT * FROM log_book
            LEFT JOIN ci_users ON ci_users.id = log_book.id_ppds
            WHERE log_book.id = $id_logbook
            "
        )->getRowObject();
    }
}
