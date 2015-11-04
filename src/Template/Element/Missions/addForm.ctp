<?php
$this->start('form');
echo $this->Form->input('name', ['required' => true, 'label' => __('Position title')]);
echo $this->Form->input('description',
    ['type' => 'textarea',
        'required' => true,
        'label' => __('Describe your mission'),
        'data-provide' => 'markdown',
        'data-iconlibrary' => 'fa',
        'data-hidden-buttons' => 'cmdImage',
        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : '')
    ]
);
echo $this->Form->input('competence',
    [
        'type' => 'textarea',
        'required' => true,
        'label' => __('What are the student requirements to work on the project?'),
        'placeholder' => __(' e.g. "must know Python" or "easier project good for a student with more limited experience with C++."'),
        'data-provide' => 'markdown',
        'data-iconlibrary' => 'fa',
        'data-hidden-buttons' => 'cmdImage',
        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : '')
    ]
);
$typeOptions = [];
foreach ($typeMissions as $type) {
    $typeOptions[$type->id] = $type->getName();
}
echo $this->Form->input('type_missions._ids', ['required' => true, 'label' => ['class' => 'control-label', 'text' => __('What type of student(s) are you looking for?')], 'options' => $typeOptions, 'multiple' => 'checkbox']);
$sessionOptions =
    [
        0 => __('Not specified'),
        1 => __('Winter'),
        2 => __('Summer'),
        3 => __('Fall')
    ];
echo $this->Form->input('session', ['required' => true, 'label' => __('Term'), 'options' => $sessionOptions, 'type' => 'select']);
$lengthOptions =
    [
        0 => __('Not specified'),
        1 => __('1 term'),
        2 => __('2 terms'),
        3 => __('3 terms')
    ];
echo $this->Form->input('length', ['required' => true, 'label' => __('Length'), 'options' => $lengthOptions, 'type' => 'select']);
$levelsOptions = [];
foreach ($missionLevels as $level) {
    $levelsOptions[$level->id] = $level->getName();
}
echo $this->Form->input('mission_levels._ids', ['required' => true, 'label' => ['class' => 'control-label', 'text' => __('School year')], 'options' => $levelsOptions, 'multiple' => 'checkbox']);
echo $this->Form->input('internNbr', ['type' => 'number', 'required' => true, 'label' => __('Places available'), 'min' => 1, 'max' => 100]);

$this->end();
