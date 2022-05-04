<?php

namespace App\Model;

use LidemCore\Model;

class Chambres extends Model
{
    const PRIVATE_HOUSE = 1;
    const PRIVATE_ROOM  = 2;
    const SHARED_ROOM   = 3;


	public int    $id;
	public int    $room_type;
	public int    $surface;
	public string $description;
	public int    $nb_sleep;
	public float  $price;
	public int    $owner_id;
	public int    $address_id;
	public bool   $is_published;



    public ?Adresses $addresses = null;
    public array $equipments = [];
    public array $rents = [];
}