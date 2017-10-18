<?php

echo '<h1>index page (' . count($list) . ')</h1>';

foreach($list as $item) {
echo '<a href="#'.$id.'">click '.$item['name'].'</a><br>';	
}
