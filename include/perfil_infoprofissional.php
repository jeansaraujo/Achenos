<p class="h4 text-end">
    Dados Profissionais
</p>
<div style="width=100%">            
    <table class="table table bordered table-stripted text-center">
        <thead class="table-light">
        <tr>
            <td>Endereço</td>
            <td>Bairro</td>
            <td>Cidade</td>
            <td>Contato</td>
            <td>Serviço 1</td>
            <td>Serviço 1</td>            
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
            <?php echo $dadosProfissionais[0]['endereco'];?>
            </td>
            <td>
            <?php echo $dadosProfissionais[0]['bairro'];?>
            </td>
            <td>
            <?php echo $dadosProfissionais[0]['cidade'];?>
            </td>
            <td>
            <?php echo $dadosProfissionais[0]['contato'];?>
            </td>
            <td>
                <?php 
                    foreach($categorias as $categoria){
                        if($categoria['id'] == $dadosProfissionais[0]['servico1']){
                            echo $categoria['servico'];
                        }

                    }
                ?>
            </td>
            <td>
                <?php 
                    foreach($categorias as $categoria){
                        if($categoria['id'] == $dadosProfissionais[0]['servico2']){
                            echo $categoria['servico'];
                        }
                    }
                ?>
            </td>            
        </tr>
        </tbody>
    </table>
    <table class="table table bordered table-stripted text-center">
        <thead class="table-light">
        <tr>
            <td>Descrição Profissional</td>                
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
            <?php echo $dadosProfissionais[0]['work_bio'];?>
            </td>                  
        </tr>
        </tbody>
    </table>
</div>