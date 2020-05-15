<?php 
function display_error_bucket($errorBucket){
    echo '<div class="errorBucket pt-4" role="alert">';
    echo '<p>The following errors were deteced:</p>';
        echo '<ul>';
        foreach ($errorBucket as $text){
            echo '<li>' . $text . '</li>';
        }
        echo '</ul>';
    echo '</div>';
}

function display_images(){
    $dir=$_SESSION['username'];
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while($filename = readdir($dir_handle)){
                if (!is_dir($filename)) {
                    echo "<div class=\"block\"><img src=\"$dir/$filename\" alt=\"A photo\"><br><a href=\"gallery.php?file=$filename\" class=\"bg-delete\"><span>Delete Photo</span></a></div>";
                }
            }
            closedir($dir_handle);
        }
    }
}