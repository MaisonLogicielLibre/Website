<div class="row">
    <div class="col-xl-12 text-center">
        <div style="margin:20px; margin-top:5px">
            <div class="quotetitle">
                <b style="font-size : 20px;"> <?= $this->Html->link(__('Register today!'), ['controller' => 'Users', 'action' => 'register']);?> </b><br>
				<p> <?= __('Join us at ML² in building the future of Free Software and Open Source code.') ?></p>
				<p> <?= __('We need feedback!') ?> </p>
            </div>
            <br>
            <div class="quotecontent">
                <div>
					<?php $lang = $this->request->session()->read('lang');		 
						  if ($lang == "fr_CA") {?>
						<iframe src="https://docs.google.com/forms/d/1V6JFtvjS7u8s_P_4pCd4ErTvmLoNGPeCLy4hg3M0sz8/viewform?embedded=true" width="760" height="4050" frameborder="0" marginheight="0" marginwidth="0"><?php echo __('Loading...') ?></iframe>
					<?php } else { ?>
						<iframe src="https://docs.google.com/forms/d/1776VuKQwbZvC-WHBL-5imu5ZMrQnb8o3t9x7qGz6SWI/viewform?embedded=true" width="760" height="4050" frameborder="0" marginheight="0" marginwidth="0"><?php echo __('Loading...') ?></iframe>
					<?php }  ?>
				</div>
            </div>
        </div>
    </div>
</div>