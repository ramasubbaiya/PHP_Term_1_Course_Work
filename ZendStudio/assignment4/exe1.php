<?php 
function printLine($head){ 
   
    echo $head.'<br>';
   
}

printline('I am a printline statement');

function displayHeader($head,$subhead){
    echo '<h1>'.$head.'</h1>';
    echo '<h2>'.$subhead.'</h2>';
}
displayHeader('Heading h1','Sub Heading h2');
?>