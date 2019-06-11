-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 juin 2019 à 11:12
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chimie`
--

-- --------------------------------------------------------

--
-- Structure de la table `conseil_prudence`
--

DROP TABLE IF EXISTS `conseil_prudence`;
CREATE TABLE IF NOT EXISTS `conseil_prudence` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(256) NOT NULL,
  `phrase` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=413 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conseil_prudence`
--

INSERT INTO `conseil_prudence` (`ID`, `code`, `phrase`) VALUES
(1, 'P101', 'En cas de consultation d’un médecin, garder à disposition le récipient ou l’étiquette.'),
(2, 'P102', 'Tenir hors de portée des enfants.'),
(3, 'P103', 'Lire l’étiquette avant utilisation.'),
(4, 'P201', 'Se procurer les instructions spéciales avant utilisation.'),
(5, 'P202', 'Ne pas manipuler avant d’avoir lu et compris toutes les précautions de sécurité.'),
(6, 'P210', 'Tenir à l’écart de la chaleur, des surfaces chaudes, des étincelles, des flammes nues et de toute autre source d’inflammation. Ne pas fumer.'),
(7, 'P211', 'Ne pas vaporiser sur une flamme nue ou sur toute autre source d’ignition.'),
(8, 'P220', 'Tenir/stocker à l’écart des vêtements/…/matières combustibles'),
(9, 'P221', 'Prendre toutes précautions pour éviter de mélanger avec des matières combustibles…'),
(10, 'P222', 'Ne pas laisser au contact de l’air.'),
(11, 'P223', 'Éviter tout contact avec l’eau.'),
(12, 'P230', 'Maintenir humidifié avec…'),
(13, 'P231', 'Manipuler sous gaz inerte.'),
(14, 'P232', 'Protéger de l’humidité.'),
(15, 'P233', 'Maintenir le récipient fermé de manière étanche.'),
(16, 'P234', 'Conserver uniquement dans le récipient d’origine.'),
(17, 'P235', 'Tenir au frais.'),
(18, 'P240', 'Mise à la terre/liaison équipotentielle du récipient et du matériel de réception.'),
(19, 'P241', 'Utiliser du matériel électrique/de ventilation/ d’éclairage/…/ antidéflagrant.'),
(20, 'P242', 'Ne pas utiliser d’outils produisant des étincelles.'),
(21, 'P243', 'Prendre des mesures de précaution contre les décharges électrostatiques.'),
(22, 'P244', 'Ni huile, ni graisse sur les robinets et raccords.'),
(23, 'P250', 'Éviter les abrasions/les chocs/…/les frottements.'),
(24, 'P251', 'Ne pas perforer, ni brûler, même après usage.'),
(25, 'P260', 'Ne pas respirer les poussières/fumées/gaz/brouillards/vapeurs/ aérosols.'),
(26, 'P261', 'Éviter de respirer les poussières/fumées/gaz/ brouillards/vapeurs/ aérosols.'),
(27, 'P262', 'Éviter tout contact avec les yeux, la peau ou les vêtements.'),
(28, 'P263', 'Éviter tout contact avec la substance au cours de la grossesse/pendant l’allaitement.'),
(29, 'P264', 'Se laver … soigneusement après manipulation.'),
(30, 'P270', 'Ne pas manger, boire ou fumer en manipulant ce produit.'),
(31, 'P271', 'Utiliser seulement en plein air ou dans un endroit bien ventilé.'),
(32, 'P272', 'Les vêtements de travail contaminés ne devraient pas sortir du lieu de travail.'),
(33, 'P273', 'Éviter le rejet dans l’environnement.'),
(34, 'P280', 'Porter des gants de protection/des vêtements de protection/un équipement de protection des yeux/ du visage.'),
(35, 'P282', 'Porter des gants isolants contre le froid/un équipement de protection du visage/ des yeux.'),
(36, 'P283', 'Porter des vêtements résistant au feu/aux flammes/ignifuges.'),
(37, 'P284', '[Lorsque la ventilation du local est insuffisante] porter un équipement de protection respiratoire.'),
(38, 'P231 + P232', 'Manipuler sous gaz inerte. Protéger de l’humidité.'),
(39, 'P235 + P410', 'Tenir au frais. Protéger du rayonnement solaire.'),
(40, 'P301', 'EN CAS D’INGESTION:'),
(41, 'P302', 'EN CAS DE CONTACT AVEC LA PEAU:'),
(42, 'P303', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux):'),
(43, 'P304', 'EN CAS D’INHALATION:'),
(44, 'P305', 'EN CAS DE CONTACT AVEC LES YEUX:'),
(45, 'P306', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS:'),
(46, 'P308', 'EN CAS d’exposition prouvée ou suspectée:'),
(47, 'P310', 'Appeler immédiatement un CENTRE ANTIPOISON/un médecin/…'),
(48, 'P311', 'Appeler un CENTRE ANTIPOISON/un médecin/…'),
(49, 'P312', 'Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(50, 'P313', 'Consulter un médecin.'),
(51, 'P314', 'Consulter un médecin en cas de malaise.'),
(52, 'P315', 'Consulter immédiatement un médecin.'),
(53, 'P320', 'Un traitement spécifique est urgent (voir … sur cette étiquette).'),
(54, 'P321', 'Traitement spécifique (voir … sur cette étiquette).'),
(55, 'P330', 'Rincer la bouche.'),
(56, 'P331', 'NE PAS faire vomir.'),
(57, 'P332', 'En cas d’irritation cutanée:'),
(58, 'P333', 'En cas d’irritation ou d’éruption cutanée:'),
(59, 'P334', 'Rincer à l’eau fraîche/poser une compresse humide.'),
(60, 'P335', 'Enlever avec précaution les particules déposées sur la peau.'),
(61, 'P336', 'Dégeler les parties gelées avec de l’eau tiède. Ne pas frotter les zones touchées.'),
(62, 'P337', 'Si l’irritation oculaire persiste:'),
(63, 'P338', 'Enlever les lentilles de contact si la victime en porte et si elles peuvent être facilement enlevées. Continuer à rincer.'),
(64, 'P340', 'Transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(65, 'P342', 'En cas de symptômes respiratoires:'),
(66, 'P351', 'Rincer avec précaution à l’eau pendant plusieurs minutes.'),
(67, 'P352', 'Laver abondamment à l’eau/…'),
(68, 'P353', 'Rincer la peau à l’eau/se doucher.'),
(69, 'P360', 'Rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(70, 'P361', 'Enlever immédiatement tous les vêtements contaminés.'),
(71, 'P362', 'Enlever les vêtements contaminés.'),
(72, 'P363', 'Laver les vêtements contaminés avant réutilisation.'),
(73, 'P364', 'Et les laver avant réutilisation.'),
(74, 'P370', 'En cas d’incendie:'),
(75, 'P371', 'En cas d’incendie important et s’il s’agit de grandes quantités:'),
(76, 'P372', 'Risque d’explosion en cas d’incendie.'),
(77, 'P373', 'NE PAS combattre l’incendie lorsque le feu atteint les explosifs.'),
(78, 'P374', 'Combattre l’incendie à distance en prenant les précautions normales.'),
(79, 'P375', 'Combattre l’incendie à distance à cause du risque d’explosion.'),
(80, 'P376', 'Obturer la fuite si cela peut se faire sans danger.'),
(81, 'P377', 'Fuite de gaz enflammé: Ne pas éteindre si la fuite ne peut pas être arrêtée sans danger.'),
(82, 'P378', 'Utiliser… pour l’extinction.'),
(83, 'P380', 'Évacuer la zone.'),
(84, 'P381', 'Éliminer toutes les sources d’ignition si cela est faisable sans danger.'),
(85, 'P390', 'Absorber toute substance répandue pour éviter qu’elle attaque les matériaux environnants.'),
(86, 'P391', 'Recueillir le produit répandu.'),
(87, 'P301 + P310', 'EN CAS D’INGESTION: Appeler immédiatement un CENTRE ANTIPOISON/un médecin/ …'),
(88, 'P301 + P312', 'EN CAS D’INGESTION: Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(89, 'P301 + P330 + P331', 'EN CAS D’INGESTION: rincer la bouche. NE PAS faire vomir.'),
(90, 'P302 + P334', 'EN CAS DE CONTACT AVEC LA PEAU: rincer à l’eau fraîche/poser une compresse humide.'),
(91, 'P302 + P352', 'EN CAS DE CONTACT AVEC LA PEAU: Laver abondamment à l’eau/… '),
(92, 'P303 + P361 + P353', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux): Enlever immédiatement tous les vêtements contaminés. Rincer la peau à l’eau/Se doucher.'),
(93, 'P304 + P340', 'EN CAS D’INHALATION: transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(94, 'P306 + P360', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS: rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(95, 'P101', 'En cas de consultation d’un médecin, garder à disposition le récipient ou l’étiquette.'),
(96, 'P102', 'Tenir hors de portée des enfants.'),
(97, 'P103', 'Lire l’étiquette avant utilisation.'),
(98, 'P201', 'Se procurer les instructions spéciales avant utilisation.'),
(99, 'P202', 'Ne pas manipuler avant d’avoir lu et compris toutes les précautions de sécurité.'),
(100, 'P210', 'Tenir à l’écart de la chaleur, des surfaces chaudes, des étincelles, des flammes nues et de toute autre source d’inflammation. Ne pas fumer.'),
(101, 'P211', 'Ne pas vaporiser sur une flamme nue ou sur toute autre source d’ignition.'),
(102, 'P220', 'Tenir/stocker à l’écart des vêtements/…/matières combustibles'),
(103, 'P221', 'Prendre toutes précautions pour éviter de mélanger avec des matières combustibles…'),
(104, 'P222', 'Ne pas laisser au contact de l’air.'),
(105, 'P223', 'Éviter tout contact avec l’eau.'),
(106, 'P230', 'Maintenir humidifié avec…'),
(107, 'P231', 'Manipuler sous gaz inerte.'),
(108, 'P232', 'Protéger de l’humidité.'),
(109, 'P233', 'Maintenir le récipient fermé de manière étanche.'),
(110, 'P234', 'Conserver uniquement dans le récipient d’origine.'),
(111, 'P235', 'Tenir au frais.'),
(112, 'P240', 'Mise à la terre/liaison équipotentielle du récipient et du matériel de réception.'),
(113, 'P241', 'Utiliser du matériel électrique/de ventilation/ d’éclairage/…/ antidéflagrant.'),
(114, 'P242', 'Ne pas utiliser d’outils produisant des étincelles.'),
(115, 'P243', 'Prendre des mesures de précaution contre les décharges électrostatiques.'),
(116, 'P244', 'Ni huile, ni graisse sur les robinets et raccords.'),
(117, 'P250', 'Éviter les abrasions/les chocs/…/les frottements.'),
(118, 'P251', 'Ne pas perforer, ni brûler, même après usage.'),
(119, 'P260', 'Ne pas respirer les poussières/fumées/gaz/brouillards/vapeurs/ aérosols.'),
(120, 'P261', 'Éviter de respirer les poussières/fumées/gaz/ brouillards/vapeurs/ aérosols.'),
(121, 'P262', 'Éviter tout contact avec les yeux, la peau ou les vêtements.'),
(122, 'P263', 'Éviter tout contact avec la substance au cours de la grossesse/pendant l’allaitement.'),
(123, 'P264', 'Se laver … soigneusement après manipulation.'),
(124, 'P270', 'Ne pas manger, boire ou fumer en manipulant ce produit.'),
(125, 'P271', 'Utiliser seulement en plein air ou dans un endroit bien ventilé.'),
(126, 'P272', 'Les vêtements de travail contaminés ne devraient pas sortir du lieu de travail.'),
(127, 'P273', 'Éviter le rejet dans l’environnement.'),
(128, 'P280', 'Porter des gants de protection/des vêtements de protection/un équipement de protection des yeux/ du visage.'),
(129, 'P282', 'Porter des gants isolants contre le froid/un équipement de protection du visage/ des yeux.'),
(130, 'P283', 'Porter des vêtements résistant au feu/aux flammes/ignifuges.'),
(131, 'P284', '[Lorsque la ventilation du local est insuffisante] porter un équipement de protection respiratoire.'),
(132, 'P231 + P232', 'Manipuler sous gaz inerte. Protéger de l’humidité.'),
(133, 'P235 + P410', 'Tenir au frais. Protéger du rayonnement solaire.'),
(134, 'P301', 'EN CAS D’INGESTION:'),
(135, 'P302', 'EN CAS DE CONTACT AVEC LA PEAU:'),
(136, 'P303', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux):'),
(137, 'P304', 'EN CAS D’INHALATION:'),
(138, 'P305', 'EN CAS DE CONTACT AVEC LES YEUX:'),
(139, 'P306', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS:'),
(140, 'P308', 'EN CAS d’exposition prouvée ou suspectée:'),
(141, 'P310', 'Appeler immédiatement un CENTRE ANTIPOISON/un médecin/…'),
(142, 'P311', 'Appeler un CENTRE ANTIPOISON/un médecin/…'),
(143, 'P312', 'Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(144, 'P313', 'Consulter un médecin.'),
(145, 'P314', 'Consulter un médecin en cas de malaise.'),
(146, 'P315', 'Consulter immédiatement un médecin.'),
(147, 'P320', 'Un traitement spécifique est urgent (voir … sur cette étiquette).'),
(148, 'P321', 'Traitement spécifique (voir … sur cette étiquette).'),
(149, 'P330', 'Rincer la bouche.'),
(150, 'P331', 'NE PAS faire vomir.'),
(151, 'P332', 'En cas d’irritation cutanée:'),
(152, 'P333', 'En cas d’irritation ou d’éruption cutanée:'),
(153, 'P334', 'Rincer à l’eau fraîche/poser une compresse humide.'),
(154, 'P335', 'Enlever avec précaution les particules déposées sur la peau.'),
(155, 'P336', 'Dégeler les parties gelées avec de l’eau tiède. Ne pas frotter les zones touchées.'),
(156, 'P337', 'Si l’irritation oculaire persiste:'),
(157, 'P338', 'Enlever les lentilles de contact si la victime en porte et si elles peuvent être facilement enlevées. Continuer à rincer.'),
(158, 'P340', 'Transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(159, 'P342', 'En cas de symptômes respiratoires:'),
(160, 'P351', 'Rincer avec précaution à l’eau pendant plusieurs minutes.'),
(161, 'P352', 'Laver abondamment à l’eau/…'),
(162, 'P353', 'Rincer la peau à l’eau/se doucher.'),
(163, 'P360', 'Rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(164, 'P361', 'Enlever immédiatement tous les vêtements contaminés.'),
(165, 'P362', 'Enlever les vêtements contaminés.'),
(166, 'P363', 'Laver les vêtements contaminés avant réutilisation.'),
(167, 'P364', 'Et les laver avant réutilisation.'),
(168, 'P370', 'En cas d’incendie:'),
(169, 'P371', 'En cas d’incendie important et s’il s’agit de grandes quantités:'),
(170, 'P372', 'Risque d’explosion en cas d’incendie.'),
(171, 'P373', 'NE PAS combattre l’incendie lorsque le feu atteint les explosifs.'),
(172, 'P374', 'Combattre l’incendie à distance en prenant les précautions normales.'),
(173, 'P375', 'Combattre l’incendie à distance à cause du risque d’explosion.'),
(174, 'P376', 'Obturer la fuite si cela peut se faire sans danger.'),
(175, 'P377', 'Fuite de gaz enflammé: Ne pas éteindre si la fuite ne peut pas être arrêtée sans danger.'),
(176, 'P378', 'Utiliser… pour l’extinction.'),
(177, 'P380', 'Évacuer la zone.'),
(178, 'P381', 'Éliminer toutes les sources d’ignition si cela est faisable sans danger.'),
(179, 'P390', 'Absorber toute substance répandue pour éviter qu’elle attaque les matériaux environnants.'),
(180, 'P391', 'Recueillir le produit répandu.'),
(181, 'P301 + P310', 'EN CAS D’INGESTION: Appeler immédiatement un CENTRE ANTIPOISON/un médecin/ …'),
(182, 'P301 + P312', 'EN CAS D’INGESTION: Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(183, 'P301 + P330 + P331', 'EN CAS D’INGESTION: rincer la bouche. NE PAS faire vomir.'),
(184, 'P302 + P334', 'EN CAS DE CONTACT AVEC LA PEAU: rincer à l’eau fraîche/poser une compresse humide.'),
(185, 'P302 + P352', 'EN CAS DE CONTACT AVEC LA PEAU: Laver abondamment à l’eau/… '),
(186, 'P303 + P361 + P353', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux): Enlever immédiatement tous les vêtements contaminés. Rincer la peau à l’eau/Se doucher.'),
(187, 'P304 + P340', 'EN CAS D’INHALATION: transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(188, 'P306 + P360', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS: rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(189, 'P101', 'En cas de consultation d’un médecin, garder à disposition le récipient ou l’étiquette.'),
(190, 'P102', 'Tenir hors de portée des enfants.'),
(191, 'P103', 'Lire l’étiquette avant utilisation.'),
(192, 'P201', 'Se procurer les instructions spéciales avant utilisation.'),
(193, 'P202', 'Ne pas manipuler avant d’avoir lu et compris toutes les précautions de sécurité.'),
(194, 'P210', 'Tenir à l’écart de la chaleur, des surfaces chaudes, des étincelles, des flammes nues et de toute autre source d’inflammation. Ne pas fumer.'),
(195, 'P211', 'Ne pas vaporiser sur une flamme nue ou sur toute autre source d’ignition.'),
(196, 'P220', 'Tenir/stocker à l’écart des vêtements/…/matières combustibles'),
(197, 'P221', 'Prendre toutes précautions pour éviter de mélanger avec des matières combustibles…'),
(198, 'P222', 'Ne pas laisser au contact de l’air.'),
(199, 'P223', 'Éviter tout contact avec l’eau.'),
(200, 'P230', 'Maintenir humidifié avec…'),
(201, 'P231', 'Manipuler sous gaz inerte.'),
(202, 'P232', 'Protéger de l’humidité.'),
(203, 'P233', 'Maintenir le récipient fermé de manière étanche.'),
(204, 'P234', 'Conserver uniquement dans le récipient d’origine.'),
(205, 'P235', 'Tenir au frais.'),
(206, 'P240', 'Mise à la terre/liaison équipotentielle du récipient et du matériel de réception.'),
(207, 'P241', 'Utiliser du matériel électrique/de ventilation/ d’éclairage/…/ antidéflagrant.'),
(208, 'P242', 'Ne pas utiliser d’outils produisant des étincelles.'),
(209, 'P243', 'Prendre des mesures de précaution contre les décharges électrostatiques.'),
(210, 'P244', 'Ni huile, ni graisse sur les robinets et raccords.'),
(211, 'P250', 'Éviter les abrasions/les chocs/…/les frottements.'),
(212, 'P251', 'Ne pas perforer, ni brûler, même après usage.'),
(213, 'P260', 'Ne pas respirer les poussières/fumées/gaz/brouillards/vapeurs/ aérosols.'),
(214, 'P261', 'Éviter de respirer les poussières/fumées/gaz/ brouillards/vapeurs/ aérosols.'),
(215, 'P262', 'Éviter tout contact avec les yeux, la peau ou les vêtements.'),
(216, 'P263', 'Éviter tout contact avec la substance au cours de la grossesse/pendant l’allaitement.'),
(217, 'P264', 'Se laver … soigneusement après manipulation.'),
(218, 'P270', 'Ne pas manger, boire ou fumer en manipulant ce produit.'),
(219, 'P271', 'Utiliser seulement en plein air ou dans un endroit bien ventilé.'),
(220, 'P272', 'Les vêtements de travail contaminés ne devraient pas sortir du lieu de travail.'),
(221, 'P273', 'Éviter le rejet dans l’environnement.'),
(222, 'P280', 'Porter des gants de protection/des vêtements de protection/un équipement de protection des yeux/ du visage.'),
(223, 'P282', 'Porter des gants isolants contre le froid/un équipement de protection du visage/ des yeux.'),
(224, 'P283', 'Porter des vêtements résistant au feu/aux flammes/ignifuges.'),
(225, 'P284', '[Lorsque la ventilation du local est insuffisante] porter un équipement de protection respiratoire.'),
(226, 'P231 + P232', 'Manipuler sous gaz inerte. Protéger de l’humidité.'),
(227, 'P235 + P410', 'Tenir au frais. Protéger du rayonnement solaire.'),
(228, 'P301', 'EN CAS D’INGESTION:'),
(229, 'P302', 'EN CAS DE CONTACT AVEC LA PEAU:'),
(230, 'P303', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux):'),
(231, 'P304', 'EN CAS D’INHALATION:'),
(232, 'P305', 'EN CAS DE CONTACT AVEC LES YEUX:'),
(233, 'P306', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS:'),
(234, 'P308', 'EN CAS d’exposition prouvée ou suspectée:'),
(235, 'P310', 'Appeler immédiatement un CENTRE ANTIPOISON/un médecin/…'),
(236, 'P311', 'Appeler un CENTRE ANTIPOISON/un médecin/…'),
(237, 'P312', 'Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(238, 'P313', 'Consulter un médecin.'),
(239, 'P314', 'Consulter un médecin en cas de malaise.'),
(240, 'P315', 'Consulter immédiatement un médecin.'),
(241, 'P320', 'Un traitement spécifique est urgent (voir … sur cette étiquette).'),
(242, 'P321', 'Traitement spécifique (voir … sur cette étiquette).'),
(243, 'P330', 'Rincer la bouche.'),
(244, 'P331', 'NE PAS faire vomir.'),
(245, 'P332', 'En cas d’irritation cutanée:'),
(246, 'P333', 'En cas d’irritation ou d’éruption cutanée:'),
(247, 'P334', 'Rincer à l’eau fraîche/poser une compresse humide.'),
(248, 'P335', 'Enlever avec précaution les particules déposées sur la peau.'),
(249, 'P336', 'Dégeler les parties gelées avec de l’eau tiède. Ne pas frotter les zones touchées.'),
(250, 'P337', 'Si l’irritation oculaire persiste:'),
(251, 'P338', 'Enlever les lentilles de contact si la victime en porte et si elles peuvent être facilement enlevées. Continuer à rincer.'),
(252, 'P340', 'Transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(253, 'P342', 'En cas de symptômes respiratoires:'),
(254, 'P351', 'Rincer avec précaution à l’eau pendant plusieurs minutes.'),
(255, 'P352', 'Laver abondamment à l’eau/…'),
(256, 'P353', 'Rincer la peau à l’eau/se doucher.'),
(257, 'P360', 'Rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(258, 'P361', 'Enlever immédiatement tous les vêtements contaminés.'),
(259, 'P362', 'Enlever les vêtements contaminés.'),
(260, 'P363', 'Laver les vêtements contaminés avant réutilisation.'),
(261, 'P364', 'Et les laver avant réutilisation.'),
(262, 'P370', 'En cas d’incendie:'),
(263, 'P371', 'En cas d’incendie important et s’il s’agit de grandes quantités:'),
(264, 'P372', 'Risque d’explosion en cas d’incendie.'),
(265, 'P373', 'NE PAS combattre l’incendie lorsque le feu atteint les explosifs.'),
(266, 'P374', 'Combattre l’incendie à distance en prenant les précautions normales.'),
(267, 'P375', 'Combattre l’incendie à distance à cause du risque d’explosion.'),
(268, 'P376', 'Obturer la fuite si cela peut se faire sans danger.'),
(269, 'P377', 'Fuite de gaz enflammé: Ne pas éteindre si la fuite ne peut pas être arrêtée sans danger.'),
(270, 'P378', 'Utiliser… pour l’extinction.'),
(271, 'P380', 'Évacuer la zone.'),
(272, 'P381', 'Éliminer toutes les sources d’ignition si cela est faisable sans danger.'),
(273, 'P390', 'Absorber toute substance répandue pour éviter qu’elle attaque les matériaux environnants.'),
(274, 'P391', 'Recueillir le produit répandu.'),
(275, 'P301 + P310', 'EN CAS D’INGESTION: Appeler immédiatement un CENTRE ANTIPOISON/un médecin/ …'),
(276, 'P301 + P312', 'EN CAS D’INGESTION: Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(277, 'P301 + P330 + P331', 'EN CAS D’INGESTION: rincer la bouche. NE PAS faire vomir.'),
(278, 'P302 + P334', 'EN CAS DE CONTACT AVEC LA PEAU: rincer à l’eau fraîche/poser une compresse humide.'),
(279, 'P302 + P352', 'EN CAS DE CONTACT AVEC LA PEAU: Laver abondamment à l’eau/… '),
(280, 'P303 + P361 + P353', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux): Enlever immédiatement tous les vêtements contaminés. Rincer la peau à l’eau/Se doucher.'),
(281, 'P304 + P340', 'EN CAS D’INHALATION: transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(282, 'P306 + P360', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS: rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(283, 'P101', 'En cas de consultation d’un médecin, garder à disposition le récipient ou l’étiquette.'),
(284, 'P102', 'Tenir hors de portée des enfants.'),
(285, 'P103', 'Lire l’étiquette avant utilisation.'),
(286, 'P201', 'Se procurer les instructions spéciales avant utilisation.'),
(287, 'P202', 'Ne pas manipuler avant d’avoir lu et compris toutes les précautions de sécurité.'),
(288, 'P210', 'Tenir à l’écart de la chaleur, des surfaces chaudes, des étincelles, des flammes nues et de toute autre source d’inflammation. Ne pas fumer.'),
(289, 'P211', 'Ne pas vaporiser sur une flamme nue ou sur toute autre source d’ignition.'),
(290, 'P220', 'Tenir/stocker à l’écart des vêtements/…/matières combustibles'),
(291, 'P221', 'Prendre toutes précautions pour éviter de mélanger avec des matières combustibles…'),
(292, 'P222', 'Ne pas laisser au contact de l’air.'),
(293, 'P223', 'Éviter tout contact avec l’eau.'),
(294, 'P230', 'Maintenir humidifié avec…'),
(295, 'P231', 'Manipuler sous gaz inerte.'),
(296, 'P232', 'Protéger de l’humidité.'),
(297, 'P233', 'Maintenir le récipient fermé de manière étanche.'),
(298, 'P234', 'Conserver uniquement dans le récipient d’origine.'),
(299, 'P235', 'Tenir au frais.'),
(300, 'P240', 'Mise à la terre/liaison équipotentielle du récipient et du matériel de réception.'),
(301, 'P241', 'Utiliser du matériel électrique/de ventilation/ d’éclairage/…/ antidéflagrant.'),
(302, 'P242', 'Ne pas utiliser d’outils produisant des étincelles.'),
(303, 'P243', 'Prendre des mesures de précaution contre les décharges électrostatiques.'),
(304, 'P244', 'Ni huile, ni graisse sur les robinets et raccords.'),
(305, 'P250', 'Éviter les abrasions/les chocs/…/les frottements.'),
(306, 'P251', 'Ne pas perforer, ni brûler, même après usage.'),
(307, 'P260', 'Ne pas respirer les poussières/fumées/gaz/brouillards/vapeurs/ aérosols.'),
(308, 'P261', 'Éviter de respirer les poussières/fumées/gaz/ brouillards/vapeurs/ aérosols.'),
(309, 'P262', 'Éviter tout contact avec les yeux, la peau ou les vêtements.'),
(310, 'P263', 'Éviter tout contact avec la substance au cours de la grossesse/pendant l’allaitement.'),
(311, 'P264', 'Se laver … soigneusement après manipulation.'),
(312, 'P270', 'Ne pas manger, boire ou fumer en manipulant ce produit.'),
(313, 'P271', 'Utiliser seulement en plein air ou dans un endroit bien ventilé.'),
(314, 'P272', 'Les vêtements de travail contaminés ne devraient pas sortir du lieu de travail.'),
(315, 'P273', 'Éviter le rejet dans l’environnement.'),
(316, 'P280', 'Porter des gants de protection/des vêtements de protection/un équipement de protection des yeux/ du visage.'),
(317, 'P282', 'Porter des gants isolants contre le froid/un équipement de protection du visage/ des yeux.'),
(318, 'P283', 'Porter des vêtements résistant au feu/aux flammes/ignifuges.'),
(319, 'P284', '[Lorsque la ventilation du local est insuffisante] porter un équipement de protection respiratoire.'),
(320, 'P231 + P232', 'Manipuler sous gaz inerte. Protéger de l’humidité.'),
(321, 'P235 + P410', 'Tenir au frais. Protéger du rayonnement solaire.'),
(322, 'P301', 'EN CAS D’INGESTION:'),
(323, 'P302', 'EN CAS DE CONTACT AVEC LA PEAU:'),
(324, 'P303', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux):'),
(325, 'P304', 'EN CAS D’INHALATION:'),
(326, 'P305', 'EN CAS DE CONTACT AVEC LES YEUX:'),
(327, 'P306', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS:'),
(328, 'P308', 'EN CAS d’exposition prouvée ou suspectée:'),
(329, 'P310', 'Appeler immédiatement un CENTRE ANTIPOISON/un médecin/…'),
(330, 'P311', 'Appeler un CENTRE ANTIPOISON/un médecin/…'),
(331, 'P312', 'Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(332, 'P313', 'Consulter un médecin.'),
(333, 'P314', 'Consulter un médecin en cas de malaise.'),
(334, 'P315', 'Consulter immédiatement un médecin.'),
(335, 'P320', 'Un traitement spécifique est urgent (voir … sur cette étiquette).'),
(336, 'P321', 'Traitement spécifique (voir … sur cette étiquette).'),
(337, 'P330', 'Rincer la bouche.'),
(338, 'P331', 'NE PAS faire vomir.'),
(339, 'P332', 'En cas d’irritation cutanée:'),
(340, 'P333', 'En cas d’irritation ou d’éruption cutanée:'),
(341, 'P334', 'Rincer à l’eau fraîche/poser une compresse humide.'),
(342, 'P335', 'Enlever avec précaution les particules déposées sur la peau.'),
(343, 'P336', 'Dégeler les parties gelées avec de l’eau tiède. Ne pas frotter les zones touchées.'),
(344, 'P337', 'Si l’irritation oculaire persiste:'),
(345, 'P338', 'Enlever les lentilles de contact si la victime en porte et si elles peuvent être facilement enlevées. Continuer à rincer.'),
(346, 'P340', 'Transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(347, 'P342', 'En cas de symptômes respiratoires:'),
(348, 'P351', 'Rincer avec précaution à l’eau pendant plusieurs minutes.'),
(349, 'P352', 'Laver abondamment à l’eau/…'),
(350, 'P353', 'Rincer la peau à l’eau/se doucher.'),
(351, 'P360', 'Rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(352, 'P361', 'Enlever immédiatement tous les vêtements contaminés.'),
(353, 'P362', 'Enlever les vêtements contaminés.'),
(354, 'P363', 'Laver les vêtements contaminés avant réutilisation.'),
(355, 'P364', 'Et les laver avant réutilisation.'),
(356, 'P370', 'En cas d’incendie:'),
(357, 'P371', 'En cas d’incendie important et s’il s’agit de grandes quantités:'),
(358, 'P372', 'Risque d’explosion en cas d’incendie.'),
(359, 'P373', 'NE PAS combattre l’incendie lorsque le feu atteint les explosifs.'),
(360, 'P374', 'Combattre l’incendie à distance en prenant les précautions normales.'),
(361, 'P375', 'Combattre l’incendie à distance à cause du risque d’explosion.'),
(362, 'P376', 'Obturer la fuite si cela peut se faire sans danger.'),
(363, 'P377', 'Fuite de gaz enflammé: Ne pas éteindre si la fuite ne peut pas être arrêtée sans danger.'),
(364, 'P378', 'Utiliser… pour l’extinction.'),
(365, 'P380', 'Évacuer la zone.'),
(366, 'P381', 'Éliminer toutes les sources d’ignition si cela est faisable sans danger.'),
(367, 'P390', 'Absorber toute substance répandue pour éviter qu’elle attaque les matériaux environnants.'),
(368, 'P391', 'Recueillir le produit répandu.'),
(369, 'P301 + P310', 'EN CAS D’INGESTION: Appeler immédiatement un CENTRE ANTIPOISON/un médecin/ …'),
(370, 'P301 + P312', 'EN CAS D’INGESTION: Appeler un CENTRE ANTIPOISON/un médecin/…/en cas de malaise.'),
(371, 'P301 + P330 + P331', 'EN CAS D’INGESTION: rincer la bouche. NE PAS faire vomir.'),
(372, 'P302 + P334', 'EN CAS DE CONTACT AVEC LA PEAU: rincer à l’eau fraîche/poser une compresse humide.'),
(373, 'P302 + P352', 'EN CAS DE CONTACT AVEC LA PEAU: Laver abondamment à l’eau/… '),
(374, 'P303 + P361 + P353', 'EN CAS DE CONTACT AVEC LA PEAU (ou les cheveux): Enlever immédiatement tous les vêtements contaminés. Rincer la peau à l’eau/Se doucher.'),
(375, 'P304 + P340', 'EN CAS D’INHALATION: transporter la personne à l’extérieur et la maintenir dans une position où elle peut confortablement respirer.'),
(376, 'P305 + P351 + P338', 'EN CAS DE CONTACT AVEC LES YEUX: rincer avec précaution à l’eau pendant plusieurs minutes. Enlever les lentilles de contact si la victime en porte et si elles peuvent être facilement enlevées. Continuer à rincer.'),
(377, 'P306 + P360', 'EN CAS DE CONTACT AVEC LES VÊTEMENTS: rincer immédiatement et abondamment avec de l’eau les vêtements contaminés et la peau avant de les enlever.'),
(378, 'P308 + P311', 'EN CAS d’exposition prouvée ou suspectée: Appeler un CENTRE ANTIPOISON/un médecin/…'),
(379, 'P308 + P313', 'EN CAS d’exposition prouvée ou suspectée: consulter un médecin.'),
(380, 'P332 + P313', 'En cas d’irritation cutanée: consulter un médecin.'),
(381, 'P333 + P313', 'En cas d’irritation ou d’éruption cutanée: consulter un médecin.'),
(382, 'P335 + P334', 'Enlever avec précaution les particules déposées sur la peau. Rincer à l’eau fraîche/poser une compresse humide.'),
(383, 'P337 + P313', 'Si l’irritation oculaire persiste: consulter un médecin.'),
(384, 'P342 + P311', 'En cas de symptômes respiratoires: Appeler un CENTRE ANTIPOISON/un médecin/…'),
(385, 'P361 + P364', 'Enlever immédiatement tous les vêtements contaminés et les laver avant réutilisation.'),
(386, 'P362 + P364', 'Enlever les vêtements contaminés et les laver avant réutilisation.'),
(387, 'P370 + P376', 'En cas d’incendie: obturer la fuite si cela peut se faire sans danger.'),
(388, 'P370 + P378', 'En cas d’incendie: Utiliser… pour l’extinction.'),
(389, 'P370 + P380', 'En cas d’incendie: évacuer la zone.'),
(390, 'P370 + P380 + P375', 'En cas d’incendie: évacuer la zone. Combattre l’incendie à distance à cause du risque d’explosion.'),
(391, 'P371 + P380 + P375', 'En cas d’incendie important et s’il s’agit de grandes quantités: évacuer la zone. Combattre l’incendie à distance à cause du risque d’explosion.'),
(392, 'P401', 'Stocker …'),
(393, 'P402', 'Stocker dans un endroit sec.'),
(394, 'P403', 'Stocker dans un endroit bien ventilé.'),
(395, 'P404', 'Stocker dans un récipient fermé.'),
(396, 'P405', 'Garder sous clef.'),
(397, 'P406', 'Stocker dans un récipient résistant à la corrosion/récipient en … avec doublure intérieure résistant à la corrosion.'),
(398, 'P407', 'Maintenir un intervalle d’air entre les piles/ palettes.'),
(399, 'P410', 'Protéger du rayonnement solaire.'),
(400, 'P411', 'Stocker à une température ne dépassant pas … o C/… o F.'),
(401, 'P412', 'Ne pas exposer à une température supérieure à 50 o C/122 o F.'),
(402, 'P413', 'Stocker les quantités en vrac de plus de … kg/ … lb à une température ne dépassant pas … o C/… o F.'),
(403, 'P420', 'Stocker à l’écart des autres matières.'),
(404, 'P422', 'Stocker le contenu sous …'),
(405, 'P402 + P404', 'Stocker dans un endroit sec. Stocker dans un récipient fermé.'),
(406, 'P403 + P233', 'Stocker dans un endroit bien ventilé. Maintenir le récipient fermé de manière étanche.'),
(407, 'P403 + P235', 'Stocker dans un endroit bien ventilé. Tenir au frais.'),
(408, 'P410 + P403', 'Protéger du rayonnement solaire. Stocker dans un endroit bien ventilé.'),
(409, 'P410 + P412', 'Protéger du rayonnement solaire. Ne pas exposer à une température supérieure à 50 o C/ 122 o F.'),
(410, 'P411 + P235', 'Stocker à une température ne dépassant pas … o C/… o F. Tenir au frais.'),
(411, 'P501', 'Éliminer le contenu/récipient dans …'),
(412, 'P502', 'Se reporter au fabricant/fournisseur pour des informations concernant la récupération/le recyclage');

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mail_to` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mention_danger`
--

DROP TABLE IF EXISTS `mention_danger`;
CREATE TABLE IF NOT EXISTS `mention_danger` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(256) NOT NULL,
  `phrase` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mention_danger`
--

INSERT INTO `mention_danger` (`ID`, `code`, `phrase`) VALUES
(1, 'H201', 'Explosif; danger d’explosion en masse'),
(2, 'H202', 'Explosif; danger sérieux de projection'),
(3, 'H203', 'Explosif; danger d’incendie, d’effet de souffle ou de projection'),
(4, 'H204', 'Danger d’incendie ou de projection'),
(5, 'H205', 'Danger d’explosion en masse en cas d’incendie'),
(6, 'H220', 'Gaz extrêmement inflammable'),
(7, 'H221', 'Gaz inflammable'),
(8, 'H222', 'Aérosol extrêmement inflammable'),
(9, 'H223', 'Aérosol inflammable'),
(10, 'H224', 'Liquide et vapeurs extrêmement inflammables'),
(11, 'H225', 'Liquide et vapeurs très inflammables'),
(12, 'H226', 'Liquide et vapeurs inflammables'),
(13, 'H228', 'Matière solide inflammable'),
(14, 'H240', 'Peut exploser sous l’effet de la chaleur'),
(15, 'H241', 'Peut s’enflammer ou exploser sous l’effet de la chaleur'),
(16, 'H242', 'Peut s’enflammer sous l’effet de la chaleur'),
(17, 'H250', 'S’enflamme spontanément au contact de l’air'),
(18, 'H251', 'Matière auto-échauffante; peut s’enflammer'),
(19, 'H252', 'Matière auto-échauffante en grandes quantités; peut s’enflammer'),
(20, 'H260', 'Dégage au contact de l’eau des gaz inflammables qui peuvent s’enflammer spontanément'),
(21, 'H261', 'Dégage au contact de l’eau des gaz inflammables'),
(22, 'H270', 'Peut provoquer ou aggraver un incendie; comburant'),
(23, 'H271', 'Peut provoquer un incendie ou une explosion; comburant puissant'),
(24, 'H272', 'Peut aggraver un incendie; comburant'),
(25, 'H280', 'Contient un gaz sous pression; peut exploser sous l’effet de la chaleur'),
(26, 'H281', 'Contient un gaz réfrigéré; peut causer des brûlures ou blessures cryogéniques'),
(27, 'H290', 'Peut être corrosif pour les métaux'),
(28, 'H300', 'Mortel en cas d’ingestion'),
(29, 'H301', 'Toxique en cas d’ingestion'),
(30, 'H302', 'Nocif en cas d’ingestion'),
(31, 'H304', 'Peut être mortel en cas d’ingestion et de pénétration dans les voies respiratoires'),
(32, 'H310', 'Mortel par contact cutané'),
(33, 'H311', 'Toxique par contact cutané'),
(34, 'H312', 'Nocif par contact cutané'),
(35, 'H314', 'Provoque des brûlures de la peau et des lésions oculaires graves'),
(36, 'H315', 'Provoque une irritation cutanée'),
(37, 'H317', 'Peut provoquer une allergie cutanée'),
(38, 'H318', 'Provoque des lésions oculaires graves'),
(39, 'H319', 'Provoque une sévère irritation des yeux'),
(40, 'H330', 'Mortel par inhalation'),
(41, 'H331', 'Toxique par inhalation'),
(42, 'H332', 'Nocif par inhalation'),
(43, 'H334', 'Peut provoquer des symptômes allergiques ou d’asthme ou des difficultés respiratoires par inhalation'),
(44, 'H335', 'Peut irriter les voies respiratoires'),
(45, 'H336', 'Peut provoquer somnolence ou vertiges'),
(46, 'H340', 'Peut induire des anomalies génétiques'),
(47, 'H341', 'Susceptible d’induire des anomalies génétiques'),
(48, 'H350', 'Peut provoquer le cancer'),
(49, 'H351', 'Susceptible de provoquer le cancer'),
(50, 'H360', 'Peut nuire à la fertilité ou au foetus'),
(51, 'H200', 'Explosif instable'),
(52, 'H201', 'Explosif; danger d’explosion en masse'),
(53, 'H202', 'Explosif; danger sérieux de projection'),
(54, 'H203', 'Explosif; danger d’incendie, d’effet de souffle ou de projection'),
(55, 'H204', 'Danger d’incendie ou de projection'),
(56, 'H205', 'Danger d’explosion en masse en cas d’incendie'),
(57, 'H220', 'Gaz extrêmement inflammable'),
(58, 'H221', 'Gaz inflammable'),
(59, 'H222', 'Aérosol extrêmement inflammable'),
(60, 'H223', 'Aérosol inflammable'),
(61, 'H224', 'Liquide et vapeurs extrêmement inflammables'),
(62, 'H225', 'Liquide et vapeurs très inflammables'),
(63, 'H226', 'Liquide et vapeurs inflammables'),
(64, 'H228', 'Matière solide inflammable'),
(65, 'H240', 'Peut exploser sous l’effet de la chaleur'),
(66, 'H241', 'Peut s’enflammer ou exploser sous l’effet de la chaleur'),
(67, 'H242', 'Peut s’enflammer sous l’effet de la chaleur'),
(68, 'H250', 'S’enflamme spontanément au contact de l’air'),
(69, 'H251', 'Matière auto-échauffante; peut s’enflammer'),
(70, 'H252', 'Matière auto-échauffante en grandes quantités; peut s’enflammer'),
(71, 'H260', 'Dégage au contact de l’eau des gaz inflammables qui peuvent s’enflammer spontanément'),
(72, 'H261', 'Dégage au contact de l’eau des gaz inflammables'),
(73, 'H270', 'Peut provoquer ou aggraver un incendie; comburant'),
(74, 'H271', 'Peut provoquer un incendie ou une explosion; comburant puissant'),
(75, 'H272', 'Peut aggraver un incendie; comburant'),
(76, 'H280', 'Contient un gaz sous pression; peut exploser sous l’effet de la chaleur'),
(77, 'H281', 'Contient un gaz réfrigéré; peut causer des brûlures ou blessures cryogéniques'),
(78, 'H290', 'Peut être corrosif pour les métaux'),
(79, 'H300', 'Mortel en cas d’ingestion'),
(80, 'H301', 'Toxique en cas d’ingestion'),
(81, 'H302', 'Nocif en cas d’ingestion'),
(82, 'H304', 'Peut être mortel en cas d’ingestion et de pénétration dans les voies respiratoires'),
(83, 'H310', 'Mortel par contact cutané'),
(84, 'H311', 'Toxique par contact cutané'),
(85, 'H312', 'Nocif par contact cutané'),
(86, 'H314', 'Provoque des brûlures de la peau et des lésions oculaires graves'),
(87, 'H315', 'Provoque une irritation cutanée'),
(88, 'H317', 'Peut provoquer une allergie cutanée'),
(89, 'H318', 'Provoque des lésions oculaires graves'),
(90, 'H319', 'Provoque une sévère irritation des yeux'),
(91, 'H330', 'Mortel par inhalation'),
(92, 'H331', 'Toxique par inhalation'),
(93, 'H332', 'Nocif par inhalation'),
(94, 'H334', 'Peut provoquer des symptômes allergiques ou d’asthme ou des difficultés respiratoires par inhalation'),
(95, 'H335', 'Peut irriter les voies respiratoires'),
(96, 'H336', 'Peut provoquer somnolence ou vertiges'),
(97, 'H340', 'Peut induire des anomalies génétiques'),
(98, 'H341', 'Susceptible d’induire des anomalies génétiques'),
(99, 'H350', 'Peut provoquer le cancer'),
(100, 'H351', 'Susceptible de provoquer le cancer'),
(101, 'H360', 'Peut nuire à la fertilité ou au foetus'),
(102, 'H361', 'Susceptible de nuire à la fertilité ou au foetus'),
(103, 'H362', 'Peut être nocif pour les bébés nourris au lait maternel'),
(104, 'H370', 'Risque avéré d’effets graves pour les organes'),
(105, 'H371', 'Risque présumé d’effets graves pour les organes'),
(106, 'H372', 'Risque avéré d’effets graves pour les organes'),
(107, 'H373', 'Risque présumé d’effets graves pour les organes'),
(108, 'H400', 'Très toxique pour les organismes aquatiques'),
(109, 'H410', 'Très toxique pour les organismes aquatiques, entraîne des effets néfastes à long terme'),
(110, 'H411', 'Toxique pour les organismes aquatiques, entraîne des effets néfastes à long terme'),
(111, 'H412', 'Nocif pour les organismes aquatiques, entraîne des effets néfastes à long terme'),
(112, 'H413', 'Peut être nocif à long terme pour les organismes aquatiques');

-- --------------------------------------------------------

--
-- Structure de la table `pictogramme_precaution`
--

DROP TABLE IF EXISTS `pictogramme_precaution`;
CREATE TABLE IF NOT EXISTS `pictogramme_precaution` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `picto` varchar(1000) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pictogramme_precaution`
--

INSERT INTO `pictogramme_precaution` (`code`, `nom`, `picto`) VALUES
(1, 'Masque', './pictogramme_precaution/masque.png'),
(2, 'Gants de protection', './pictogramme_precaution/gants_de_protection.png'),
(3, 'Lunettes de protection', './pictogramme_precaution/lunettes_de_protection.png');

-- --------------------------------------------------------

--
-- Structure de la table `pictogramme_securite`
--

DROP TABLE IF EXISTS `pictogramme_securite`;
CREATE TABLE IF NOT EXISTS `pictogramme_securite` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `picto` varchar(1000) NOT NULL,
  `remarque` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pictogramme_securite`
--

INSERT INTO `pictogramme_securite` (`code`, `nom`, `picto`, `remarque`) VALUES
('SGH01', 'Explosif', './pictogramme_securite/100px-GHS-pictogram-explos.png', 'Rend SGH02 et SGH03 facultatifs'),
('SGH02', 'Inflammable', './pictogramme_securite/100px-GHS-pictogram-flamme.png', ''),
('SGH03', 'Comburant', './pictogramme_securite/100px-GHS-pictogram-rondflam.png', ''),
('SGH04', 'Gaz sous pression', './pictogramme_securite/100px-GHS-pictogram-bottle.png', ''),
('SGH05', 'Corrosif', './pictogramme_securite/100px-GHS-pictogram-acid.png', 'Rend SGH07 (pour signaler les dangers d\'irritation cutanée ou oculaire) facultatif'),
('SGH06', 'Toxique', './pictogramme_securite/100px-GHS-pictogram-skull.png', 'Rend SGH07 facultatif'),
('SGH07', 'Toxique, irritant, sensibilisant, narcotique', './pictogramme_securite/100px-GHS-pictogram-exclam.png', ''),
('SGH08', 'Sensibilisant, mutagène, cancérogène, reprotoxique', './pictogramme_securite/100px-GHS-pictogram-silhouette.png', 'Si présent pour signaler un danger de sensibilisation respiratoire rend SGH07 (pour signaler un danger de sensibilisation cutanée, d’irritation cutanée ou oculaire) facultatif'),
('SGH09', 'Danger pour l\'environnement', './pictogramme_securite/100px-GHS-pictogram-pollu.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `poubelle`
--

DROP TABLE IF EXISTS `poubelle`;
CREATE TABLE IF NOT EXISTS `poubelle` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `salle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poubelle`
--

INSERT INTO `poubelle` (`ID`, `nom`, `salle`) VALUES
(9, 'Solvants', 'X009sb'),
(8, 'Solvants chlorés', 'X009sb'),
(7, 'Acides', 'X009sb');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `code_produit` int(255) NOT NULL AUTO_INCREMENT,
  `designation_francaise` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation_anglaise` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation_scientifique` varchar(255) CHARACTER SET latin1 NOT NULL,
  `QR_code` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `formule_brute` varchar(255) NOT NULL,
  `type_produit` varchar(256) DEFAULT NULL,
  `quantite` decimal(10,0) DEFAULT NULL,
  `commentaire_libre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fournisseur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `masse_molaire` decimal(10,0) DEFAULT NULL,
  `densite` decimal(10,0) DEFAULT NULL,
  `temp_fusion_celsius` int(255) DEFAULT NULL,
  `temp_ebullition_celsius` int(255) DEFAULT NULL,
  `temp_autoflamme_celsius` int(255) DEFAULT NULL,
  `indice_optique` decimal(10,0) DEFAULT NULL,
  `num_cas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `formule_developpee` int(11) DEFAULT NULL,
  `pictogramme_securite` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `pictogramme_precaution` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `melange_dangereux` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `stockage` varchar(256) DEFAULT NULL,
  `poubelle` varchar(256) DEFAULT NULL,
  `date_de_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(255) CHARACTER SET latin1 NOT NULL,
  `fiche_securite_legale` longblob,
  `conseil_prudence` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `mention_danger` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `date_derniere_visu` datetime DEFAULT NULL,
  `nb_visu` int(11) DEFAULT NULL,
  `couleur` varchar(256) NOT NULL,
  PRIMARY KEY (`code_produit`,`num_cas`),
  UNIQUE KEY `num_cas` (`num_cas`),
  KEY `code_produit` (`code_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=61;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `designation_francaise`, `designation_anglaise`, `designation_scientifique`, `QR_code`, `formule_brute`, `type_produit`, `quantite`, `commentaire_libre`, `fournisseur`, `masse_molaire`, `densite`, `temp_fusion_celsius`, `temp_ebullition_celsius`, `temp_autoflamme_celsius`, `indice_optique`, `num_cas`, `formule_developpee`, `pictogramme_securite`, `pictogramme_precaution`, `melange_dangereux`, `stockage`, `poubelle`, `date_de_creation`, `auteur`, `fiche_securite_legale`, `conseil_prudence`, `mention_danger`, `date_derniere_visu`, `nb_visu`, `couleur`) VALUES
(48, 'Acétone', 'Acetone', 'Diméthylcétone', 'qr_codes/qrcode_Acétone.png', 'C3H6O', 'Solvant', '100', 'L’acétone est un liquide incolore, très volatil, d’odeur suave et pénétrante détectable à environ 13 ppm. Elle est totalement miscible avec l’eau et avec un grand\r\nnombre de solvants organiques, notamment l’éthanol, l’oxyde de diéthyle et les esters. D’au', 'INRS', '58', '0', -94, 56, 538, '0', '67-64-1', NULL, 'Toxique, irritant, sensibilisant, narcotique;Explosif;', 'Lunettes de protection;Masque;', 'Elle peut réagir vivement avec les agents oxydants puissants comme l’acide chromique, l’acide nitrique chaud, le permanganate de potassium (en milieu alcalin), les mélanges sulfonitriques, les peroxydes, notamment le peroxyde d’hydrogène, etc.', '', '9', '2019-06-06 12:38:11', 'Victor KODAIS-LOQUET', NULL, '<br />P103 - Lire l’étiquette avant utilisation.', '<br />H225 - Liquide et vapeurs très inflammables<br />H319 - Provoque une sévère irritation des yeux<br />H336 - Peut provoquer somnolence ou vertiges', '2019-06-11 11:46:21', 28, 'rouge'),
(59, 'test_image1', 'test_image1', '', 'qr_codes/qrcode_test_image1.png', '', 'Acide', '0', '', '', '0', '0', 0, 0, 0, '0', '12222222222', NULL, '', '', '', '5', '9', '2019-06-11 09:47:25', 'Victor KODAIS-LOQUET', NULL, '', '', '2019-06-11 11:47:30', 1, 'vert'),
(57, 'Acide acétique', 'acetic acid', 'Acide éthanoïque', 'qr_codes/qrcode_Acide acétique.png', 'C2H4O2', 'Acide', '100', 'L\'acide acétique est un liquide incolore, d\'odeur piquante et pénétrante détectable à de faibles concentrations (0,48 à 1 ppm). Il se solidifie à 16,63 °C en donnant des cristaux transparents. La température de congélation diminue quand la teneur en eau a', 'INRS', '60', '1', 16, 117, 463, '2', '64-19-7', NULL, 'Corrosif;Inflammable;', 'Lunettes de protection;Gants de protection;Masque;', 'Aucun', '5', '7', '2019-06-07 19:51:12', 'Victor KODAIS-LOQUET', NULL, '<br />P230 - Maintenir humidifié avec…', '<br />H226 - Liquide et vapeurs inflammables<br />H314 - Provoque des brûlures de la peau et des lésions oculaires graves', '2019-06-07 21:53:01', 3, 'vert'),
(60, 'test_imageééééééééééééééééééééééééé', '', '', 'qr_codes/qrcode_test_image%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9%C3%A9.png', '', 'Acide', '0', '', '', '0', '0', 0, 0, 0, '0', '282828222222', NULL, '', '', '', '5', '9', '2019-06-11 09:48:55', 'Victor KODAIS-LOQUET', NULL, '', '', '2019-06-11 11:49:02', 1, 'vert');

-- --------------------------------------------------------

--
-- Structure de la table `stockage`
--

DROP TABLE IF EXISTS `stockage`;
CREATE TABLE IF NOT EXISTS `stockage` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `salle` varchar(255) NOT NULL,
  `type_stockage` varchar(255) NOT NULL,
  `nom_stockage` varchar(255) NOT NULL,
  `étagère` varchar(255) DEFAULT NULL,
  `récipient` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stockage`
--

INSERT INTO `stockage` (`ID`, `salle`, `type_stockage`, `nom_stockage`, `étagère`, `récipient`) VALUES
(5, 'X009Sb', 'Armoire', 'Acide et bases', '3', 'Flacon'),
(6, 'X009Sb', 'Frigo', 'Réfrigérateur BHS', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
