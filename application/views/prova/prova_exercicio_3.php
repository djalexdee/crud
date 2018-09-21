<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Exercício 3</h1>
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
                    <i class="fa fa-bar-chart-o fa-fw"></i> Refatorar
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <p>Refatore o código abaixo, fazendo as alterações que julgar necessário. <br>
                    <code>        
                    class MyUserClass <br>
                    { <br>
                        public function getUserList() <br>
                        { <br>
                            $dbconn = new DatabaseConnection('localhost','user','password'); <br>
                            $results = $dbconn->query('select name from user'); <br>

                            sort($results); <br>

                            return $results; <br>
                        }</code>
                    </p>
                    <p>Lista de usuário pelo Nome em ordem Decrescente</p>
                    <ul class="list-group">
                        {users}
                            <li class="list-group-item">{user_name}</li>
                        {/users}
                    </ul>
                    <p> <strong>Solução no Controler "Prova"  função "listar_exercicio_3"</strong> </p>
                </div>
                <div class="panel-footer">
                    <p>Teste BDR - Alex Sander Corrêa Martins</p>
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