<?php

namespace Database\Seeders;

use App\Models\Awards;
use App\Models\Filmography;
use App\Models\MemberProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(50)->create();
        // MemberProfile::create([
        //     "member_thumbnail" => "daniel-thumbnail",
        //     "member_modal" => "daniel-modal",
        //     "member_name" => "Kang Daniel",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1994. 08. 09",
        //     "member_sub-unit" => "Three Position",
        //     "name" => "DANIEL",
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "jaehwan-thumbnail",
        //     "member_modal" => "jaehwan-modal",
        //     "member_name" => "Kang Jaehwan",
        //     "member_name_hangeul" => "황민현",
        //     "name" => "JAEHWAN",
        //     "member_birth" => "1994. 08. 09",
        //     "member_sub-unit" => "Three Position",
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "woojin-thumbnail",
        //     "member_modal" => "woojin-modal",
        //     "member_name" => "Kang Woojin",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1994. 08. 09",
        //     "name" => "WOOJIN",
        //     "member_sub-unit" => "Three Position"
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "guanlin-thumbnail",
        //     "member_modal" => "guanlin-modal",
        //     "member_name" => "Hwang guanlin",
        //     "member_name_hangeul" => "황민현",
        //     "name" => "JAEHWAN",
        //     "member_birth" => "1999. 05. 29",
        //     "member_sub-unit" => "11"
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "jinyoung-thumbnail",
        //     "member_modal" => "jinyoung-modal",
        //     "name" => "JAEHWAN",
        //     "member_name" => "Hwang Jinyoung",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1999. 05. 29",
        //     "member_sub-unit" => "11"
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "daehwi-thumbnail",
        //     "member_modal" => "daehwi-modal",
        //     "member_name" => "Hwang daehwi",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1999. 05. 29",
        //     "name" => "JAEHWAN",
        //     "member_sub-unit" => "11"
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "seongwoo-thumbnail",
        //     "member_modal" => "seongwoo-modal",
        //     "member_name" => "Hwang seongwoo",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1999. 05. 29",
        //     "name" => "JAEHWAN",
        //     "member_sub-unit" => "11"
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "sungwoon-thumbnail",
        //     "member_modal" => "sungwoon-modal",
        //     "member_name" => "Hwang sungwoon",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1999. 05. 29",
        //     "name" => "JAEHWAN",
        //     "member_sub-unit" => "11"
        // ]);

        // MemberProfile::create([
        //     "member_thumbnail" => "jisung-thumbnail",
        //     "member_modal" => "jisung-modal",
        //     "member_name" => "Hwang jisung",
        //     "member_name_hangeul" => "황민현",
        //     "member_birth" => "1999. 05. 29",
        //     "name" => "JAEHWAN",
        //     "member_sub-unit" => "11"
        // ]);
    }
}
