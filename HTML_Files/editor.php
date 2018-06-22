<?php
   function init() {
//    session_start();
//    if(!isset($_SESSION["user"])){
//        header("location:login.php");
//        echo "Not printed";
//
//    }

       $pdo = new PDO("mysql:host=localhost;dbname=73DB", "root", "");
       $pdo->exec("set names utf8");
       if (isset($_POST["header"])) {
            $stmt = $pdo->prepare("INSERT INTO news (date, articleHeader, article, additional_info) VALUES (:datum, :header, :article, :footer)");
            $stmt->execute(["datum" => $_POST["datum"], "header" => $_POST["header"], "article" => $_POST["article"], "footer" => $_POST["footer"]]);
       }
       if (isset($_GET["aktion"]) && $_GET["aktion"] == "loeschen"){
           $stmt = $pdo->prepare("DELETE FROM news WHERE id=:id");
           $stmt->execute(["id" =>$_GET["id"]]);

       }
    }
function prepareData(){
    $pdo = new PDO("mysql:host=localhost;dbname=73DB", "root", "");
    $pdo->exec("set names utf8");

    $result = $pdo->query("SELECT * FROM news");
    foreach ($result as $row)
    {
        echo "<div class='article_container'> 
                    <p class='date'> " . $row["date"] . " </p>
                    <div class=\"article_header\">
                        <p> " . $row["articleHeader"] . "</p>
                    </div>
                   <div class=\"article\">
                        <p>" . $row["article"] .  "</p>
                    </div>
                    <div class=\"additional_info\">
                        <p>" . $row["additional_info"] . "</p>
                    </div>
                    
                    <a href='editor.php?aktion=loeschen&id=" . $row["id"]. "'>Löschen</a>
                </div>


           ";

    }



}

init();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAB-73-Editor</title>
    <link rel="stylesheet" href="../Projects/PhobitSupportWebsite/style/basic.css">
    <link rel="stylesheet" href="../Projects/PhobitSupportWebsite/style/news.css">
    <link rel="stylesheet" href="../Projects/PhobitSupportWebsite/style/feedback.css">


</head>
<body>
    <a href="../Projects/PhobitSupportWebsite/sites/feedback.html">zurück</a>
    <h1 style="text-align: center">News Editor</h1>

    <form style="display: flex;
                flex-direction: column;
                align-items: center;"
          action="editor.php" method="post" >
        <input class="inputSmall" type="text" placeholder="Datum" name="datum">
        <input class="inputSmall" type="text" placeholder="Header" name="header">
        <textarea class="inputBig" type="text" placeholder="Artikel" name="article"></textarea>
        <input class="inputSmall" type="text" placeholder="Footer" name="footer">
        <button class="submitButton" type="submit">Abschicken</button>
    </form>


    <h1 style="text-align: center">:::NEWS:::</h1>


    <div class="articles">
        <?php prepareData() ?>
    </div>
</body>
</html>