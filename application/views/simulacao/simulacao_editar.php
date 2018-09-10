<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Simulação</h1>
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
                    <?php echo form_open('updateSimulacao'); ?>
                        <div class="form-group">
                            <label>Tipos de Investimentos</label>
                            <select class="form-control" name="simulacao_investimento_id" required>
                                {investimento}
                                    <option value="{investimento_id}">{investimento_nome}</option>
                                {/investimento}
                                {investimentos}
                                    <option value="{investimento_id}">{investimento_nome}</option>
                                {/investimentos}
                            </select>
                        </div>
                        <label>Aplicação</label>

                        {simulacao}
                        <div class="form-group input-group">
                            <input class="form-control" type="number" value="{simulacao_valor}" name="simulacao_valor" min="0" required>
                            <span class="input-group-addon">R$</span>
                        </div>
                        <label>Data</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="date" value="{simulacao_data}" name="simulacao_data" required>
                        </div>
                        <input type="hidden" name="simulacao_id" value="{simulacao_id}">
                        {/simulacao}
                        <a href="<?php echo base_url('simulacao/listar'); ?>" class="btn btn-warning">Voltar</a>
                        <button type="submit" class="btn btn-info">Salvar Registro</button>
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