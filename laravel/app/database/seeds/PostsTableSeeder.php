<?php


class PostsTableSeeder extends Seeder {

    public function run(){
        $now = date('Y-m-d H:i:s');

        DB::table('posts')->insert(array(
                array(
                    'id' => 1,
                    'page_id' => 1,
                    'user_id' => 1,
                    'title' => 'Featured Work',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'body',
                    'content_type' => 'HTML',
                    'container_attr' => NULL,
                    'content' => '<p>This is some testing text</p>',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 2,
                    'page_id' => 6,
                    'user_id' => 1,
                    'title' => 'Website Design, Development',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'infobar',
                    'content_type' => 'HTML',
                    'container_attr' => NULL,
                    'content' => '<h2>Website Design, Development</h2>
                                <h4>Client:</h4>
                                <p>Some Site</p>',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 3,
                    'page_id' => 6,
                    'user_id' => 1,
                    'title' => 'Project Summary',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'content',
                    'content_type' => 'HTML',
                    'container_attr' => NULL,
                    'content' => '<p>
			                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
							ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
							non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 4,
                    'page_id' => 7,
                    'user_id' => 1,
                    'title' => 'Website Development',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'infobar',
                    'content_type' => 'HTML',
                    'container_attr' => NULL,
                    'content' => '<h2>Website Development</h2>
                                <h4>Client:</h4>
                                <p>Some Site</p>',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 5,
                    'page_id' => 7,
                    'user_id' => 1,
                    'title' => 'Project Summary',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'content',
                    'content_type' => 'HTML',
                    'container_attr' => NULL,
                    'content' => '<p>
			                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
							ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
							non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 6,
                    'page_id' => 8,
                    'user_id' => 1,
                    'title' => 'Some Stuff about PHP',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'content',
                    'content_type' => 'HTML',
                    'container_attr' => NULL,
                    'content' => '<p>I am a bunch of content about PHP</p>',
                    'created_at' => $now,
                    'updated_at' => $now
                ),
                array(
                    'id' => 7,
                    'page_id' => 9,
                    'user_id' => 1,
                    'title' => 'Email File Attachments',
                    'position' => 1,
                    'visible' => 1,
                    'content_placement' => 'content',
                    'content_type' => 'code',
                    'container_attr' => 'class="php"',
                    'content' => 'if(isset($_FILES[\'resume\'][\'name\']) && (bool) $_FILES[\'resume\'][\'name\']){
					foreach($_FILES as $name=>$file){
						$file_name = $_FILES[\'resume\'][\'name\'];
						$temp_name = $_FILES[\'resume\'][\'tmp_name\'];
						$file_type = $_FILES[\'resume\'][\'type\'];

						//get extension of file
						$base = basename($file_name);
						$allowedTypes = array(\'pdf\');
						$files = array();

						//check validity of file
						$path_parts = pathinfo($file_name);
						$ext = $path_parts[\'extension\'];

						if(!in_array($ext, $allowedTypes)){
							$resError = \'* Invalid File Type\';
							echo \'<span class="required">* Application Not Submitted</span>\';
						}else{
							//move to server
							$server_file = "/home/yoursite/attachments/{$path_parts[\'basename\']}";
							move_uploaded_file($temp_name, $server_file);

							//add to file array
							array_push($files, $server_file);
						}//end else
					}//end foreach
				}//end if',
                    'created_at' => $now,
                    'updated_at' => $now
                )
            )
        );
    }
}

