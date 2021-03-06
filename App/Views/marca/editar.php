<div class="container">
    <div class="row">
        
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
            
            <h3>Editar Marca</h3>
            
            <?php if($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem; } ?><br>
            </div>
            <?php } ?>
            
            <form action="http://<?php echo APP_HOST; ?>/marca/atualizar" id="form_cadastro" method="post">
                
                <input type="hidden" name="id" class="form-control" value="<?php echo $viewVar['marca']->getId(); ?>">
                
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $viewVar['marca']->getNome(); ?>">
                </div>
                
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/marca" class="btn btn-primary btn-sm">Voltar</a>
                
            </form>
        </div>
        
        <div class="col-md-3"></div>
        
    </div>
</div>

