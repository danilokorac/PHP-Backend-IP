<?php

    require_once 'DAOClient.php';
    session_start();

    class controllerClient {

        function login() {

            $user = isset($_POST['user'])?$_POST['user']:"";
            $pass = isset($_POST['pass'])?$_POST['pass']:"";

            if(!empty($user) && !empty($pass)) {

                $dao = new DAOClient();
                $exist = $dao->clientExist($user, $pass);

                if($exist == true) {
                    $_SESSION['klijent'] = $user;
                    $dao->updateLogInTime($user, $pass);
                    include_once '../public/prikaz.php';
                } else {
                    $msg = "Ne postoji klijent sa datim imenom!";
                    include_once '../public/viewForma.php';
                }

            } else {

                $msg = "Morate popuniti sva polja!";
                include_once '../public/viewForma.php';
            }

        }

        function logout() {
            
            if(isset($_SESSION['klijent'])) {
                session_unset();
                session_destroy();
                include_once '../public/viewForma.php';
            }
        }
    }
?>