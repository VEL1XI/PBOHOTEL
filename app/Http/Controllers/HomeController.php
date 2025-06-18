<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roomTypes = RoomType::all();
        $hotelFacilities = HotelFacility::all();
        if (!Auth::check()) {
            return view('landing', compact('roomTypes', 'hotelFacilities'));
        }elseif(auth()->user()->role == 'admin'){
            return redirect()->route('admin.home');
        }
        elseif(auth()->user()->role == 'resepsionis'){
            return view('receptionis.home');
        }
        elseif(auth()->user()->role == 'customer'){
            return view('landing', compact('roomTypes', 'hotelFacilities'));
        }
    }

    public function admin()
    {
        return view('admin.home');
    }

    public function receptionis()
    {
        return view('receptionis.home');
    }

    public function storeProfile(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'job' => 'required|string|max:100',
            'birthdate' => 'required|date|before:today',
        ]);

        $user = Auth::user();

        $customer = $user->customer;

        $customer->name = $validated['name'];
        $customer->address = $validated['address'];
        $customer->gender = $validated['gender'];
        $customer->job = $validated['job'];
        $customer->birthdate = $validated['birthdate'];
        $customer->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profile successfully'
        ], 200);

    }

}
