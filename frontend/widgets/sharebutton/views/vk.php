<?php
use kartik\icons\Icon;

if($style == 'vertical')
    $data_type = 'top';
else
    $data_type = 'right';
?>

<?= Icon::showStack('vk', 'square-o', ['class'=>'fa-md']) ?>
