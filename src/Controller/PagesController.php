<?php
/**
 * Pages controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use GithubApi;

/**
 * Pages controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class PagesController extends AppController
{
    /**
     * Filter preparation
     *
     * @param Event $event event
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'home', 'tv', 'statistics']);
    }
    
    /**
     * Display method
     * @return redirect
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    /**
     * Home method
     * @return redirect
     */
    public function home()
    {
        $this->loadModel("Users");
        $numberUsers = $this->Users->find('all')->count();
        $numberStudents = $this->Users->find('all')->where(['isStudent' => true])->count();

        $this->loadModel("Projects");
        $numberProjects = $this->Projects->find('all')->count();

        $this->loadModel("Missions");
        $numberMissions = $this->Missions->find('all')->count();

        $this->set(compact('numberUsers', 'numberProjects', 'numberMissions', 'numberStudents'));
    }

    /**
     * TV Method
     * @param null $id tv page
     * @return redirect
     */
    public function tv($id = null)
    {
        $this->viewBuilder()->layout(false);
        // @codingStandardsIgnoreStart
        switch ($id) {
            case 1:
                $this->render('tv1');
                break;
            case 2:
                $this->render('tv1');
                break;
            case 3:
                $this->render('tv1');
                break;
            case 4:
                $this->render('tv1');
                break;
            case 5:
                $this->render('tv1');
                break;
            default:
                $this->render('tv1');
                break;
        }
        // @codingStandardsIgnoreEnd
    }

    
	/**
     * Statistics method
     * @return redirect
     */
    public function statistics()
    {
        $this->loadModel("Statistics");
        $statistics = $this->Statistics->find('all')->toArray();
		
		$this->loadModel("Users");
        $users = $this->Users->find('all')->toArray();
		
		$this->loadModel("Projects");
        $projects = $this->Projects->find('all')->toArray();
		
		$this->loadModel("Organizations");
        $organizations = $this->Organizations->find('all')->toArray();
		
		$this->loadModel("Missions");
        $missions = $this->Missions->find('all')->toArray();
	
		$issues = 0;
		$prs = 0;
		$commits = 0;
		
		$contributions = [];
		
		if($statistics) {
			foreach($statistics as $statistic) {
				$contributions[] = [
					$statistic->getContributionDate(),
					$statistic->getContribution()
				];
				
				$issues += $statistic->getIssues();
				$prs += $statistic->getPullRequests();
				$commits += $statistic->getCommits();
			}
		}
		
		
		$female = 0;
		$male = 0;
		$otherGender = 0;
		
		$ets =0;
		$sher = 0;
		$con =0;
		$udm = 0;
		$uqam = 0;
		$poly = 0;
		$mc = 0;
		$otherUni =0;
		
		$mentors = 0;
		$students = 0;
		
		foreach($users as $user) {
			
			$user = $this->Users->get(
				$user->getId(),
				[
					'contain' => ['Universities']
				]
			);
			
			if ($user->getGender() === null) {
				$otherGender++;
			} elseif ($user->getGender()) {
				$male++;
			} else {
				$female++;
			}
			
			if($user->getUniversity()) {
				switch($user->getUniversity()->getName()){
					case "École de Technologie Supérieure" : 
						$ets++;
						break;
					case "Université du Québec à Montréal" : 
						$uqam++;
						break;
					case "McGill" : 
						$mc++;
						break;
					case "Concordia" : 
						$con++;
						break;
					case "Université de Montréal" : 
						$udm++;
						break;
					case "Université de Sherbrooke" : 
						$sher++;
						break;
					case "Polytechnique de Montréal" : 
						$poly++;
						break;
					default :
						$otherUni++;
						break;
				}
			} else {
				$otherUni++;
			}
			
			
			if($user->isAvailableMentoring()){
				$mentors++;
			}
			
			if($user->isStudent()){
				$students++;
			}
		}
		
		$genders = [
			['Male', $male],
			['Female', $female],
			['Not specified', $otherGender]
		];
		
		$universities = [
			['École de Technologie Supérieure', $ets],
			['Université du Québec à Montréal', $uqam],
			['McGill', $mc],
			['Concordia', $con],
			['Université de Montréal', $udm],
			['Université de Sherbrooke', $sher],
			['Polytechnique de Montréal', $poly],
			['Not specified', $otherUni]
		];
		
		$statsRepo = [
			'issues' => $issues,
			'pullRequests' => $prs,
			'commits' => $commits
		];
		
		$statsUsers = [
			'genders' => $genders,
			'universities' => $universities,
			'mentors' => $mentors,
			'students' => $students,
			'count' => count($users)
		];
		
		$statsWeb = [
			'organizations' => count($organizations),
			'projects' => count($projects),
			'missions' => count($missions)
			
		];
		
		$stats = [
			'repository' => $statsRepo,
			'users' => $statsUsers,
			'website' => $statsWeb
		];
		
        $this->set(compact('contributions', 'stats'));
    }
}
