<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Category;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        // Data untuk setiap kategori kamar
        $roomsData = [
            // Presidential Room
            [
                'category_slug' => 'presidential',
                'rooms' => [
                    [
                        'title' => 'Presidential Suite with Ocean View',
                        'description' => 'A luxurious Presidential Suite featuring floor-to- ceiling windows with stunning ocean views. elegant seating area, and a stylish chandelier, creating an open and serene atmosphere.',
                        'guests' => 5,
                        'price' => 10000,
                        'size' => 1500,
                    ],
                    [
                        'title' => 'Presidential Suite with Private Terrace',
                        'description' => 'An elegant Presidential Suite featuring high ceilings, private terrace access, and a spacious layout with modern decor and luxurious amenities.',
                        'guests' => 4,
                        'price' => 9000,
                        'size' => 1400,
                    ],
                    [
                        'title' => 'Luxurious Presidential Suite with Ocean View',
                        'description' => 'A spacious, modern suite with floor-to- ceiling windows showcasing a stunning ocean view. Features a king-sized bed, cozy sitting area, private balcony, and elegant decor for a serene, luxurious stay.',
                        'guests' => 4,
                        'price' => 9000,
                        'size' => 1300,
                    ],
                    [
                        'title' => 'Presidential Suite with Panoramic Ocean Views',
                        'description' => 'A modern, luxurious bedroom suite featuring floor-to-ceiling windows with breathtaking ocean views, plush furnishings, and high- end decor for a tranquil retreat.',
                        'guests' => 4,
                        'price' => 8000,
                        'size' => 1200,
                    ],
                    [
                        'title' => 'Oceanfront Presidential Suite with Scenic Views',
                        'description' => 'A luxurious, modern suite with floor-to- ceiling glass doors offering stunning ocean views. Features a king- sized bed, elegant furnishings, and a private terrace for ultimate relaxation.',
                        'guests' => 4,
                        'price' => 8000,
                        'size' => 1200,
                    ],
                    [
                        'title' => 'Panoramic Presidential Suite with Window to Ceiling',
                        'description' => 'A spacious, elegant suite featuring floor-to- ceiling windows with expansive ocean views. Includes a king-sized bed, sophisticated decor, and a cozy sitting area perfect for relaxation.',
                        'guests' => 4,
                        'price' => 10000,
                        'size' => 1500,
                    ],
                    [
                        'title' => 'Cozy Presidential Suite with Ocean View',
                        'description' => 'An intimate, beautifully designed suite with vaulted ceilings and large windows overlooking the ocean. It features a plush king- sized bed, a comfortable sitting area, and modern amenities for a relaxing stay.',
                        'guests' => 4,
                        'price' => 9000,
                        'size' => 1300,
                    ],
                    [
                        'title' => 'Luxury Oceanfront Presidential Suite',
                        'description' => 'A stunning suite with panoramic ocean views, elegant décor, a king- sized bed, and a private balcony. Perfect for a luxurious and serene stay.',
                        'guests' => 4,
                        'price' => 8000,
                        'size' => 1300,
                    ],
                    [
                        'title' => 'Rustic Tropical Presidential Suite',
                        'description' => 'A spacious, beachside suite with natural wood accents, vaulted ceilings, and a panoramic ocean vie Features a king-sized bed, stylish seating areas, and a private deck for a peaceful tropical retreat.',
                        'guests' => 4,
                        'price' => 9000,
                        'size' => 1300,
                    ],
                    [
                        'title' => 'Modern Skyline View Presidential Suite',
                        'description' => 'A sleek and contemporary suite with floor-to-ceiling windows offering stunning city and ocean views. Features a king- sized bed, elegant furnishings, and a comfortable seating area for a luxurious and sophisticated stay.',
                        'guests' => 5,
                        'price' => 9000,
                        'size' => 1500,
                    ],
                    [
                        'title' => 'Presidential Oceanfront Suite with Panoramic Views',
                        'description' => 'A luxurious, spacious suite featuring a king- sized bed, private balcony, and breathtaking ocean views, perfect for an unforgettable stay.',
                        'guests' => 4,
                        'price' => 8000,
                        'size' => 1300,
                    ],
                    [
                        'title' => 'Presidential Ocean Villa with Private Terrace',
                        'description' => 'A luxurious beachfront villa featuring a king- sized bed, private terrace, and panoramic ocean views for a serene, tropical retreat',
                        'guests' => 4,
                        'price' => 9000,
                        'size' => 1400,
                    ],
                ],
            ],
            // Luxury Room
            [
                'category_slug' => 'luxury',
                'rooms' => [
                    [
                        'title' => 'Oceanfront Luxury Bedroom',
                        'description' => 'A modern bedroom with stunning ocean views, featuring floor-to-ceiling glass doors, minimalist wooden furniture, and a cozy reading nook.',
                        'guests' => 3,
                        'price' => 4000,
                        'size' => 700,
                    ],
                    [
                        'title' => 'Cozy Presidential Suite with Ocean View',
                        'description' => 'A luxurious, modern bedroom with a stunning seaside view, featuring a king-sized bed, elegant wooden furnishings, and floor- to-ceiling windows for natural light and relaxation.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 900,
                    ],
                    [
                        'title' => 'Coastal Chic Oceanview Suite',
                        'description' => 'Elegant suite with tropical decor, private balcony overlooking the ocean, and stylish furnishings.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 900,
                    ],
                    [
                        'title' => 'Elegant Oceanview Luxury Suite with Modern Decor',
                        'description' => 'A bright, stylish suite with a king-sized bed, cozy seating area, and private balcony overlooking the ocean for a perfect getaway.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 900,
                    ],
                    [
                        'title' => 'Oceanfront Luxury Suite with Natural Decor',
                        'description' => 'A spacious and serene oceanfront suite blending natural materials with modern comfort, it offers breathtaking ocean views and a seamless indoor-outdoor experience.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 1000,
                    ],
                    [
                        'title' => 'Luxury Oceanfront Suite with Panoramic Views',
                        'description' => 'A spacious, modern suite featuring a king bed, private terrace, and sweeping ocean views for an ultimate luxury retreat.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 900,
                    ],
                    [
                        'title' => 'Modern Oceanfront Luxury Suite',
                        'description' => 'Sleek and minimalist suite with panoramic ocean views, private balcony, and cozy fireplace.',
                        'guests' => 3,
                        'price' => 4000,
                        'size' => 900,
                    ],
                    [
                        'title' => 'Oceanview Suite with Private Terrace',
                        'description' => 'A spacious and elegantly designed suite offering breathtaking ocean views, featuring a plush king-size bed and a private terrace. The room combines modern luxury with comfortable seating, perfect for a relaxing tropical getaway.',
                        'guests' => 3,
                        'price' => 4000,
                        'size' => 900,
                    ],
                    [
                        'title' => 'Oceanfront Suite with Cozy Bay Window',
                        'description' => 'A luxurious suite featuring an oceanfront view, The room also includes a stylish living area with stone accents and modern furnishings, creating a serene and elegant atmosphere.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 800,
                    ],
                    [
                        'title' => 'Luxury Beachfront Room with Ocean View',
                        'description' => 'A spacious, elegant beachfront room with a king-size bed and private terrace offering stunning ocean views. The room includes a cozy seating area, modern decor, and direct beach access, perfect for a relaxing stay.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 800,
                    ],
                    [
                        'title' => 'Elegant Luxury Oceanview Room with Private Balcony',
                        'description' => 'A spacious luxury room with a king-sized bed, stylish decor, and a private balcony offering breathtaking ocean views, perfect for a tranquil escape.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 800,
                    ],
                    [
                        'title' => 'Modern Luxury Oceanview Room with Balcony Seating',
                        'description' => 'A refined luxury room featuring a king-sized bed, elegant decor, and a private balcony with stunning ocean views, perfect for relaxation.',
                        'guests' => 3,
                        'price' => 5000,
                        'size' => 700,
                    ],
                    
                ],
            ],
            // Deluxe Room
            [
                'category_slug' => 'deluxe',
                'rooms' => [
                    [
                        'title' => 'Deluxe Oceanfront Room with Minimalist Design',
                        'description' => 'Elegant deluxe room featuring minimalist decor, warm wood tones, and stunning ocean views through expansive windows.',
                        'guests' => 2,
                        'price' => 800,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Deluxe Seaside Room with Elegant Blue Accents',
                        'description' => 'A beautifully designed deluxe room featuring a cozy bed, elegant blue decor, and a large window with panoramic ocean views, ideal for a serene getaway.',
                        'guests' => 2,
                        'price' => 1000,
                        'size' => 550,
                    ],
                    [
                        'title' => 'Deluxe Beachfront Room with Tropical Views',
                        'description' => 'Spacious deluxe room featuring a beach- inspired interior, private patio, and stunning views of the ocean and palm trees.',
                        'guests' => 2,
                        'price' => 800,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Seaside Deluxe Room',
                        'description' => 'A cozy deluxe room with elegant decor, offering a direct ocean view, private terrace seating, and modern amenities for a relaxing coastal stay.',
                        'guests' => 2,
                        'price' => 1000,
                        'size' => 600,
                    ],
                    [
                        'title' => 'Cliffside Deluxe Room with Panoramic View',
                        'description' => 'A luxurious deluxe room with floor-to- ceiling windows, offering stunning cliffside and ocean views, elegant furnishings, and a private seating area for ultimate relaxation.',
                        'guests' => 2,
                        'price' => 800,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Oceanview Deluxe Single Room',
                        'description' => 'A modern room with private terrace and stunning ocean views, blending rustic charm with contemporary comforts.',
                        'guests' => 2,
                        'price' => 900,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Deluxe Seaview Room with Private Balcony',
                        'description' => 'Cozy deluxe room with ocean-inspired decor, a plush bed, and private balcony overlooking the sea.',
                        'guests' => 2,
                        'price' => 800,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Deluxe Oceanfront Room',
                        'description' => 'This luxurious deluxe room offers stunning panoramic views of the ocean through floor-to- ceiling windows. cozy seating area, and contemporary decor. Perfect for a relaxing and upscale getaway.',
                        'guests' => 2,
                        'price' => 800,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Tropical Overwater Deluxe Room',
                        'description' => 'A vibrant, island- inspired deluxe room with a unique thatched ceiling, ocean views, private deck, and chic decor for a luxurious tropical escape.',
                        'guests' => 2,
                        'price' => 900,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Tropical Deluxe Room with Ocean View',
                        'description' => 'Elegant room with a four-poster king bed, private balcony, and stunning ocean views. Warm decor and modern amenities create a serene escape',
                        'guests' => 2,
                        'price' => 900,
                        'size' => 500,
                    ],
                    [
                        'title' => 'Deluxe Room with Private Deck',
                        'description' => 'A serene room with a king bed, private deck, and panoramic ocean views. Features beach- inspired decor and direct access to the waterfront.',
                        'guests' => 2,
                        'price' => 1000,
                        'size' => 550,
                    ],
                    [
                        'title' => 'Deluxe Overwater Villa',
                        'description' => 'An elegant overwater villa with traditional wood accents, ocean views, and an open-air terrace for ultimate relaxation.',
                        'guests' => 2,
                        'price' => 900,
                        'size' => 500,
                    ],
                ],
            ],
            // Single Room
            [
                'category_slug' => 'single',
                'rooms' => [
                    [
                        'title' => 'Oceanfront Modern Single Room',
                        'description' => 'A modern, minimalist single room with ocean views, featuring a comfortable bed, sleek furniture, and a private balcony overlooking the sea.',
                        'guests' => 1,
                        'price' => 600,
                        'size' => 300,
                    ],
                    [
                        'title' => 'Modern Coastal Single Room',
                        'description' => 'A bright and airy single room with floor-to- ceiling windows offering panoramic ocean views. The minimalist design includes modern furnishings, warm lighting, and a private balcony.',
                        'guests' => 1,
                        'price' => 500,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Serene Oceanview Bedroom',
                        'description' => 'A bright, modern bedroom with expansive ocean and forest views through floor-to-ceiling windows, creating a peaceful retreat.',
                        'guests' => 1,
                        'price' => 600,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Oceanfront Single Room with Private Deck',
                        'description' => 'A luxurious single room with direct ocean views and private access to a spacious deck.complete with a private sitting area and a seamless connection to the outdoors.',
                        'guests' => 1,
                        'price' => 500,
                        'size' => 450,
                    ],
                    [
                        'title' => 'Oceanview Single Room with Floor-to-Ceiling Windows',
                        'description' => 'Spacious, bright single room with panoramic ocean views, sleek decor, and cozy seating area.',
                        'guests' => 1,
                        'price' => 700,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Coastal View Single Room with Panoramic Windows',
                        'description' => 'A serene single room offering breathtaking ocean views through large, wrap-around windows. With cozy, coastal decor and a calming blue and white color scheme, this room is perfect for relaxation.',
                        'guests' => 1,
                        'price' => 500,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Cozy Oceanview Single Room with Minimalist Design',
                        'description' => 'A comfortable single room featuring a plush bed, warm wood accents, and large windows with stunning ocean views, ideal for a peaceful escape.',
                        'guests' => 1,
                        'price' => 400,
                        'size' => 300,
                    ],
                    [
                        'title' => 'Coastal-Inspired Single Room with Ocean View',
                        'description' => 'A bright single room with a blue upholstered headboard, wooden accents, and large windows overlooking the ocean. Soft blues and whites create a calm, beach-inspired ambiance.',
                        'guests' => 1,
                        'price' => 500,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Oceanfront Tranquility Room',
                        'description' => 'A serene, modern single room with an ocean view, featuring a cozy bed, work desk, and private balcony for ultimate relaxation.',
                        'guests' => 1,
                        'price' => 500,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Coastal Luxe Retreat Room',
                        'description' => 'A stylish, ocean-view single room featuring a cozy bed, private balcony, fireplace, and seating area—perfect for comfort and relaxation.',
                        'guests' => 1,
                        'price' => 700,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Modern Serenity Suite',
                        'description' => 'An elegant single room with minimalist decor, a spacious layout, and a private balcony with lush views—ideal for a peaceful stay.',
                        'guests' => 1,
                        'price' => 500,
                        'size' => 400,
                    ],
                    [
                        'title' => 'Coastal Chic Bedroom',
                        'description' => 'A stylish room with direct ocean views, featuring turquoise accents, modern decor, and a private beach ambiance.',
                        'guests' => 1,
                        'price' => 400,
                        'size' => 400,
                    ],

                ],
            ],
        ];

        // Looping untuk setiap kategori dan kamar yang sesuai
        foreach ($roomsData as $data) {
            // Ambil kategori berdasarkan slug
            $category = Category::where('slug', $data['category_slug'])->first();

            // Pastikan kategori ditemukan
            if ($category) {
                foreach ($data['rooms'] as $index => $roomData) {
                    Room::create([
                        'user_id' => 1,
                        'category_id' => $category->id,
                        'title' => $roomData['title'],
                        'description' => $roomData['description'],
                        'guests' => $roomData['guests'],
                        'size' => $roomData['size'],
                        'price' => $roomData['price'],
                        'status' => 'Open',
                        // Gunakan nama kategori sebagai bagian dari path gambar
                        'image' => "/img/places/{$data['category_slug']}/" . ($index + 1) . ".jpg",
                    ]);
                }
            }
        }
    }
}
