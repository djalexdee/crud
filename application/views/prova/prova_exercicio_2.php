<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Exercício 2</h1>
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
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {<br>
                        header("Location: http://www.google.com");<br>
                        exit();<br>
                    } elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {<br>
                        header("Location: http://www.google.com");<br>
                        exit();<br>
                    </code>    
                    </p>
                    <p> <strong>Solução no Controler "Prova"  função "listar_exercicio_2"</strong> </p>
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