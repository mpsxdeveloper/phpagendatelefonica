<?php


class HomeController extends Controller {
    
    static $numberOfPages;
    
    public function __construct() {
        $contatoDAO = new ContatoDAO();
        HomeController::$numberOfPages = $contatoDAO->getPagesNumber();
    }
    
    public static function getPagesNumber() {
        return self::numberOfPages;
    }
    
    public function index() {
        
        $contatoDAO = new ContatoDAO();
        $dados = array();
        $page = filter_input(INPUT_GET, "page");
        if(!filter_var($page, FILTER_VALIDATE_INT)) {
            $page = 1;
        }
        if($page < 1) {
            $page = 1;
        }
        if($page > self::$numberOfPages) {
            $page = 1;
        }
        $contatos = $contatoDAO->listar($page);
        $dados["contatos"] = $contatos;
        $dados["p"] = $page;
        $this->loadView('home', $dados);
        
    }
    
    public function search() {
        
        $contatoDAO = new ContatoDAO();
        
        $dados = array();
        
        $pesquisa = filter_input(INPUT_POST, 'pesquisa');
        
        if($pesquisa == null || $pesquisa == '') {
            $contatos = $contatoDAO->listar();
            $dados['contatos'] = $contatos;
        }
        else {
            $contatos = $contatoDAO->pesquisar($pesquisa);
            $dados['contatos'] = $contatos;
        }
        
        $this->loadView('home', $dados);
        
    }
    
}
