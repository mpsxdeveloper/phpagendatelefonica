<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda Telefônica - Editar Contato</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </head>
    
    <body>
        
        <div class="container w-50">
            <form action="<?=BASE?>contato/editar" method="post" enctype="multipart/form-data">
                <h3 class="mt-3">Editar Contato</h3><hr />
                <input type="hidden" id="id" name="id" value="<?=$contato->getId()?>" />
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" />                      
                </div>                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" required onblur="this.value=this.value.trim();" value="<?= $contato->getNome() ?>" maxlength="30" />                    
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" maxlength="14" required onblur="this.value=this.value.trim();" value="<?= $contato->getTelefone() ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" maxlength="50" onblur="this.value=this.value.trim();" value="<?= $contato->getEmail() ?>">
                </div>
                <div class="mb-3">
                    <label for="anotacoes" class="form-label">Anotações</label>
                    <textarea class="form-control" name="anotacoes" id="anotacoes" 
                              maxlength="200" onblur="this.value=this.value.trim();"
                              style="resize: none;"><?=$contato->getAnotacoes()?></textarea>
                </div>
                <a href="<?= BASE ?>" type="button" class="btn btn-danger">Cancelar <i class="fas fa fa-times"></i></a>
                <button type="submit" class="btn btn-primary float-end">Editar <i class="fas fa fa-edit"></i></a></button>
            </form>
        </div>
        
        <script>
            $(document).ready(function(){
                $('#telefone').mask('(00)00000-0000');
            });
        </script>
        
    </body>
    
</html>
