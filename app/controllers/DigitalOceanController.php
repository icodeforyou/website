<?php

use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;

class DigitalOceanController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /digitalocean
     *
     * @return Response
     */
    public function index($action, $method, $value = null)
    {
        try {
            var_dump(DigitalOcean::$action()->$method($value));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}