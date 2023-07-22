<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\RootCategory\RootCategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var App\Repositories\Category\CategoryRepositoryInterface
     */
    protected $repo;

    /**
     * @var App\Repositories\RootCategory\RootCategoryRepositoryInterface
     */
    protected $rootCategoryRepo;

    /**
     * @var App\Services\CategoryService
     */
    protected $service;

    public function __construct()
    {
        $this->repo = app(CategoryRepositoryInterface::class);
        $this->rootCategoryRepo = app(RootCategoryRepositoryInterface::class);
        $this->service = app(CategoryService::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->repo->filter($request->all(['filterName', 'filterRootCategoryId', 'filterDisplay']));

        $request->flashOnly(['filterName', 'filterRootCategoryId', 'filterDisplay']);

        return view('admin.pages.categories.index')->with([
            'categories' => $categories,
            'rootCategories' => $this->rootCategoryRepo->getList(['id', 'name'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rootCategories = $this->rootCategoryRepo->getList(['id', 'name']);

        return view('admin.pages.categories.create', compact('rootCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $params = $this->service->processing($request);

        $this->repo->create($params);

        return redirect()->route('admin.categories.index')->with('success', __('Create new success', ['name' => __("Category")]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $rootCategories = $this->rootCategoryRepo->getList(['id', 'name']);

        return view('admin.pages.categories.edit')->with([
            'rootCategories' => $rootCategories,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $params = $this->service->processing($request);

        $this->repo->update($category->id, $params);

        return redirect()->route('admin.categories.index')->with('success', __('Update success', ['name' => __("Category")]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->repo->delete($category->id);

        return redirect()->route('admin.categories.index')->with('success', __('Delete success', ['name' => __("Category")]));
    }

    /**
     * Change category's display status
     *
     * @param
     *
     * @return bool
     */
    public function changeDisplayStatus(Request $request)
    {
        return $this->repo->changeDisplayStatus((int) $request->id, (int) $request->displayStatus);
    }

    public function trash()
    {
        $categories = $this->repo->getTrashed();

        return view('admin.pages.categories.trash', compact('categories'));
    }

    public function restore(int $id)
    {
        if (!$this->repo->restore($id)) {
            return redirect()->route('admin.categories.trash')->with('error', __('Restore error', ['name' => __("Category")]));
        }

        return redirect()->route('admin.categories.index')->with('success', __('Restore success', ['name' => __("Category")]));
    }

    public function clear(int $id)
    {
        $this->repo->clear($id);

        return redirect()->route('admin.categories.trash')->with('success', __('Delete success', ['name' => __("Category")]));
    }
}
