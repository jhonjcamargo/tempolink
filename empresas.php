<?php 
require_once("DAO/Cliente.php");
$cliente = Cliente::listado();
$numClientes = count($cliente);
?>
<script type="text/javascript">
	$(function() {
			$('ul#clientes li').hover(function(){
				$(this).find('img').animate({top:'60px'},{queue:false,duration:500});
			}, function(){
				$(this).find('img').animate({top:'10px'},{queue:false,duration:500});
			});
		});
	</script>
<h3>EMPRESAS</h3>
<div class="homeText">
	<ul id="clientes">
        <?php for($i = 0; $i < $numClientes ; $i++ ){ ?>
        <li class="cliente">
        	<a href="#"><?php echo($cliente[$i]->getCliente()) ?></a>
        	<img class="ola1" src="clientes/<?php echo($cliente[$i]->getThumb()) ?>"  width="150" height="150"/>
        </li>
        <?php } ?>
    </ul>
</div>