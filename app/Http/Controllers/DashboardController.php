<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Room;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hour = Carbon::now('Asia/Jakarta')->hour; // Jam lokal Jakarta
        if ($hour >= 5 && $hour < 12) {
            $greeting = "Good Morning";
        } elseif ($hour >= 12 && $hour < 17) {
            $greeting = "Good Afternoon";
        } elseif ($hour >= 17 && $hour < 21) {
            $greeting = "Good Evening";
        } else {
            $greeting = "Good Night";
        }

        $totalUsers = User::count(); // Menghitung total members
        $totalRooms = Room::count(); // Menghitung total rooms
        $totalCategories = Category::count(); // Menghitung total kategori
        $totalBookedRooms = Room::where('status', 'booked')->count();

        return view('dashboard.index', [
            'rooms' => Room::latest()->get(),
            'totalUsers' => $totalUsers,
            'totalRooms' => $totalRooms,
            'totalCategories' => $totalCategories,
            'totalBookedRooms' => $totalBookedRooms,
            'greeting' => $greeting,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
