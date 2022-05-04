<?php

namespace App\Model;

use LidemCore\Model;

class Utilisateur extends Model
{
    const CLIENT = 1;
    const ANNOUNCER = 2;

    public int    $id;
    public string $nickname;
    public string $password;
    public string $mail;
    public int    $user_type;
}