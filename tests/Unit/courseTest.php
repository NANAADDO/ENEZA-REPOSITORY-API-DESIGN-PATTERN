<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class courseTest extends TestCase
{
	//use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
	
    public function test_authentication_before_Create_course()
        {
                $data = [
                        'course_name' => "English"
                               ];

            $response = $this->json('POST', '/api/Courses',$data);
            $response->assertStatus(401);
            $response->assertJson(['message' => "Unauthenticated."]);
        }
		
		 public function test_user_can_create_course()
        {
                $data = [
                        'course_name' => "English"
                               ];
							   $user = factory(\App\User::class)->create();

            $response = $this->actingAs($user, 'api')->json('POST', '/api/Courses',$data);
            $response->assertStatus(201);
            
        }
		
		 public function test_user_can_view_all_course()
        {
							   $user = factory(\App\User::class)->create();
							

            $response = $this->actingAs($user, 'api')->json('GET', '/api/Courses');
            $response->assertStatus(200);
			
        }
		
		 public function test_user_can_view_selected_course()
        {
			
					$user = factory(\App\User::class)->create();
					$course = factory(\App\Models\Course::class)->create();

            $response = $this->actingAs($user, 'api')->json('GET', '/api/Courses/'.$course->id);
            $response->assertStatus(200);
        }
		
		 public function test_user_can_update_selected_course()
        {
							   $user = factory(\App\User::class)->create();
							  $data = [
                        'course_name' => "Swahili"
                               ];
				$course = factory(\App\Models\Course::class)->create();

            $response = $this->actingAs($user, 'api')->json('PUT', '/api/Courses/'.$course->id,$data);
            $response->assertStatus(200);
        }
		
		 public function test_user_can_deleted_selected_course()
        {
							   $user = factory(\App\User::class)->create();
                            $course = factory(\App\Models\Course::class)->create();
            $response = $this->actingAs($user, 'api')->json('DELETE', '/api/Courses/'.$course->id);
            $response->assertStatus(204);
        }
		
		 public function test_user_can_deleted_non_exist_selected_course()
        {
							   $user = factory(\App\User::class)->create();
							 

            $response = $this->actingAs($user, 'api')->json('DELETE', '/api/Courses/678');
            $response->assertStatus(404);
        }
}
