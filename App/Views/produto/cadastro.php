<div class="container">
    
    <div class="row">
        
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
            
            <h3>Cadastro de Produtos</h3>
            
            <?php if($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem; } ?><br>
            </div>
            <?php } ?>
            
            <form action="http://<?php echo APP_HOST; ?>/produto/salvar" method="post" id="form_cadastro">
            
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do produto" value="<?php echo $Sessao::retornaFormulario('nome'); ?>"> 
                </div>
                
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" class="form-control" name="preco" placeholder="100" value="<?php echo $Sessao::retornaFormulario('preco'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" class="form-control" name="quantidade" placeholder="" value="<?php echo $Sessao::retornaFormulario('quantidade'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="name">Descrição:</label>
                    <textarea class="form-control" name="descricao" placeholder="Descrição"><?php echo $Sessao::retornaFormulario('descricao') ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="marca_id">Marca:</label>
                    <select class="form-control" name="marca_id">
                        <?php foreach ($viewVar['listaMarcas'] as $marca) { ?>
                        <option value="<?php echo $marca->getId() ?>" <?php echo ($Sessao::retornaFormulario('marca_id') == $marca->getId()) ? "selected" : "" ?>><?php echo $marca->getNome(); ?></option>
                        <?php }?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
                                    
        </div>
        
        <div class="col-md-3"></div>
        
    </div>
    
</div>