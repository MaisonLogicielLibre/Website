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
     * Check if the user has the rights to see the page
     *
     * @param array $user user's informations
     *
     * @return bool
     */
    public function isAuthorized($user)
    {
        $user = $this->Users->findById($user['id'])->first();

        if ($user && ($this->request->action == "administration" || $this->request->action == "galleriesManager" || $this->request->action == "deleteImg")
            && $user->hasRoleName(['Administrator'])
        ) {
            return true;
        }
    }

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
        $this->loadModel("Users");
        $this->Auth->allow(['display', 'home', 'tv', 'statistics']);
    }

    /**
     * Display method
     *
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
     *
     * @return void
     */
    public function home()
    {
        //$this->viewBuilder()->layout(false);
        $this->loadModel("Users");
        $numberUsers = $this->Users->find('all')->count();
        $numberStudents = $this->Users->find('all')->where(['isStudent' => true])->count();

        $this->loadModel("Projects");
        $projects = $this->Projects->find(
            'all',
            [
                'contain' => [
                    'Missions'
                ],
                'conditions' => [
                    'AND' => [
                        'Projects.accepted' => true,
                        'Projects.archived' => false
                    ]
                ]
            ]
        );
        $numberProjects = count($projects->toArray());

        $this->loadModel("Missions");
        $missions = $this->Missions->find(
            'all',
            [
                'contain' => [
                    'Projects' => [
                    ]
                ],
                'conditions' => [
                    'AND' => [
                        [
                            'Projects.archived' => 0,
                            'Projects.accepted' => 1
                        ],
                        [
                            'Missions.archived' => 0
                        ]
                    ]
                ],
            ]
        );
        $numberMissions = count($missions->toArray());

        $fichiers = $this->_getImgCarousel();

        $this->set(compact('numberUsers', 'numberProjects', 'numberMissions', 'numberStudents', 'fichiers'));
    }

    /**
     * TV Method
     *
     * @param null $id tv page
     *
     * @return redirect
     */
    public function tv($id = null)
    {
        $this->loadModel("Statistics");
        $statistics = $this->Statistics->find('all')->toArray();

        $this->loadModel("Users");
        $users = $this->Users->find('all')->toArray();

        $this->loadModel("Projects");

        $this->loadModel("Organizations");
        $organizations = $this->Organizations->find('all')->toArray();

        $this->loadModel("Missions");

        $this->loadModel("Universities");
        $universities = $this->Universities->find('all')->toArray();

        $issues = 0;
        $prs = 0;
        $commits = 0;

        $projects = $this->Projects->find(
            'all',
            [
                'contain' => [
                    'Missions'
                ],
                'conditions' => [
                    'AND' => [
                        'Projects.accepted' => true,
                        'Projects.archived' => false
                    ]
                ]
            ]
        );
        $numberProjects = count($projects->toArray());

        $missions = $this->Missions->find(
            'all',
            [
                'contain' => [
                    'Projects' => [
                    ]
                ],
                'conditions' => [
                    'AND' => [
                        'AND' => [
                            'Projects.archived' => 0,
                            'Projects.accepted' => 1
                        ],
                        [
                            'Missions.archived' => 0
                        ]
                    ]
                ],
            ]
        );
        $numberMissions = count($missions->toArray());


        $contributions = [];

        if ($statistics) {
            foreach ($statistics as $statistic) {
                $contributions[] = [
                    $statistic->getContributionDate(),
                    $statistic->getContribution()
                ];

                $issues += $statistic->getIssues();
                $prs += $statistic->getPullRequests();
                $commits += $statistic->getCommits();
            }
        }

        $countUni = [];

        $loopCount = count($universities) + 1;
        for ($i = 0; $i < $loopCount; $i++) {
            $countUni[] = 0;
        }

        $mentors = 0;
        $students = 0;

        foreach ($users as $user) {
            $user = $this->Users->get(
                $user->getId(),
                [
                    'contain' => ['Universities']
                ]
            );

            if ($user->getUniversity()) {
                // @codingStandardsIgnoreStart
                switch ($user->getUniversity()->getId()) {
                    case 1:
                        $countUni[0] = $countUni[0] + 1;
                        break;
                    case 2:
                        $countUni[1] = $countUni[1] + 1;
                        break;
                    case 3:
                        $countUni[2] = $countUni[2] + 1;
                        break;
                    case 4:
                        $countUni[3] = $countUni[3] + 1;
                        break;
                    case 5:
                        $countUni[4] = $countUni[4] + 1;
                        break;
                    case 6:
                        $countUni[5] = $countUni[5] + 1;
                        break;
                    case 7:
                        $countUni[6] = $countUni[6] + 1;
                        break;
                    default:
                        break;
                    // @codingStandardsIgnoreEnd
                }
            }

            if ($user->isAvailableMentoring()) {
                $mentors++;
            }

            if ($user->isStudent()) {
                $students++;
            }
        }

        $statsUni = [];

        $loopCount = count($universities);
        for ($i = 0; $i < $loopCount; $i++) {
            $statsUni[] = [
                $this->Universities->findById($i + 1)->first()->getName(),
                $countUni[$i]
            ];
        }

        $statsUni[] = [
            __('Not specified'),
            $countUni[count($universities)]
        ];

        $statsRepo = [
            'issues' => $issues,
            'pullRequests' => $prs,
            'commits' => $commits
        ];

        $statsUsers = [
            'universities' => $statsUni,
            'mentors' => $mentors,
            'students' => $students,
            'count' => count($users)
        ];

        $statsWeb = [
            'organizations' => count($organizations),
            'projects' => $numberProjects,
            'missions' => $numberMissions

        ];

        $stats = [
            'repository' => $statsRepo,
            'users' => $statsUsers,
            'website' => $statsWeb
        ];

        $this->set(compact('contributions', 'stats'));

        $this->viewBuilder()->layout(false);
        // @codingStandardsIgnoreStart
        switch ($id) {
            case 1:
                $this->render('tv1');
                break;
            case 2:
                $this->render('tv2');
                break;
            case 3:
                $this->render('tv3');
                break;
            case 4:
                $this->render('tv4');
                break;
            case 5:
                $this->render('tv5');
                break;
            default:
                $this->render('tv1');
                break;
        }
        // @codingStandardsIgnoreEnd
    }


    /**
     * Statistics method
     *
     * @return void
     */
    public function statistics()
    {
        $this->loadModel("Statistics");
        $statistics = $this->Statistics->find('all')->toArray();

        $this->loadModel("Users");
        $users = $this->Users->find('all')->toArray();

        $this->loadModel("Projects");

        $this->loadModel("Organizations");
        $organizations = $this->Organizations->find('all')->toArray();

        $this->loadModel("Missions");

        $this->loadModel("Universities");
        $universities = $this->Universities->find('all')->toArray();

        $issues = 0;
        $prs = 0;
        $commits = 0;

        $projects = $this->Projects->find(
            'all',
            [
                'contain' => [
                    'Missions'
                ],
                'conditions' => [
                    'AND' => [
                        'Projects.accepted' => true,
                        'Projects.archived' => false
                    ]
                ]
            ]
        );
        $numberProjects = count($projects->toArray());

        $missions = $this->Missions->find(
            'all',
            [
                'contain' => [
                    'Projects' => [
                    ]
                ],
                'conditions' => [
                    'AND' => [
                        'AND' => [
                            'Projects.archived' => 0,
                            'Projects.accepted' => 1
                        ],
                        [
                            'Missions.archived' => 0
                        ]
                    ]
                ],
            ]
        );
        $numberMissions = count($missions->toArray());


        $contributions = [];

        if ($statistics) {
            foreach ($statistics as $statistic) {
                $contributions[] = [
                $statistic->getContributionDate(),
                $statistic->getContribution()
                ];

                $issues += $statistic->getIssues();
                $prs += $statistic->getPullRequests();
                $commits += $statistic->getCommits();
            }
        }

        $countUni = [];

        $loopCount = count($universities) + 1;
        for ($i = 0; $i < $loopCount; $i++) {
            $countUni[] = 0;
        }

        $mentors = 0;
        $students = 0;

        foreach ($users as $user) {
            $user = $this->Users->get(
                $user->getId(),
                [
                'contain' => ['Universities']
                ]
            );

            if ($user->getUniversity()) {
                // @codingStandardsIgnoreStart
                switch ($user->getUniversity()->getId()) {
                    case 1:
                        $countUni[0] = $countUni[0] + 1;
                        break;
                    case 2:
                        $countUni[1] = $countUni[1] + 1;
                        break;
                    case 3:
                        $countUni[2] = $countUni[2] + 1;
                        break;
                    case 4:
                        $countUni[3] = $countUni[3] + 1;
                        break;
                    case 5:
                        $countUni[4] = $countUni[4] + 1;
                        break;
                    case 6:
                        $countUni[5] = $countUni[5] + 1;
                        break;
                    case 7:
                        $countUni[6] = $countUni[6] + 1;
                        break;
                    default:
                        $countUni[7] = $countUni[7] + 1;
                        break;
                // @codingStandardsIgnoreEnd
                }
            } else {
                $countUni[7] = $countUni[7] + 1;
            }


            if ($user->isAvailableMentoring()) {
                $mentors++;
            }

            if ($user->isStudent()) {
                $students++;
            }
        }

        $statsUni = [];

        $loopCount = count($universities);
        for ($i = 0; $i < $loopCount; $i++) {
            $statsUni[] = [
                $this->Universities->findById($i + 1)->first()->getName(),
                $countUni[$i]
            ];
        }

        $statsUni[] = [
            __('Not specified'),
            $countUni[count($universities)]
        ];

        $statsRepo = [
            'issues' => $issues,
            'pullRequests' => $prs,
            'commits' => $commits
        ];

        $statsUsers = [
            'universities' => $statsUni,
            'mentors' => $mentors,
            'students' => $students,
            'count' => count($users)
        ];

        $statsWeb = [
            'organizations' => count($organizations),
            'projects' => $numberProjects,
            'missions' => $numberMissions

        ];

        $stats = [
            'repository' => $statsRepo,
            'users' => $statsUsers,
            'website' => $statsWeb
        ];

        $this->set(compact('contributions', 'stats'));
    }

    /**
     * Administration method
     *
     * @param null $img administration page
     *
     * @return void
     */
    public function administration($img = null)
    {
        $this->loadModel("Projects");
        $projects = $this->Projects->find('all', ['conditions' => ['accepted' => 0, 'archived' => 0]])->toArray();

        $this->loadModel("Organizations");
        $organizations = $this->Organizations->find('all', ['conditions' => ['isValidated' => 0, 'isRejected' => 0]])->toArray();

        //gestion des images du carousel
        $path = WWW_ROOT . "img/carousel/";
        $request = $this->request;

        if (is_file($path . $img)) {
            unlink($path . $img);
        }
        if ($request->is('post') && !empty($request->data)) {
            $image = $this->request->data['avatar_file'];
            $dim = null;

            if (!empty($image['tmp_name']) && $image['type'] == 'image/png') {
                $dim = getimagesize($image['tmp_name']);

                if ($dim[0] >= 1920 && $dim[1] >= 1080) {
                    move_uploaded_file($image['tmp_name'], $path . $image['name']);
                } else {
                    $this->Flash->error('Erreur: fichier trop petit');
                }
            } else {
                $this->Flash->error('Erreur: vérifier les conditions de tranfert de fichier');
            }
        }
        //fin gestion du carousel
        $fichiers = $this->_getImgCarousel();
        $this->set(compact('projects', 'organizations', 'fichiers'));
    }

    /**
     * GetImgCarousel method
     *
     * @return array
     */
    private function _getImgCarousel()
    {
        $fichiers = [];

        if (false !== ($dossier = opendir(WWW_ROOT . "img/carousel/"))) {
            while (false !== ($fichier = readdir($dossier))) {
                if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
                    array_push($fichiers, $fichier);
                }
            }
        }
        return $fichiers;
    }
}

