<!-- <div id="footer">
	<div id="innerfooter">
    	<ul id="footerItems">
        	<li>Bogot&aacute; Colombia</li>
            <li>Comunicate<br />(+571) 7446224</li>
           	<p>Todos los derechos reservados Tempolink 2015</p>
        </ul>
		<div id="logos-footer">
			<img src="images/logo-footer.png" />
			<img src="images/logo-icontect.png"  />
		</div>
    </div>
</div> -->
<div class="footer">
	<div class="footer_bottom">
		<a><img class="logoSmall" src="/images/tempoLink.png" alt="Tempolink" /></a>
		<p>Direcci&oacute;n: Cra. 47 # 124 - 47<br>Correo: admin@tempolink.com<br>Bogot&aacute;<br>
			Todos los derechos reservados Tempolink 2015</p>
		<a class="otrologo"><img src="/images/logo-footer.png" alt="" /></a>
        
     
    <ul class="registro">
        <?php
        if( !isset($_SESSION["usuarioTempo"]) ){?>
 			<li><a href="index.php?pag=registro">Registrarse</a></li>
        	<li><a id="inline" href="#data" class="cuenta">Mi Cuenta</a></li>
		<?php }
		else {
			echo('
			<li style="padding-right:50px;"><a href="index.php?pag=perfil">Mi perfil</a></li>
			<li><a href="index.php?pag=logout" class="cuenta">Logout</a></li>');	
		}
		?>
        </li>
    </ul>
	<?php if($numRedes != 0 ){
		for($i = 0; $i < $numRedes ; $i++ ){?>
			<a class="redes" href="<?php echo($redes[$i]->getLink()); ?>" target="_blank">
				<img src="images/redes/<?php echo($redes[$i]->getThumb()); ?>" title="<?php echo($redes[$i]->getNombre()); ?>" alt="<?php echo($redes[$i]->getNombre()); ?>" />	
			</a>
    <?php }}?>
</div>
	
</div>
