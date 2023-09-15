<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Photo;
use App\Models\Advertisement;
use App\Models\DateAdvertisement;
use Illuminate\Http\Request;
use Carbon\Carbon;

use function PHPSTORM_META\map;

class MainController extends Controller
{
    public function index()
    {

        $advertisements = Advertisement::where('published', 1)->whereDate('expired_date', '>', now())->get();
        for ($i = 0; $i < count($advertisements); $i++) {
            $idAdvertisement = $advertisements[$i]->id;
            $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisements.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
            $advertisements[$i]['photoUrl'] = $arrPhoto;
        }
        // popular offer
        $advertisemensPopular = Advertisement::where('popular', 0)->get();
        for ($i = 0; $i < count($advertisemensPopular); $i++) {
            $idAdvertisement = $advertisemensPopular[$i]->id;
            $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisements.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
            $advertisemensPopular[$i]['photoUrl'] = $arrPhoto;
        }
        // =======
        $advertisemensMap =  Advertisement::get();
        return view('index-page', compact('advertisements', 'advertisemensMap',  'advertisemensPopular'));
    }
    public function create()
    {
        return view('mainPage');
    }

    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function favorites(Request $request)
    {
        if (isset($_COOKIE['favorites'])) {
            $cookie = json_decode($_COOKIE['favorites']);
            $ids = [];
            foreach ($cookie as $key => $value) {
                array_push($ids, $value->id);
            };
            $advertisemensCookie = Advertisement::whereIn('id', $ids)->get();
            for ($i = 0; $i < count($advertisemensCookie); $i++) {
                $idAdvertisement = $advertisemensCookie[$i]->id;
                $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisement.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
                $advertisemensCookie[$i]['photoUrl'] = $arrPhoto;
            }
        } else {
            setcookie('favorites', '[]');
            $advertisemensCookie = null;
        }

        return view('favorites', compact('advertisemensCookie',));
    }

    public function terms()
    {
        return view('terms');
    }
    public function privacy()
    {
        return view('privacy-policy');
    }
    public function return()
    {
        return view('return-policy');
    }
    public function cookies()
    {
        return view('cookies');
    }
}
