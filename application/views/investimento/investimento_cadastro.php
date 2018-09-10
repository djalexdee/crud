<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Investimento</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo get_notificacao(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Tipos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php echo form_open('cadastrar'); ?>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="investimento_nome" required>
                            <p class="help-block">Exemplo: Aplicação 1</p>
                        </div>
                        <label>Rentabilidade</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="investimento_rentabilidade" min="0" required>
                            <span class="input-group-addon">%</span>
                        </div>
                        <label>Taxa</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="investimento_taxa" min="0" required>
                            <span class="input-group-addon">%</span>
                        </div>
                        <label>Período de Aplicação</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="investimento_periodo" min="0" required>
                            <span class="input-group-addon">Dias</span>
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