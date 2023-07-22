<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImportRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductImport;
use App\Models\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * @var App\Repositories\Product\ProductRepositoryInterface
     */
    protected $repo;

    /**
     * @var App\Repositories\Category\CategoryRepositoryInterface
     */
    protected $categoryRepo;

    /**
     * @var App\Services\ProductService
     */
    protected $service;

    public function __construct()
    {
        $this->repo = app(ProductRepositoryInterface::class);
        $this->categoryRepo = app(CategoryRepositoryInterface::class);
        $this->service = app(ProductService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->repo->filter($request->all());

        $request->flashOnly(['filterName', 'filterCategoryId', 'filterDisplay']);

        return view('admin.pages.products.index')->with([
            'products' => $products,
            'categories' => $this->categoryRepo->getList(['id', 'name'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->getList(['id', 'name']);

        return view('admin.pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $params = $this->service->processing($request);

        $this->repo->create($params);

        return redirect()->route('admin.products.index')->with('success', __('Create new success', ['name' => __("Product")]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->categoryRepo->getList(['id', 'name']);

        return view('admin.pages.products.edit')->with([
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $params = $this->service->processing($request);

        $this->repo->update($product->id, $params);

        return redirect()->route('admin.products.index')->with('success', __('Update success', ['name' => __("Product")]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->repo->delete($product->id);

        return redirect()->route('admin.products.index')->with('success', __('Delete success', ['name' => __("Product")]));
    }

    /**
     * Toggle display status
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
        $products = $this->repo->getTrashed();

        return view('admin.pages.products.trash', compact('products'));
    }

    public function restore(int $id)
    {
        if (!$this->repo->restore($id)) {
            return redirect()->route('admin.products.trash')->with('error', __('Restore error', ['name' => __("Product")]));
        }

        return redirect()->route('admin.products.index')->with('success', __('Restore success', ['name' => __("Product")]));
    }

    public function clear(int $id)
    {
        $this->repo->clear($id);

        return redirect()->route('admin.products.trash')->with('success', __('Delete success', ['name' => __("Product")]));
    }

    public function export()
    {
        try {
            return (new ProductsExport([]))->store(
                config('constraint.form.products'),
                'form',
                \Maatwebsite\Excel\Excel::XLSX
            );
        } catch (Exception $e) {
            // Log lỗi vào file log
            throw new Exception($e->getMessage());
        }

        // return config('constraint.status.fail');
    }

    public function import(ProductImportRequest $request)
    {
        try {
            (new ProductImport())->import($request->file('upload'), null, \Maatwebsite\Excel\Excel::XLSX);

            return __('Create new success', ['name' => __("Product")]);
        } catch (Exception $e) {
            // Log lỗi vào file log
            // Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }

        return config('constraint.status.fail');
    }
}
