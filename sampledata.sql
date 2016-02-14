-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 14-02-2016 a les 16:02:05
-- Versió del servidor: 5.5.44-0+deb8u1
-- PHP Version: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ogoose`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
`id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `attachment`
--

INSERT INTO `attachment` (`id`, `filename`, `creationdate`, `author_id`, `project_id`) VALUES
(2, 'Resolving the femenist ambivalence.docx', '2016-02-14 14:05:08', 1, 2),
(3, 'Un modelo de propaganda.odt', '2016-02-14 14:06:31', 2, 3),
(4, 'TFMASTER.docx', '2016-02-14 14:13:29', 1, 1),
(5, 'Projecte doctorat URV.docx', '2016-02-14 14:16:01', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `author`
--

CREATE TABLE IF NOT EXISTS `author` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orcid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `curriculum` longtext COLLATE utf8_unicode_ci,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('f','m') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`, `email`, `orcid`, `url`, `curriculum`, `avatar`, `profile`, `location`, `gender`) VALUES
(0, 'Non registered', 'Author', 'nonregisteredauthor@ogoose.cat', NULL, NULL, NULL, NULL, NULL, NULL, 'm'),
(1, 'Teresa', 'Morlà', 'teresa.morla@urv.cat', '0000-0001-5242-6052', NULL, 'Estudiant de doctorat a la URV (PDI). Doctorant en Economima i empresa, àrea de Sociologia. ', 'Teresa.png', 'Estudiant', 'Universitat Rovira i Virgili', 'f'),
(2, 'Arnau', 'Figueras', 'arnau.nothing@gmail.com', NULL, 'https://www.linkedin.com/in/arnau-figueras-72630818?authType=NAME_SEARCH&authToken=YNzM&locale=en_US&srchid=2786586201455450710033&srchindex=1&srchtotal=8&trk=vsrp_people_res_name&trkInfo=VSRPsearchId%3A2786586201455450710033%2CVSRPtargetId%3A60481038%2CV', 'Professor a la URV, grup d''investigació: Anàlisi social i organitzativa.', NULL, NULL, NULL, 'm');

-- --------------------------------------------------------

--
-- Estructura de la taula `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `comment`
--

INSERT INTO `comment` (`id`, `comment`, `type`, `creationdate`, `project_id`, `author_id`) VALUES
(1, 'Es podria millorar una mica això que comenteu de ... i fer-ho de ... o canviar-ho per...\r\n\r\nMolt bona feina!', 'review', '2016-02-14 10:42:40', 1, 2),
(2, 'Test', 'review', '2016-02-14 12:02:43', 1, 1),
(3, 'Holaaaaa', 'review', '2016-02-14 12:02:50', 1, 1),
(4, 'Test d''aportacions', 'comment', '2016-02-14 12:02:58', 1, 1),
(5, 'test', 'comment', '2016-02-14 12:07:40', 1, 1),
(6, 'test', 'review', '2016-02-14 12:12:06', 1, 1),
(7, 'test 2', 'comment', '2016-02-14 12:12:11', 1, 1),
(8, 'review', 'review', '2016-02-14 12:12:28', 1, 1),
(9, 'test', 'comment', '2016-02-14 12:12:32', 1, 1),
(10, 'pepa', 'review', '2016-02-14 14:07:45', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `field`
--

CREATE TABLE IF NOT EXISTS `field` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `field`
--

INSERT INTO `field` (`id`, `name`) VALUES
(2, 'Arts i Humanitats'),
(3, 'Arquitectura i Enginyeria'),
(4, 'Ciències de la salut'),
(5, 'Ciències'),
(6, 'Ciències socials i jurídiques');

-- --------------------------------------------------------

--
-- Estructura de la taula `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` longtext COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publicationdate` datetime NOT NULL,
  `allowcomments` tinyint(1) NOT NULL,
  `open` tinyint(1) NOT NULL,
  `finish` tinyint(1) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `projecttype_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `project`
--

INSERT INTO `project` (`id`, `title`, `abstract`, `keywords`, `publicationdate`, `allowcomments`, `open`, `finish`, `author_id`, `projecttype_id`, `field_id`) VALUES
(1, 'Tertúlies literàries dialògiques en mares musulmanes', 'Aquest projecte d’investigació analitza com a partir de les tertúlies literàries dialògiques (TLD), actuació educativa d’èxit avaluada en al marc del projecte de recerca INCLUD-ED (Programa Marc, Comissió Europea), es generen trajectòries de transformació social. L’anàlisi s’ha centrat en dones musulmanes, triplement discriminades: per cultura, per manca de títols i pel fet de ser dones. En aquest estudi es vol donar veu a aquestes dones, promovent la seva visibilització en el procés de recerca. En aquesta línia la pregunta de recerca és: Les TLD potencien la transformació quotidiana de la vida familiar de les dones musulmanes? I si ho fan, com ho fan? Per tal de trobar resposta a aquest plantejament s’han marcat tres objectius, en primer lloc, recollir les percepcions de les dones musulmanes entorn les TLD. En segon lloc, analitzar si hi ha una modificació d’expectatives relacionades amb l’educació i la participació ciutadana, i si és així comprovar quines. I en tercer lloc, estudiar si hi ha canvis en les interaccions en el sí de la família.', 'tertúlies literàries dialògiques, comunitat, aprenentatge, transformació i mares musulmanes', '2016-02-13 23:46:09', 1, 1, 0, 1, 1, 6),
(2, 'Resolver la ambivalencia feminista', 'En su obra La gran transformación en 1944, Polanyi argumentó que la crisis capitalista fue el colapso y la desintegración de las comunidades, la ruptura de la solidaridad que el saqueo de la naturaleza de la economía en el sentido estricto. Invirtiendo la relación  hasta ahora universal, según la cual, los mercados estaban incrustados en las instituciones sociales y se someten a las normas morales y éticas, los defensores del «mercado autorregulador» trataron de construir un mundo en el que la sociedad, la moral y la ética estaban subordinadas a los mercados y modeladas por ellos. Esta aspiración, intrínsecamente autodestructiva y utópica, provocó profundos cambios  destructivos en la  sociedad humana que estos cambios desencadenaron un contra-movimiento visando la protección de la sociedad. Es en este «doble movimiento», de mercantilización no regulada y de reivindicaciones a favor de la  protección social, que llevó, según Polanyi, al fascismo y a la guerra mundial. Escrito con el fin de modelar  la orden social de postguerra, La gran transformación es un argumento a favor del establecimiento de un nuevo régimen democrático de regulación que haría que los mercados sean más inofensivos, sin tener que suprimirlos  completamente', 'Feminismo, genero, Polanyi, crisi capitalista', '2016-02-14 12:29:05', 0, 1, 0, 1, 5, 6),
(3, 'Un model de propaganda', 'Apunts de la matèria de màster moviments socials. UB. El model de propaganda de Chomsky', 'moviments socials, UB, Chomsky, model propaganda', '2016-02-14 13:00:00', 0, 1, 0, 2, 5, 2),
(4, 'L’impacte social de la formació en professions creatives. Estudi de cas en l’àmbit de l’arquitectura i la biotecnologia. ', 'A l’actualitat, el debat i anàlisi entorn els processos de constitució d’una economia basada en el coneixement, modelat per l’aprenentatge i motoritzada per la innovació, es fa cada vegada més necessari. Un aspecte important a aquesta contribució el constitueix l’objecte d’estudi d’aquesta investigació: analitzar la importància i pes que té la innovació en les denominades ocupacions creatives a Catalunya (Espanya). Concretament ens hem centrat en la professió d’arquitecte i la de biotecnòleg/a, professions que s’han seleccionat desprès d’analitzar la composició de les ocupacions creatives a Espanya i la seva evolució en l’estructura de classes a través de fonts secundaries  (EPA, Censo de la Població, etc.). Aquesta tesi pretén identificar les claus educatives que determinen els i les professionals creatius/ves i per això es centrarà en les professions d’arquitectura i biotecnologia. Tot i això, es pretén identificar elements educatius tot destacant-ne la transferibilitat a altres professions creatives. ', 'impacte social, professions creaives, arquitectura, biotecnologia', '2016-02-14 14:00:00', 0, 1, 0, 2, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de la taula `projectauthor`
--

CREATE TABLE IF NOT EXISTS `projectauthor` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` tinyint(1) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `projectauthor`
--

INSERT INTO `projectauthor` (`id`, `firstname`, `lastname`, `owner`, `author_id`, `project_id`) VALUES
(1, 'Maria', 'Garcia', 0, 0, 1),
(2, 'John', 'Doe', 0, 0, 2),
(3, 'Emill', 'Estivill', 0, 0, 3),
(4, 'Gilbert', 'Alemany', 0, 0, 4),
(5, NULL, NULL, 0, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `projecttype`
--

CREATE TABLE IF NOT EXISTS `projecttype` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `projecttype`
--

INSERT INTO `projecttype` (`id`, `name`) VALUES
(1, 'TFGrau'),
(2, 'TFMaster'),
(3, 'Docs. doctorat'),
(4, 'Articles'),
(5, 'Apunts'),
(6, 'Altres');

-- --------------------------------------------------------

--
-- Estructura de la taula `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
`id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcant dades de la taula `rating`
--

INSERT INTO `rating` (`id`, `stars`, `project_id`, `author_id`) VALUES
(1, 3, 1, NULL),
(2, 5, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_795FD9BBF675F31B` (`author_id`), ADD KEY `IDX_795FD9BB166D1F9C` (`project_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_9474526C166D1F9C` (`project_id`), ADD KEY `IDX_9474526CF675F31B` (`author_id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_2FB3D0EEF675F31B` (`author_id`), ADD KEY `IDX_2FB3D0EE2BDB805A` (`projecttype_id`), ADD KEY `IDX_2FB3D0EE443707B0` (`field_id`);

--
-- Indexes for table `projectauthor`
--
ALTER TABLE `projectauthor`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_24C23DCAF675F31B` (`author_id`), ADD KEY `IDX_24C23DCA166D1F9C` (`project_id`);

--
-- Indexes for table `projecttype`
--
ALTER TABLE `projecttype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_D8892622166D1F9C` (`project_id`), ADD KEY `IDX_D8892622F675F31B` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `projectauthor`
--
ALTER TABLE `projectauthor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projecttype`
--
ALTER TABLE `projecttype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `attachment`
--
ALTER TABLE `attachment`
ADD CONSTRAINT `FK_795FD9BB166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_795FD9BBF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Restriccions per la taula `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `FK_9474526C166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Restriccions per la taula `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `FK_2FB3D0EE2BDB805A` FOREIGN KEY (`projecttype_id`) REFERENCES `projecttype` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_2FB3D0EE443707B0` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_2FB3D0EEF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Restriccions per la taula `projectauthor`
--
ALTER TABLE `projectauthor`
ADD CONSTRAINT `FK_24C23DCA166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_24C23DCAF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Restriccions per la taula `rating`
--
ALTER TABLE `rating`
ADD CONSTRAINT `FK_D8892622166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_D8892622F675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
