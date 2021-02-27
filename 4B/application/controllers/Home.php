<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['kategori'] = $this->db->get('categories')->result_array();
		$data['buku'] = $this->db->get('books')->result_array();
		$this->load->view('home/index', $data);
	}

	public function UpdateBuku()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$stok = $this->input->post('stok');
		$desk = $this->input->post('desk');
		$kategori = $this->input->post('kategori');

		$data = [
			'name' => $name,
			'stok' => $stok,
			'image' => 'default',
			'deskripsi' => $desk,
			'category_id' => $kategori
		];
		$this->db->where('id', $id);
		$this->db->update('books', $data);
		redirect('home');
	}

	public function addbuku()
	{
		$name = $this->input->post('name');
		$stok = $this->input->post('stok');
		$desk = $this->input->post('desk');
		$kategori = $this->input->post('kategori');

		$data = [
			'name' => $name,
			'stok' => $stok,
			'image' => 'default',
			'deskripsi' => $desk,
			'category_id' => $kategori
		];

		$this->db->insert('books', $data);
		redirect('home');
	}

	public function addkategori()
	{
		$name = $this->input->post('name');

		$data = [
			'name' => $name,
		];

		$this->db->insert('categories', $data);
		redirect('home');
	}

	public function UpdateKategori()
	{
		$name = $this->input->post('name');
		$id = $this->input->post('id');

		$data = [
			'name' => $name,
		];
		$this->db->where('id', $id);
		$this->db->update('categories', $data);
		redirect('home');
	}

	public function deleteBuku($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('books');
		redirect('home');
	}

	public function deleteKat($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('categories');
		redirect('home');
	}
}
