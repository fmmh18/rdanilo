<?php


namespace App\model;


class Usuario extends Conexao
{
    private $id_usuarios;
    private $nome_usuarios;
    private $login;
    private $email;
    private $senha;
    private $data_criacao;
    private $tempo_expiracao_senha;
    private $cod_autorizacao;
    private $status_usuario;
    private $cod_pessoa;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @return mixed
     */
    public function getIdUsuarios()
    {
        return $this->id_usuarios;
    }

    /**
     * @param mixed $id_usuarios
     */
    public function setIdUsuarios($id_usuarios) :Usuario
    {
        $this->id_usuarios = $id_usuarios;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeUsuarios()
    {
        return $this->nome_usuarios;
    }

    /**
     * @param mixed $nome_usuarios
     */
    public function setNomeUsuarios($nome_usuarios) :Usuario
    {
        $this->nome_usuarios = $nome_usuarios;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login) :Usuario
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) :Usuario
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha) :Usuario
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataCriacao()
    {
        return $this->data_criacao;
    }

    /**
     * @param mixed $data_criacao
     */
    public function setDataCriacao($data_criacao) :Usuario
    {
        $this->data_criacao = $data_criacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTempoExpiracaoSenha()
    {
        return $this->tempo_expiracao_senha;
    }

    /**
     * @param mixed $tempo_expiracao_senha
     */
    public function setTempoExpiracaoSenha($tempo_expiracao_senha) :Usuario
    {
        $this->tempo_expiracao_senha = $tempo_expiracao_senha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodAutorizacao()
    {
        return $this->cod_autorizacao;
    }

    /**
     * @param mixed $cod_autorizacao
     */
    public function setCodAutorizacao($cod_autorizacao) :Usuario
    {
        $this->cod_autorizacao = $cod_autorizacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodPessoa()
    {
        return $this->cod_pessoa;
    }

    /**
     * @param mixed $cod_pessoa
     */
    public function setCodPessoa($cod_pessoa) :Usuario
    {
        $this->cod_pessoa = $cod_pessoa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusUsuario()
    {
        return $this->status_usuario;
    }

    /**
     * @param mixed $status_usuario
     */
    public function setStatusUsuario($status_usuario) :Usuario
    {
        $this->status_usuario = $status_usuario;
        return $this;
    }


    public function listarUsuario()
    {
        $usuario = $this->pdo->query("SELECT * FROM usuarios")->fetchAll(\PDO::FETCH_ASSOC);
        return $usuario;
    }

    public function adicionarUsuario(usuario $usuario)
    {
        $statement = $this->pdo->prepare(" INSERT INTO usuarios values (
                                                                 :null,
                                                                 :nome_usuario,
                                                                 :login,
                                                                 :email,
                                                                 :senha,
                                                                 :data_criacao,
                                                                 :tempo_expiracao_senha,
                                                                 :cod_autorizacao,
                                                                 :status_usuario,
                                                                 :cod_pessoa)
                                                                 ");
        $statement->execute([
                             ':nome_usuario' => $usuario->getNomeUsuarios(),
                             ':login' => $usuario->getLogin(),
                             ':email' => $usuario->getEmail(),
                             ':senha' => $usuario->getSenha(),
                             ':data_criacao' => $usuario->getDataCriacao(),
                             ':tempo_expiracao_senha' => $usuario->getTempoExpiracaoSenha(),
                             ':cod_autorizacao' => $usuario->getCodAutorizacao(),
                             ':status_usuario' => $usuario->getStatusUsuario(),
                             ':cod_pessoa' => $usuario->getCodPessoa()
        ]);

        return $statement->rowCount();
    }

    public function editarUsuario(usuario $usuario)
    {
        $statement = $this->pdo->prepare(" UPDATE usuarios SET 
                                                            nome_usuario = :nome_usuario,
                                                            login = :login,
                                                            email = :email,
                                                            senha = :senha,
                                                            data_criacao = :data_criacao,
                                                            tempo_expiracao_senha = :tempo_expiracao_senha,
                                                            cod_autorizacao = :cod_autorizacao,
                                                            status_usuario = :status_usuario,
                                                            cod_pessoa = :cod_pessoa
                                                            WHERE id_usuario = :id_usuario 
                                                            ");
        $statement->execute([
                            ':nome_usuario' => $usuario->getNomeUsuarios(),
                            ':login' => $usuario->getLogin(),
                            ':email' => $usuario->getEmail(),
                            ':senha' => $usuario->getSenha(),
                            ':data_criacao' => $usuario->getDataCriacao(),
                            ':tempo_expiracao_senha' => $usuario->getTempoExpiracaoSenha(),
                            ':cod_autorizacao' => $usuario->getCodAutorizacao(),
                            ':status_usuario' => $usuario->getStatusUsuario(),
                            ':cod_pessoa' => $usuario->getCodPessoa(),
                            ':id_usuario' => $usuario->getIdUsuarios()
        ]);

        return $statement->rowCount();
    }

    public function apagarUsuario(usuario $usuario)
    {
        $statement = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
        $statement->execute([':id_usuario' => $usuario->getIdUsuarios()]);
        return $statement->rowCount();
    }
}