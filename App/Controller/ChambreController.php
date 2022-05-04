<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;

class ChambreController
{

	public function listRooms(): void
	{
        if ($_SESSION['USER']){
            $view_data = [
                'h1_tag' => 'Nos Chambres',
                'rooms_all' => AppRepoManager::getRm()->getRoomRepo()->findAllComplete(),
                'rooms_by_customer' => AppRepoManager::getRm()->getRoomRepo()->findAllComplete()
            ];

            $view = new View( 'pages/locations' );
            $view->title = 'Toutes nos chambres';
            $view->render( $view_data );

        } else {
            View::renderError(403);
        }
	}
}