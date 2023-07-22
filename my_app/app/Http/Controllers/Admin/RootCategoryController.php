<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRootCategoryRequest;
use App\Http\Requests\UpdateRootCategoryRequest;
use App\Models\RootCategory;
use App\Repositories\RootCategory\RootCategoryRepositoryInterface;
use App\Services\RootCategoryService;
use Illuminate\Http\Request;

class RootCategoryController extends Controller
{
    /**
     * @var App\Repositories\RootCategory\RootCategoryRepositoryInterface
     */
    protected $repo;

    /**
     * @var App\Services\RootCategoryService
     */
    protected $service;

    public function __construct()
    {
        $this->repo = app(RootCategoryRepositoryInterface::class);
        $this->service = app(RootCategoryService::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rootCategories = $this->repo->filter($request->all('filterName', 'filterDisplay'));

        $request->flashOnly(['filterName', 'filterDisplay']);

        return view('admin.pages.root-categories.index', compact('rootCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.root-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRootCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRootCategoryRequest $request)
    {
        $params = $this->service->processing($request);

        $this->repo->create($params);

        return redirect()->route('admin.root-categories.index')->with('success', __('Create new success', ['name' => __("Root Category")]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RootCategory  $rootCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RootCategory $rootCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RootCategory  $rootCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RootCategory $rootCategory)
    {
        return view('admin.pages.root-categories.edit')->with([
            'rootCategory' => $rootCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRootCategoryRequest  $request
     * @param  \App\Models\RootCategory  $rootCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRootCategoryRequest $request, RootCategory $rootCategory)
    {
        $params = $this->service->processing($request);

        $this->repo->update($rootCategory->id, $params);

        return redirect()->route('admin.root-categories.index')->with('success', __('Update success', ['name' => __("Root Category")]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RootCategory  $rootCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RootCategory $rootCategory)
    {
        $this->repo->delete($rootCategory->id);

        return redirect()->route('admin.root-categories.index')->with('success', __('Delete success', ['name' => __("Root Category")]));
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
        $rootCategories = $this->repo->getTrashed();

        return view('admin.pages.root-categories.trash', compact('rootCategories'));
    }

    public function restore(int $id)
    {
        $this->repo->restore($id);

        return redirect()->route('admin.root-categories.index')->with('success', __('Restore success', ['name' => __("Root Category")]));
    }

    public function clear(int $id)
    {
        $this->repo->clear($id);

        return redirect()->route('admin.root-categories.trash')->with('success', __('Delete success', ['name' => __("Root Category")]));
    }
}
