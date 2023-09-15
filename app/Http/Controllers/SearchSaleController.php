<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\District;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchSaleController extends Controller
{
    public function index(Request $request)
    {

        // dd($request->input());
        $rooms = $request->input('rooms');

        $data = $request->validate([
            'part_island_id_apartment' => 'max:255',
            'district_id_apartment' => 'max:255',
            'sort' => '',
            'price_range_min' => '',
            'price_range_max' => '',
        ]);

        // dd($data);


        $typeHouse = $request->validate([
            'flat_apartment' => 'max:255',
            'villa_apartment' => 'max:255',
            'penthouse_apartment' => 'max:255',
            'townhouse_apartment' => 'max:255',
        ]);

        $query = Apartment::query();
        if (isset($data['part_island_id_apartment'])) {
            $query->where('part_island_id', $data['part_island_id_apartment']);
        }
        if (isset($data['district_id'])) {
            $query->where('district_id', $data['district_id_apartment']);
        }
        if (count($typeHouse) == 0) {
            $typeHouse = [
                "flat_apartment" => "flat",
                "villa_apartment" => "villa",
                "penthouse_apartment" => "penthouse",
                "townhouse_apartment" => "townhouse",
            ];
            $query->whereIn('type_house', $typeHouse);
        } else {
            $query->whereIn('type_house', $typeHouse);
        }
        if (isset($rooms)) {
            $query->where('rooms', '>=', $rooms);
        } else {
            $query->where('rooms', '>=', 1);
        }
        $advertisemensMap = Apartment::latest()->get();
        // $searchResult = Apartment::latest()->paginate(4);
        // for ($i = 0; $i < count($searchResult); $i++) {
        //     $idAdvertisement = $searchResult[$i]->id;
        //     $arrPhoto = Photo::select('url')->where('id_advertisement', '=', $idAdvertisement)->get();
        //     $searchResult[$i]['photoUrl'] = $arrPhoto;
        // }

        // return view('search-sale', compact('searchResult'));
        return view('search-sale', compact('advertisemensMap', 'rooms', 'data', 'typeHouse'));
    }

    public function searchApartmentApi(Request $request)
    {

        $rooms = $request->input('rooms');


        $data = $request->validate([
            'part_island_id' => 'max:255',
            'district_id' => 'max:255',
            'sort' => '',
            'price_range_min' => '',
            'price_range_max' => '',
        ]);



        $typeHouse = $request->validate([
            'flat' => 'max:255',
            'villa' => 'max:255',
            'penthouse' => 'max:255',
            'townhouse' => 'max:255',
        ]);

        $query = Apartment::query();
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


        $query->where('rooms', '>=', $rooms);


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

        $searchResult = $query->orderBy('rooms')->latest()->paginate(5);


        for ($i = 0; $i < count($searchResult); $i++) {
            $idAdvertisement = $searchResult[$i]->id;
            $arrPhoto = Photo::select('url')->where('id_advertisement', '=', $idAdvertisement)->get();
            $searchResult[$i]['photoUrl'] = $arrPhoto;
        }
        $result = $searchResult->withQueryString();

        return $result;
    }
}