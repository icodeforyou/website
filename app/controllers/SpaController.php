<?php

class SpaController extends \BaseController {

    public function RenderPage($page)
    {
        try {

            $view = View::make($page);

            return Response::json([
                "markup" => $view->render()
            ]);
            
        } catch (Exception $e) {
            Response::json($e->getMessage(), 404);
        }
        
        
    }



}