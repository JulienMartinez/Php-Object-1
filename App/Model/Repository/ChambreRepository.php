<?php

namespace App\Model\Repository;

use App\AppRepoManager;
use App\Model\Chambres;
use App\Model\Adresses;
use App\Model\Locations;
use LidemCore\Repository;

class ChambreRepository extends Repository
{
	protected function getTableName(): string { return 'rooms'; }

    public function findAllComplete() : array
    {

        $arr_result = [];

        $q = 'SELECT rooms.*, addresses.city, addresses.country, addresses.address 
              FROM rooms
              JOIN addresses 
              ON rooms.address_id = addresses.id';

        $sth = $this->pdo->query( $q );

        if( !$sth ) return $arr_result;

        while( $row_data = $sth->fetch() ) {
            $room = new Chambres($row_data);
            $address_data = [
                'id' => $room->address_id,
                'country' => $row_data['country'],
                'city' => $row_data['city'],
                'address' => $row_data['address'],
            ];



            $room->addresses = new Adresses($address_data);
            $room->equipments = AppRepoManager::getRm()->getEquipRepo()->EquipForRoomId( $room->id );

            $arr_result[] = $room;
        }
        return $arr_result;
    }

    public function findCompleteByRoom( int $room_id ): ?Chambres
    {

        $arr_result = [];

        $q = 'SELECT rooms.*, addresses.city, addresses.country, addresses.address 
              FROM rooms
              JOIN addresses on rooms.address_id = addresses.id
              WHERE rooms.id=:room_id';

        $sth = $this->pdo->prepare( $q );

        if( !$sth ) return $arr_result;

        $sth->execute( [ 'room_id' => $room_id ] );
        while( $row_data = $sth->fetch() ) {
            $room = new Chambres($row_data);
            $address_data = [
                'id' => $room->address_id,
                'country' => $row_data['country'],
                'city' => $row_data['city'],
                'address' => $row_data['address'],
            ];

            $room->addresses = new Adresses($address_data);
            $room->equipments = AppRepoManager::getRm()->getEquipRepo()->EquipForRoomId( $room->id );



            return $room;
        }
    }
}