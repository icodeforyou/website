<?php

class SpaController extends \BaseController {

    public function tjanster()
    {
        return Response::json([
            "markup" => View::make("tjanster");
        ]);
    }

}