<?php

namespace Tests\Feature\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function test_environment_configuration()
    {
        $environment = app()->environment();

        // Assert that the application is running in the "testing" environment
        $this->assertEquals('testing', $environment);
    }

    /**
     * Test creating a new blog post.
     *
     * @return void
     */
    public function test_user_can_create_post()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $data = [
            'id' => $user->id,
            'title' => $this->faker->sentence,
            'Content' => $this->faker->paragraph,
        ];

        $response = $this->post(route('writePost'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test updating a blog post.
     *
     * @return void
     */
    public function test_user_can_update_post()
    {
        $user = User::factory()->create();
        $post = $user->posts()->create([
            'id' => $user->id,
            'title' => 'Test Post',
            'Content' => 'Lorem ipsum dolor sit amet.',
        ]);

        $this->actingAs($user);

        $data = [
            'id' => $user->id,
            'title' => 'Updated Post Title',
            'Content' => 'Updated content.',
        ];

        $response = $this->post('/editPost/'.$post->id, $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test deleting a blog post.
     *
     * @return void
     */
    public function test_user_can_delete_post()
    {
        $user = User::factory()->create();
        $post = $user->posts()->create([
            'id' => $user->id,
            'title' => 'Test Post',
            'Content' => 'Lorem ipsum dolor sit amet.',
        ]);

        $this->actingAs($user);

        $response = $this->delete('/delPost/'.$post->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }


    /**
     * Test that non-authenticated users cannot create a new blog post.
     *
     * @return void
     */
    public function test_non_auth_user_cannot_create_post()
    {
        // Make sure the user is not authenticated
        // Clear any existing authentication
        auth()->logout();

        $data = [
            'title' => 'Test Post',
            'content' => 'Lorem ipsum dolor sit amet.',
        ];

        $response = $this->post(route('writePost'), $data);

        // Non-authenticated user should be redirected to the login page
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }



    /**
     * Test that non-authenticated users cannot edit a blog post.
     *
     * @return void
     */
    public function test_non_auth_user_cannot_edit_post()
    {
        $user = User::factory()->create();
        $post = $user->posts()->create([
            'id' => $user->id,
            'title' => 'Test Post',
            'Content' => 'Lorem ipsum dolor sit amet.',
        ]);

        // Clear any existing authentication
        auth()->logout();

        $data = [
            'title' => 'Updated Post Title',
            'Content' => 'Updated content.',
        ];

        $response = $this->post('/editPost/'.$post->id, $data);

        // Non-authenticated user should be redirected to the login page
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        // Make sure the post details have not changed
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Test Post',
            'content' => 'Lorem ipsum dolor sit amet.',
        ]);
    }

    /**
     * Test that non-authenticated users cannot delete a blog post.
     *
     * @return void
     */
    public function test_non_auth_user_cannot_delete_post()
    {
        $user = User::factory()->create();
        $post = $user->posts()->create([
            'id' => $user->id,
            'title' => 'Test Post',
            'Content' => 'Lorem ipsum dolor sit amet.',
        ]);

        // Clear any existing authentication
        auth()->logout();

        $response = $this->delete('/delPost/'.$post->id);

        // Non-authenticated user should be redirected to the login page
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        // Make sure the post still exists in the database
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
        ]);

    }
        /**
         * Test that guest users can visit all blog posts.
         *
         * @return void
         */
        public function test_guest_user_can_visit_all_posts()
        {
            $user = User::factory()->create();
            $post1 = $user->posts()->create([
                'id' => $user->id,
                'title' => 'Test Post 1',
                'Content' => 'Lorem ipsum dolor sit amet 1.',
            ]);
            $post2 = $user->posts()->create([
                'id' => $user->id,
                'title' => 'Test Post 2',
                'Content' => 'Lorem ipsum dolor sit amet 2.',
            ]);

            // Ensure that the user is not authenticated (guest user)
            auth()->logout();

            $response = $this->get('/');

            // Guest user should be able to access all blog posts
            $response->assertStatus(200);
            $response->assertSee($post1->title);
            $response->assertSee($post2->title);
        }

}
