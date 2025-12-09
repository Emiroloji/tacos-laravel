<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $settings = [
            'restaurant_name' => 'Sadal Lezzet Durağı',
            'about_us' => 'Sadal Lezzet Durağı olarak en taze malzemelerle hazırladığımız lezzetleri sizlere sunuyoruz.',
            'phone' => '+90 555 123 45 67',
            'address' => 'Örnek Mahallesi, Lezzet Sokak No:1, İstanbul',
            'instagram' => 'https://instagram.com/sadallezzet',
            'facebook' => 'https://facebook.com/sadallezzet',
            'trendyol_yemek' => '#',
            'migros_yemek' => '#',
            'getir_yemek' => '#',
            'yemeksepeti' => '#',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\Setting::create(['key' => $key, 'value' => $value]);
        }

        $categories = ['Kebaplar', 'Dürümler', 'İçecekler', 'Tatlılar'];
        foreach ($categories as $index => $catName) {
            $cat = \App\Models\Category::create([
                'name' => $catName,
                'slug' => \Illuminate\Support\Str::slug($catName),
                'sort_order' => $index,
            ]);
            
            \App\Models\MenuItem::create([
                'category_id' => $cat->id,
                'name' => 'Örnek ' . $catName,
                'description' => 'Lezzetli bir ' . strtolower($catName) . ' çeşidi.',
                'price' => 150.00 + ($index * 10),
                'is_active' => true,
            ]);
        }
    }
}
