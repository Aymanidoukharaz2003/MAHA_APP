<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB ;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
         [
            'email'=>'hafid.bouja@gmail.com',
            'name'=>'Hafid Bouja',
            'password'=>bcrypt('mus123456'),
            'role'=>'admin'
         ],
         [
            'email'=>'brahim.oubjair@gmail.com',
            'name'=>'Brahim Oubjair',
            'password'=>bcrypt('mus123456'),
            'role'=>'admin'
            
         ],
         [
            'email'=>'brahim.aderdor@gmail.com',
            'name'=>'Brahim Aderdor',
            'password'=>bcrypt('mus123456'),
            'role'=>'admin'
            
         ],
         [
            'email'=>'farid.essahibi@gmail.com',
            'name'=>'Farid Essahibi',
            'password'=>bcrypt('mus123456'),
            'role'=>'admin'
         ],
         [
            'email'=>'mouad.yamani@gmail.com',
            'name'=>'Mouad Yamani',
            'password'=>bcrypt('mus123456'),
            'role'=>'admin'
           
         ],
         
        ]);
    }
}
