<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SidebarUser cell
 */
class SidebarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * user method.
     * @param int $userId userId
     *
     * @return void
     */
    public function user($userId)
    {
        $this->loadModel('Users');
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();

        $isOwner = false;
        if ($user){
            $isOwner = $user->id === $userId ? true : false;
        }

        $object = $this->Users->findById($userId)->first();

        $this->set(compact('user', 'isOwner', 'object'));
    }

    /**
     * projectAction method.
     *
     * @return void
     */
    public function projectAction()
    {
        $this->loadModel('Users');
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();

        $this->set(compact('user'));
    }

    /**
     * project method.
     * @param int $projectId projectId
     *
     * @return void
     */
    public function project($projectId)
    {
        $this->loadModel('Users');
        $this->loadModel('Projects');
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();

        $isMentor = false;
        if ($user){
            $isMentor = $user->isMentorOf($projectId);
        }

        $object = $this->Projects->findById($projectId)->first();

        $this->set(compact('user', 'isMentor', 'object'));
    }

    /**
     * organizationAction method.
     *
     * @return void
     */
    public function organizationAction()
    {
        $this->loadModel('Users');
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();

        $this->set(compact('user'));
    }

    /**
     * organization method.
     * @param int $organizationId organizationId
     *
     * @return void
     */
    public function organization($organizationId)
    {
        $this->loadModel('Users');
        $this->loadModel('Organizations');
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();

        $object = $this->Organizations->findById($organizationId)->first();

        $this->set(compact('user', 'object'));
    }
}
