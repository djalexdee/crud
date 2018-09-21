<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Exercício 1</h1>
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
                    <i class="fa fa-bar-chart-o fa-fw"></i> FizzBuzz
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <p>Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.</p>
                    <ul class="list-group">
                        <?php 
                            $lenght = count($dados);
                            for ($i=0; $i < $lenght; $i++) { 
                                echo '<li class="list-group-item">'.$dados[$i].'</li>';
                            }
                        ?>    
                    </ul>
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