<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {
    public function __construct()
	{
		parent::__construct();

		$this->load->model('FakultasModel');
	}

    public function index()
	{
        $data['fakultas'] = $this->FakultasModel->getAll();
		
        $header['title'] = "Fakultas";
		$this->load->view('layout/header', $header);
		$this->load->view('fakultas/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
{
	if ($this->input->post()) {

		$data = [
			'fakultas_id' => $this->input->post('fakultas_id', true),
			'fakultas_name' => $this->input->post('fakultas_name', true),
		];

		$this->FakultasModel->insert($data);

		redirect('fakultas');
	}

	$data['fakultas'] = null;
	$data['action'] = base_url('fakultas/tambah');
	$data['button'] = 'Simpan';

	$header['title'] = 'Tambah Fakultas';

	$this->load->view('layout/header', $header);
	$this->load->view('fakultas/form', $data);
	$this->load->view('layout/footer');
}

	public function ubah($id)
{
    $fakultas = $this->FakultasModel->getById($id);

    if (!$fakultas) {
        show_404();
    }

    if ($this->input->post()) {

        $data = [
            'fakultas_id' => $this->input->post('fakultas_id', true),
            'fakultas_name' => $this->input->post('fakultas_name', true),
        ];

        $this->FakultasModel->update($id, $data);

        redirect('fakultas');
    }

    $data['fakultas'] = $fakultas;
    $data['action'] = base_url('fakultas/ubah/'.$id);
    $data['button'] = 'Update';

    $header['title'] = 'Ubah Fakultas';

    $this->load->view('layout/header', $header);
    $this->load->view('fakultas/form', $data);
    $this->load->view('layout/footer');
}

	public function hapus($id)
{
    $this->FakultasModel->delete($id);

    redirect('fakultas');
}

    
}