<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
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

    public function client()
    {
        $user = $this->service->client();

        return ['status' => true, "messages" => 'Usuários encontrados', "clientes" => $user];
    }

    public function selectClient($id)
    {
        $product = $this->service->select();

        return ['status' => true, "messages" => 'Produto selecionado', "produto" => $product];
    }
}
