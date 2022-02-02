<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda Telefônica - Home</title>        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    </head>
    
    <body onload="document.getElementById('pesquisa').focus();">        
        
        <div class="container">
            <div class="row mt-3 mb-2">
                <div class="col-9">
                    <form action="<?= BASE ?>home/search" method="post" class="w-50">
                        <div class="input-group input-group-sm mb-2">                        
                            <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquisar nome"
                                   required onblur="this.value=this.value.trim();" />
                            <button class="btn btn-primary" type="submit">Pesquisar <i class="fas fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-1">
                    <button class="btn btn-light btn-sm border border-dark" type="button" title="Página Inicial"
                            onclick="window.location.href='<?=BASE?>'">
                        <i class="fas fa fa-home"></i>
                    </button>
                </div>
                <div class="col-2">
                    <a class="btn btn-success btn-sm float-end" href="<?=BASE?>contato/index">Novo Contato <i class="fas fa fa-plus"></i></a>
                </div>                                
            </div>
            <div class="row mt-3 mb-2" overflow-y: auto;">
                <div class="container" style="min-height: 450px;">
                    <table class="table table-sm table-dark table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width: 5%;">ID</th>
                                <th scope="col" style="width: 25%;">NOME</th>
                                <th scope="col" style="width: 10%;">TELEFONE</th>
                                <th scope="col" style="width: 35%;">E-MAIL</th>
                                <th scope="col" colspan="3">AÇÕES</th>
                            </tr>
                        </thead>
                        <?php foreach ($contatos as $contato): ?>
                            <tr>
                                <td><?= $contato->getId() ?></td>
                                <td><?= $contato->getNome() ?></td>
                                <td><?= $contato->getTelefone() ?></td>
                                <td><?= $contato->getEmail() ?></td>
                                <td><a href="<?= BASE ?>contato/show/<?= $contato->getId() ?>" type="button" class="btn btn-warning btn-sm">Visualizar <i class="fas fa fa-eye"></i></a></td>
                                <td><a href="<?= BASE ?>contato/edit/<?= $contato->getId() ?>" type="button" class="btn btn-info btn-sm">Editar <i class="fas fa fa-edit"></i></a></td>
                                <td><a type="button" class="btn btn-danger btn-sm"
                                       onclick="showModal(<?= $contato->getId() ?>);">Excluir <i class="fas fa fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <ul class="pagination justify-content-center">
                    <?php for($i = 1; $i <= HomeController::$numberOfPages; $i++): ?>
                        <li class="page-item p-1 <?=$p==$i?'active':''?>"><a class="page-link" href="<?=BASE?>home&page=<?=$i?>"><?=$i?></a></li>
                    <?php endfor; ?>
                </ul>                
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deseja realmente excluir esse contato?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar <i class="fas fa fa-times"></i></button>
                            <button type="button" class="btn btn-danger" onclick="deletar();">Deletar <i class="fas fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="idcontato" />
            </div>
            
            <script>
                function showModal(id) {
                    $("#idcontato").val(id);
                    $("#exampleModal").modal('show');
                }
                function deletar() {
                    var id = $('#idcontato').val();
                    window.location.href = "http://localhost/agendatelefonica/contato/delete/"+id;
                }
            </script>
            
        </div>
        
    </body>
    
</html>
