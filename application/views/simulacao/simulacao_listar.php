<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Simulação de Investimentos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<?php echo get_notificacao(); ?>
<div id="resposta"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Listagem
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="content table-responsive table-full-width" id="tabelaOrcamento">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <th><b>Tipo de Investimento</b></th>
                                <th><b>Aplicação Total</b></th>
                                <th><b>Período Total</b></th>
                                <th><b>Rendimento Total</b></th>
                                <th><b>Data de Cadastro</b></th>
                                <th><b>Ações</b></th>
                            </thead>
                            <tbody>
                            {simulacoes}
                                <tr>
                                    <td>{investimento}</td>
                                    <td>R$ {aplicacao_total}</td>
                                    <td>{periodo_total}</td>
                                    <td>R$ {rendimento_total}</td>
                                    <td>{data}</td>
                                    <td>{editar}{deletar}</td>
                                </tr>
                            {/simulacoes}
                            </tbody>
                        </table>
                    </div>
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