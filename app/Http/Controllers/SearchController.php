<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Models\DateAdvertisement;
use App\Models\Photo;
use App\Models\District;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $guestsAdults = $request->input('guestsAdults');
        $guestsChildren = $request->input('guestsChildren');
        $guestsBaby = $request->input('guestsBaby');
        $allGuests = $guestsAdults + $guestsChildren + $guestsBaby;

        $data = $request->validate([
            'part_island_id' => 'max:255',
            'district_id' => 'max:255',
            'start_active_adv' => '',
            'end_active_adv' => '',
        ]);
        if (!isset($data['end_active_adv']) && isset($data['start_active_adv'])) {
            $data['end_active_adv'] = $data['start_active_adv'];
        }
        if (isset($data['start_active_adv'])) {
            $data['start_active_adv'] = Carbon::parse($data['start_active_adv'])->format('Y-m-d');
            $data['end_active_adv'] = Carbon::parse($data['end_active_adv'])->format('Y-m-d');
        }


        // Фильтрация апартаментов по дате 
        //Создается запрост в базу данныз 
        if (isset($data['start_active_adv'])) {
            $queryFilter = DateAdvertisement::select('id_advertisement')->where('start_active_adv', '=', $data['start_active_adv'])->where('end_active_adv', '=', $data['end_active_adv'])->get();
            $arrAdvFilterData = [];
            for ($i = 0; $i < count($queryFilter); $i++) {
                $arrAdvFilterData[] = ($queryFilter[$i]->id_advertisement);
            }
        }
        // ============

        $typeHouse = $request->validate([
            'flat' => 'max:255',
            'villa' => 'max:255',
            'penthouse' => 'max:255',
            'townhouse' => 'max:255',
        ]);

        $query = Advertisement::query();
        // $query->join('date_advertisement', 'advertisement.id', '=', 'date_advertisement.id_advertisement');
        if (isset($data['part_island_id'])) {
            $query->where('part_island_id', $data['part_island_id']);
        }
        if (isset($data['district_id'])) {
            $query->where('district_id', $data['district_id']);
        }
        if (isset($data['start_active_adv'])) {
            // dd($arrAdvFilterData);
            $query->whereIn('advertisement.id', $arrAdvFilterData);
        }
        if (count($typeHouse) > 0) {
            // dd($typeHouse);
            $query->whereIn('type_house', $typeHouse);
        }
        $query->where('guests', $allGuests);

        $searchResult = $query->paginate(2)->withQueryString();
        // $paginate =  $query->paginate(2);

        for ($i = 0; $i < count($searchResult); $i++) {
            $idAdvertisement = $searchResult[$i]->id;
            $arrPhoto = Photo::select('url')->where('id_advertisement', '=', $idAdvertisement)->get();
            $searchResult[$i]['photoUrl'] = $arrPhoto;
        }
        if (isset($data['start_active_adv'])) {
            $data['start_active_adv'] = Carbon::parse($data['start_active_adv'])->format('d.m.Y');
            $data['end_active_adv'] = Carbon::parse($data['end_active_adv'])->format('d.m.Y');
        }

        $AdvertisementActual = DateAdvertisement::where('date_advertisement.end_active_adv', '>=', now())->distinct()->get(['id_advertisement']);

        $AdvertisementActualArr = [];
        foreach ($AdvertisementActual as $key => $value) {
            array_push($AdvertisementActualArr, $value->id_advertisement);
        }

        // popular offer
        $advertisemensPopular = Advertisement::whereIn('id', $AdvertisementActualArr)->where('popular_offer', 'on')->get();
        for ($i = 0; $i < count($advertisemensPopular); $i++) {
            $idAdvertisement = $advertisemensPopular[$i]->id;
            $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisement.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
            $advertisemensPopular[$i]['photoUrl'] = $arrPhoto;
        }
        // =======


        $currentTime = Carbon::now()->format('Y-m-d');
        return view('search', compact('currentTime', 'searchResult', 'guestsAdults', 'guestsChildren', 'guestsBaby', 'data', 'typeHouse', 'advertisemensPopular'));
    }

    public function searchApi(Request $request)
    {

        $guestsAdults = $request->input('guestsAdults');
        $guestsChildren = $request->input('guestsChildren');
        $guestsBaby = $request->input('guestsBaby');
        $allGuests = $guestsAdults + $guestsChildren + $guestsBaby;

        $data = $request->validate([
            'part_island_id' => 'max:255',
            'district_id' => 'max:255',
            'start_active_adv' => '',
            'end_active_adv' => '',
            'sort' => '',
            'price_range_min' => '',
            'price_range_max' => '',
        ]);

        if (isset($data['start_active_adv'])) {
            $data['start_booked_adv'] = Carbon::parse($data['start_active_adv'])->format('Y-m-d');
        } else {
            $data['start_booked_adv'] = null;
        }

        if (isset($data['end_active_adv'])) {
            $data['end_booked_adv'] = Carbon::parse($data['end_active_adv'])->format('Y-m-d');
        } else {
            $data['end_booked_adv'] = null;
        }
        // dd($data);


        // if (!isset($data['end_active_adv']) && !isset($data['start_active_adv'])) {
        //     $query = DateAdvertisement::where('date_advertisement.end_active_adv', '>=', now())->orWhere('date_advertisement.start_active_adv', '>=', now())->join('advertisement', 'advertisement.id', '=', 'date_advertisement.id_advertisement')->distinct()->get(['advertisement.id', 'name', 'adress', 'price', 'advertisement.id']);
        // }

        // if (!isset($data['end_active_adv']) && isset($data['start_active_adv'])) {
        //     $data['end_active_adv'] = $data['start_active_adv'];
        // }
        // if (isset($data['start_active_adv'])) {
        //     $data['start_active_adv'] = Carbon::parse($data['start_active_adv'])->format('Y-m-d');
        //     $data['end_active_adv'] = Carbon::parse($data['end_active_adv'])->format('Y-m-d');
        // }


        // Фильтрация апартаментов по дате 
        //Создается запрост в базу данныз 
        // if (isset($data['start_active_adv'])) {
        //     $queryFilter = DateAdvertisement::select('id_advertisement')->where('start_active_adv', '=', $data['start_active_adv'])->where('end_active_adv', '=', $data['end_active_adv'])->get();
        //     $arrAdvFilterData = [];
        //     for ($i = 0; $i < count($queryFilter); $i++) {
        //         $arrAdvFilterData[] = ($queryFilter[$i]->id_advertisement);
        //     }
        // }
        // ============


        $NeedData = []; //массив id_apartament, которые подходят по дате
        $queryDate = DateAdvertisement::query();

        if (isset($data['start_booked_adv']) && isset($data['end_booked_adv'])) {
            $NeedDataItem = $queryDate->select('id_advertisement')->where('start_active_adv', '<=', $data['start_booked_adv'])->where('end_active_adv', '>=', $data['end_booked_adv'])->distinct()->get(['id_advertisement']);

            foreach ($NeedDataItem as $key => $value) {
                array_push($NeedData, $value->id_advertisement);
            }
        }
        if (!isset($data['start_booked_adv']) && !isset($data['end_booked_adv'])) {
            $NeedDataItem = $queryDate->select('id_advertisement')->where('end_active_adv', '>=', now())->distinct()->get(['id_advertisement']);

            foreach ($NeedDataItem as $key => $value) {
                array_push($NeedData, $value->id_advertisement);
            }
        }


        $typeHouse = $request->validate([
            'flat' => 'max:255',
            'villa' => 'max:255',
            'penthouse' => 'max:255',
            'townhouse' => 'max:255',
        ]);

        $query = Advertisement::query();
        $query->whereIn('id', $NeedData);
        if (isset($data['part_island_id'])) {
            $query->where('part_island_id', $data['part_island_id']);
        }
        if (isset($data['district_id'])) {
            $query->where('district_id', $data['district_id']);
        }
        if (count($typeHouse) > 0) {
            // dd($typeHouse);
            $query->whereIn('type_house', $typeHouse);
        }
        $query->where('guests', '>=', $allGuests);

        if (isset($data['price_range_min'])) {
            // dd($data['price_range_min'], $data['price_range_max']);
            $query->where('price', '>=', $data['price_range_min']);
            $query->where('price', '<=', $data['price_range_max']);
        }

        if ($data['sort'] == 'priceAsc') {
            $query->orderBy('price', 'asc');
        } else if ($data['sort'] == 'priceDesc') {
            $query->orderBy('price', 'desc');
        }

        // $searchResult = $query->paginate(2)->withQueryString();

        // return $searchResult;

        // $searchResult=$query->get();
        $searchResult = $query->paginate(5);

        for ($i = 0; $i < count($searchResult); $i++) {
            $idAdvertisement = $searchResult[$i]->id;
            $arrPhoto = Photo::select('url')->where('id_advertisement', '=', $idAdvertisement)->get();
            $searchResult[$i]['photoUrl'] = $arrPhoto;
        }
        $result = $searchResult->withQueryString();

        return $result;
    }
}
