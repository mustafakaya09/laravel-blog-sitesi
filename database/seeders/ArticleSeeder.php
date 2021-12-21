<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; //Yeni slug fonksiyonunu(metodunu) kullanabilmek için

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $foto=['bir-kopegin-dostlugu.jpg','dostluk1.jpg','et-aut-ut-ut-enim.jpg',
      'et-odio-in-labore-velit-placeat-quo-explicabo.jpg','kocaadam.jpg','makale-basligi-399866.jpg',
      'praesentium-eveniet-eius-delectus-possimus.jpg','toastr-deneme.jpg',
      'bir-kopegin-dostlugu.jpg','dostluk1.jpg','kocaadam.jpg','et-aut-ut-ut-enim.jpg',
      'how-to-pick-the-best-software-development-company-for-your-project-2021.jpg'];

        $faker=Faker::create();
        for ($i=0; $i<12; $i++) {
          $title=$faker->sentence(6);
            DB::table('articles')->insert([
              'category_id'=>rand(1,7),
              'title'=>$title,
              'image'=>'/uploads/'.$foto[$i],
              //'image'=>$faker->imageUrl(360, 360, 'animals', true, 'cats'),
              'content'=>$faker->paragraph(6),
              'slug'=>Str::slug($title,'-'),
              'created_at'=>$faker->dateTime('now'),
              'updated_at'=>now()
            ]);
        }
    }
}
