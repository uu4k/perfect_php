<?php 
echo "trigger_error start".PHP_EOL;
trigger_error("WARNING!",E_USER_WARNING);
echo "trigger_error end";