<?php


class PagesTableSeeder extends Seeder {

    public function run(){
        $now = date('Y-m-d H:i:s');

        DB::table('pages')->insert(array(
                array(
                    'id' => 1,
                    'category_id' => 1,
                    'parent_id' => 0,
                    'title' => 'Home',
                    'permalink' => 'home',
                    'position' => 1,
                    'template' => 'home',
                    'visible' => 1,
                    'subnav' => 0,
                    'description' => 'This is the home page description',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 2,
                    'category_id' => 2,
                    'parent_id' => 0,
                    'title' => 'Portfolio',
                    'permalink' => 'portfolio',
                    'position' => 2,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 1,
                    'description' => 'This is a web and application development portfolio.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 3,
                    'category_id' => 3,
                    'parent_id' => 0,
                    'title' => 'Code',
                    'permalink' => 'code',
                    'position' => 3,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 1,
                    'description' => 'This is a location for code samples created over time',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 4,
                    'category_id' => 1,
                    'parent_id' => 0,
                    'title' => 'About',
                    'permalink' => 'about',
                    'position' => 4,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 1,
                    'description' => 'About Your Site',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 5,
                    'category_id' => 1,
                    'parent_id' => 0,
                    'title' => 'Contact',
                    'permalink' => 'contact',
                    'position' => 5,
                    'template' => 'contact',
                    'visible' => 1,
                    'subnav' => 0,
                    'description' => 'Feel free to fill out my contact form with any inquiries and I will respond at my earliest convenience.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 6,
                    'category_id' => 2,
                    'parent_id' => 2,
                    'title' => 'Some Company',
                    'permalink' => 'some-company',
                    'position' => 1,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 0,
                    'description' => 'Information about Some Company website development, design, and planning.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 7,
                    'category_id' => 2,
                    'parent_id' => 2,
                    'title' => 'Another Company',
                    'permalink' => 'another-company',
                    'position' => 2,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 0,
                    'description' => 'Information about Another Company Design website development.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 8,
                    'category_id' => 3,
                    'parent_id' => 3,
                    'title' => 'PHP',
                    'permalink' => 'php',
                    'position' => 1,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 1,
                    'description' => 'Samples of code and solutions to problems involving PHP.',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 9,
                    'category_id' => 3,
                    'parent_id' => 8,
                    'title' => 'Emailing PHP File Attachments',
                    'permalink' => 'email-file-attachments',
                    'position' => 1,
                    'template' => 'page',
                    'visible' => 1,
                    'subnav' => 1,
                    'description' => 'Here is a way to E-mail multiple file attachments with an online form.',
                    'created_at' => $now,
                    'updated_at' => $now
                )
            )
        );
    }
}

