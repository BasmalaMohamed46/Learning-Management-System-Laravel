<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnrollmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_enroll_in_course()
    {
        $user = User::factory()->create();
        $course = Course::factory()->create();

        $this->actingAs($user)
            ->post("/courses/{$course->id}/enroll")
            ->assertRedirect('/user-courses');

        $this->assertDatabaseHas('enrollments', [
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
    }
}
