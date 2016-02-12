<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'firstName' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastName' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'biography' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'portfolio' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone' => ['type' => 'string', 'length' => 25, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'gender' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'username' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'universitie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'isAvailableMentoring' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'isStudent' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'mailingList' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'skills' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'twitter' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'facebook' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'googlePlus' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'linkedIn' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'emailPublic' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'interest' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'isProfessor' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'firstName' => 'Simon',
            'lastName' => 'Begin',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => 1,
            'password' => 'motdepasse',
            'username' => 'tropHot',
            'universitie_id' => 1,
            'isAvailableMentoring' => 0,
            'isStudent' => 1,
            'mailingList' => 0,
            'skills' => 'PHP, CakePHP',
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 2,
            'firstName' => 'Simon',
            'lastName' => 'Begin',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => 0,
            'password' => '$2y$10$fTukyN1X3G7nwp3Ea72p/eAuTdqjD6Xhft4tW8d/3pR46UBkCVKzO',
            'username' => 'admin',
            'universitie_id' => 1,
            'isAvailableMentoring' => 0,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 3,
            'firstName' => 'Simon',
            'lastName' => 'Professeur',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin2',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 0,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 1
        ],
        [
            'id' => 4,
            'firstName' => 'Simon',
            'lastName' => 'Mentor',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 0,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 5,
            'firstName' => 'Simon',
            'lastName' => 'Mentor',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 0,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 6,
            'firstName' => '',
            'lastName' => 'Mentor',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 0,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 7,
            'firstName' => 'User',
            'lastName' => 'Student',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 8,
            'firstName' => 'User',
            'lastName' => 'Student',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 9,
            'firstName' => 'User',
            'lastName' => 'Student',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 10,
            'firstName' => 'User',
            'lastName' => 'Student',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 11,
            'firstName' => 'User',
            'lastName' => 'Student',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ],
        [
            'id' => 12,
            'firstName' => 'User',
            'lastName' => 'Student',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin3',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 1,
            'mailingList' => 0,
            'twitter' => 'http://montwitter.com',
            'facebook' => 'http://monfacebook.com',
            'googlePlus' => 'http://mongoogleplus.com',
            'linkedIn' => 'http://monlinkedin.com',
            'emailPublic' => 'email@gmail.com',
            'interest' => 'Un petit interet.',
            'isProfessor' => 0
        ]
    ];
}
