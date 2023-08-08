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

    public function user(Request $request)
    {
        $user = $this->service->user($request);

        return ['status' => true, "usuario" => $user];
    }

    public function create(UserRequest $request)
    {
        $data = $request->all();

        $user = $this->service->create($data);

        return ['status' => true, "messages" => 'Usuário cadastrado com sucesso', "usuario" => $user];
    }

    public function client(Request $request)
    {
        $user = $this->service->client();

        return ['status' => true, "messages" => 'Usuários encontrados', "usuario" => $user];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
