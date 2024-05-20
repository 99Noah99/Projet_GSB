<?php

// Get all files in the current directory
$files = glob("*");

// Iterate through each file
foreach ($files as $file) {
    $new_file_name = explode('.téléchargement', $file);
    
    if($new_file_name[0] !== 'rename.php'){
        rename($file, $new_file_name[0]);
    }
}

?>