<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\RootCategory\RootCategoryRepositoryInterface;
use App\Services\PageService;
use App\Traits\Numeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    use Numeric;

    private $navigation;
    protected $rootCategoryRepo;
    protected $productRepo;
    protected $service;

    public function __construct()
    {
        $this->rootCategoryRepo = app(RootCategoryRepositoryInterface::class);
        $this->productRepo = app(ProductRepositoryInterface::class);
        $this->service = app(PageService::class);
    }

    public function setNavigation() {
        $this->navigation = $this->rootCategoryRepo->getNavigation();
    }

    public function getNavigation() {
        self::setNavigation();

        return $this->navigation;
    }

    public function home()
    {
        $newOffers = $this->productRepo->getNewOffers();
        $advertisedOffers = $this->productRepo->getAdvertisedOffers();
        $todayOffers = $this->productRepo->getTodayOffers();

        return view('store.pages.home')->with([
            'navigation' => $this->getNavigation(),
            'newOffers' => $newOffers,
            'advertisedOffers' => $advertisedOffers,
            'todayOffers' => $todayOffers
        ]);
    }

    public function detail(string $slug)
    {
        $newOffers = $this->productRepo->getNewOffers();
        $product = $this->productRepo->getBySlug($slug);

        return view('store.pages.detail')->with([
            'navigation' => $this->getNavigation(),
            'newOffers' => $newOffers,
            'product' => $product
        ]);
    }

    public function category(string $slug)
    {
        $menu = $this->rootCategoryRepo->getMenu();
        $products = $this->service->getProducts($menu, $slug);

        return view('store.pages.category')->with([
            'navigation' => $this->getNavigation(),
            'menu' => $menu,
            'products' => $products['products'],
            'keyword' => $products['name']
        ]);
    }

    public function search(Request $request)
    {
        $menu = $this->rootCategoryRepo->getMenu();
        $products = $this->productRepo->search($request->product_name);

        $request->flashOnly(['product_name']);

        return view('store.pages.category')->with([
            'navigation' => $this->getNavigation(),
            'menu' => $menu,
            'products' => $products,
            'keyword' => $request->product_name
        ]);
    }

    public function cart()
    {
        $total = array_sum(
            array_values(
                array_map(function ($cart) {
                    return $this->covertToBackEndFormat($cart[0]['payment']);
                }, Session::get('cart') ?? [])
        ));

        return view('store.pages.cart')->with([
            'navigation' => $this->getNavigation(),
            'carts' => Session::get('cart') ?? [],
            'total' => $this->covertToMoney($total)
        ]);
    }

    public function customerInfo()
    {
        return view('store.pages.customer-info')->with([
            'navigation' => $this->getNavigation(),
        ]);
    }

    public function payment()
    {
        $total = array_sum(
            array_values(
                array_map(function ($cart) {
                    return $this->covertToBackEndFormat($cart[0]['payment']);
                }, Session::get('cart') ?? [])
        ));

        return view('store.pages.payment')->with([
            'navigation' => $this->getNavigation(),
            'customer' => current(Session::get('customer')),
            'carts' => Session::get('cart'),
            'total' => $this->covertToMoney($total)
        ]);
    }

    public function paymentSuccess()
    {
        return view('store.pages.payment-success')->with([
            'navigation' => $this->getNavigation()
        ]);
    }

    public function notFound()
    {
        return view('store.pages.404');
    }
}
