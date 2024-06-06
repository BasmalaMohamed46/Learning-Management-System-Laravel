<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_create_course()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin)
            ->post('/courses', [
                'title' => 'Test Course',
                'description' => 'Test Description'
            ])
            ->assertRedirect('/courses');

        $this->assertDatabaseHas('courses', ['title' => 'Test Course']);
    }
}
