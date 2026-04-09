<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
  public function index()
  {
    $model = new BarangModel();
    $data['barang'] = $model->findAll();

    return view('barang/index', $data);
  }

  public function create()
  {
    return view('barang/create');
  }

  public function store()
  {
    $model = new BarangModel();

    $data = [
      'nama_barang' => $this->request->getPost('nama_barang'),
      'harga'       => $this->request->getPost('harga'),
      'stok'        => $this->request->getPost('stok'),
    ];

    if (!$model->save($data)) {
      return redirect()->back()->with('error', 'Gagal tambah data');
    }

    return redirect()->to('/barang')->with('success', 'Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    $model = new BarangModel();
    $data['barang'] = $model->find($id);

    return view('barang/edit', $data);
  }

  public function update($id)
  {
    $model = new BarangModel();

    $data = [
      'nama_barang' => $this->request->getPost('nama_barang'),
      'harga'       => $this->request->getPost('harga'),
      'stok'        => $this->request->getPost('stok'),
    ];

    $model->update($id, $data);

    return redirect()->to('/barang')->with('success', 'Data berhasil diupdate');
  }

  public function delete($id)
  {
    $model = new BarangModel();
    $model->delete($id);

    return redirect()->to('/barang')->with('success', 'Data berhasil dihapus');
  }
}
