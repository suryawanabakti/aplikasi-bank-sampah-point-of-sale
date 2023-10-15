<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $roleSuper = Role::create(['name' => 'super-admin']);
        $roleNasabah = Role::create(['name' => 'nasabah']);
        $roleKabag = Role::create(['name' => 'kabag']);


        $user = \App\Models\User::create([
            'name' => 'Endang',
            'email' => 'endang@super',
            'alamat' => 'Super',
            'no_telepon' => '085156182381',
            'password' => bcrypt('qwerty123'),
        ]);

        $kabag = \App\Models\User::create([
            'name' => 'endang',
            'email' => 'endang@kabag',
            'alamat' => 'Super',
            'no_telepon' => '085156182381',
            'password' => bcrypt('qwerty123'),
        ]);
        $user->assignRole("super-admin");
        $kabag->assignRole("kabag");
    }
}
