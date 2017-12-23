<?php
namespace berkaPhp\helpers;
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/11/2017
 * Time: 12:56 AM
 */

class FileStream {

    public  static function writeFile($path, $data) {
        
        if(!file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        $file = $path;
        $handle = fopen($file, 'w') or die('Cannot open file:  '.$file);

        return (fwrite($handle, $data) != false) ? true : false;
    }

    public static function  arrayToCsv($data, $column_headers = '', $is_array_numeric = false) {
        $data = [1,2,3];
        if(sizeof($data) > 0 ) {
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=data.csv');
            header("Pragma: no-cache");
            header("Expires: 0");;
            // create a file pointer connected to the output stream
            $output = fopen('php://output', 'w');

            // output the column headings
            fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

            //while ($row = mysql_fetch_assoc($rows))
            fputcsv($output, $data);
            fclose($output);
            // Make sure nothing else is sent, our file is done
            //if ($fp = fopen('php://output', 'w')) {
            ob_flush();
            exit;
        }

    }

    public static function fileExist($path) {
        return file_exists($path);
    }

    public static function upload() {

//        $target_dir = "uploads/";
//        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//        $uploadOk = 1;
//        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//        // Check if image file is a actual image or fake image
//        if(isset($_POST["submit"])) {
//            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//            if($check !== false) {
//                echo "File is an image - " . $check["mime"] . ".";
//                $uploadOk = 1;
//            } else {
//                echo "File is not an image.";
//                $uploadOk = 0;
//            }
//        }
//        // Check if file already exists
//        if (file_exists($target_file)) {
//            echo "Sorry, file already exists.";
//            $uploadOk = 0;
//        }
//        // Check file size
//        if ($_FILES["fileToUpload"]["size"] > 500000) {
//            echo "Sorry, your file is too large.";
//            $uploadOk = 0;
//        }
//        // Allow certain file formats
//        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//            && $imageFileType != "gif" ) {
//            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//            $uploadOk = 0;
//        }
//        // Check if $uploadOk is set to 0 by an error
//        if ($uploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
//        // if everything is ok, try to upload file
//        } else {
//            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//            } else {
//                echo "Sorry, there was an error uploading your file.";
//            }
//        }

    }

    public static function fetchFileBase64($name, $allowedExtensions = array()) {

        $fileBase64 = null;
        $target_file = basename($_FILES[$name]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //$extensions_arr = array("jpg","jpeg","png","gif");
        $checkExtension = false;

        if(sizeof($allowedExtensions) > 0) {
            $checkExtension = true;
        }

        if($checkExtension && in_array($fileType,$allowedExtensions) || !$checkExtension) {

            if ($_FILES[$name]["size"] > 0) {

                $base64 = base64_encode(file_get_contents($_FILES[$name]['tmp_name']));
                $fileBase64['data'] = 'data:file/' . $fileType . ';base64,' . $base64;
                $fileBase64['extension'] = $fileType;
                $fileBase64['name'] = $target_file;
            }

        }

        return $fileBase64;
    }

    public static function fetchImageBase64($name, $allowedExtensions = array()) {

        $imageBase64 = null;
        $target_file = basename($_FILES[$name]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        $checkExtension = false;

        if(sizeof($allowedExtensions) > 0) {
            $checkExtension = true;
        }

        if($checkExtension && in_array($imageFileType,$extensions_arr) || !$checkExtension) {

            $image_base64 = base64_encode(file_get_contents($_FILES[$name]['tmp_name']));
            $imageBase64 = 'data:file/' . $imageFileType . ';base64,' . $image_base64;

        }

        return $imageBase64;

    }
}