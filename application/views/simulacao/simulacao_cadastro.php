<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro Simulação de Investimento</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo get_notificacao(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Simulações
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php echo form_open('cadastrarSimulacao'); ?>
                        <div class="form-group">
                            <label>Tipos de Investimentos</label>
                            <select class="form-control" name="simulacao_investimento_id" required>
                                <option value="" selected>Selecione o tipo de investimento</option>
                                {investimentos}
                                    <option value="{investimento_id}">{investimento_nome}</option>
                                {/investimentos}
                            </select>
                        </div>
                        <label>Aplicação</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="simulacao_valor" min="0" required>
                            <span class="input-group-addon">R$</span>
                        </div>
                        <label>Data</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="date" name="simulacao_data" required>
                        </div>
                        <button type="submit" class="btn btn-info">Salvar Registro</button>
                        <button type="reset" class="btn btn-warning">Cancelar</button>
                    <?php form_close(); ?>
                </div>

                <div class="panel-footer">
                    <p>Teste TBB - Alex Sander Corrêa Martins</p>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->