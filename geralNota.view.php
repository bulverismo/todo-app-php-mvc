<h1>Notas</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th><a href="?controller=NotasController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($notas) {
                foreach ($notas as $nota) {
                    ?>
                    <tr>
                        <td><?=$nota->getCodigo(); ?></td>
                        <td><?=$nota->getDescricao(); ?></td>
                        <td><?=$nota->getTipo(); ?></td>
                        <td>
                            <a href="?controller=NotasController&method=editar&codigo=<?php echo $nota->getCodigo(); ?>" class="btn btn-primary btn-sm" title="Editar a nota <?=$nota->getDescricao();?>">Editar</a>
                            <a href="?controller=NotasController&method=excluir&codigo=<?php echo $nota->getCodigo(); ?>" 
                                onclick = "if (!confirm('Deseja realmente excluir o nota <?=$nota->getDescricao();?>?\nEsta operação não poderá ser desfeita.')) { return false; }" class="btn btn-danger btn-sm" title="Excluir a nota <?=$nota->getDescricao();?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhuma nota encontrada</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
