<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\DateBooked;
use App\Models\DateAdvertisement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    public function index($id)
    {

        $advertisement = Advertisement::where('id', $id)->first();
        $photos = Photo::select('url')->where('id_advertisement', '=', $id)->get();
        $advertisement['photoUrl'] = $photos;

        if (request()->cookie('viewed') && str(request()->cookie('viewed'))->length() > 0) {
            if (!str()->contains(request()->cookie('viewed'), "$id")) {
                $newCookie = str(request()->cookie('viewed'))->append("$id");
                Cookie::queue('viewed', $newCookie, 1000);
                event('postHasViewed', $advertisement);
            }
        } else {

            Cookie::queue('viewed', "$id", 1000);
            event('postHasViewed', $advertisement);
        }


        $advertisemensPopular = Advertisement::where('popular', 1)->get();
        for ($i = 0; $i < count($advertisemensPopular); $i++) {
            $idAdvertisement = $advertisemensPopular[$i]->id;
            $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisements.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
            $advertisemensPopular[$i]['photoUrl'] = $arrPhoto;
        };

        return view('advertisement', compact('advertisement', 'advertisemensPopular'));
    }

    public function sale($id)
    {
        $advertisement = Apartment::where('id', '=', $id)->first();
        $photos = Photo::select('url')->where('id_advertisement', '=', $id)->get();
        $advertisement['photoUrl'] = $photos;

        // $dateAdvertisement = DateAdvertisement::select('start_active_adv', 'end_active_adv', 'id')->where('id_advertisement', '=', $id)->get();
        // $advertisement['dateList'] = $dateAdvertisement;


        // $AdvertisementActual = DateAdvertisement::where('date_advertisement.end_active_adv', '>=', now())->distinct()->get(['id_advertisement']);

        // $AdvertisementActualArr = [];
        // foreach ($AdvertisementActual as $key => $value) {
        //     array_push($AdvertisementActualArr, $value->id_advertisement);
        // }

        // // popular offer
        // $advertisemensPopular = Advertisement::whereIn('id', $AdvertisementActualArr)->where('popular_offer', 'on')->get();
        // for ($i = 0; $i < count($advertisemensPopular); $i++) {
        //     $idAdvertisement = $advertisemensPopular[$i]->id;
        //     $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisement.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
        //     $advertisemensPopular[$i]['photoUrl'] = $arrPhoto;
        // }
        // =======


        // $currentTime = Carbon::now()->format('Y-m-d');
        return view('advertisement-sale', compact('advertisement',));
    }

    public function bookedApi(Request $request)
    {
        $id_advertisement = $request->input('id_advertisement');
        $start_range_adv = Carbon::parse($request->input('start_range_adv'))->format('Y-m-d');
        $end_range_adv = Carbon::parse($request->input('end_range_adv'))->format('Y-m-d');
        $start_booked = Carbon::parse($request->input('start_booked'))->format('Y-m-d');

        $end_bookedCheck = $request->input('end_booked');

        if (!isset($end_bookedCheck)) {
            $end_booked = $start_booked;
        } else {
            $end_booked = Carbon::parse($request->input('end_booked'))->format('Y-m-d');
        }

        // dd($start_booked, $end_booked);

        if ($start_range_adv == $start_booked && $end_range_adv == $end_booked) {
            DateAdvertisement::where('id_advertisement', $id_advertisement)->where('start_active_adv', $start_range_adv)->where('end_active_adv', $end_range_adv)->delete();
        } elseif ($start_range_adv == $start_booked) {
            DateAdvertisement::where('id_advertisement', $id_advertisement)->where('start_active_adv', $start_range_adv)->where('end_active_adv', $end_range_adv)->delete();
            $end_booked = Carbon::parse($end_booked);
            $newDate = [];
            $newDate['id_advertisement'] = $id_advertisement;
            $newDate['start_active_adv'] = $end_booked->addDays(1);
            $newDate['end_active_adv'] = $end_range_adv;
            DateAdvertisement::create($newDate);
        } elseif ($end_range_adv == $end_booked) {
            DateAdvertisement::where('id_advertisement', $id_advertisement)->where('start_active_adv', $start_range_adv)->where('end_active_adv', $end_range_adv)->delete();

            $start_booked = Carbon::parse($start_booked);
            $newDate = [];
            $newDate['id_advertisement'] = $id_advertisement;
            $newDate['start_active_adv'] = $start_range_adv;
            $newDate['end_active_adv'] = $start_booked->subDays(1);

            DateAdvertisement::create($newDate);
        } else {
            DateAdvertisement::where('id_advertisement', $id_advertisement)->where('start_active_adv', $start_range_adv)->where('end_active_adv', $end_range_adv)->delete();

            $start_booked = Carbon::parse($start_booked);
            $end_booked = Carbon::parse($end_booked);

            $newDate1 = [];
            $newDate1['id_advertisement'] = $id_advertisement;
            $newDate1['start_active_adv'] = $start_range_adv;
            $newDate1['end_active_adv'] = $start_booked->subDays(1);

            $newDate2 = [];
            $newDate2['id_advertisement'] = $id_advertisement;
            $newDate2['start_active_adv'] = $end_booked->addDays(1);
            $newDate2['end_active_adv'] = $end_range_adv;

            DateAdvertisement::create($newDate1);
            DateAdvertisement::create($newDate2);
        }

        $data = $request->validate([
            'id_advertisement' => 'required|integer',
            'start_booked' => 'required|date',
            'end_booked' => 'required|date',
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'email',
            'phone' => 'required|max:255',
        ]);
        $data['start_booked'] = Carbon::parse($request->input('start_booked'))->format('Y-m-d');
        $data['end_booked'] = Carbon::parse($request->input('end_booked'))->format('Y-m-d');
        // dd($data);
        DateBooked::create($data);
        return redirect()->back();
    }
}
