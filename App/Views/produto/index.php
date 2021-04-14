<div class="container">

    <div class="row">
        <br>

        <div class="col-md-12">
            <a href="http://<?php echo APP_HOST; ?>/produto/cadastro" class="btn btn-success btn-sm">Adicionar</a>
            <hr>
        </div>

        <div class="col-md-12">
            
            <?php if($Sessao::retornaMensagem()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
            <?php } ?>
            
            <?php if(!count($viewVar['listaProdutos'])) { ?>
            <div class="alert alert-info">
                Nenhum Produto Encontrado!
            </div>
            <?php } else { ?>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="info">Nome</th>
                            <th class="info">Preco</th>
                            <th class="info">Marca</th>
                            <th class="info"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($viewVar['listaProdutos'] as $produto) { ?>
                            <tr>
                                <td><?php echo $produto->getNome(); ?></td>
                                <td>R$ <?php echo $produto->getPreco(); ?></td>
                                <td><?php echo $produto->getMarca()->getNome(); ?></td>
                                <td>
                                    <a href="http://<?php echo APP_HOST; ?>/produto/edicao/<?php echo $produto->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                    <a href="http://<?php echo APP_HOST; ?>/produto/exclusao/<?php echo $produto->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
            
            <?php } ?>
        </div>
    </div>

</div>


<?php

  //  echo '<br><br><br><h2> Produto Controller </h2>';

  //  foreach ($viewVar['listaProdutos'] as $produto){
 //       echo 'Produto: ' . $produto->getNome();
 //   }