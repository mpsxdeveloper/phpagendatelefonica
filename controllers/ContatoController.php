<?php


class ContatoController extends Controller {
    
    public function index() {
        $array = array();
        $this->loadView('novo', $array);        
    }
    
    public function add() {      
        
        $nome = filter_input(INPUT_POST, trim("nome"));
        $telefone = filter_input(INPUT_POST, trim("telefone"));
        $email = filter_input(INPUT_POST, trim("email"));
        $anotacoes = filter_input(INPUT_POST, "anotacoes");
        $contatoDAO = new ContatoDAO();
        $contato = new Contato();        
        $contato->setNome(strtoupper($nome));
        $contato->setTelefone($telefone);
        $contato->setEmail(strtolower($email));
        $contato->setAnotacoes(strtoupper($anotacoes));
        
        $contatoDAO->salvar($contato);
        header("Location: " .BASE);
        
    }
    
    public function show($id) {
        $contatoDAO = new ContatoDAO();
        $contato = array();
        $contato["contato"] = $contatoDAO->get($id);
        $this->loadView('show', $contato);
    }
    
    public function edit($id) {
        
        $contatoDAO = new ContatoDAO();
        $array = array(
            'contato' => $contatoDAO->get($id)
        );
        $this->loadView('edit', $array);
        
    }
    
    public function editar() {        
        
        $id = filter_input(INPUT_POST, trim("id"));
        $foto = $_FILES["foto"];
        $nome = filter_input(INPUT_POST, trim("nome"));
        $telefone = filter_input(INPUT_POST, trim("telefone"));
        $email = filter_input(INPUT_POST, trim("email"));
        $anotacoes = filter_input(INPUT_POST, "anotacoes");
        $contatoDAO = new ContatoDAO();
        $contato = new Contato();
        $contato->setId($id);
        if(in_array($foto['type'], ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
            $fotoNome = md5($id).'.jpg';
            $contato->setFoto($fotoNome);
            move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/".$fotoNome);
        }
        else {
            $contato->setFoto("");
        }
        $contato->setNome(strtoupper($nome));
        $contato->setTelefone($telefone);
        $contato->setEmail(strtolower($email));
        $contato->setAnotacoes(strtoupper($anotacoes));
        $contatoDAO->editar($contato);
        header("Location: " .BASE);
        
    }
    
    public function delete($id) {        
        
        $contatoDAO = new ContatoDAO();
        $contatoDAO->deletar($id);
        header("Location: " .BASE);
        
    }
    
}
