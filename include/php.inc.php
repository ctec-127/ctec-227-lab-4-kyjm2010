<?php 



if(isset($_GET['file'])) {
    copy($_SESSION['username'] . "/" . $_GET['file'], 'stored/' . $_GET['file']);

    if (unlink($_SESSION['username'] . "/" . $_GET['file'])) {
        header("Location: gallery.php");
        $message = "<p class=\"bg-upload\">That file could not be deleted.</p>";
    } else {
        $message = '<p class=\"bg-error\">That file could not be deleted.</p>';
    }
}
    $upload_errors = array(
        UPLOAD_ERR_OK 				=> "No errors.",
        UPLOAD_ERR_INI_SIZE  		=> "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE 		=> "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL 			=> "Partial upload.",
        UPLOAD_ERR_NO_FILE 			=> "No file.",
        UPLOAD_ERR_NO_TMP_DIR 		=> "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE 		=> "Can't write to disk.",
        UPLOAD_ERR_EXTENSION 		=> "File upload stopped by extension.");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $tmp_file = $_FILES['file_upload']['tmp_name'];
        $target_file = basename($_FILES['file_upload']['name']);
        $upload_dir = $_SESSION['username'];

        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            $message = "<p class=\"bg-success\">File Uploaded!</p>";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = "<p class=\"bg-error\">$upload_errors[$error]</p>";
        }
    }


    
   
?>
