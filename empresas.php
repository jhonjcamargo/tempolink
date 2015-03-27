<?php 
require_once("DAO/Cliente.php");
$cliente = Cliente::listado();
$numClientes = count($cliente);
?>
<style>
.margin2 {
	margin-top: 20px;
}
.t_center {
	text-align: center !important;	
}
.item {
	display: inline-block;
	width: 200px;
	max-height: 301px;
	margin: 0 14px 40px;
	background: #fff;
	position: relative;
	cursor: pointer;
}

.item h2 {
	float: left;
	width: 90%;
	/*height: 34px;*/
	height: auto;
	text-transform: uppercase;
	margin: 6px 5% 0px;
	color: #fff;
}

.item .cont {
	position: relative;
	float: left;
	width: 100%;
	height: 229px;
	overflow: hidden;
	margin: 0px 0% 0;
}

.item .cont img {
	float: left;
	width: 100%;
}

.item .desc {
	position: absolute;
	bottom:0px;
	left:0px;
	width: 90%;
	height: 0%;
	padding: 0%;
	overflow: hidden;
	background: url(../images/basic/particle2.png) repeat;
}

.item .desc p {
	float: left;
	width: 100%;
	color: #fff;
}

.link {
	float: left;
	width: 100%;
	text-align: right;
	color: #81C242;
	font: 1em 'f1';
}

.item .label {
	width: 100%;
	height: 14px;
	background: url("/images/newimg/etiquetaempresa.png") repeat;
	background-size: 100% 100%;
	text-align: center;
	margin-top: -13px;
	padding: 14px 0;
	position: absolute;
	bottom: -10px;
	left: 0;
	color: #fff;
}

.item .label h3{
	width: 90%;
	padding: 2px 5% 0;
	color: #fff;
	font: 14px 'f1';
	text-align: center;
	line-height: 14px;
}

.item .label a{
	width: 90%;
	color: #fff;
	font: 18px 'f1';
	text-align: center;
	text-transform: uppercase;
  	font-style: italic;
  	text-decoration: inherit;
}



.item .label span {
	font-size: 10px;
}	
</style>

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
<div class="widthWrap margin2 t_center">
        <?php foreach ($cliente as $c){ for ($i = 0; $i < 4; $i++) {?>
        	
	        <div class="item" style="cursor: default;">
				<div class="cont">
					<img src="clientes/<?php echo $c->getThumb() ?>" alt="tempolink" />
				</div>
				<div class="label">
					<a href="<?php echo $c->getLink()?>" target="_blank"><?php echo $c->getCliente() ?></a>
				</div>
			</div>
        <?php }} ?>
</div>