<div class="sp-form-contact">
    <form method="get" action="">
		
		<?php 
		$fieldset_open = false;
		if( isset( $atts['form_title'] ) && $atts['form_title'] != '' ): ?>
		<fieldset>
				<?php $fieldset_open = true; ?>
				<legend><?php echo $atts['form_title'] ?></legend>
		<?php endif; ?>
		
				<div class="row">
			        <div class="col-<?php echo $col[0] ?>">
			            <input type="text" placeholder="Nama Anda" id="sp-contact-name">
			        </div>
			        <div class="col-<?php echo $col[1] ?>">
			            <input type="text" placeholder="Kota Asal" id="sp-contact-city">
			        </div>
			        <div class="col-<?php echo $col[2] ?>">
			            <button class="button" id="sp-form-contact-button">
			                <i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Mulai
			            </button>
			        </div>
				</div>
				
		<?php if( $fieldset_open ): ?>		
		</fieldset>
		<?php endif; ?>
		
    </form>
</div>