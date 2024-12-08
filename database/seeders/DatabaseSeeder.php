<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            CategorySeeder::class,
            RoomSeeder::class,
        ]);
        
        
        User::factory(500)->create();
        User::Create([
            'name' => 'Fadil Fauzan',
            'username' => 'fadilfauzan',
            'email' => 'fadilaja@gmail.com',
            'password' => bcrypt('fadilaja'),
            'is_admin' => 1,
        ]);
    }
}
