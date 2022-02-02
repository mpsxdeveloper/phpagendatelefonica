
<?php


class Contato implements \JsonSerializable {
    
    private $id;
    private $foto;
    private $nome;
    private $telefone;
    private $email;
    private $anotacoes;
    
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }
    
    function getId() {
        return $this->id;
    }

    function getFoto() {
        return $this->foto;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getAnotacoes() {
        return $this->anotacoes;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setFoto($foto): void {
        $this->foto = $foto;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setAnotacoes($anotacoes): void {
        $this->anotacoes = $anotacoes;
    }
    
}
