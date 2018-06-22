<?php
    function init() {
        if (isset($_POST)) {
            $pdo = new PDO("mysql:host=localhost;dbname=organisation", "root", "");
            $pdo->exec("set names utf8");


            if (isset($_POST["section"])) {

                switch ($_POST["section"]) {
                    case "reports":
                        if (isset($_POST["titel"]) && $_POST["titel"] != "" && isset($_POST["inhalt"]) && $_POST["inhalt"] != "") {
                            $stmt = $pdo->prepare("INSERT INTO reports (titel, inhalt, author) VALUES (:titel, :inhalt, :author)");
                            $stmt->execute(["titel" => $_POST["titel"], "inhalt" => $_POST["inhalt"], "author" => $_POST["author"]]);

                            //header...
                            header("location:organisation.php");
                        }
                        break;
                    case "todo":
                        if (isset($_POST["inhalt"]) && $_POST["inhalt"] != "") {
                            $stmt = $pdo->prepare("INSERT INTO todo (text) VALUES (:text)");
                            $stmt->execute( ["text" => $_POST["inhalt"]]);

                            //header...
                            header("location:organisation.php");
                        }
                        break;
                    case "bugs":
                        if (isset($_POST["inhalt"]) && $_POST["inhalt"] != "") {
                            $stmt = $pdo->prepare("INSERT INTO bugs (text) VALUES (:text)");
                            $stmt->execute( ["text" => $_POST["inhalt"]]);

                            //header...
                            header("location:organisation.php");
                        }
                        break;

                }



            }
        }

        if (isset($_GET["aktion"])) {
            $pdo = new PDO("mysql:host=localhost;dbname=organisation", "root", "");
            $pdo->exec("set names utf8");

            $id = $_GET["id"];
            $tabel = $_GET["tabel"];

            $stmt = $pdo->prepare("DELETE FROM ". $tabel . " WHERE id=(:id)");
            $stmt->execute(["id" => $id]);


            header("location:organisation.php");
        }
    }

    init();
?>