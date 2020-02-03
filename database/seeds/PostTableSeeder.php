<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
     $faker=Faker::create('App\BlogPost');
     for($x=0;$x<=100;$x++)
     {
        DB::table('blog_posts')->insert([
            'title'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
            'author'=>$faker->name(),
            'content'=>$faker->paragraph(),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
    
    
         ]);
     }
 
    //    for($x=0;$x<=450;$x++)
    //    {
    //     DB::table('blog_posts')->insert([
    //         'title' => Str::random(20),
    //         'author' => Str::random(10),
    //         'content' => Str::random(300),
    //         'created_at'=>Carbon::parse('2020-01-01'),
    //         'updated_at'=>Carbon::parse('2020-01-01'),
    //     ]);
    //    }
    }
}
