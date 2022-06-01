<?php

    require_once 'DAOStudent.php';
    session_start();

    class controllerStudent {

        function update() {
            $id = isset($_POST['id'])?$_POST['id']:"";
            $ime = isset($_POST['ime'])?$_POST['ime']:"";
            $prezime = isset($_POST['prezime'])?$_POST['prezime']:"";
            $indeks = isset($_POST['indeks'])?$_POST['indeks']:"";

            if(!empty($id) && !empty($ime) && !empty($prezime) && !empty($indeks)) {

                $dao = new DAOStudent();
                $postoji = $dao->checkIfStudentExist($id);
                if($postoji == true) {

                    $dao->updateStudent($id, $ime, $prezime, $indeks);
                    $_SESSION["korisnik"] = $id;
                    include '../public/prikaz.php';

                } else {
                    $msg = 'Osoba sa unetim ID ne postoji!';
                    include '../public/viewForma.php';
                }

            } else {

                $msg = 'Morate popuniti sva polja!';
                include '../public/viewForma.php';
            }
        }

        function insertStudent() {
            $ime = isset($_POST['ime'])?$_POST['ime']:"";
            $prezime = isset($_POST['prezime'])?$_POST['prezime']:"";
            $indeks = isset($_POST['indeks'])?$_POST['indeks']:"";

            if(!empty($ime) && !empty($prezime) && !empty($indeks)) {

                $dao = new DAOStudent();
                  
                $dao->insertStudent($ime, $prezime, $indeks);
                $msg = 'Student uspesno unet!';                
                include '../public/viewForma.php';

            } else {

                $msg = 'Morate popuniti sva polja!';
                include '../public/viewForma.php';
            }
        }

        function delete() {
            $id = isset($_POST['id'])?$_POST['id']:"";

            $dao = new DAOStudent();

            $dao->deleteStudent($id);
            $msg= 'Student uspesno izbrisan iz baze!';
            include '../public/viewForma.php';
        }

        function logout() {
            
            if(isset($_SESSION["korisnik"])) {
                session_unset();
                session_destroy();
                include_once '../public/viewForma.php';
            }
        }
    }
?>