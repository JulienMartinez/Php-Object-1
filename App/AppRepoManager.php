<?php

namespace App;

use App\Model\Repository\EquipementRepository;
use App\Model\Repository\FormRepository;
use App\Model\Repository\LocationRepository;
use App\Model\Repository\ChambreRepository;
use App\Model\Repository\UtilisateurRepository;
use LidemCore\RepositoryManager;

class AppRepoManager
{
	use RepositoryManager;

	private ChambreRepository $roomRepository;
	public function getRoomRepo(): ChambreRepository { return $this->roomRepository; }

    private EquipementRepository $equipRepository;
    public function getEquipRepo(): EquipementRepository { return $this->equipRepository; }

    private LocationRepository $rentsRepository;
    public function getRentsRepo(): LocationRepository { return $this->rentsRepository; }

    private UtilisateurRepository $userRepository;
    public function getUserRepo(): UtilisateurRepository { return $this->userRepository; }

    private FormRepository $formRepository;
    public function getFormRepo(): FormRepository { return $this->formRepository; }

	protected function __construct()
	{
		$config = App::getApp();

		$this->roomRepository   = new ChambreRepository( $config );
        $this->equipRepository  = new EquipementRepository( $config );
        $this->rentsRepository  = new LocationRepository( $config );
        $this->userRepository   = new UtilisateurRepository( $config );
        $this->formRepository   = new FormRepository( $config );
	}
}