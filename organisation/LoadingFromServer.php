<?php




    function printReports() {

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=organisation", "root", "");
            $pdo->exec("set names utf8");
            $result = $pdo->query("SELECT * FROM reports");

            $counter = 1;


            foreach ($result as $row) {
                //echo $row["titel"] . $row["id"];

                echo "<div class='box'>";
                echo "<div class='boxContainer'><div class='boxTitel'>". $row["titel"] ."</div><div class='boxTimeStamp'>" . $row["datum"]."</div></div>";
                echo "<div class='boxText'>".$row["inhalt"]."</div>";
                echo "<div class='boxAuthor'>" .$row["author"] . "</div>";
                echo "</div>";
                $counter += 1;
            }

            if ($counter == 1) {
                noData();
            }
        }catch (Exception $e) {
            anErrorOccured();
        }
    }

    function printBugs() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=organisation", "root", "");
            $pdo->exec("set names utf8");
            $result = $pdo->query("SELECT * FROM bugs");

            $counter = 1;

            foreach ($result as $row) {

            // echo "<li>" . $row["titel"] . " <a href='blog_verwaltung.php?action=loeschen&id=>Löschen".$row['id'].'>' .  "</li>";

                echo "<div class='box'>";
                echo "<div class='boxContainer'><div class='boxTitel'><a href='organisation.php?aktion=loeschen&tabel=bugs&id=".$row["id"]."'>Erledigt</a></div><div class='boxTimeStamp'>" . $row["datum"]."</div></div>";
                echo "<div class='boxText' style='padding-bottom: 2rem'>".$row["text"]."</div>";
                echo "</div>";
                $counter += 1;
            }

            if ($counter == 1) {
                noData();
            }

        }catch (Exception $e) {
            anErrorOccured();
        }
    }

    function printToDo() {

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=organisation", "root", "");
            $pdo->exec("set names utf8");
            $result = $pdo->query("SELECT * FROM todo");


            $counter = 1;


            foreach ($result as $row) {

                echo "<div class='box'>";
                echo "<div class='boxContainer'><div class='boxTitel'><a href='organisation.php?aktion=loeschen&tabel=todo&id=".$row["id"]."'>Erledigt</a></div><div class='boxTimeStamp'>" . $row["datum"]."</div></div>";
                echo "<div class='boxText' style='padding-bottom: 2rem'>".$row["text"]."</div>";
                echo "</div>";

                $counter += 1;
            }

            if ($counter == 1) {
                noData();
            }
        } catch (Exception $ex) {
            anErrorOccured();
        }
    }


    function anErrorOccured() {
        echo "<div class='box'><div class='boxError'>Es ist leider ein Fehler passiert, als wir die Daten laden wollten. Versuche es später erneut.</div></div>";
    }

    function noData() {
        echo "<div class='box'><div class='boxError'>Keine Daten vorhanden!</div></div>";
    }
?>