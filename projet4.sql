-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2021 at 11:52 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet4`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date_publication` date NOT NULL,
  `titre` varchar(30) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `date_publication`, `titre`, `contenu`) VALUES
(1, '2021-04-08', '1er article ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut lacinia sem. Nulla eros quam, varius nec lorem vel, ullamcorper accumsan ex. Suspendisse potenti. Mauris suscipit hendrerit metus eu posuere. Aenean quis libero lectus. Proin ut erat eu augue faucibus consequat. Proin id ultricies mauris, malesuada congue lorem. Nulla facilisi. Aenean commodo vestibulum ipsum nec egestas. Mauris hendrerit, mi quis feugiat fermentum, metus nibh laoreet leo, non ornare sapien enim ac lacus. Ut at commodo dolor, ac feugiat ligula. Integer vehicula, nisi vitae ullamcorper elementum, dolor ligula consequat eros, sed condimentum leo nisl vel nulla. In vitae venenatis ipsum. Etiam nec lobortis massa.'),
(2, '2021-04-09', '2eme article ', 'Nunc vitae nisi vel lorem mattis tempus eget ac tellus. Aliquam erat volutpat. Morbi sollicitudin a ex sit amet volutpat. Vivamus gravida ullamcorper purus vitae consectetur. Vestibulum vel tempor tellus. Phasellus non lorem convallis, dictum odio eu, interdum nibh. Nunc vel ullamcorper urna. Duis molestie nibh eget libero consectetur auctor. Vivamus pulvinar velit eros, non condimentum felis porta sit amet.'),
(3, '2021-04-10', '3eme article', 'Nunc scelerisque nisl quis arcu pulvinar consectetur. Nulla facilisi. Aenean id bibendum nunc. Vivamus imperdiet ut nulla et pretium. Fusce eu elit pellentesque, convallis lacus eu, facilisis lectus. Vestibulum placerat arcu ante, vitae convallis velit dignissim eu. Nullam a massa scelerisque, ultrices enim et, suscipit felis. Phasellus eleifend venenatis urna eget lobortis. Duis tincidunt sem quis lectus porta ullamcorper. Phasellus urna nibh, laoreet ac tempus consectetur, tempus quis ex. Duis sodales elementum nulla sed rutrum. Donec maximus tellus vel orci convallis ullamcorper.'),
(4, '2021-04-11', '4eme article', 'Morbi iaculis purus ut nisl sodales ultrices. Duis vitae aliquam dui, sed laoreet orci. Curabitur est mauris, laoreet id nibh a, mollis ultricies purus. Suspendisse sed mauris tempus, mollis tortor ut, lacinia ex. Sed consectetur lectus ac enim dapibus, quis pellentesque augue tincidunt. Cras vulputate mauris ut velit euismod, cursus tempus turpis pulvinar. Integer ac odio lorem. Maecenas sit amet odio ac arcu pharetra dignissim condimentum et risus. Sed sit amet metus porta, porttitor odio sit amet, pulvinar sapien. Sed eu sapien laoreet, semper dolor at, tincidunt mauris. Pellentesque congue vehicula ante id fringilla.'),
(5, '2021-04-12', '5eme article', '<p>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere. Huius ego nunc auctoritatem sequens idem faciam. Item de contrariis, a quibus ad genera formasque generum venerunt. Quid de Platone aut de Democrito loquar? Bestiarum vero nullum iudicium puto. Alterum significari idem, ut si diceretur, officia media omnia aut pleraque servantem vivere. Cave putes quicquam esse verius. Nulla profecto est, quin suam vim retineat a primo ad extremum. Quem ad modum quis ambulet, sedeat, qui ductus oris, qui vultus in quoque sit? Atque his de rebus et splendida est eorum et illustris oratio.</p>'),
(6, '2021-04-21', '6eme article', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Tu vero, inquam, ducas licet, si sequetur; Dat enim intervalla et relaxat. Quid Zeno? Duo Reges: constructio interrete. Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Etiam beatissimum? Apud imperitos tum illa dicta sunt, aliquid etiam coronae datum;</p>'),
(9, '2021-12-19', 'ARTICLE 19', '<p><span style=\"color: #222222; font-family: \'PT Sans\', \'Droid Sans\', Arial, sans-serif; font-size: 16px;\">Age nunc isti doceant, vel tu potius quis enim ista melius? Dolere malum est: in crucem qui agitur, beatus esse non potest. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Non igitur de improbo, sed de callido improbo quaerimus, qualis Q. Venit ad extremum; Nec lapathi suavitatem acupenseri Galloni Laelius anteponebat, sed suavitatem ipsam neglegebat; Nam, ut paulo ante docui, augendae voluptatis finis est doloris omnis amotio. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Idem etiam dolorem saepe perpetiuntur, ne, si id non faciant, incidant in maiorem.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `chapitres`
--

CREATE TABLE `chapitres` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `manu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapitres`
--

INSERT INTO `chapitres` (`id`, `titre`, `manu`) VALUES
(14, 'CHAPITRE 1 ', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</span></p>'),
(15, 'CHAPITRE 2', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</span></p>'),
(16, 'CHAPITRE 3', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `User` varchar(20) NOT NULL,
  `Password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`User`, `Password`) VALUES
('JeanForteroche', '$2y$10$P4EPrk1AO9GCy1xZhKOjp.52rF1SFAYNUp91VNURbzkINOxeQ9Fti');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `article_commenté` text NOT NULL,
  `cal` text NOT NULL,
  `pseudo` text NOT NULL,
  `contenu` text NOT NULL,
  `signale` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `article_commenté`, `cal`, `pseudo`, `contenu`, `signale`) VALUES
(4, '1er article', '21-03-22 01:17:08', 'francois ', '&lt;p&gt;int&amp;eacute;ressant&amp;nbsp;&lt;/p&gt;', 1),
(7, '4eme article', '21-04-01 12:44:13', 'dupond', '&lt;p&gt;super site&amp;nbsp;&lt;/p&gt;', 1),
(8, '1er article', '21-04-22 03:49:50', 'anonymous', '&lt;p&gt;ah ouais&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 0),
(9, 'ARTICLE 5', '21-04-30 10:56:11', 'didier ', '&lt;p&gt;je n\'y avais pas pens&amp;eacute; merci&amp;nbsp;&lt;/p&gt;', 0),
(10, '2eme article', '21-04-30 11:34:59', 'valentin ', '&lt;p&gt;trop bien&amp;nbsp;&lt;/p&gt;', 0),
(11, '1er article', '21-05-11 01:37:09', 'luc ', '&lt;p&gt;merci !&lt;/p&gt;', 0),
(12, 'ARTICLE 6', '21-06-11 02:01:59', 'vladimir ', '&lt;p&gt;Plus d infos ?&amp;nbsp;&lt;/p&gt;', 0),
(15, 'Article 19', '21-06-19 12:38:37', 'pierre ', '&lt;p&gt;ok&amp;nbsp;&lt;/p&gt;', 0),
(16, 'Article 19', '21-06-19 12:38:43', 'paul ', '&lt;p&gt;super&amp;nbsp;&lt;/p&gt;', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titre` (`titre`);

--
-- Indexes for table `chapitres`
--
ALTER TABLE `chapitres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chapitres`
--
ALTER TABLE `chapitres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
