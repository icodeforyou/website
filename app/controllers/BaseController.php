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

        return Redirect::to("/kontakt")->with("message", Lang::get("texts.thanks_for_email"));
    }

    public function fiberProxy()
    {
        $validatorRules = [
            "email"             => "required|email",
            "formatted_address" => "required"
        ];

        // Validera formuläret
        $validator = Validator::make(Input::all(), $validatorRules);

        if ($validator->fails()) {
            return Redirect::back();
        }

        $parts = [
            "email" => Input::get("email"), 
            "name" => Input::get("your_name"), 
            "adress" => Input::get("formatted_address"),
            "lat" => Input::get("lat"),
            "lon" => Input::get("lon"),
            "postalCode" => Input::get("postal_code")
        ];

        Entry::create([
            "name" => $parts["name"],
            "name2" => "",
            "postalCode" => preg_replace('/\s/', "", $parts["postalCode"]),
            "email" => $parts["email"],
            "address" => $parts["adress"],
            "lat" => $parts["lat"],
            "lon" => $parts["lon"]
        ]);

        Mail::send("emails.fiber-email", $parts,
            function ($message) {
                $message->from(Input::get("email"));
                $message->to("info@fibertillsloinge.se", "no-reply@icode4u.se")->subject("En som är intresserad av fiber");
            });

        return Redirect::away("http://fibertillslöinge.se/tack");
    }

}
