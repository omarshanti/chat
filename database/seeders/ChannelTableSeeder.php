<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Channel;
use Illuminate\Support\Str;
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 8',
            'slug' => Str::slug('Laravel 8')

        ]);
        Channel::create([
            'name' => 'Vue Js 4',
            'slug' => Str::slug('Vue Js 4')

        ]);
        Channel::create([
            'name' => 'Java Script 3',
            'slug' => Str::slug('Java Script 3')

        ]);
        Channel::create([
            'name' => 'Admin Channel',
            'slug' => Str::slug('Admin Channel')

        ]);
    }
}
