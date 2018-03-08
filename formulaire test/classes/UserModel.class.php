<?php
/**
 * Created by PhpStorm.
 * User: Sxt
 * Date: 24/01/2018
 * Time: 10:36
 */

class UserModel extends Model {


    /**
     * --------------------------------------------------
     * METHODES
     * --------------------------------------------------
     **/


    /** createNews
     * [Inscrire les données de mailing dans la base de donnée.]
     * @param $pseudo
     * @param $mail
     */
    public function createNews($pseudo, $mail){
        try {
            if ( ( $reponse = $this->pdo->prepare ('INSERT INTO user_mail(`email`,`pseudo`) VALUES ( :email , :pseudo)' )  ) !== false ) {
                return $reponse->execute(
                    array(
                        "email" => $mail,
                        "pseudo" => $pseudo
                    )
                );
            }
        }catch( PDOException $e ) {
            die( $e->getMessage( ) );
        }
    }

    /** deleteNews
     * [Supprime les données de mailing dans la base de donnée.]
     * @param $mail
     */

    public function deleteNews($mail){
        try {
            if ( ( $reponse = $this->pdo->prepare ('DELETE FROM `user_mail` WHERE `email` = :email' )  ) !== false ) {
                return $reponse->execute(
                    array(
                        "email" => $mail
                    )
                );
            }
        }catch( PDOException $e ) {
            die( $e->getMessage( ) );
        }
    }

    /** createUser
     * [Inscrire les données de création de compte utilisateur dans la base de donnée.]
     * @param $name
     * @param $lname
     * @param $bday
     * @param $mail
     * @param $pseudo
     * @param $pass
     */
    public function createUser($name, $lname, $bday, $mail, $username, $pass){
        try {
            if ( ( $reponse = $this->pdo->prepare ('INSERT INTO user(`user_name`, `user_l_name`, `user_b_day`, `user_crea_day`, `user_email`, `user_username`, `user_pass`) VALUES ( :name, :lname, :bday, :creadate, :mail , :username, :pass)' )  ) !== false ) {
                return $reponse->execute(
                    array(
                        "name" => $name,
                        "lname" => $lname,
                        "bday" => $bday,
                        "creadate" => date("j, n, Y"),
                        "mail" => $mail,
                        "username" => $username,
                        "pass" => $pass
                    )
                );
            }
        }catch( PDOException $e ) {
            die( $e->getMessage( ) );
        }
    }

    /** deleteUser
     * [Effacer les données de compte utilisateur dans la base de donnée.]
     * @param $user_id
     */
    public function deleteUser($user_id){
        try {
            if ( ( $reponse = $this->pdo->prepare ('DELETE FROM `user` WHERE `user_id` = :user_id' )  ) !== false ) {
                return $reponse->execute(
                    array(
                        "user_id" => $user_id
                    )
                );
            }
        }catch( PDOException $e ) {
            die( $e->getMessage( ) );
        }
    }

    /** updateUser
     * [Mettre à jour les données de compte utilisateur dans la base de donnée.]
     * @param $user_id
     * @param $name
     * @param $lname
     * @param $bday
     * @param $mail
     * @param $pseudo
     */
    public function updateUser($user_id, $name, $lname, $bday, $mail, $pseudo){
    try {
        if ( ( $reponse = $this->pdo->prepare ('UPDATE `user` SET `user_name`=:name, `user_l_name`=:lname, `user_b_day`=:bday, `user_email`=:mail, `user_username`=:pseudo WHERE `user_id` = :user_id' )  ) !== false ) {
            return $reponse->execute(
                array(
                    "user_id" => $user_id,
                    "name" => $name,
                    "lname" => $lname,
                    "bday" => $bday,
                    "mail" => $mail,
                    "pseudo" => $pseudo
                )
            );
            }
    }catch( PDOException $e ) {
        die( $e->getMessage( ) );
    }
}

    /** select
     * [Récupère les données d'un compte utilisateur spécifique dans la base de donnée.]
     * @param $user_id
     */
    public function select($user_id) {
        try {
            if( ( $perso = $this->pdo->prepare( 'SELECT * FROM `user` WHERE `id` = :user_id' ) )!==false ) {
                if ($perso->bindValue( 'id', $user_id )) {
                    if ($perso->execute()) {
                        $data = $perso->fetch(PDO::FETCH_ASSOC);
                        $user = new User();
                        $user->setUserId($data['user_id']);
                        $user->setUserName($data['user_name']);
                        $user->setUserLName($data['user_l_name']);
                        $user->setUserBDay($data['user_b_day']);
                        $user->setUserEmail($data['user_email']);
                        $user->setUserUsername($data['user_username']);
                        return $user;
                    }
                }
            }
            return false;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

}