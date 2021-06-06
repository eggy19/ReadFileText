<?php
session_start();
$message = '';

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == "Upload") {

    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

        // get details of the uploaded file
        $fileTmpPath    = $_FILES['uploadedFile']['tmp_name'];
        $fileName       = $_FILES['uploadedFile']['name'];
        $filesize       = $_FILES['uploadedFile']['size'];
        $fileType       = $_FILES['uploadedFile']['type'];
        $fileNameCmps   = explode(".", $fileName);
        $fileExtensions = strtolower(end($fileNameCmps));

        //  sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtensions;

        $allowFiles = array('txt', 'png');

        if (in_array($fileExtensions, $allowFiles)) {

            // lokasi file yg akan di upload
            $fileDir = './uploadFiles/';
            $dest_path = $fileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $message = 'File Berhasil di upload.';
                $file = $dest_path;
            } else {
                $message = 'kesalahan upload saat memindah ke directory';
            }
        } else {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
}

$_SESSION['message'] = $message;
$_SESSION['file'] = $dest_path;
header("Location: index.php");
