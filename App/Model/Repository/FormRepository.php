<?php

namespace App\Model\Repository;
use App\Model\Equipements;
use App\Model\Locations;
use App\Model\Chambres;
use App\Model\Utilisateur;
use Laminas\Diactoros\ServerRequest;
use LidemCore\Repository;

class FormRepository extends Repository
{

    protected function getTableName(): string
    {
        // TODO
    }

    public function createARoom(Chambres $room, array $equipments_ids, int $user_id): string
    {

        $q1 =  'INSERT INTO addresses (`country`, `city`, `address`)
                VALUES (:country, :city, :address)';

        $sth1 = $this->pdo->prepare( $q1 );

        if( !$sth1 ) return 'Nous avons rencontrés un probleme avec l\'adresse, veuillez réesseyer !';

        $success1 = $sth1->execute( [
            'country'   => $room->addresses->country,
            'city'      => $room->addresses->city,
            'address'   => $room->addresses->address
        ] );

        $q2 =  'INSERT INTO rooms (room_type`, `surface`, `description`, `nb_sleep`, `price`,
                   owner_id`, `address_id`)
                VALUES (:room_type, :surface, :description, :nb_sleep, :price, :owner_id, :address_id)';

        $sth2 = $this->pdo->prepare( $q2 );

        if( !$sth2 ) return 'Nous avons rencontrés un probleme avec la chambre , veuillez réesseyer !';


        $success2 = $sth2->execute( [

            'room_type'     => $room->room_type,
            'surface'       => $room->surface,
            'description'   => $room->description,
            'nb_sleep'      => $room->nb_sleep,
            'price'         => $room->price,
            'owner_id'      => $user_id,
            'address_id'    => $this->pdo->lastInsertId()
        ] );


                $q3 =  'INSERT INTO link_equipments (`room_id`, `equipment_id`)
                        VALUES (:room_id, :equipment_id)';

                $sth = $this->pdo->prepare( $q3 );

                if( !$sth ) return 'Nous avons rencontrés un probleme avec l\'adresse, veuillez réesseyer !';

                $room_id = $this->pdo->lastInsertId();

                foreach ($equipments_ids as $id){
                $success3 = $sth->execute( [
                    'room_id'       => $room_id,
                    'equipment_id'  => $id
                ] );
            }



        return 'Succés ! La chambre est bien en ligne !';
    }
}
