<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//マニュアルから追記
use Illuminate\Support\Str;

//質問から追記
use App\Models\ContactForm;
// use Faker\Generator as Faker;


//調べて追記
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactForm>
 */
class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'your_name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'title' => $this->faker->realText(50),
            'url' => $this->faker->url,
            'gender' => $this->faker->randomElement(['0', '1']),
            'age' => $this->faker->numberBetween($min = 1, $max =6),
            'contact' => $this->faker->realText(200),

             ];
    }
}


// $factory->define(ContactForm::class, function (Faker $faker) {
//     return [
//         'your_name' => $fake->name(),
//         'email' => $fake->unique()->email(),
//         'title' => $fake->realText(50),
//         'url' => $fake->url,
//         'gender' => $fake->randomElement(['0', '1']),
//         'age' => $fake->numberBetween($min = 1, $max =6),
//         'contact' => $fake->realText(200),
//     ];
// });