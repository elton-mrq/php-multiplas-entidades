<div class="container">
    
    <div class="row">
        <br>
        
        <div class="col-md-12">
            <a href="http://<?php echo APP_HOST; ?>/marca/cadastro" class="btn btn-success btn-sm">Adicionar</a>
            <hr>
        </div>
        
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php if($Sessao::retornaMensagem()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
            <?php } ?>
            
            <?php if(!count($viewVar['listaMarcas'])) { ?>
            
            <div class="alert alert-info">Nenhuma marca encontrada!</div>
            
            <?php } else { ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    
                    <thead>
                        <tr>
                            <th class="info">Nome</th>
                            <th class="info"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($viewVar['listaMarcas'] as $marca) { ?>
                        <tr>
                            <td><?php echo $marca->getNome(); ?></td>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/marca/edicao/<?php echo $marca->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/marca/exclusao/<?php echo $marca->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
            
            <?php } ?>
        </div>
        <div class="col-md-3"></div>
    </div>
    
</div>