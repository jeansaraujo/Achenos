<p class="h4 text-end">
    Dados Pessoais
</p>
<div class="w-100 d-flex justify-content-center">
    <img style="width:200px; height:auto;"src="
        <?php
            echo "img".DIRECTORY_SEPARATOR.$profissional[0]['profilepic'];
        ?>    
    ">
</div> 
<div style="width=100%">            
    <table class="table table bordered table-stripted text-center">
        <thead class="table-light">
        <tr>
            <td>Contato Principal</td>
            <td>Tipo Contato</td>
            <td>Contato Alternativo</td>
            <td>Nascimento</td>
            <td>Pais</td>
            <td>Estado</td>
            <td>Cidade</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
            <?php echo $profissional[0]['contato1'];?>
            </td>
            <td>
            <?php echo $profissional[0]['tpcontato1'];?>
            </td>
            <td>
            <?php echo $profissional[0]['contato2'];?>
            </td>
            <td>
            <?php echo $profissional[0]['birthday'];?>
            </td>
            <td>
            <?php echo $profissional[0]['pais'];?>
            </td>
            <td>
            <?php echo $profissional[0]['estado'];?>
            </td>
            <td>
            <?php echo $profissional[0]['cidade'];?>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table bordered table-stripted text-center">
        <thead class="table-light">
        <tr>
            <td>Descrição Biográfica</td>                
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
            <?php echo $profissional[0]['bio'];?>
            </td>                  
        </tr>
        </tbody>
    </table>
</div>