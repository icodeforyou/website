<?php

use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;

class DigitalOceanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /digitalocean
	 *
	 * @return Response
	 */
	public function index($action, $method, $value = null)
	{
		dd(DigitalOcean::$action()->$method($value));
	//	dd($this->digitalOcean);
	}

	

}