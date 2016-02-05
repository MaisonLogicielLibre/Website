<div class="temp-text">
    <h1> <?= __('Submit a project to  Maison du Logiciel Libre!') ?> </h1>

    <h3> <?= __('Benefits :') ?> </h3>

    <ul>
        <li><?php echo __('Gain access to potential new hires in our logicel libre developer community  spanning  7 Quebec Universities including : École de Technologie Supérieure (ETS), UQÀM, McGill, Polytechnique, Université de Montréal, Concordia and Université de Sherbrooke') ?> </li>
        <li><?php echo __('Develop new open source features faster and cheaper in your products and dependencies') ?> </li>
        <li><?php echo __('Promote your company and create networks across the software engineering and computer science departments of 7 universities') ?> </li>
        <li><?php echo __('Create Goodwill in the University and open source communities') ?> </li>
    </ul>
    <br>

    <h2> <?= __('How does a company submit a project?') ?> </h2>

    <ol>
        <li>  <?= __('Describe your organization') ?> </li>
        <li>  <?= __('Main contact email & phone for student applications') ?> </li>
        <li>  <?= __('Describe your open source project(s)') ?> </li>
        <ul>
            <li>  <?= __("Introduce contributors to your project's needs and provide inspiration to would-be student applicants.") ?> </li>
            <li>  <?= __('Each project must have a mentor.') ?> </li>
        </ul>
        <li>  <?= __('What Free Software / open source license(s) does your project use?') ?> </li>
        <li>  <?= __('What type of student(s) are you looking for?') ?> </li>
        <ul>
            <li>  <?= __('Full-time 4-month intern student') ?> </li>
            <li>  <?= __('Capstone student (150 hours per semester)') ?> </li>
            <li>  <?= __('Graduate student (1 to 2 year projects for Masters and Doctorate students)') ?> </li>
        </ul>
        <li>  <?= __('What are the student requirements to work on the project?') ?> </li>
        <ul>
            <li>  <?= __(' e.g. "must know Python" or "easier project good for a student with more limited experience with C++."') ?> </li>
        </ul>
        <li>  <?= __("What steps will you take to encourage students to interact with your project's community before, during and after the program?") ?> </li>
    </ol>
    <br>
    <p class="lead"> <?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']) ?> </P>
</div>
