<div id="top" class="header">
    <div class="text-vertical-center">
        <h1><?php echo __('Maison du Logiciel Libre') ?> </h1>
        <br>
    </div>
</div>
<section id="about" class="about">
<div class="row">
    <div class="col-xl-12 text-center">
        <div style="margin:20px; margin-top:5px">
            <div class="quotetitle">
                <b style="font-size : 20px;"> <?php echo __('Build ML2 future') ?> </b><br>
                <input type="button" value="<?php echo __('Complete survey') ?>" style="font-size: 16px; padding: 5px 10px 5px 10px; font-weight: bold;border: none;background-color: black; color: white;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';        this.innerText = ''; this.value = 'Cacher'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Participer au sondage'; }" />
            </div>
            <br>
            <div class="quotecontent">
                <div style="display: none;">
                    <iframe src="https://docs.google.com/forms/d/1V6JFtvjS7u8s_P_4pCd4ErTvmLoNGPeCLy4hg3M0sz8/viewform?embedded=true" width="760" height="4050" frameborder="0" marginheight="0" marginwidth="0"><?php echo __('Loading...') ?></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-xl-12 text-center">
        <h2><?php echo __('Our Mission') ?></h2>

        <p class="lead">
			<?php echo __('This initiative is born from a meeting between the ÉTS director and Google
			Montreal director. Seeing the difficulty that students have to hone their
			habilities to develop complex software and show the end product (code) to
			recruiters, they decided to establish the Maison du Logiciel Libre (ML2)') ?>
		</p>

        <p class="lead">
            <?php echo __('The foremost mission of ML2 is to offer a place of meeting and sharing in
			Montreal allowing the students to participate in open source software
			projects. This initiative try to reach students across of Montreal
			universities and to include the largest possible community, thus allowing
			the students to meet participants from multiple horizons with varied
			academic and professional experiences.') ?>
        </p>

        <p class="lead">
            <?php echo __('The mission of ML2 is an educational mission. Multiple activities will be
			eventually offered : free development, graduation projects, internships,
			mastering projects, … All of these activities will gravitate around open
			source projects. These projects will be proposed by : students, teachers ,
			universities or organisations wanting to invest in students formation.
			Seminars will complete this educational component.') ?>
        </p>

        <p class="lead">
            <?php echo __('By participating in ML2 activities, the students will be able to (i)
			discover the open source software world with its codes and objectives; (ii)
			hone their habilities to analyse, design and develop complex tasks ; (iii)
			build a portfolio with their open source achievements ; (iv) obtain
			recognitions from their university.') ?>
        </p>
    </div>
</div>
</section>