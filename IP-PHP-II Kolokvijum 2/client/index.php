<?php

    $action = isset($_REQUEST['action'])?$_REQUEST['action']:"";
    require_once 'controllerClient.php';

    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET' : {
            switch($action) {
                case 'forma' :
                    include '../public/viewForma.php';
                    break;
                case 'logout' :
                    $cc = new controllerClient();
                    $cc->logout();
                    break;
            }
        } break;

        case 'POST' : {
            switch($action) {

                case 'login' :
                    $cc = new controllerClient();
                    $cc->login();
                    break;
            }
        } break;
    }
?>