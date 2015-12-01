<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * MeetupsCell cell
 */
class MeetupsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * listMeetups method.
     *
     * @return void
     */
    public function listMeetups()
    {
        $this->loadModel('Meetups');
        $meetups = $this->Meetups->find('all');

        $this->set(compact('meetups'));
    }
}
