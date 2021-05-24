<div class="container">
    <form action="?controller=NotasController&<?php echo isset($nota) ? "method=salvar&codigo={$nota->getCodigo()}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Adicionar nova nota</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Descrição:</label>
                <input type="text" class="form-control col-sm-8" name="descricao" id="descricao" value="<?php echo isset($nota) ? $nota->getDescricao() : null;?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                <input list="tipos" name="tipo" class="form-control col-sm-8" name="tipo" value="<?php echo isset($nota) ? $nota->getTipo() : null; ?>" />
                <datalist id="tipos">
                    <option value="Colégio">
                    <option value="Trabalho">
                    <option value="Dia-a-dia">
                    <option value="Lazer">
                    <option value="Compromisso">
                </datalist>
            </div>

            <div class="card-footer">
                <input type="hidden" name="codigo" id="codigo" value="<?php echo isset($nota) ? $nota->getCodigo() : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <a class="btn btn-danger" href="?controller=NotasController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
