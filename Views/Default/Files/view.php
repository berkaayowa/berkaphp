<?php $data = $template_data['file'][0]; ?>
<?php
//    header('Content-Type: application/pdf;');
//header("Content-Transfer-Encoding: base64\r\n");

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename='.$data['Name'].'');

header('Content-Length: ' . filesize($data['Document']));
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

@readfile($data['Document']);
//$data = base64_decode($data['Document']);
//
//echo $data;

//$pdf_base64_handler = fopen($data['Document'],'r');
//$pdf_content = fread ($pdf_base64_handler,filesize($pdf_base64));
//fclose ($pdf_base64_handler);
////Decode pdf content
//$pdf_decoded = base64_decode ($pdf_content);
//    echo $pdf_decoded;

?>
