<?php 
    require_once 'include/php.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Inspirations Image Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/738255dfdd.js" crossorigin="anonymous"></script>

<body>
    <div class="container-fluid">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="preview-zone hidden">
                                <div class="box box-solid">
                                    <h2><img src="images/art.png" alt=""></h2>
                                    <div class="box-header with-border">
                                    <div><b>Images Previewed Here</b></div>
                                </div>
                                <div class="box-body"></div>
                            </div>
                        </div>
                        <div>
                    <?php
                    if (!empty($message)) {
                        echo "<p id=\"alert\" class=\"mt-4\">{$message}</p>";
                    }
                    ?>
                    </div> 
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <i class="glyphicon glyphicon-download-alt"></i>
                                <p>Choose an image file or drag it here.</p>
                            </div>
                            <input type="file" name="file_upload" class="dropzone">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="bg-upload"><span>Upload</span></button>  
                </div>
            </div>
            </div>
        </form>
        <div class="gallery-container"> 
            <?php 
                display_images();
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>