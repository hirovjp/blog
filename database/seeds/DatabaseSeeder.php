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
        factory(App\User::class, 10)->create();
        factory(App\Product::class, 5)
            ->create()
            ->each(function ($u) {
                $u->comments()->save(factory(App\Comment::class)->create());
            }
            );

        // Creates authors with no articles
        factory(App\People::class, 2)->create();

        // Creates Articles without Comments
        factory(App\Product::class, 3)->create();
    }
}
