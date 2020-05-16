<?php
// home.php
session_start();
$pageTitle = 'Home';
require 'include/header.inc.php';
require_once 'include/php.inc.php';
require_once 'include/functions.inc.php';
?>

<h1 class='welcome'><?= isset($_SESSION['first_name']) ? 'Welcome Back '.$_SESSION['first_name'] : ''?></h1>
<div id="message"></div>
<div class="container-fluid" id="content">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="preview-zone hidden">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                    <div><b>Images Previewed Here</b></div>
                                </div>
                                <div class="box-body"></div>
                            </div>
                        </div>
                        <div>
                        <div id="alert">
                            <?php
                                if (!empty($message)) {
                                    echo "<p class=\"mt-4\">{$message}</p>";
                                }
                            ?>
                        </div>
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
<!-- <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script defer src="js/script.js"></script>

<?php require 'include/footer.inc.php' ?>