<?php

namespace App\Model;

use LidemCore\Model;

class Locations extends Model
{
    public int    $id;
    public string $date_start;
    public string $date_end;
    public int    $user_id;
    public int    $room_id;

    public ?Chambres $room = null;


}