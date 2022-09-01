<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            '$' => 'Dollar ($)',
            '¢' => 'Cent (¢)',
            '£' => 'Pound (£)',
            '¥' => 'Yen (¥)',
            '₣' => 'Franc (₣)',
            '₤' => 'Lira (₤)',
            '₧' => 'Peseta (₧)',
            '€' => 'Euro (€)',
            '₹' => 'Rupee (₹)',
            '₩' => 'Won (₩)',
            '₴' => 'Hryvnia (₴)',
            '₯' => 'Drachma (₯)',
            '₮' => 'Tugrik (₮)',
            '₰' => 'German (₰)',
            '₲' => 'Guarani (₲)',
            '₱' => 'Peso (₱)',
            '₳' => 'Austral (₳)',
            '₵' => 'Cedi (₵)',
            '₭' => 'Kip (₭)',
            '₪' => 'New Sheqel (₪)',
            '₫' => 'Dong (₫)',
            '৳' => 'Taka (৳)',
            '₽' => 'Ruble (₽)',
            '₼' => 'Manat (₼)',
            '₺' => 'Turkish Lira (₺)',
            '૱' => 'Gujrati Rupee (૱)',
            '៛ ' => 'KHMER (៛)'
        ];
        foreach ($currencies as $key => $value) {
            Currency::create(['symbol' => $key, 'name' => $value]);
        }
    }
}
