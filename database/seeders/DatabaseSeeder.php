<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\User;
use App\Models\post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        post::factory(30)->create();

        
        User::create([
            'name' => 'Muhammad A Syafii',
            'slug' => 'muhammad-a-syafii',
            'email' => 'syafii2006@gmail.com',
            'password' => Bcrypt('123'),
           ]);

        // post::create([
        //     'title' => 'judul 1',
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'slug' => 'judul-1',
        //     'snip' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, vitae!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, cum hic iure vero dicta inventore amet deserunt ab, similique incidunt harum? Ab distinctio ut voluptatum enim, quaerat, illo vel doloribus velit natus provident ex magni eveniet? Ullam praesentium tempora officiis labore excepturi laboriosam cupiditate ratione minus vero corrupti eos sint, magnam corporis debitis deserunt nostrum molestiae in enim fugit repellat! Aperiam similique doloremque ullam nemo fugiat provident corrupti, omnis suscipit qui sapiente et, voluptates, earum ad optio ipsum quaerat ab atque ea vero incidunt? Consectetur, quis qui adipisci nisi explicabo laborum aliquam accusamus aperiam animi! Fuga dolorem voluptatum facere explicabo.', 
        //    ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web_design',
        ]);

        Category::create([
            'name' => 'Programing',
            'slug' => 'programing',
        ]);

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web_programing',
        ]);

        Category::create([
            'name' => 'Database',
            'slug' => 'database',
        ]);

        Category::create([
            'name' => 'Blog',
            'slug' => 'blog',
        ]);

    }
}
