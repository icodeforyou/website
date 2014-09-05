<?php

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    protected function Contact()
    {

        $validatorRules = [
            "email"      => "required|email",
            "meddelande" => "required"
        ];

        // Validera formuläret
        $validator = Validator::make(Input::all(), $validatorRules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        Mail::send("emails.contact-email", ["from" => Input::get("email"), "msg" => Input::get("meddelande")],
        function ($message) {
            $message->from(Input::get("email"));
            $message->to("info@icode4u.se", "no-reply@icode4u.se")->subject("Kontakt från hemsidan!");
        });

        return Redirect::to("/kontakt")->with("message", "Tack! Ditt meddelande har blivit skickat");
    }

}
