<div class="container">
    <div class="row">
        
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
            
            <h3>Editar Produto</h3>
            
            <?php if($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem; } ?><br>
            </div>
            <?php } ?>
            
            <form action="http://<?php echo APP_HOST; ?>/produto/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['produto']->getId(); ?>" >
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $viewVar['produto']->getNome(); ?>">
                </div>
                
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" class="form-control" name="preco" value="<?php echo $viewVar['produto']->getPreco(); ?>">
                </div>
                
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" value="<?php echo $viewVar['produto']->getQuantidade(); ?>">
                </div>
                
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" name="descricao"><?php echo $viewVar['produto']->getDescricao(); ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="marca_id">Marca:</label>
                    <select name="marca_id" class="form-control">
                        <?php foreach ($viewVar['listaMarcas'] as $marca) { ?>
                            <option value="<?php echo $marca->getId(); ?>" <?php echo ( $viewVar['produto']->getMarca()->getId() == $marca->getId())? "selected" : ""; ?>><?php echo $marca->getNome(); ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/produto" class="btn btn-info btn-sm">Voltar</a>
                
            </form>
        </div>
        
        <div class="col-md-3"></div>
        
    </div>
</div>

