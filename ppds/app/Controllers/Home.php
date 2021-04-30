<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TugasModel;

class Home extends BaseController
{
	protected $tugas_model;
	protected $kategori_model;
	public function __construct()
	{
		$this->tugas_model = new TugasModel();
		$this->user_model = new UserModel();
	}

	public function index()
	{
		// if (!session()) {
		// 	return redirect()->to('/login');
		// } else {
		// dd($this->user_model->getCurrentUserData());
		$sidangku = $this->tugas_model->incomingSidang();
		if (session('role') == 4) {
			$data = [
				'title' => 'Dashboard PPDS',
				'page_header' => 'Dashboard',
				'user_data' => $this->user_model->getCurrentUserData(),
				'my_ilmiah' => $this->tugas_model->countMyIlmiah(),
				'my_tugas_besar' => $this->tugas_model->countMyTugasBesar(),
				'incoming_sidang' => $this->tugas_model->incomingSidang(),
				'my_incoming_sidang' => $this->tugas_model->myIncomingSidang(),
			];
		} elseif (session('role') == 1) {
			$data = [
				'title' => 'Dashboard Admin',
				'page_header' => 'Dashboard',
				'number_of_ppds' => $this->user_model->countUserByRole(4),
				'number_of_spv' => $this->user_model->countUserByRole(3),
				'number_of_new_users' => $this->user_model->countNewUsers(),
			];
		} elseif (session('role') == 3) {
			$data = [
				'title' => 'Dashboard Supervisor',
				'page_header' => 'Dashboard',
				'ppds_saya' => $this->user_model->jumlahPpdsBimbinganSaya(session('user_id')),
				'ppds_stase_saya' => $this->user_model->jumlahPpdsStatseSaya(session('stase_spv')),
				'number_of_new_users' => $this->user_model->countNewUsers(),
				'number_of_ppds' => $this->user_model->countUserByRole(4),
			];
		}
		// dd($data);
		return view('home', $data);
		// }
	}

	//--------------------------------------------------------------------

}
