<?php

use App\FormOption;
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
        // $this->call(UsersTableSeeder::class);
        $data = [
            ['title' => 'BBQ'], ['title' => 'Family events'], ['title' => 'Transient Dockage - Form'],
            ['title' => 'Jetskis (yearly)'], ['title' => 'Slip/ Storage /Dockage Boats - Form'],
            ['title' => 'Jetskis - Form'], ['title' => 'Fishing Charter Form'], ['title' => 'Rental Charters - Form'], ['title' => 'Rent']
        ];
        foreach ($data as $d) {
            $form = new FormOption;
            $form->title = $d['title'];
            $form->save();
        }
    }
}
