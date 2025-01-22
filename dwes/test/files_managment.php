<?php

$file = 'text.txt';

$handle = fopen($file, 'r');

//read the file
    // echo fread($handle, filesize($file));
    // echo fread($handle, 112);

//read a single line
    // echo fgets($handle);
    // echo fgets($handle);    //the pointer starts at the final from the last line readed 

//read a single character
    // echo fgetc($handle);    


//write to a file
    $handle =  fopen($file, 'r+');

    // fwrite($handle,"\n Max Verstappen is the driver with the mos consecutive wins streake");  -- this method override the start of the file

    $handle =  fopen($file, 'a+');

        fwrite($handle,"\nMax Verstappen is the driver with the mos consecutive wins streake");  // -- this method write the text at the final of the file

?>