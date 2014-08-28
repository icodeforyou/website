<?php

use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;

class DigitalOceanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /digitalocean
	 *
	 * @return Response
	 */
	public function index()
	{
		dd(DigitalOcean::droplet()->getById("2473945"));
	//	dd($this->digitalOcean);
	}

	

}