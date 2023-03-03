<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
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

        

        $country1 = Country::create([
            'name' => 'India'
        ]);

        $country2 = Country::create([
            'name' => 'USA'
        ]);

        $country3 = Country::create([
            'name' => 'England'
        ]);

        $state1 = State::create([
            'name' => 'Karnataka',
            'country_id' => $country1->id
        ]);

        $state2 = State::create([
            'name' => 'Tamilnadu',
            'country_id' => $country1->id
        ]);

        $state3 = State::create([
            'name' => 'Kerala',
            'country_id' => $country1->id
        ]);

        $state4 = State::create([
            'name' => 'Texas',
            'country_id' => $country2->id
        ]);

        $state5 = State::create([
            'name' => 'Bringham',
            'country_id' => $country3->id
        ]);

        $state6 = State::create([
            'name' => 'Nottingham',
            'country_id' => $country3->id
        ]);

        $state4 = State::create([
            'name' => 'California',
            'country_id' => $country2->id
        ]);


        $contacts = [
            [
                'name' => 'Muralidharan',
                'address' => 'xyz',
                'mobile' => '1234567890',
                'country_id' => $country1->id,
                'state_id' => $state1->id

            ],
            [
                'name' => 'Alex',
                'address' => 'xyz',
                'mobile' => '1234567890',
                'country_id' => $country2->id,
                'state_id' => $state4->id
            ],
            [
                'name' => 'John Doe',
                'address' => 'xyz',
                'mobile' => '1234567890',
                'country_id' => $country3->id,
                'state_id' => $state5->id
            ],
            [
                'name' => 'John',
                'address' => 'xyz',
                'mobile' => '1234567890',
                'country_id' => $country3->id,
                'state_id' => $state5->id
            ]
        ];

        foreach( $contacts as $contact){
            Contact::create($contact);
        }



    }
}
