<?php

namespace App\Controller;

use App\Model\Adresses;
use App\Model\Equipements;
use App\Model\Locations;
use App\Model\Utilisateur;
use App\AppRepoManager;
use App\Model\Chambres;
use Laminas\Diactoros\ServerRequest;

class FormController
{
    public function createARoom(ServerRequest $request): void
    {

        $room_data = $request->getParsedBody();

        $user_id = $_SESSION['USER']->id;
        $new_room = new Chambres($room_data);
        $new_address = new Adresses($room_data);
        $new_room->addresses = $new_address;

        $message = AppRepoManager::getRm()->getFormRepo()->createARoom( $new_room, $room_data['equipments'], $user_id);

        $_SESSION[ 'FORM_RESULT' ] = $message;
        header( 'Location: /creer_chambre' );
    }

}