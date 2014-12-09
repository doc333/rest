<?php

namespace Ipf\Loader;

class ClassLoader
{
	public function __construct() {
		spl_autoload_register(function($className) {
			$path = str_replace("\\", DIRECTORY_SEPARATOR, $className);
			$path .= ".php";
			require_once $path;
		});
	}
}