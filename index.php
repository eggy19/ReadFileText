<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read File</title>
</head>

<body>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message']) {
        printf('<b>%s</b>', $_SESSION['message']);
        unset($_SESSION['message']);
    }
    ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <span>upload a File : </span>
        <table>
            <tr>
                <td><input type="file" name="uploadedFile"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Upload" name="uploadBtn"></td>
            </tr>
        </table>
    </form>
    <br>

    <?php
    //Menampilkan Upload File
    if (isset($_SESSION['file'])) {
        # code...
        $testfile = $_SESSION['file'];
        $file = fopen($testfile, "r");

        if (!$file) {
            die("File TIdak ada");
        } else {
            while (!feof($file)) {
                echo fgets($file) . '<br>';
            }
        }
    }
    unset($_SESSION['file']);
    ?>


</body>

</html>