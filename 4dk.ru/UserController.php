<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\User\PhonesRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $users = User::with('phones')->get()->toJson();

        return response(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PhonesRequest  $request
     * @return Response
     */
    public function store(PhonesRequest $request): Response
    {
        $user = User::query()->create($request->all())->toJson();

        return response($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return Response
     */
    public function show(User $user): Response
    {
        return response($user->toJson());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PhonesRequest  $request
     * @param  User     $user
     * @return Response
     */
    public function update(PhonesRequest $request, User $user): Response
    {
        return response($user->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user): Response
    {
        $user->delete();

        return response(null, 204);
    }
}
