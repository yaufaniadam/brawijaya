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
				'title' => 'Dashboard',
				'page_header' => 'Dashboard',
				'user_data' => $this->user_model->getCurrentUserData(),
				'my_ilmiah' => $this->tugas_model->countMyIlmiah(),
				'my_tugas_besar' => $this->tugas_model->countMyTugasBesar(),
				'incoming_sidang' => $this->tugas_model->incomingSidang(),
				'my_incoming_sidang' => $this->tugas_model->myIncomingSidang(),
			];
			return view('home', $data);
		} else {
			$data = [
				'title' => 'Dashboard',
				'page_header' => 'Dashboard',
				'number_of_ppds' => $this->user_model->countUserByRole(4),
				'number_of_spv' => $this->user_model->countUserByRole(3),
				'number_of_new_users' => $this->user_model->countNewUsers(),
			];
			return view('home', $data);
		}
		// }
	}

	//--------------------------------------------------------------------

}
