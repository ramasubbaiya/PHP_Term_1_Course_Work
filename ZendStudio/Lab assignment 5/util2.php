
<?php
function displayHeader($headings,$subheadings){
    $file=fopen("title.txt",'w');
    if(!$file)
    {
        echo"this file does not exist";
    }
    else
    {
        fputs($file,"$headings\n");
        fputs($file,"$subheadings");
    }
    fclose($file);
    echo '<h1>'.$headings.'</h1>';
    echo '<h3>'.$subheadings.'</h3>';
}
displayHeader('Heading','Sub Heading');
?>