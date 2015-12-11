-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 16 Octobre 2015 à 16:33
-- Version du serveur :  5.5.44-0+deb8u1
-- Version de PHP :  5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mll_site`
--

--
-- Contenu de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'edit_organizations'),
(2, 'delete_organizations'),
(3, 'submit_organization'),
(4, 'add_organization'),
(5, 'edit_organization'),
(6, 'delete_organization'),
(7, 'edit_projects'),
(8, 'delete_projects'),
(9, 'submit_project'),
(10, 'add_project'),
(11, 'edit_project'),
(12, 'delete_project'),
(13, 'edit_missions'),
(14, 'delete_missions'),
(15, 'add_mission'),
(16, 'edit_mission'),
(17, 'delete_mission'),
(18, 'submit_mission'),
(19, 'edit_applications'),
(20, 'delete_applications'),
(21, 'add_application'),
(22, 'edit_application'),
(23, 'delete_application'),
(24, 'edit_users'),
(25, 'delete_users'),
(26, 'edit_user'),
(27, 'delete_user'),
(28, 'list_users'),
(29, 'view_users'),
(30, 'view_user'),
(31, 'list_projects'),
(32, 'list_projects_all'),
(33, 'list_organizations'),
(34, 'list_organizations_all'),
(35, 'apply_mission'),
(36, 'view_mission'),
(37, 'view_missions'),
(38, 'list_meetups'),
(39, 'add_meetups'),
(40, 'edit_meetups'),
(41, 'delete_meetups'),
(42, 'list_news'),
(43, 'add_news'),
(44, 'edit_news'),
(45, 'delete_news');
--
-- Contenu de la table `permissions_type_users`
--

INSERT INTO `permissions_type_users` (`id`, `type_user_id`, `permission_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 1, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 3, 10),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 3, 16),
(17, 3, 17),
(18, 3, 18),
(19, 3, 19),
(20, 3, 20),
(21, 3, 21),
(22, 3, 22),
(23, 3, 23),
(24, 1, 18),
(25, 1, 21),
(26, 1, 22),
(27, 1, 23),
(28, 4, 11),
(29, 4, 12),
(30, 4, 15),
(31, 4, 16),
(32, 4, 17),
(33, 3, 24),
(34, 3, 25),
(35, 3, 26),
(36, 3, 27),
(37, 3, 28),
(38, 3, 29),
(39, 3, 30),
(40, 1, 26),
(41, 1, 27),
(42, 6, 28),
(43, 1, 30),
(44, 1, 9),
(45, 3, 31),
(46, 3, 32),
(47, 3, 33),
(48, 3, 34),
(49, 5, 5),
(50, 1, 35),
(51, 3, 38),
(52, 3, 39),
(53, 3, 40),
(54, 3, 41),
(55, 3, 42),
(56, 3, 43),
(57, 3, 44),
(58, 3, 45);

--
-- Contenu de la table `type_users`
--

INSERT INTO `type_users` (`id`, `name`) VALUES
(1, 'User'),
(3, 'Administrator'),
(4, 'Dyn_mentor'),
(5, 'Dyn_OrganizationOwner'),
(6, 'Executive'),
(7, 'Dyn_OrganizationMember');

--
-- Contenu de la table `universities`
--

INSERT INTO `universities` (`id`, `name`, `website`) VALUES
(1, 'École de Technologie Supérieure', '');

INSERT INTO `mll_site`.`mission_levels` (`id`, `name`) VALUES (NULL, '1'), (NULL, '2'), (NULL, '3'), (NULL, '4'), (NULL, 'Master');
INSERT INTO `mll_site`.`type_missions` (`id`, `name`) VALUES (NULL, 'Intern'), (NULL, 'Volunteer'), (NULL, 'Master'), (NULL, 'Capstone'), (NULL, 'Professor');
INSERT INTO `mll_site`.`hash_types` (`id`, `name`) VALUES (NULL, 'resetPassword');

--
-- Contenu de la table `svns`
--

INSERT INTO `svns` (`id`, `name`, `link`) VALUES
(1, 'GitHub', 'https://github.com/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
