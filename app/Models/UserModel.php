<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';

  protected $allowedFields = ['username', 'email', 'password'];

  protected $validationRules = [
    'username' => 'required|min_length[3]|is_unique[users.username]',
    'email'    => 'required|valid_email|is_unique[users.email]',
    'password' => 'required|min_length[6]',
    'confirm_password' => 'required|matches[password]'
  ];

  public function getUser($login)
  {
    return $this->where('email', $login)
      ->orWhere('username', $login)
      ->first();
  }
}
