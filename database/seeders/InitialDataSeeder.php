<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Field;
use App\Models\Game;
use App\Models\Reservation;
use App\Models\Team;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // Tworzenie użytkowników
        $customer1 = Customer::create([
            'name' => 'Jan Kowalski',
            'email' => 'jan@example.com',
            'password' => bcrypt('password123'),
            'role' => 'player',
            'team_id' => null,
            'stats' => ['goals' => 10, 'assists' => 5]
        ]);

        $customer2 = Customer::create([
            'name' => 'Adam Nowak',
            'email' => 'adam@example.com',
            'password' => bcrypt('password123'),
            'role' => 'player',
            'team_id' => null,
            'stats' => ['goals' => 7, 'assists' => 3]
        ]);

        // Tworzenie drużyny
        $team = Team::create([
            'name' => 'FC MongoDB',
            'admin_id' => $customer1->_id,
            'moderators' => [],
            'players' => [$customer1->_id, $customer2->_id],
            'matches_played' => 0
        ]);

        // Przypisanie drużyny do graczy
        $customer1->update(['team_id' => $team->_id]);
        $customer2->update(['team_id' => $team->_id]);

        // Tworzenie boisk
        $field1 = Field::create([
            'name' => 'Orlik Centrum',
            'location' => 'Warszawa, ul. Piłkarska 10',
            'availability' => '09:00 - 21:00',
            'price_per_hour' => 100
        ]);

        $field2 = Field::create([
            'name' => 'Boisko Miejskie',
            'location' => 'Kraków, ul. Sportowa 5',
            'availability' => '10:00 - 22:00',
            'price_per_hour' => 120
        ]);

        // Tworzenie meczu
        $game = Game::create([
            'team_1_id' => $team->_id,
            'team_2_id' => null,
            'field_id' => $field1->_id,
            'date' => now()->addDays(2),
            'result' => null,
            'players_stats' => [],
            'status' => 'pending'
        ]);

        // Tworzenie rezerwacji
        Reservation::create([
            'field_id' => $field1->_id,
            'customer_id' => $customer1->_id,
            'match_id' => $game->_id,
            'status' => 'confirmed'
        ]);
    }
}
