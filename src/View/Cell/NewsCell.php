<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * NewsCell cell
 */
class NewsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * listNews method.
     *
     * @return void
     */
    public function listNews()
    {
        $this->loadModel('News');
        $news = $this->News->find('all');

        $this->set(compact('news'));
    }
}
