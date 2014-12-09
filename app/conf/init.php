<?php //restfull/app/conf/init.php

require_once 'app.php';

set_include_path(
	VENDOR_PATH . PS . 
	get_include_path()
);

//echo get_include_path();

require_once 'Ipf/Loader/ClassLoader.php';

$loader = new \Ipf\Loader\ClassLoader();