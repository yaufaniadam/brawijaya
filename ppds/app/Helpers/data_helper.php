<?php

function user_nama_lengkap($id_user = 0)
{
    $db      = \Config\Database::connect();
    $builder = $db->table('ci_users');

    if ($id_user == 0) {
        $query = $builder->getWhere(['id' => session('user_id')])->getRowObject();
    } else {
        $query = $builder->getWhere(['id' => $id_user])->getRowObject();
    }
    return $query->nama_lengkap;
}

function user_photo_profile($id_user = 0)
{
    $db      = \Config\Database::connect();
    $builder = $db->table('ci_users');

    if ($id_user == 0) {
        $query = $builder->getWhere(['id' => session('user_id')])->getRowObject();
    } else {
        $query = $builder->getWhere(['id' => $id_user])->getRowObject();
    }
    return $query->photo;
}


function checkSpvPosition($pos, $id_tugas)
{
    $db      = \Config\Database::connect();

    $posi = $db->query("SELECT $pos FROM tugas WHERE id = $id_tugas")->getRowObject()->$pos;

    if ($posi == session('user_id')) {
        return true;
    } else {
        return false;
    }
}

function getStasePpdsBasedOnTahap($id_tahap, $id_ppds)
{
    $db      = \Config\Database::connect();

    $query   = $db->query(
        "SELECT *,stase.id AS id_stase FROM stase_ppds
        LEFT JOIN stase ON stase.id = stase_ppds.id_stase
        WHERE stase_ppds.id_user = $id_ppds AND stase.id_tahap = $id_tahap"
    )->getResultArray();

    return $query;
}

function getPpdsTugas($jenis_tugas, $id_ppds, $id_stase)
{
    $db      = \Config\Database::connect();

    $query   = $db->query(
        "SELECT *,tugas.id AS id_tugas FROM tugas 
        LEFT JOIN kategori ON kategori.id = tugas.id_kategori
        WHERE tugas.id_ppds = $id_ppds AND tugas.id_stase = $id_stase AND tugas.jenis_tugas = $jenis_tugas AND tugas.deleted_at = 0"
    )->getResultArray();

    return $query;
}

function listNotif()
{
    $db      = \Config\Database::connect();
    $id_user = session('user_id');

    $query   = $db->query(
        "SELECT 
        * 
        FROM notif 
        WHERE receiver = $id_user
        AND status = 0 
        ORDER BY tanggal DESC"
    )->getResultArray();

    return $query;
}

function countNotif()
{
    $db      = \Config\Database::connect();
    $builder = $db->table('notif');
    $id_user = session('user_id');

    $builder->where([
        'receiver' => $id_user,
        'status' => 0
    ]);

    return $builder->countAllResults();
}

function getCurrentPpdsStase()
{
    $db      = \Config\Database::connect();
    $id_user = session('user_id');

    $query   = $db->query(
        "SELECT * FROM `stase_ppds`
         LEFT JOIN stase ON stase.id = stase_ppds.id_stase 
         WHERE stase_ppds.id = 
         (SELECT MAX(id) FROM stase_ppds WHERE id_user = $id_user)"
    )->getRowObject()->stase;

    return $query;
}

function ppdsBimbingan($id_spv)
{
    $db      = \Config\Database::connect();
    $query = $db->query(
        "SELECT 
        ci_users.nama_lengkap,
        ci_users.id AS id_ppds,
        stase_ppds.id_stase,
        stase.stase,
        stase_ppds.tanggal_mulai,
        stase_ppds.tanggal_selesai 
        FROM ci_users
        LEFT JOIN stase_ppds ON stase_ppds.id_user = ci_users.id
        LEFT JOIN stase ON stase.id = stase_ppds.id_stase
        WHERE ci_users.spv = $id_spv"
    )->getResultArray();

    return $query;
}
