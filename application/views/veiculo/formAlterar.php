<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alterar veículo</h5>

                    <form method="Post" action="http://127.0.0.1/codeigniter-aula/index.php/veiculo/salvaralteracao">
                        <div class="row mb-3" hidden>
                            <label class="col-sm-2 col-form-label">id</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="id" value="<?php echo $veiculo->id; ?>"  />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="modelo" value="<?php echo $veiculo->modelo; ?>" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="marca" value="<?php echo $veiculo->marca; ?>" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ano</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="ano" value="<?php echo $veiculo->ano; ?>" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="valor" value="<?php echo $veiculo->valor; ?>" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <select name="cor" class="form-select" required>
                                    <?php echo $opcoes; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="imagem" value="<?php echo $veiculo->imagem; ?>" required />
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <a class="btn btn-secondary" href='http://127.0.0.1/codeigniter-aula/index.php/veiculo'> Voltar/Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>