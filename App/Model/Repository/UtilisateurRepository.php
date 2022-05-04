<?php

namespace App\Model\Repository;

use App\Controller\UtilisateurController;
use LidemCore\Repository;
use App\Model\Utilisateur;

class UtilisateurRepository extends Repository
{

    protected function getTableName(): string { return 'user'; }

    public function create(Utilisateur $user ): ?Utilisateur
    {
        $q = sprintf( 'INSERT INTO `%1$s` (`nickname`, `password`, `mail`, `user_type`)
                               VALUES (:nickname, :password, :mail, :user_type)', $this->getTableName() );

        $sth = $this->pdo->prepare( $q );

        if( !$sth ) return null;

        $success = $sth->execute( [
            'nickname'  => $user->nickname,
            'password'  => UtilisateurController::hash($user->password),
            'mail'      => $user->mail,
            'user_type' => $user->user_type
            ] );

        if (!$success) return null;

       $user->id = $this->pdo->lastInsertId();

       return $user;
    }

    public function auth(string $mail, string $password): ?Utilisateur
    {
        $q = sprintf( 'SELECT * FROM `%1$s` as u
                               WHERE u.mail = :mail && u.password = :password', $this->getTableName() );

        $sth = $this->pdo->prepare( $q );
        if( !$sth ) return null;

        $sth->execute( [
            'mail'      => $mail,
            'password'  => UtilisateurController::hash( $password )
        ] );


        $row_data = $sth->fetch();

        if( !( $row_data ) ) return null;
        var_dump($row_data);

        return new Utilisateur( $row_data );
    }
}