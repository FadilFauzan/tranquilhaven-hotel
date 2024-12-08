<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalRooms = Room::count(); // Menghitung total rooms
        $totalBookedRooms = Room::where('status', 'booked')->count();

        return view('dashboard.rooms.index', [
            'title' => 'All Room',
            'rooms' => Room::latest()->get(),
            'totalRooms' => $totalRooms,
            'availableRooms' => $totalRooms - $totalBookedRooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rooms.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:rooms',
            'category_id' => 'required',
            'guests' => 'required',
            'size' => 'required',
            'image' => 'image|file|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required',
            'description' => 'required'
        ]);

        // menyimpan gambar ke dalam storage
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('room-images');
        }

        $validatedData['title'] = ucwords($validatedData['title']);
        $validatedData['user_id'] = auth()->user()->id;

        Room::create($validatedData);

        return redirect('/dashboard/rooms')->with('success', 'New room has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $authenticatedUser = auth()->user();
        $amenities = ['Free Wi-Fi', 'Mini Bar', 'Room Service', 'Air Conditioning', 'Flat-screen TV', 'Coffee Maker', 'Balcony'];

        // Memeriksa apakah pengguna yang saat ini masuk adalah penulis postingan
        if ($authenticatedUser) {
            return view('dashboard.rooms.show', [
                'room' => $room,
                'amenities' => $amenities,
            ]);
        } else {
            return redirect('/dashboard/rooms')->with('fail', "You don't have a post with the following URL!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $authenticatedUser = auth()->user();
        
        if ($authenticatedUser) {
            return view('dashboard.rooms.edit', [
                'room' => $room,
                'categories' => Category::all()
            ]);
        } else {
            return redirect('/dashboard/rooms')->with('fail', "You don't have a room with the following URL!");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'guests' => 'required',
            'size' => 'required',
            'image' => 'image|file|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required',
            'description' => 'required'
        ];

        if ($request->slug != $room->slug) {
            $rules['slug'] = 'required|unique:rooms';
        }

        $validatedData = $request->validate($rules);

        // menyimpan gambar ke dalam storage setelah data di validasi
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('room-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Room::where('id', $room->id)->update($validatedData);

        return redirect('/dashboard/rooms')->with('success', 'New room has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        Room::destroy($room->id);

        if ($room->image) {
            Storage::delete($room->image);
        }

        return redirect('/dashboard')->with('success', 'New room has been deleted');
    }

    public function updateStatus(Room $room)
    {
        // Toggle status between 'open' and 'booked'
        if ($room->status === 'booked') {
            $room->status = 'open';
            $message = 'Room status updated to open.';
        } else {
            $room->status = 'booked';
            $message = 'Room status updated to booked.';
        }
    
        // Simpan perubahan
        $room->save();
    
        // Redirect dengan pesan sukses
        return redirect('/dashboard/rooms')->with('success', $message);
    }
    
    public function booked()
    {
        $bookedRooms = Room::where('status', 'booked')->get();

        return view('dashboard.rooms.booked', [
            'bookedRooms' => $bookedRooms,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Room::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
