
<div class="container">
    <div class="row">
        <div class="modal fade" id="alterar" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" >Alterar Locais de Treino</h4>
                        <?php $id = $_GET['id'];
                        echo $id;
                        ?>
                    </div>
                    <form action="AlterarLocalTreino.php" method="post">
                    <?php  foreach ((array)$listarLocalTreino as $lt) { ?>
                        <div class="modal-body" style="padding: 5px;">
                            <div class="row">
                                <input type="hidden" name="id-altera" />
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input type="text" class="form-control" name="nome_altera" id="nome_altera" placeholder="Nome"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="endereco-altera" id="endereco-altera" placeholder="Endereco" type="text" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                   <label>Estado:</label>
                                    <select name="estado-altera" >
                                        <option>Selecione</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapa</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceara</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espirito Santo</option>
                                        <option value="GO">Goias</option>
                                        <option value="MA">Maranhao</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Para</option>
                                        <option value="PB">Paraiba</option>
                                        <option value="PR">Parana</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piaui</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondonia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">Sao Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" name="cidade-altera" id="cidade-altera" placeholder="Cidade" type="text"  />
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button id="Alterar" name="Alterar" class="btn btn-primary">Alterar</button>
                            <input type="reset" class="btn btn-danger" value="Limpar" />
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Fechar</button>
                        </div>
                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>