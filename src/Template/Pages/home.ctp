<style>
    /*todo move these mods to style sheet*/
    .container {
        padding: 0 0 10px 0;
    }

    .ml2_box_height {
        height: 350px;
    }

    .bottom_align {
        position: absolute; /* added */
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        bottom: 0; /* added */
    }

    hr {
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 1px;
    }

    .pretty_mobile_button {
        margin-top: 5px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1><?= __("Welcome to Maison Logiciel Libre (ML²)");?></h1>

            <h3><?= __("Our mission is to improve University students software development skills and hiring potential through
                practical experience on free and open-source software projects");?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" align="center">
            <h4>
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register") ?></a>
                <?= __("to join our growing community of "); ?>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'academic']); ?>"><?= __("university professors and students") ?></a> <?= __("and"); ?>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'industry']); ?>"><?= __("industry partners") ?></a> <?= __("in Quebec."); ?>
            </h4>
        </div>
        <div class="col-sm-6" align="center">
            <h4>
                <!--                todo point this to the value propostion page-->
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"> <i
                        class="fa fa-arrow-right"></i> </a> <?= __("Discover the benefits of joining ML²") ?>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 ml2_box_height" align="center">
           <hr>
            <h2 class="section-heading"><?= __("ML² University Network"); ?></h2>
            <?= $this->Html->image('banner.png', ['alt' => 'ML2', 'class' => 'img-responsive'], array('max-height' => '350px')) ?>
            <br>
            <div class="bottom_align">
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'submit']); ?>"><?= __('Add your Canadian University to our growing network'); ?></a>
            </div>
        </div>
        <div class="col-sm-6 ml2_box_height" align="center">
            <hr>
            <h2 class="section-heading"><?= __("Our generous ML² Sponsors"); ?></h2>
            <div>
                <a href="http://www.google.com"><?php echo $this->Html->image('google.svg', ['alt' => 'Google', 'width' => '50%', 'height' => 'auto', 'class' => 'img-responsive']) ?></a>
            </div>
            <div>
                <a href="https://www.savoirfairelinux.com"><?php echo $this->Html->image('savoirfairelinux.svg', ['alt' => 'Savoirfairelinux', 'width' => '50%', 'height' => 'auto', 'class' => 'img-responsive']) ?></a>
            </div>
            <b><?= __("Get visibility and access to over 5000 software engineering and computer science students. Create partnerships with professors in our university network.
            Form stategic alliances with our industry anf government partners.") ?></b>
            <div class="bottom_align">
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'submit']); ?>"><?= __('Become an ML² Sponsor '); ?></a>
                <br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <hr>
            <h2 class="section-heading"><i class="fa fa-graduation-cap"></i><?= __("Are you a university student?"); ?></h2>
            <h4><?= __("Take our survey and help us serve you better"); ?> <i class="fa fa-arrow-right"></i>PUT SURVEY HERE</h4>
            <h4><?= __("Apply to work on an open source project"); ?> <i class="fa fa-arrow-right"></i></h4>

            <div align="center">
                <a class="btn btn-primary pretty_mobile_button"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __("Paid intern projects"); ?></a>
                <a class="btn btn-primary pretty_mobile_button"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __("Graduate projects"); ?></a>
                <a class="btn btn-primary pretty_mobile_button"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __("Capstone projects"); ?></a>
            </div>
            <h4><?= __("Are you new to Free Software and Open Source?"); ?></h4>
            <ul>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register") ?></a>
                <?= __("and learn from our Teaching Assistants and Collaborate with students."); ?></h4></li>
                <li>Visit our <a
                        href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Wiki") ?></a>
                <?= __("page and learn about open source coding practices"); ?>
                </li>
            </ul>
        </div>
        <div class="col-sm-6">
            <hr>
            <h2 class="section-heading"><i
                    class="fa fa-hand-o-right "></i> <?= __("Hire Interns, Grads, and free Capstone students."); ?></h2>
            <ul>
                <li><b><?= __("Industry and Government: "); ?></b><?= __("Develop open source features in your products, tools and
                    dependencies. Promote your company in our open source community"); ?>
                </li>
                <li><b><?= __("University Professors: "); ?></b><?= __("Lighten your work load of posting & finding projects and monitoring student progress. Leverage our Teaching Assistants and
                    dev-ops infrastructure."); ?>
                </li>
            </ul>
            <div align="center">
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>"><?= __('Submit a project'); ?></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <hr>
            <h2 class="section-heading"><?= __("ML² Latest News"); ?></h2>
            <!--            todo this section should be contains in an element and automatically generated from an admin page. for this SPRINT we will manually maintain-->
            <table class="table">
                <thead>
                <tr>
                    <th style="min-width: 100px"<?= __("Date"); ?></th>
                    <th><?= __("Info"); ?></th>
                    <th><?= __("More..."); ?></th>
                </tr>
                </thead>
                <tbody>
                <tr class="info">
                    <td><?= __("October 23"); ?></td>
                    <td><?= __("There are 6 active projects with 10 intern missions, 2 Grad student missions, and 12 capstone missions"); ?></td>
                    <td><a class="btn btn-success"
                           href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __('Apply for a project mission'); ?></a></a>
                    </td>
                </tr>
                <tr class="info">
                    <td><?= __("October 28"); ?></td>
                    <td><?= __("Deadline to submit an intern project."); ?></td>
                    <td><a class="btn btn-success"
                           href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>"><?= __('Submit a project'); ?></a></a>
                    </td>
                </tr>
                <tr class="success">
                    <td><?= __("December 15"); ?></td>
                    <td><?= __("Logo Contest. Win a free T-shirt! Winner will be annnounced December 15"); ?></td>
                    <td><a class="btn btn-info"
                           href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contest']); ?>"><?= __('Logo contest'); ?></a>
                    </td>
                </tr>
                <tr class="danger">
                    <td><?= __("December 1"); ?></td>
                    <td><?= __("ML² Kick-off party at ETS. Register to get invited!"); ?></td>
                    <td><a class="btn btn-primary"
                           href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register") ?></a>
                    </td>
                </tr>
                <tr class="info">
                    <td><?= __("December 1"); ?></td>
                    <td><?= __("ETS substance article"); ?></td>
                    <td><a href="#">substance</a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <hr>
            <h2 class="section-heading"><?= __("ML² Meetups at ETS"); ?></h2>
            <!--            todo this section should be contains in an element and automatically generated from an admin page. for this SPRINT we will manually maintain-->
            <table class="table">
                <thead>
                <tr>
                    <th style="min-width: 100px"><?= __("Date"); ?></th>
                    <th><?= __("Meetup"); ?></th>
                    <th><?= __("Register"); ?></th>
                </tr>
                </thead>
                <tbody>
                <tr class="success">
                    <td><?= __("November 3"); ?></td>
                    <td><?= __("Linux-Meetup sont des rencontres informelles où plusieurs personnes discutent de ce qui les
                        passionnent et font un partage de leurs cheminements dans le monde des logiciels libres avec
                        Linux."); ?></td>
                    <td><a href="http://www.meetup.com/Linux-Montreal/"><?= __('Linux meetup'); ?></a></a></td>
                </tr>
                <tr class="info">
                    <td><?= __("November 11"); ?></td>
                    <td><?= __("Odoo Montréal. Hosted by: Savoir-faire Linux. (Odoo Gold Partner), and Maxime C. (Leader de
                        pratique Odoo chez Savoir-faire Linux)"); ?>
                    </td>
                    <td><a href="http://www.meetup.com/Odoo-Montreal/"><?= __('Odoo meetup'); ?></a></a></td>
                </tr>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>