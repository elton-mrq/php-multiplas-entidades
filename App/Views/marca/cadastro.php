<div class="container">
    
    <div class="row">
        
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
           
            <h3>Cadastro de Marcas</h3>
            
            <?php if($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="/#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem; }?><br>
            </div>
            <?php } ?>
            
            <form action="http://<?php echo APP_HOST; ?>/marca/salvar" method="post" id="form_cadastro">
                
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome da marca" value="<?php echo $Sessao::retornaFormulario('nome'); ?>">                    
                </div>
                
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                
            </form>
            
        </div>
        
        <div class="col-md-3"></div>
        
    </div>
    
</div>
