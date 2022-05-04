<?php

namespace App\Model;

use LidemCore\Model;

class Adresses extends Model
{
    public int      $id;
    public string   $country;
    public string   $city;
    public string   $address;
}