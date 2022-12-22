<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage restourant
 */
?>
			<footer id="footer">
  				<div class="footer">
  					<div class="footer-layout">
  						<table id="table_footer">
  							<tbody>
  								<tr>
  									<td class="footer-logo">
  										<?php if( has_custom_logo() ){
											echo get_custom_logo();
										} ?>
  									</td>
  									<td class="copyright">
  										<div>
  											<p class="cont"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/phone-footer.png" alt="Контактный телефон тургенев ресторан" class="img-responsive"> <span>Контактный телефон</span></p>
											<?php $tel = get_theme_mod('phone', '<span>+7(4872)</span> 25 97 25');
											$tel_href = preg_replace("/[^0-9]/", '', $tel); ?>
  											<p class="phon"><a href="tel:+<?php echo $tel_href; ?>"><?php echo $tel; ?></a></p>
  											<p class="copy">&copy; <?php echo date('Y'); ?> &laquo;<?php echo get_bloginfo('description');?>&raquo;</p>
  										</div>
  									</td>
  									<td class="adress">
  										<div>
  											<p><span>Наш адрес:</span><br>
  												<?php echo get_theme_mod('adress', '300041, г. Тула, ул. Тургеневская, д. 13.'); ?><br>
  											</p>
  											<p>Наша почта:<br>
  												Администраторы - <a href="mailto:<?php echo get_theme_mod('email_adm', ' reserve@turgenev-tula.ru'); ?>"><?php echo get_theme_mod('email_adm', ' reserve@turgenev-tula.ru'); ?></a><br>
  											</p>
  										</div>
  									</td>
  									<td class="script">
  										<div class="socseti">
											<noindex>
												<a href="/" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/tw.png" alt=""></a>
												<a href="/" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vk.png" alt=""></a>
												<a href="/" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fb.png" alt=""></a>
												<a href="/" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ok.png" alt=""></a>
											</noindex>
										</div>
										<div style="display:none;">
											<?php echo get_theme_mod('live', 'none'); ?> ?>
										</div>
  									</td>
  								</tr>
  							</tbody>
  						</table>
  					</div>
  				</div>
  			</footer>
		</div>
		
		<div style="display:none" class="fancybox-hidden" id="xxx_contact_callback">
			<div id="contact_callback">
				<?php echo do_shortcode('[contact-form-7 id="1184" title="Обратный звонок"]'); ?>
			</div>
		</div>
		
	</div>
<!-- </div>	 -->
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'GgOJ7bf13L';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<?php wp_footer(); ?>
</body>
</html>
