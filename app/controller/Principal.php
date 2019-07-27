<?php


namespace App\controller;


use App\model\Usuario;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Principal extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        return $this->view->render($response,'index.twig');
    }

    public function listar(Request $request, Response $response, array $args)
    {
        $usuarios = new Usuario();
        $usuario = $usuarios->listarUsuario();
        return $this->view->render($response,'index.twig',['usuarios'=>$usuario]);
    }

    public function adicionar(Request $request, Response $response, array $args)
    {
        $post = $request->getParsedBody();
        $usuario = new Usuario();
        $usuario->setNomeUsuarios($post['nome']);
        $usuario->setLogin($post['login']);
        $usuario->setSenha($post['senha']);
        $usuario->setEmail($post['email']);
        $usuario->setDataCriacao($post['datacriacao']);
        $usuario->setTempoExpiracaoSenha($post['tempoexperiacaosenha']);
        $usuario->setCodAutorizacao($post['codautorizacao']);
        $usuario->getStatusUsuario($post['statususuario']);
        $usuario->setCodPessoa($post['codpessoa']);

        $usuario = $usuario->adicionarUsuario($usuario);
        return $usuario;
    }
    public function editar(Request $request, Response $response, array $args)
    {
        $post = $request->getParsedBody();
        $usuario = new Usuario();
        $usuario->setNomeUsuarios($post['nome']);
        $usuario->setLogin($post['login']);
        $usuario->setSenha($post['senha']);
        $usuario->setEmail($post['email']);
        $usuario->setDataCriacao($post['datacriacao']);
        $usuario->setTempoExpiracaoSenha($post['tempoexperiacaosenha']);
        $usuario->setCodAutorizacao($post['codautorizacao']);
        $usuario->getStatusUsuario($post['statususuario']);
        $usuario->setCodPessoa($post['codpessoa']);
        $usuario->setIdUsuarios($post['id']);

        $usuario = $usuario->editarUsuario($usuario);
        return $usuario;
    }
    public function excluir(Request $request, Response $response, array $args)
    {
        $post = $request->getParsedBody();
        $usuario = new Usuario();
        $usuario->setIdUsuarios($post['id']);

        $usuario = $usuario->apagarUsuario($usuario);
        return $usuario;
    }
}