<?php

class SpaController extends \BaseController {

    public function RenderPage($page)
    {
        
        if(View::exists($page)) {

            $view = View::make($page);

            $content = $view->renderSections();

            return Response::make($content["content"]);
        } else {
            return Response::json("View not found", 404);
        }
        
    }



}