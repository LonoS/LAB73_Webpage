<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header("location:login.php");
    }

?>



<?php include "LoadingFromServer.php"; ?>
<?php include "PostNew.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organisation</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/Box.css">
    <link rel="stylesheet" href="styles/CustomAlert.css">
    <script src="javascript/DOMhelper.js" defer="defer"></script>
    <script src="javascript/Add.js" defer="defer"></script>
    <script src="javascript/SitesBar.js" defer="defer"></script>
</head>
<body>

<!-- Custom Alert -->
<div class="baseOverlay">
    <div class="base">
        <form action="organisation.php" method="post">


            <input type="hidden" value="reports" name="section" id="sectionField">

            <table>

                <tr id="titelRow">
                    <td>
                        <label for="titel">Titel:</label>
                    </td>
                    <td>
                        <input type="text" name="titel" id="titel">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="inhalt">Inhalt:</label>
                    </td>
                    <td>
                        <textarea name="inhalt" id="inhalt"></textarea>
                    </td>
                </tr>


                <tr id="authorRow">
                    <td>
                        <label for="author">Author:</label>
                    </td>
                    <td>
                        <input type="text" name="author" id="author">
                    </td>
                </tr>

            </table>
            <div class="buttonBox">
                <button type="submit">Fertig</button>
                <button type="button" id="alertAbbrechen">Abbrechen</button>
            </div>
        </form>
    </div>
</div>




    <header>
        <div class="headline">Organisation 73</div>
        <div class="headline" style="font-size: small">Note: nur hardgecode, "todo" und "bugs" kommen später.</div>
        <div class="headline subheadline">BETA</div>

        <!-- Menu bar for sites -->

        <div class="sitesBar">
            <ul>
                <il class="selected">Reports</il>
                <il>To Do</il>
                <il>Bugs</il>
            </ul>


        </div>
    </header>

    <div class="addButton" id="addBTN">Neuer Eintrag</div>

    <div class="dontDisplay">
        <?php printReports(); ?>
    </div>

    <div class="dontDisplay">
        <?php printToDo(); ?>
    </div>

    <div class="dontDisplay">
        <?php printBugs(); ?>
    </div>





</body>
</html>