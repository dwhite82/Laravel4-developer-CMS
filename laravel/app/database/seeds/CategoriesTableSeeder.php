<?php


class CategoriesTableSeeder extends Seeder {

    public function run(){
        $now = date('Y-m-d H:i:s');

        DB::table('categories')->insert(array(
                array(
                    'id' => 1,
                    'title' => 'General',
                    'position' => 1,
                    'visible' => 1,
                    'description' => 'A Category for general and informational pages on the site.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 2,
                    'title' => 'Portfolio',
                    'position' => 2,
                    'visible' => 1,
                    'description' => 'A Category for portfolio items contained on the site.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 3,
                    'title' => 'Code',
                    'position' => 3,
                    'visible' => 1,
                    'description' => 'A Category for code samples I have created over time.',
                    'created_at' => $now,
                    'updated_at' => $now
                )
            )
        );
    }
}

