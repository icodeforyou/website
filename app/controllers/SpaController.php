<?php

class SpaController extends \BaseController {

    public function RenderPage($page)
    {
        $view = View::make($page);
        dd($view);
        return Response::json([
            "markup" => $view->render()
        ]);
    }



}