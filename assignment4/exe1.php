<?php 
function printLine($head){ 
    $head="printLine"; 
    echo $head.'<br>';
}
printline('This is the printline statement');
function displayHeader($head,$subhead){
    echo '<h1>'.$head.'</h1>';
    echo '<h2>'.$subhead.'</h2>';
}
displayheader('Heading h1','Sub Heading h2');
?>