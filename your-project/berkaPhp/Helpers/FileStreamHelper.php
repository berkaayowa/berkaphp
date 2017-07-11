<?php
namespace berkaPhp\helpers;
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/11/2017
 * Time: 12:56 AM
 */

class FileStream {

    public  static function write_file($path, $data) {
        
        if(!file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        $file = $path;
        $handle = fopen($file, 'w') or die('Cannot open file:  '.$file);

        return (fwrite($handle, $data) != false) ? true : false;
    }

    public static function  array_to_csv($data, $column_headers = '', $is_array_numeric = false) {
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
}