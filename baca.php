<center>
    <h1>Dida Nurwanda</h1>
    <a href="http://didanurwanda.blogspot.com">http://didanurwanda.blogspot.com</a>
</center>
<br />
<br />
 
<?php
 
// require_once dirname(__FILE__) .'/phpexcel/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) .'/spout/src/Spout/Autoloader/autoload.php';

$filePath = 'D:\xampp\htdocs\learning-ci\assets\file.xlsx';

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

		try {
	          
               //Lokasi file excel	      
                $file_path = 'D:\xampp\htdocs\excelreader\file.xlsx';             	      
                $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
	       		$reader->open($file_path); //open the file	  	      

                echo "<pre>";	          
                $i = 0; 
                                   
                /**                  
                * Sheets Iterator. Kali aja multiple sheets                  
                **/	          
                foreach ($reader->getSheetIterator() as $sheet) {
                    //Rows iterator	               
                    foreach ($sheet->getRowIterator() as $row) {
                        if($i !== 0) {
                            if(count($row) > 0) {
                              echo print_r($row);        
                            }
                        }
                           ++$i;
	                   }
                }

                echo "<br> Total Rows : ".$i." <br>";	  	          
                $reader->close();
	  	           	      	     

         echo "Peak memory:", (memory_get_peak_usage(true) / 1024 / 1024), " MB" ,"<br>";

      } catch (Exception $e) {

       	      echo $e->getMessage();
              exit;	  
      }