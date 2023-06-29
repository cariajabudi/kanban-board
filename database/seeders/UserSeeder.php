<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $file = file_get_contents(base_path("./database/user.json"));
        $data = json_decode($file);

        User::insert($data);
    }
}
