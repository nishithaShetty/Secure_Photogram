<?php

include_once 'includes/encrypt.php'; 

$rain = file_get_contents('./document.txt');
$encryption_key='1f4276388ad3214c873428dbef42243f';

$dbPassword = decrypt($rain,$encryption_key);
echo "$dbPassword ";


?>
