<?php

namespace Tests\Feature\Category;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\RootCategory\RootCategoryRepositoryInterface;
use Database\Seeders\CategorySeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RootCategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var App\Repositories\Category\CategoryRepositoryInterface
     */
    protected $repo;

    /**
     * @var App\Repositories\RootCategory\RootCategoryRepositoryInterface
     */
    protected $rootCategoryRepo;

    public function setUp(): void
    {
        parent::setUp();

        $this->repo = app(CategoryRepositoryInterface::class);
        $this->rootCategoryRepo = app(RootCategoryRepositoryInterface::class);
    }

    /**
     * Show list categories
     *
     * @return void
     */
    public function test_index_page()
    {
        $this->seed([
            RoleSeeder::class
        ]);

        $userAdmin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();
        $userCustomer = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.customer'))->first()->id])->make();

        $responseAdmin = $this->actingAs($userAdmin)->get('/admin/categories');
        $responseCustomer = $this->actingAs($userCustomer)->get('/admin/categories');
        $responseDenied = $this->get('/admin/categories');

        $responseAdmin->assertOk();
        $responseAdmin->assertViewIs('admin.pages.categories.index');
        $responseCustomer->assertNotFound();
        $responseDenied->assertNotFound();
    }

    /**
     * Redirect create page
     *
     * @return void
     */
    public function test_create_page()
    {
        $this->seed([
            RoleSeeder::class
        ]);

        $userAdmin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();
        $userCustomer = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.customer'))->first()->id])->make();

        $responseAdmin = $this->actingAs($userAdmin)->get('/admin/categories/create');
        $responseCustomer = $this->actingAs($userCustomer)->get('/admin/categories/create');
        $responseDenied = $this->get('/admin/categories/create');

        $responseAdmin->assertOk();
        $responseAdmin->assertViewIs('admin.pages.categories.create');
        $responseCustomer->assertNotFound();
        $responseDenied->assertNotFound();
    }

    /**
     * Store new category
     */
    public function test_store()
    {
        $this->seed([
            RoleSeeder::class,
            RootCategorySeeder::class
        ]);

        $admin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();

        $response = $this->actingAs($admin)->post('/admin/categories', [
            'name' => 'Testing',
            'root_category_id' => 1
        ]);

        $response->assertSessionHas('success', __('Create new success', ['name' => __("Category")]))
                ->assertRedirectToRoute('admin.categories.index');
    }

    /**
     * Redirect edit page
     */
    public function test_edit_page()
    {
        $this->seed([
            RoleSeeder::class,
            CategorySeeder::class
        ]);

        $categoryId = 1;

        $userAdmin = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id])->make();
        $userCustomer = User::factory()->sequence(['role_id' => Role::whereValue(config('constraint.roles.customer'))->first()->id])->make();

        $responseAdmin = $this->actingAs($userAdmin)->get("/admin/categories/$categoryId/edit");
        $responseCustomer = $this->actingAs($userCustomer)->get("/admin/categories/$categoryId/edit");
        $responseDenied = $this->get("/admin/categories/$categoryId/edit");

        $responseAdmin->assertOk();
        $responseAdmin->assertViewIs('admin.pages.categories.edit');
        $responseCustomer->assertNotFound();
        $responseDenied->assertNotFound();
    }

    /**
     * Update the category
     */
    public function test_update()
    {
        $this->assertTrue(true);
    }

    /**
     * Delete the category
     */
    public function test_delete()
    {
        $this->assertTrue(true);
    }

    /**
     * Redirect trash page
     */
    public function test_trash_page()
    {
        $this->assertTrue(true);
    }

    /**
     * Destroy the category
     */
    public function test_destroy()
    {
        $this->assertTrue(true);
    }

    /**
     * Restore the category
     */
    public function test_restore()
    {
        $this->assertTrue(true);
    }
}

