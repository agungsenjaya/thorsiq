<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
Use App\Models\Role;
Use App\BlogKategori;

class BlogKategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_kategoris')->insert([
            'title' => 'private sale',
            'slug' => Str::slug('private sale')
        ]);
        
        DB::table('blog_kategoris')->insert([
            'title' => 'presale',
            'slug' => Str::slug('presale')
        ]);
    }
}
