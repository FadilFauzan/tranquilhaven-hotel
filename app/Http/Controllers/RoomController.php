<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Category;

class RoomController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $title = 'All Room';
        $categorySlug = $request->query('category');
        $heroTitle = 'Our Rooms';
        $description = 'Learn more about our exclusive offerings and services.';
        $backgroundImage = 'img/bg8.jpg'; // Background default jika tidak ada kategori

        // Jika ada kategori, sesuaikan heroTitle, description, dan backgroundImage
        if ($categorySlug) {
            $category = Category::firstWhere('slug', $categorySlug);
            if ($category) {
                $title = $category->name . ' Room';
                $heroTitle = "{$category->name} Rooms";
                $description = "Explore our exclusive {$category->name} selection.";

                // Atur background image berdasarkan kategori
                switch ($category->slug) {
                    case 'luxury':
                        $backgroundImage = 'img/img_1.jpg';
                        break;
                    case 'presidential':
                        $backgroundImage = 'img/img_5.jpg';
                        break;
                    case 'single':
                        $backgroundImage = 'img/bg8.jpg';
                        break;
                    case 'deluxe':
                        $backgroundImage = 'img/img_3.jpg';
                        break;
                    default:
                        $backgroundImage = 'img/bg12.jpg'; // Background default jika kategori tidak dikenal
                }
            }
        }

        $totalRooms = Room::where('category_id', $category->id)->count();
        $totalBookedRooms = Room::where('status', 'booked')
            ->where('category_id', $category->id)
            ->count();

        return view('rooms', [
            'title' => $title,
            'heroTitle' => $heroTitle,
            'description' => $description,
            'backgroundImage' => $backgroundImage,
            'active' => 'rooms',
            'rooms' => Room::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString(),
            'totalRooms' => $totalRooms,
            'availableRooms' => $totalRooms - $totalBookedRooms,
        ]);
    }

    public function show(Room $room)
    {
        return view('room', [
            'title' => 'Single Post',
            'active' => 'rooms',
            'room' => $room
        ]);
    }
}
