<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

/**
 * Class InstagramController
 */
class InstagramController extends \BaseController
{

    /**
     * @var string
     */
    private $token = "8363601.1523d2b.7b4c2d91224c4f668784ec6146934e7b";
    /**
     * @var string
     */
    private $endPointUserId = "https://api.instagram.com/v1/users/%USERID%/media/recent?access_token=";
    private $endPointUsername = "https://api.instagram.com/v1/users/search?q=%USERNAME%&access_token=";
    /**
     * @var string
     */
    private $userId = "8363601";
    private $userName = "johanthorstedt";

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }


    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getEndpointUsername()
    {
        return str_replace("%USERNAME%", $this->getUserName(), $this->endPointUsername) . $this->token;
    }

    public function getEndpointUserId()
    {
        return str_replace("%USERID%", $this->getUserId(), $this->endPointUserId) . $this->token;
    }

    /**
     * Display a listing of the resource.
     * GET /instagram
     *
     * @param string $userName
     * @internal param string $userId
     * @return Response
     */
    public function index($userName = "")
    {

        if(!Cache::has("instagram-accesstoken")) {
            return Redirect::to("https://api.instagram.com/oauth/authorize/?client_id=1523d2b4ff6046eda3a1e26b23b5b77e&redirect_uri=http://icode4u.app:8000/instagramcode&response_type=code");
        }

        if(strlen($userName)>0) {
             $this->setUserName($userName);
        }

        if (!Cache::has("instagram-feed-" . $this->getUserName())) {

            // locate the instagram userId
            $user = json_decode($this->makeCurlCall($this->getEndpointUsername()));

            $this->setUserId($user->data[0]->id);
            $feedJson = $this->makeCurlCall($this->getEndpointUserId());

            $expiresAt = Carbon::now()->addMinutes(10);
            Cache::put("instagram-feed-" . $this->getUserName(), $feedJson, $expiresAt);
        } else {
            $feedJson = Cache::get("instagram-feed-" . $this->getUserName());
        }

        return View::make("instagram", ["feed" => json_decode($feedJson)]);

    }

    /**
     * @param $url
     * @return mixed
     */
    public function makeCurlCall($url)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * @return mixed
     */
    public function store()
    {
        Cache::forever("instagram-accesstoken", Input::get("code"));
        return Redirect::to("instagram");
    }

}