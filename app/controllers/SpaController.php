<?php

class SpaController extends \BaseController {

    public function tjanster()
    {
        $tjanster = View::make("tjanster");
        return Response::json([
            "markup" => $tjanster->render()
        ]);
    }

}