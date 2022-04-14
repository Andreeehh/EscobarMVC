<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Adicionar novo veículo</h5>

                    <form method="Post" action="http://127.0.0.1/codeigniter-aula/index.php/veiculo/novo">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="modelo" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="marca" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ano</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="ano" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="valor" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cor" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="imagem" required />
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