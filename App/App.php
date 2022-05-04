<?php

namespace App;

use App\Controller\DetailController;
use App\Controller\PageController;
use App\Controller\ChambreController;
use App\Controller\LocationController;
use App\Controller\UtilisateurController;
use App\Controller\FormController;
use MiladRahimi\PhpRouter\Exceptions\InvalidCallableException;
use LidemCore\Database\DatabaseConfig;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use LidemCore\View;
use MiladRahimi\PhpRouter\Router;

class App implements DatabaseConfig
{
	private const DB_HOST = 'database';
	private const DB_NAME = 'lamp';
	private const DB_USER = 'lamp';
	private const DB_PASS = 'lamp';

	private static ?self $instance = null;
	public static function getApp(): self
	{
		if( is_null( self::$instance )) self::$instance = new self();

		return self::$instance;
	}

	private Router $router;

	private function __construct() {
		$this->router = Router::create();
	}

	public function getHost(): string
	{
		return self::DB_HOST;
	}

	public function getName(): string
	{
		return self::DB_NAME;
	}

	public function getUser(): string
	{
		return self::DB_USER;
	}

	public function getPass(): string
	{
		return self::DB_PASS;
	}

	public function start(): void
	{
        session_start();
		$this->registerRoutes();
		$this->startRouter();
	}

	private function registerRoutes(): void
	{
		$this->router->get( '/', [ PageController::class, 'inscription' ] );
		$this->router->get( '/connection', [ PageController::class, 'connection' ] );
        $this->router->post( '/registered_i', [ UtilisateurController::class, 'create' ] );
		$this->router->post( '/registered_l', [ UtilisateurController::class, 'auth' ] );
		$this->router->post( '/create_room_post', [ FormController::class, 'createARoom' ] );
		$this->router->post( '/rent_room_post', [ FormController::class, 'rentARoom' ] );
		$this->router->get( '/disconnect', [ UtilisateurController::class, 'disconnect' ] );
        $this->router->get( '/mentions-legales', [ PageController::class, 'legalNotice' ] );
        $this->router->get( '/chambres', [ ChambreController::class, 'listRooms'] );
        $this->router->get( '/creer_chambre', [ PageController::class, 'createRoom'] );
        $this->router->get( '/reservations', [ LocationController::class, 'getRentals' ] );
        $this->router->get( '/chambre', [ DetailController::class, 'getDetails' ] );
	}

	private function startRouter(): void
	{
		try {
			$this->router->dispatch();
		}
		catch( InvalidCallableException $e ) {
			View::renderError();

		}
		catch( RouteNotFoundException $e ) {
			View::renderError( 500 );

		}
	}

	private function __clone() {}
	private function __wakeup() {}
}