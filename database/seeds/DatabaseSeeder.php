<?php

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
        // kas pasileistu seed, uztenka paleisti rysio stulpeli turinti Seed. Man veikia ir be jo
        $this->call(CompanySeeder::class);
    }
}
