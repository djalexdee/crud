<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Investimento</h1>
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
                    {investimento}
                    <?php echo form_open('update'); ?>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="investimento_nome" value="{investimento_nome}" required>
                            <p class="help-block">Exemplo: Aplicação 1</p>
                        </div>
                        <label>Rentabilidade</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="investimento_rentabilidade" min="0" value="{investimento_rentabilidade}" required>
                            <span class="input-group-addon">%</span>
                        </div>
                        <label>Taxa</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="investimento_taxa" min="0" value="{investimento_taxa}" required>
                            <span class="input-group-addon">%</span>
                        </div>
                        <label>Período de Aplicação</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="number" name="investimento_periodo" min="0" value="{investimento_periodo}" required>
                            <span class="input-group-addon">Dias</span>
                        </div>
                        <input type="hidden" name="investimento_id" value="{investimento_id}">
                        <a href="<?php echo base_url('investimento/listar'); ?>" class="btn btn-warning">Voltar</a>
                        <button type="submit" class="btn btn-info">Editar Registro</button>
                    <?php form_close(); ?>
                    {/investimento}
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