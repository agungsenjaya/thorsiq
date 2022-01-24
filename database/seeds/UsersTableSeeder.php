<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
Use App\Models\Role;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ROLE SEEDER
         */
        $ownerRole = new Role();
        $ownerRole->name = 'owner';
        $ownerRole->display_name = 'Owner';
        $ownerRole->save();
        
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();
        
        $memberRole = new Role();
        $memberRole->name = 'member';
        $memberRole->display_name = 'Member';
        $memberRole->save();
        /**
         * USER DATA
         */
        $a = new User();
        $a->name = 'owner';
        $a->email = 'owner@sample.com';
        $a->password = Hash::make('owner123');
        $a->save();
        $a->attachRole($ownerRole);
        
        $b = new User();
        $b->name = 'admin';
        $b->email = 'admin@sample.com';
        $b->password = Hash::make('admin123');
        $b->save();
        $b->attachRole($adminRole);
        
        
    }
}
