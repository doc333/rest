<?php
namespace Ipf\Rest\Result;

use Ipf\Rest\Result;

class NotFound extends Result{
	public function __construct() {
		$this->code = 404;
		$this->error = true;
	}
}