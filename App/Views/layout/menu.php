<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">CRUD 1n</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapsed">
            <ul class="nav navbar-nav">
                <li <?php if($viewVar['nameController'] == 'HomeController') { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>">Home</a></li>
                <li <?php if($viewVar['nameController'] == 'ProdutoController') { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produto">Lista de Produtos</a>
                </li>
                <li <?php if($viewVar['nameController'] == 'MarcaController') { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/marca">Lista de Marcas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
