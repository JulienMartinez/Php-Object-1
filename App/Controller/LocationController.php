<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;
use App\Model\Utilisateur;

class LocationController
{

    public function getRentals(): void
    {
        if (empty($_SESSION['USER'])) {
            View::renderError(403);
        } else {
            if ($_SESSION['USER']->user_type === Utilisateur::CLIENT) {
                $view_data = [
                    'h1_tag' => 'Vos réservations',
                    'rents' => AppRepoManager::getRm()->getRentsRepo()->showAllRentsForCustomer($_SESSION['USER']->id),
                ];
                $view = new View( 'pages/rents' );
                $view->title = 'Vos chambres';
                $view->render( $view_data );
            }
            if (($_SESSION['USER']->user_type === Utilisateur::ANNOUNCER) ) {
                $view_data = [
                    'h1_tag' => 'Réservations sur vos chambres',
                    'rents' => AppRepoManager::getRm()->getRentsRepo()->showAllRentsForOwner($_SESSION['USER']->id)
                ];
                $view = new View( 'pages/rents' );
                $view->title = 'Vos chambres';
                $view->render( $view_data );
            }
        }
    }
}