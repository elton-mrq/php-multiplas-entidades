<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
            
            <h3>Excluir Marca</h3>
            
            <?php if($Sessao::retornaErro()) {?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="closed">&times;</a>
                    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem; } ?><br>
                </div>
            <?php } ?>
            
            <?php if($Sessao::retornaMensagem()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><br>
                    <?php echo $Sessao::retornaMensagem(); ?>
                </div>
            <?php } ?>
            
            <form action="http://<?php echo APP_HOST; ?>/marca/excluir" id="form_cadastro" method="post">
                
                <input type="hidden" name="id" class="form-control" value="<?php echo $viewVar['marca']->getId(); ?>">
                
                <div class="panel panel-danger">
                    
                    <div class="panel-body">
                        Deseja realmente excluir a marca: <?php echo $viewVar['marca']->getNome(); ?>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        <a href="http://<?php echo APP_HOST; ?>/marca" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                    
                </div>
                
            </form>
            
        </div>
        
        <div class="col-md-3"></div>
        
    </div>
</div>

