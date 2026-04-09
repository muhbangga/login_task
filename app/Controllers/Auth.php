<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
  public function login()
  {
    return view('auth/login');
  }

  public function processLogin()
  {
    $session = session();
    $model = new UserModel();

    $login = $this->request->getPost('login');
    $password = $this->request->getPost('password');
    $remember = $this->request->getPost('remember');

    $user = $model->getUser($login);

    if ($user && password_verify($password, $user['password'])) {

      $session->set([
        'user_id' => $user['id'],
        'logged_in' => true
      ]);

      // REMEMBER ME (pakai cookie sederhana)
      if ($remember) {
        setcookie('remember_user', $user['id'], time() + (86400 * 30), "/");
      }

      return redirect()->to('/barang');
    }

    return redirect()->back()->with('error', 'Login gagal');
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }

  public function register()
  {
    return view('auth/register');
  }

  public function processRegister()
  {
    $model = new UserModel();

    $data = [
      'username' => $this->request->getPost('username'),
      'email'    => $this->request->getPost('email'),
      'password' => $this->request->getPost('password'),
      'confirm_password' => $this->request->getPost('confirm_password'),
    ];

    if (!$model->validate($data)) {
      return redirect()->back()->with('error', implode(', ', $model->errors()));
    }

    // hash password setelah lolos validasi
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    unset($data['confirm_password']); // buang sebelum save

    $model->save($data);

    return redirect()->to('/')->with('success', 'Registrasi berhasil!');
  }
}
