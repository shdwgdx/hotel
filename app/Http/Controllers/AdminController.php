<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Models\DateAdvertisement;
use App\Models\Photo;
use App\Models\District;
use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\DateBooked;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // public function index(Request $request)
    // {

    //     return view('Admin.index',);
    // }


    public function moderation(Request $request)
    {
        $advertisemens = Advertisement::where('published', 0)->where('moderated', 0)->orderBy('updated_at', 'asc')->paginate(2);
        $photos = Photo::get();
        for ($i = 0; $i < count($advertisemens); $i++) {
            $idAdvertisement = $advertisemens[$i]->id;
            $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisements.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
            $advertisemens[$i]['photoUrl'] = $arrPhoto;
        }
        return view('Admin.moderation', compact('advertisemens',));
    }

    public function published(Request $request)
    {

        $advertisemens = Advertisement::where('published', 1)->orderBy('created_at', 'desc')->paginate(2);
        $photos = Photo::get();
        for ($i = 0; $i < count($advertisemens); $i++) {
            $idAdvertisement = $advertisemens[$i]->id;
            $arrPhoto = Advertisement::join('photo_advertisement', 'photo_advertisement.id_advertisement', '=', 'advertisements.id')->select('url')->where('photo_advertisement.id_advertisement', '=', $idAdvertisement)->get();
            $advertisemens[$i]['photoUrl'] = $arrPhoto;
        }
        return view('Admin.published', compact('advertisemens',));
    }

    public function create(Request $request)
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('Profile.create', compact('categories'));
    }



    public function edit(Request $request, $id)
    {

        $advertisemens = Advertisement::find($id);
        $photos = Photo::select('url', 'id')->where('id_advertisement', '=', $id)->get();
        $advertisemens['photoUrl'] = $photos;
        $categories = Category::whereNull('parent_id')->get();
        return view('Admin.edit', compact('advertisemens', 'categories'));
    }

    public function delete(Request $request, $id)
    {
        Advertisement::find($id)->delete();
        return redirect()->route('admin-page-moderation');
    }

    public function reject(Request $request)
    {
        $id = $request->id;
        $advertisement = Advertisement::find($id);
        $advertisement->update(['moderated' => 1, 'reject_message' => $request->reject_message]);
        return redirect()->route('admin-page-moderation');
    }

    public function publicate(Request $request)
    {
        $id = $request->id;
        $advertisement = Advertisement::find($id);
        $publishExpires = now()->addDays(30);
        $advertisement->update(['expired_date' => $publishExpires, 'published' => 1]);
        return redirect()->route('admin-page-moderation');
    }

    public function createApi(Request $request)
    {
        $verificated = auth()->user()->email_verified_at;
        if ($verificated) {
            $images = $_FILES;
            if (count($images) < 1) {
                return json_encode(["status" => false, "error" => 'no images']);
            }

            $data = $request->validate([
                'title' => 'max:255',
                'price' => 'max:255|',
                'description' => 'max:1500',
                'user_id' => 'max:255',
                'category_id' => 'max:255',
                'subcategory_id' => 'max:255',
                'lat' => 'max:250',
                'lng' => 'max:250',
            ]);


            Advertisement::create($data);
            $id_advertisement = Advertisement::max('id');
            for ($i = 0; $i < count($request->file()); $i++) {
                $image = $request->file([$i]);
                $path = $image->store('photo-advertisement', 'public');
                $dataPhoto['url'] = $path;
                $dataPhoto['id_advertisement'] = $id_advertisement;
                Photo::create($dataPhoto);
                // Stop script, for new unique name next file in queue.
                sleep(1);
            }


            $result = json_encode(["status" => true]);
            return $result;
        } else {
            $result = json_encode(["status" => "unverified"]);
            return $result;
        }
        // dd($request);

    }



    public function editApi(Request $request)
    {
        $images = $_FILES;

        $data = $request->validate([
            'name' => 'max:255',
            'name_en' => 'max:255',
            'name_es' => 'max:255',
            'type_house' => 'max:255',
            'adress' => 'max:255',
            'adress_en' => 'max:255',
            'adress_es' => 'max:255',
            'price' => 'max:255|',
            'guests' => 'max:255',
            'bedrooms' => 'max:255',
            'bathroom' => 'max:255',
            'description' => 'max:1500',
            'description_en' => 'max:1500',
            'description_es' => 'max:1500',
            'part_island_id' => 'max:250',
            'district_id' => 'max:255',
            'lat' => 'max:250',
            'lng' => 'max:250',
            'best_offer' => '',
            'popular_offer' => '',
            'wi_fi' => '',
            'washer' => '',
            'conditioner' => '',
            'fan' => '',
            'kitchen' => '',
            'drying_machine' => '',
            'tv' => '',
            'iron' => '',
            'pool' => '',
            'free_parking' => '',
            'crib' => '',
            'barbecue_area' => '',
            'fireplace' => '',
            'jacuzzi' => '',
            'charging_electric_car' => '',
            'gym' => '',
            'breakfast' => '',
            'can_smoke' => '',
            'owner_lang_en' => '',
            'owner_lang_ger' => '',
            'owner_lang_fr' => '',
            'owner_lang_jpn' => '',
            'bathtub' => '',
            'cleaning_products' => '',
            'shampoo' => '',
            'bidet' => '',
            'outdoor_shower' => '',
            'hot_water' => '',
            'shower_gel' => '',
            'washing_machine_free' => '',
            'basic_necessities' => '',
            'towels_sheets_soap_paper' => '',
            'hanger' => '',
            'linen' => '',
            'extra_pillows_blankets' => '',
            'thick_curtains' => '',
            'clothes_dryer' => '',
            'dressing_table_wardrobe' => '',
            'books_magazines' => '',
            'сot_request' => '',
            'folding_travel_cot' => '',
            'children_books_toys' => '',
            'high_chair_feeding' => '',
            'window_protection' => '',
            'table_games' => '',
            'remov_gates_stairs' => '',
            'heating' => '',
            'smoke_detector' => '',
            'carbon_monoxide_sensor' => '',
            'fire_extinguisher' => '',
            'first_aid_kit' => '',
            'working_area' => '',
            'room_with_door' => '',
            'guests_can_cook' => '',
            'fridge' => '',
            'microwave' => '',
            'everything_need_for_cooking' => '',
            'pots_pans_oil_salt_pepper' => '',
            'tableware_cutlery' => '',
            'deep_bowls_chopsticks_plates_cups_etc' => '',
            'freezer' => '',
            'dishwasher' => '',
            'bake' => '',
            'oven' => '',
            'teapot' => '',
            'coffee_maker' => '',
            'wine_glasses' => '',
            'baking_tray' => '',
            'blender' => '',
            'barbecue_facilities' => '',
            'grill_charcoal_skewers' => '',
            'dining_table' => '',
            'promenade' => '',
            'near_reservoir' => '',
            'beach_access_view' => '',
            'relaxing_nearby_beach' => '',
            'separate_entrance' => '',
            'separate_entrance_street_from_building' => '',
            'laundry_nearby' => '',
            'with_private_access_patio_balcony' => '',
            'separate_backyard' => '',
            'open_space_territory' => '',
            'outdoor_furniture' => '',
            'outdoor_dining_area' => '',
            'everything_need_beach' => '',
            'beach_towels_umbrella_bedding_mask' => '',
            'free_parking_street' => '',
            'sauna_private_access' => '',
            'possible_pets' => '',
            'helper_animals_always_allowed' => '',
            'can_leave_luggage' => '',
            'early_arrival_late_departure' => '',
            'long_term_residence_allowed' => '',
            'can_stay_more_days' => '',
            'independent_arrival' => '',
            'staff_building' => '',
            'can_guests_24_hours_day' => '',
        ]);

        if (!isset($data['popular_offer'])) {
            $data['popular_offer'] = 'off';
        }
        if (!isset($data['best_offer'])) {
            $data['best_offer'] = 'off';
        }
        if (!isset($data['wi_fi'])) {
            $data['wi_fi'] = 'off';
        }
        if (!isset($data['washer'])) {
            $data['washer'] = 'off';
        }
        if (!isset($data['fan'])) {
            $data['fan'] = 'off';
        }
        if (!isset($data['kitchen'])) {
            $data['kitchen'] = 'off';
        }
        if (!isset($data['drying_machine'])) {
            $data['drying_machine'] = 'off';
        }
        if (!isset($data['drying_machine'])) {
            $data['drying_machine'] = 'off';
        }
        if (!isset($data['tv'])) {
            $data['tv'] = 'off';
        }
        if (!isset($data['iron'])) {
            $data['iron'] = 'off';
        }
        if (!isset($data['pool'])) {
            $data['pool'] = 'off';
        }
        if (!isset($data['free_parking'])) {
            $data['free_parking'] = 'off';
        }
        if (!isset($data['crib'])) {
            $data['crib'] = 'off';
        }
        if (!isset($data['barbecue_area'])) {
            $data['barbecue_area'] = 'off';
        }
        if (!isset($data['fireplace'])) {
            $data['fireplace'] = 'off';
        }
        if (!isset($data['jacuzzi'])) {
            $data['jacuzzi'] = 'off';
        }
        if (!isset($data['charging_electric_car'])) {
            $data['charging_electric_car'] = 'off';
        }
        if (!isset($data['gym'])) {
            $data['gym'] = 'off';
        }
        if (!isset($data['breakfast'])) {
            $data['breakfast'] = 'off';
        }
        if (!isset($data['can_smoke'])) {
            $data['can_smoke'] = 'off';
        }
        if (!isset($data['owner_lang_en'])) {
            $data['owner_lang_en'] = 'off';
        }
        if (!isset($data['owner_lang_ger'])) {
            $data['owner_lang_ger'] = 'off';
        }
        if (!isset($data['owner_lang_fr'])) {
            $data['owner_lang_fr'] = 'off';
        }
        if (!isset($data['owner_lang_jpn'])) {
            $data['owner_lang_jpn'] = 'off';
        }
        if (!isset($data['bathtub'])) {
            $data['bathtub'] = 'off';
        }
        if (!isset($data['cleaning_products'])) {
            $data['cleaning_products'] = 'off';
        }
        if (!isset($data['shampoo'])) {
            $data['shampoo'] = 'off';
        }
        if (!isset($data['bidet'])) {
            $data['bidet'] = 'off';
        }
        if (!isset($data['outdoor_shower'])) {
            $data['outdoor_shower'] = 'off';
        }
        if (!isset($data['hot_water'])) {
            $data['hot_water'] = 'off';
        }
        if (!isset($data['shower_gel'])) {
            $data['shower_gel'] = 'off';
        }
        if (!isset($data['washing_machine_free'])) {
            $data['washing_machine_free'] = 'off';
        }
        if (!isset($data['basic_necessities'])) {
            $data['basic_necessities'] = 'off';
        }
        if (!isset($data['towels_sheets_soap_paper'])) {
            $data['towels_sheets_soap_paper'] = 'off';
        }
        if (!isset($data['hanger'])) {
            $data['hanger'] = 'off';
        }
        if (!isset($data['linen'])) {
            $data['linen'] = 'off';
        }
        if (!isset($data['extra_pillows_blankets'])) {
            $data['extra_pillows_blankets'] = 'off';
        }
        if (!isset($data['thick_curtains'])) {
            $data['thick_curtains'] = 'off';
        }
        if (!isset($data['clothes_dryer'])) {
            $data['clothes_dryer'] = 'off';
        }
        if (!isset($data['dressing_table_wardrobe'])) {
            $data['dressing_table_wardrobe'] = 'off';
        }
        if (!isset($data['books_magazines'])) {
            $data['books_magazines'] = 'off';
        }
        if (!isset($data['сot_request'])) {
            $data['сot_request'] = 'off';
        }
        if (!isset($data['folding_travel_cot'])) {
            $data['folding_travel_cot'] = 'off';
        }
        if (!isset($data['children_books_toys'])) {
            $data['children_books_toys'] = 'off';
        }
        if (!isset($data['high_chair_feeding'])) {
            $data['high_chair_feeding'] = 'off';
        }
        if (!isset($data['window_protection'])) {
            $data['window_protection'] = 'off';
        }
        if (!isset($data['table_games'])) {
            $data['table_games'] = 'off';
        }
        if (!isset($data['remov_gates_stairs'])) {
            $data['remov_gates_stairs'] = 'off';
        }
        if (!isset($data['heating'])) {
            $data['heating'] = 'off';
        }
        if (!isset($data['smoke_detector'])) {
            $data['smoke_detector'] = 'off';
        }
        if (!isset($data['carbon_monoxide_sensor'])) {
            $data['carbon_monoxide_sensor'] = 'off';
        }
        if (!isset($data['fire_extinguisher'])) {
            $data['fire_extinguisher'] = 'off';
        }
        if (!isset($data['first_aid_kit'])) {
            $data['first_aid_kit'] = 'off';
        }
        if (!isset($data['working_area'])) {
            $data['working_area'] = 'off';
        }
        if (!isset($data['room_with_door'])) {
            $data['room_with_door'] = 'off';
        }
        if (!isset($data['guests_can_cook'])) {
            $data['guests_can_cook'] = 'off';
        }
        if (!isset($data['fridge'])) {
            $data['fridge'] = 'off';
        }
        if (!isset($data['microwave'])) {
            $data['microwave'] = 'off';
        }
        if (!isset($data['everything_need_for_cooking'])) {
            $data['everything_need_for_cooking'] = 'off';
        }
        if (!isset($data['pots_pans_oil_salt_pepper'])) {
            $data['pots_pans_oil_salt_pepper'] = 'off';
        }
        if (!isset($data['tableware_cutlery'])) {
            $data['tableware_cutlery'] = 'off';
        }
        if (!isset($data['deep_bowls_chopsticks_plates_cups_etc'])) {
            $data['deep_bowls_chopsticks_plates_cups_etc'] = 'off';
        }
        if (!isset($data['freezer'])) {
            $data['freezer'] = 'off';
        }
        if (!isset($data['dishwasher'])) {
            $data['dishwasher'] = 'off';
        }
        if (!isset($data['bake'])) {
            $data['bake'] = 'off';
        }
        if (!isset($data['oven'])) {
            $data['oven'] = 'off';
        }
        if (!isset($data['teapot'])) {
            $data['teapot'] = 'off';
        }
        if (!isset($data['coffee_maker'])) {
            $data['coffee_maker'] = 'off';
        }
        if (!isset($data['wine_glasses'])) {
            $data['wine_glasses'] = 'off';
        }
        if (!isset($data['baking_tray'])) {
            $data['baking_tray'] = 'off';
        }
        if (!isset($data['blender'])) {
            $data['blender'] = 'off';
        }
        if (!isset($data['barbecue_facilities'])) {
            $data['barbecue_facilities'] = 'off';
        }
        if (!isset($data['grill_charcoal_skewers'])) {
            $data['grill_charcoal_skewers'] = 'off';
        }
        if (!isset($data['dining_table'])) {
            $data['dining_table'] = 'off';
        }
        if (!isset($data['promenade'])) {
            $data['promenade'] = 'off';
        }
        if (!isset($data['near_reservoir'])) {
            $data['near_reservoir'] = 'off';
        }
        if (!isset($data['beach_access_view'])) {
            $data['beach_access_view'] = 'off';
        }
        if (!isset($data['relaxing_nearby_beach'])) {
            $data['relaxing_nearby_beach'] = 'off';
        }
        if (!isset($data['separate_entrance'])) {
            $data['separate_entrance'] = 'off';
        }
        if (!isset($data['separate_entrance_street_from_building'])) {
            $data['separate_entrance_street_from_building'] = 'off';
        }
        if (!isset($data['laundry_nearby'])) {
            $data['laundry_nearby'] = 'off';
        }
        if (!isset($data['with_private_access_patio_balcony'])) {
            $data['with_private_access_patio_balcony'] = 'off';
        }
        if (!isset($data['separate_backyard'])) {
            $data['separate_backyard'] = 'off';
        }
        if (!isset($data['open_space_territory'])) {
            $data['open_space_territory'] = 'off';
        }
        if (!isset($data['outdoor_furniture'])) {
            $data['outdoor_furniture'] = 'off';
        }
        if (!isset($data['outdoor_dining_area'])) {
            $data['outdoor_dining_area'] = 'off';
        }
        if (!isset($data['everything_need_beach'])) {
            $data['everything_need_beach'] = 'off';
        }
        if (!isset($data['beach_towels_umbrella_bedding_mask'])) {
            $data['beach_towels_umbrella_bedding_mask'] = 'off';
        }
        if (!isset($data['free_parking_street'])) {
            $data['free_parking_street'] = 'off';
        }
        if (!isset($data['sauna_private_access'])) {
            $data['sauna_private_access'] = 'off';
        }

        if (!isset($data['possible_pets'])) {
            $data['possible_pets'] = 'off';
        }
        if (!isset($data['helper_animals_always_allowed'])) {
            $data['helper_animals_always_allowed'] = 'off';
        }
        if (!isset($data['can_leave_luggage'])) {
            $data['can_leave_luggage'] = 'off';
        }
        if (!isset($data['early_arrival_late_departure'])) {
            $data['early_arrival_late_departure'] = 'off';
        }
        if (!isset($data['long_term_residence_allowed'])) {
            $data['long_term_residence_allowed'] = 'off';
        }
        if (!isset($data['can_stay_more_days'])) {
            $data['can_stay_more_days'] = 'off';
        }
        if (!isset($data['independent_arrival'])) {
            $data['independent_arrival'] = 'off';
        }
        if (!isset($data['staff_building'])) {
            $data['staff_building'] = 'off';
        }
        if (!isset($data['can_guests_24_hours_day'])) {
            $data['can_guests_24_hours_day'] = 'off';
        }


        Advertisement::findOrFail($request->input('id'))->update($data);

        $id_advertisement = $request->input('id');
        for ($i = 0; $i < count($request->file()); $i++) {
            $image = $request->file([$i]);
            $path = $image->store('photo-advertisement', 'public');
            $dataPhoto['url'] = $path;
            $dataPhoto['id_advertisement'] = $id_advertisement;
            Photo::create($dataPhoto);
            // Stop script, for new unique name next file in queue.
            sleep(1);
        }

        for ($i = 0; $i <= 4; $i++) {
            $dataDate = [];
            $dataDate['id_advertisement'] = $id_advertisement;
            $start_active_adv = $request->input('start_active_adv' . $i);
            $end_active_adv = $request->input('end_active_adv' . $i);
            $id_active_adv = $request->input('id_active_adv' . $i);
            if (isset($id_active_adv)) {
                $dataDate['start_active_adv'] = $start_active_adv;
                if (!isset($end_active_adv)) {
                    $dataDate['end_active_adv'] = $start_active_adv;
                } else {
                    $dataDate['end_active_adv'] = $end_active_adv;
                }
                $dataDate['start_active_adv'] = Carbon::parse($dataDate['start_active_adv'])->format('Y-m-d');
                $dataDate['end_active_adv'] = Carbon::parse($dataDate['end_active_adv'])->format('Y-m-d');
                DateAdvertisement::findOrFail($id_active_adv)->update($dataDate);
            } else {
                if (isset($start_active_adv)) {
                    $dataDate['start_active_adv'] = $start_active_adv;
                    if (!isset($end_active_adv)) {
                        $dataDate['end_active_adv'] = $start_active_adv;
                    } else {
                        $dataDate['end_active_adv'] = $end_active_adv;
                    }
                    $dataDate['start_active_adv'] = Carbon::parse($dataDate['start_active_adv'])->format('Y-m-d');
                    $dataDate['end_active_adv'] = Carbon::parse($dataDate['end_active_adv'])->format('Y-m-d');
                    DateAdvertisement::create($dataDate);
                }
            }
        }

        $result = json_encode(["status" => true]);
        return $result;
    }

    public function editApartmentsApi(Request $request)
    {
        $images = $_FILES;

        $data = $request->validate([
            'title' => 'max:255',
            'price' => 'max:255|',
            'description' => 'max:1500',
            'user_id' => 'max:255',
            'category_id' => 'max:255',
            'subcategory_id' => 'max:255',
            'lat' => 'max:250',
            'lng' => 'max:250',
        ]);



        Advertisement::findOrFail($request->input('id'))->update($data);

        $id_advertisement = $request->input('id');
        for ($i = 0; $i < count($request->file()); $i++) {
            $image = $request->file([$i]);
            $path = $image->store('photo-advertisement', 'public');
            $dataPhoto['url'] = $path;
            $dataPhoto['id_advertisement'] = $id_advertisement;
            Photo::create($dataPhoto);
            // Stop script, for new unique name next file in queue.
            sleep(1);
        }



        $result = json_encode(["status" => true]);
        return $result;
    }

    public function delImgApi(Request $request, $id)
    {
        Photo::find($id)->delete();
        $result = json_encode(["status" => true]);
        return $result;
    }

    public function delDateApi(Request $request, $id)
    {
        DateAdvertisement::find($id)->delete();
        $result = json_encode(["status" => true]);
        return $result;
    }

    public function getDistrict(Request $request, $id)
    {
        $subcategories = Category::find($id)->subcategories;
        $result = json_encode($subcategories);

        return $result;
    }
    public function getFilterDistrict(Request $request, $id)
    {
        $districtList = District::find($id);
        $result = json_encode($districtList);
        return $result;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => 'required',

        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index-page-profile');
        }
        return redirect()->back();
        // return redirect()->back()->with('message', 'Register Failed');
    }

    public function loginIndex(Request $request)
    {

        return view('Admin.login');
    }

    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email:unique'],
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        // session()->flash('success', 'Вы успешно зарегистрировались');
        auth()->login($user);

        return redirect()->route('index-page-profile');
    }
    public function registerIndex(Request $request)
    {
        return view('Profile.register');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('profile-login-index');
    }
}
