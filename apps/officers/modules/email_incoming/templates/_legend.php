<h2>Flag Legend</h2>
<?php
$flags = Doctrine_Query::create() 
->from('Flag f')
->execute();

echo '<table id="flag_legend">';
foreach($flags as $flag) {
   
    $id = $flag->getId();
    $title = $flag->getName();
    $color = $flag->getColor();
 
    echo '<tr title="'.$flag->getDescription().'">'.
        '<td id="flag_color" style="background-color: '.$color.'"></td>'.
        '<td id="flag_title">'.$title.'</td>'.
    '</tr>';
}
echo '</table>';
?>
