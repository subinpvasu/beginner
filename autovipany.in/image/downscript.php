<?php
$file_name = "monjulla pennalle.mp3";
function download_file($file_name) {

    if (!file_exists($file_name)) { die("<b>404 File not found!</b>"); }
   
    $file_extension = strtolower(substr(strrchr($file_name,"."),1));
    $file_size = filesize($file_name);
    $md5_sum = md5_file($file_name);
   
   //This will set the Content-Type to the appropriate setting for the file
    switch($file_extension) {
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "mp3": $ctype="audio/mpeg"; break;
        case "mpg":$ctype="video/mpeg"; break;
        case "avi": $ctype="video/x-msvideo"; break;

        //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
        case "php":
        case "htm":
        case "html":
        case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

        default: $ctype="application/force-download";
    }
   
    if (isset($_SERVER['HTTP_RANGE'])) {
        $partial_content = true;
        $range = explode("-", $_SERVER['HTTP_RANGE']);
        $offset = intval($range[0]);
        $length = intval($range[1]) - $offset;
    }
    else {
        $partial_content = false;
        $offset = 0;
        $length = $file_size;
    }
   
    //read the data from the file
    $handle = fopen($file_name, 'r');
    $buffer = '';
    fseek($handle, $offset);
    $buffer = fread($handle, $length);
    $md5_sum = md5($buffer);
    if ($partial_content) $data_size = intval($range[1]) - intval($range[0]);
    else $data_size = $file_size;
    fclose($handle);
   
   
    header("Content-Length: " . $data_size);
    header("Content-md5: " . $md5_sum);
    header("Accept-Ranges: bytes");   
    if ($partial_content) header('Content-Range: bytes ' . $offset . '-' . ($offset + $length) . '/' . $file_size);
    header("Connection: close");
    header("Content-type: " . $ctype);
    header('Content-Disposition: attachment; filename=' . $file_name);
    echo $buffer;
    flush();
}

    ob_end_clean();
    ob_start();
    header( 'Content-Type:' );

function readfile_chunked( $filename, $retbytes = true ) {
    $chunksize = 1 * (1024 * 1024); 
    $buffer = '';
    $cnt = 0;
    $handle = fopen( $filename, 'rb' );
    if ( $handle === false ) {
        return false;
    }
    ob_end_clean(); 
    ob_start(); 
    header( 'Content-Type:' ); 
    while ( !feof( $handle ) ) {
        $buffer = fread( $handle, $chunksize );
       
        echo $buffer;
        ob_flush();
        flush();
        if ( $retbytes ) {
            $cnt += strlen( $buffer );
        }
    }
    $status = fclose( $handle );
    if ( $retbytes && $status ) {
        return $cnt; 
    }
    return $status;
}
?>
