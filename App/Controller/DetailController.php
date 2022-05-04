<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;

class DetailController
{

    public function getDetails(): void
    {
        if (empty($_GET['id'])){
            View::renderError();
            die();
        }

        $view_data = [
            'title'         => 'La Chambre',
            'room_by_id'    => AppRepoManager::getRm()->getRoomRepo()->findCompleteByRoom($_GET['id']),
        ];

        $view = new View( 'pages/details' );
        $view->title = 'Chambre';
        $view->render( $view_data );
    }
}