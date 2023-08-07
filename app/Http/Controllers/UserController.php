<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;

class UserController extends Controller
{
    protected $service;
    protected $tokenRepository;

    public function __construct(UserService $service, TokenRepository $tokenRepository)
    {
        $this->service = $service;
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        $user = $this->service->user($request);

        return ['status' => true, "usuario" => $user];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
        $data = $request->all();

        $user = $this->service->create($data);

        return ['status' => true, "messages" => 'Usuário cadastrado com sucesso', "usuario" => $user];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
