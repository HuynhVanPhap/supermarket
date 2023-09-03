<?php

namespace Tests\Feature\Category;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RootCategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidateInputTest extends TestCase
{
    /**
     *  Request category's data input framework
     */
    private function inputsExample(array $overrides = [])
    {
        return array_merge([
            'name' => str_repeat('a', 60),
            'root_category_id' => 1
        ], $overrides);
    }

    /**
     * Validate category's data is valid
     */
    public function test_input_valid()
    {
        $this->seed([
            RoleSeeder::class,
            RootCategorySeeder::class
        ]);

        $admin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();

        $response = $this->actingAs($admin)->post('/admin/categories', $this->inputsExample());

        $response->assertValid();
    }

    /**
     * Test input required
     *
     */
    public function test_input_required()
    {
        $this->seed([
            RoleSeeder::class,
        ]);

        $data = [
            'name' => '',
            'root_category_id' => ' ',
        ];

        $admin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();

        $response = $this->actingAs($admin)->postJson(
            '/admin/categories',
            $this->inputsExample($data)
        );

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'message',
                    'errors' => [
                            'name',
                            'root_category_id'
                        ]
                    ]);
    }

    /**
     * Test input too long
     *
     */
    public function test_input_over_max()
    {
        $this->seed([
            RoleSeeder::class,
        ]);

        $data = [
            'name' => str_repeat('a', 70),
        ];

        $admin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();

        $response = $this->actingAs($admin)->postJson(
            '/admin/categories',
            $this->inputsExample($data)
        );

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'message',
                    'errors' => [
                            'name',
                        ]
                    ]);
    }

    /**
     *  Test input data that not be a string
     */
    public function test_input_is_numeric()
    {
        $this->seed([
            RoleSeeder::class,
        ]);

        $data = [
            'root_category_id' => 'This should not be a string !',
        ];

        $admin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();

        $response = $this->actingAs($admin)->postJson(
            '/admin/categories',
            $this->inputsExample($data)
        );

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'message',
                    'errors' => [
                            'root_category_id',
                        ]
                    ]);
    }

    /**
     * Test input data that should already exist on the database
     */
    public function test_input_not_exist()
    {
        $this->seed([
            RoleSeeder::class,
            RootCategorySeeder::class
        ]);

        $data = [
            'root_category_id' => 100,
        ];

        $admin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();

        $response = $this->actingAs($admin)->postJson(
            '/admin/categories',
            $this->inputsExample($data)
        );

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'message',
                    'errors' => [
                            'root_category_id',
                        ]
                    ]);
    }
}
