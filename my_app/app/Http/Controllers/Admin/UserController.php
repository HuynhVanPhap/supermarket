<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $repo;
    protected $service;

    public function __construct()
    {
        $this->repo = app(UserRepositoryInterface::class);
        $this->service = app(UserService::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->repo->filter($request->all(['filterName', 'filterRole']));

        $request->flashOnly(['filterName', 'filterRole']);

        return view('admin.pages.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $params = $this->service->processing($request);

        $this->repo->create($params);

        return redirect()->route('admin.users.index')->with('success', __('Create new success', ['name' => __("User")]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        if (Gate::allows('private', $email)) {
            return view('admin.pages.users.show')->with([
                'user' => $this->repo->getByEmail($email)
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $params = $request->all(['email', 'phone', 'address']);

        $this->repo->update($id, $params);

        return back()->with('success', __('Update success', ['name' => __("User Info")]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(UserPasswordRequest $request, string $email)
    {
        $this->repo->changePassword($email, $request->password);

        return back()->with('success', __('Update success', ['name' => __("User Info")]));
    }
}
