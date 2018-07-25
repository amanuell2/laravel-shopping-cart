<?php

use Illuminate\Database\Seeder;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\product([
            'imagePath' => '{{URL::to(\'img/1.jpg\')}}',
            'title' => 'Make Music',
            'description' => 'the best Dj player in the town. its for you',
            'price' => 1000
        ]);
        $product->save();
        $product = new \App\product([
            'imagePath' => '{{URL::to(\'img/2.jpg\')}}',
            'title' => 'Make Music',
            'description' => 'the best music player in the market. its for you',
            'price' => 500
        ]);
        $product->save();
        $product = new \App\product([
            'imagePath' => '{{URL::to(\'img/3.jpg\')}}',
            'title' => 'Make Music',
            'description' => 'its Dj Miller the boom man what do you think?',
            'price' => 679
        ]);
        $product->save();
        $product = new \App\product([
            'imagePath' => '{{URL::to(\'img/4.jpg\')}}',
            'title' => 'Make Music',
            'description' => 'DJ Khalid is on the track come and join us',
            'price' => 780
        ]);
        $product->save();


    }
}
