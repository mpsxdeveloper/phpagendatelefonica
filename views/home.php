<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda Telefônica - Visualizar Contato</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </head>

    <body>        

        <div class="container w-75">
            <form action="<?= BASE ?>contato/editar" method="post">
                <div class="row">
                    <h3 class="mt-5 text-center">Vizualizar Contato</h3><hr />
                    <input type="hidden" id="id" name="id" value="<?= $contato->getId() ?>" />
                </div>
                <div class="row mt-3">
                    <div class="col-5">
                        <div class="mb-2 float-end">
                            <img src="<?= BASE ?>fotos/<?= $contato->getFoto() ?>" width="400" height="400" />
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-2">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome" 
                                   value="<?= $contato->getNome() ?>" readonly />                    
                        </div>
                        <div class="mb-2">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control form-control-sm" name="telefone" 
                                   value="<?= $contato->getTelefone() ?>" readonly />
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control form-control-sm" name="email" 
                                   value="<?= $contato->getEmail() ?>" readonly />
                        </div>
                        <div class="mb-2">
                            <label for="anotacoes" class="form-label">Anotações</label>
                            <textarea class="form-control form-control-sm" rows="3" name="anotacoes" readonly
                                      style="resize: none;"><?= $contato->getAnotacoes() ?></textarea>
                        </div>
                        <div class="mt-4">
                            <a href="<?= BASE ?>" type="button" class="btn btn-danger">Cancelar <i class="fas fa fa-times"></i></a>
                            <a href="<?= BASE ?>contato/edit/<?= $contato->getId() ?>" type="button" class="btn btn-primary float-end">Editar <i class="fas fa fa-edit"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>

</html>
