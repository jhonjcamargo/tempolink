<?php
require_once("DAO/Pagina.php");
$pagina = Pagina::cargar($_GET['id']);
?>
<style>

.text h1 {
	width: 100%;
	display: inline-block;
	font: 42px 'f1';
	font-weight: bolder;
	color:  #2f004a;
	line-height: 45px;
}

.text h2 {
	width: 100%;
	display: inline-block;
	font: 21px 'f3';
	margin: 0 0 5px 0;
	color:  #2f004a;
}

.text h3 {
	width: 100%;
	display: inline-block;
	font: 18px 'f1';
	margin: 0 0 2px 0;
	color:  #2f004a;
	line-height: 20px;
}

.text h4 {
	width: 100%;
	display: inline-block;
	font: 15px 'f1';
	margin: 0 0 2px 0;
	color:  #a2cff0;
}

.text h5 {
	width: 100%;
	display: inline-block;
	font: 22px 'f1';
	margin: 0 0 0px 0;
	color:  #000;
	line-height: 24px;
}

.text h6 {
	width: 100%;
	display: inline-block;
	font: 16px 'f1';
	margin: 0 0 2px 0;
	color:  #bdbcbc;
}

.text p {
	width: 100%;
	display: inline-block;
	vertical-align: middle;
	font: 18px 'f1';
	margin: 0 0 5px 0;
	color:  #9e9e9e;
}

.text hr {
	clear: both;
	display: inline-block;
	width: 115px;
	border-style: none none solid none;
	border-width: 3px;
	border-color: #A72626;
	margin: 4px 0 8px;
}

.text hr.hr2 {
	width: 40px;
	border-width: 2px;
	vertical-align: top;
	margin: 2px 0 6px;
	border-color: #979797;
	float: left;
}

.hr3 {
	width: 200px;
	margin: auto;
	border-style: none none solid none;
	border-width: 3px;
	border-color: #c1dff5;
	position: relative;
}

.left {
	position: absolute;
	z-index: 1000;
	top: 45%;
	left: 0px;
	background: url(../images/basic/left.png) 0 100% no-repeat;
	width: 58px;
	height: 117px;
	cursor: pointer;
}

.right {
	position: absolute;
	z-index: 1000;
	top: 45%;
	right: 0px;
	background: url(../images/basic/right.png) 0 100% no-repeat;
	width: 58px;
	height: 117px;
	cursor: pointer;
}
.t_left {
	text-align: left !important;	
}

.t_right {
	text-align: right !important;	
}

.txtAcom, .txtAcom2 {
	display: inline-block;
	vertical-align: middle;
	width: 35%;
	margin: 10px 20% 0px 4%;
}

.txtAcom2 {
	margin: 0 18% 0 5%;
}

.imgAcom {
	display: inline-block;
	vertical-align: middle;
	width: 40%;
	height: 400px;
	background-position: center;
	background-size: cover;
}

.imgAcom2 {
	display: inline-block;
	vertical-align: middle;
	width: 35%;
	margin: 10px 0 0 0%;
	height: 300px;
	background-position: center;
	background-size: cover;
}
.radius {
	-webkit-border-radius: 500px;
	-moz-border-radius: 500px;
	border-radius: 500px;
}
.centerCol {
	float: left;
	width: 90%;
	margin: 0 5%;
	position: relative;
}

.margin1 {
	margin-top: 40px;
	margin-bottom: 40px;
}

.col1 {
	float: left;
	width: 55%;
	position: relative;
}

.col2 {
	float: left;
	width: 40%;
	margin: 0 0 0 5%;
	position: relative;
}

.t_center {
	text-align: center !important;	
}

.icon1 {
	display: inline-block;
	width: 58px;
	margin: 0 20px 0 0;
	vertical-align: bottom;
}
</style>
<script type="text/javascript">
function squareSize(){
	$('.squareSize').each(function(){
		$(this).css('height', $(this).width());
	});
}	
</script>

<!--<h3><?php //echo ($pagina->getNombre()); ?></h3> --> 
<?php echo html_entity_decode(utf8_encode($pagina->getContenido()))?>
