-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : db5005933086.hosting-data.io
-- Généré le : jeu. 02 déc. 2021 à 16:49
-- Version du serveur :  10.5.10-MariaDB-1:10.5.10+maria~buster-log
-- Version de PHP : 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs4972359`
--

-- --------------------------------------------------------

--
-- Structure de la table `commission_stage`
--

CREATE TABLE `commission_stage` (
  `id` int(11) NOT NULL,
  `name` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `commission_stage`
--

INSERT INTO `commission_stage` (`id`, `name`) VALUES
(1, 'CGPI'),
(2, 'Partenaire');

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `lotProgramName` varchar(1111) NOT NULL,
  `lotNumero` varchar(1111) NOT NULL,
  `room` int(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `stage` varchar(1111) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `lotsDate` varchar(1111) NOT NULL,
  `honorary` int(255) NOT NULL,
  `available` varchar(1111) NOT NULL,
  `planImg` varchar(52520) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

CREATE TABLE `programs` (
  `id` int(255) NOT NULL,
  `programName` text NOT NULL,
  `programPromoter` text NOT NULL,
  `programImg` varchar(52520) NOT NULL,
  `programDescription` text NOT NULL,
  `programActability` text NOT NULL,
  `programFiscality` text NOT NULL,
  `programDateDelivery` text NOT NULL,
  `programCommission` text NOT NULL,
  `programAdress` text NOT NULL,
  `programCity` text NOT NULL,
  `programPostalCity` varchar(10) NOT NULL,
  `programZoneFiscal` text NOT NULL,
  `programTypologie` varchar(1111) NOT NULL,
  `programDocuments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `programs`
--

INSERT INTO `programs` (`id`, `programName`, `programPromoter`, `programImg`, `programDescription`, `programActability`, `programFiscality`, `programDateDelivery`, `programCommission`, `programAdress`, `programCity`, `programPostalCity`, `programZoneFiscal`, `programTypologie`, `programDocuments`) VALUES
(156, 'Variations', 'Vallorissimo', '61a88991438f29.19517729.jpg', 'Toulouse, la ville rose\r\n\r\nPrisée pour sa qualité de vie, Toulouse collectionne les succès : 1ère métropole française pour la croissance économique, l’évolution démographique, la création d’emplois et l’investissement en R&amp;D.\r\n \r\nRésidence\r\n\r\nPour trouver un ensoleillement optimal et de grandes ouvertures sur les espaces boisés, une implantation en gradins a été privilégiée. Les bâtiments émergents, placés essentiellement en lisière, offrent l’intimité recherchée et des vues dégagées sur le paysage environnant, grâce à leurs balcons filants, leurs loggias ou larges jardins privatifs.', 'Oui', 'PINEL', '3T 2023', '7%', '113 route de labege', 'TOULOUSE', '31400', 'B1', '', '61a889914537d0.86093703.'),
(157, 'Olympie', 'Vallorissimo', '61a88ae7c59cc9.92396691.jpg', 'Département\r\n\r\nAvec 2 007 684 habitants le département des Bouches-du-Rhône est le troisième département le plus peuplé de France. \r\n\r\nIstres\r\n\r\nUne ville très agréable, calme et paisible. A l\'écart des touristes l\'été, Istres est une ville où il fait bon vivre, bordée par l\'étang de berre et celui de L\'olivier. Istres est lune des villes les plus agréables des bouches du Rhône.\r\n\r\nRésidence\r\n\r\nLa résidence est connectée, ce qui permet depuis un smartphone de commander vos volets, éclairages, chauffages... Chaque logement est composé d\'un jardin ou d\'une grande terrasse. Les logements Olympie sont spacieux et lumineux pour apprécier l\'art de vivre à la Provençale.', 'Non', 'PINEL', '3T 2023', '7%', 'Chemin de la croix', 'ISTRES', '13800', 'A', '', '61a88ae7c5cb78.05624129.jpg'),
(158, 'Konnect', 'Vallorissimo', '61a88c5c8034c6.41625088.jpg', 'Metz?\r\n?\r\nMetz, ville d\'aujourd\'hui ! Tout proche de la frontière avec le Luxembourg et l’Allemagne, Metz est une ville à taille humaine où il fait bon vivre. Avec la qualité de vie comme priorité, Metz Nord amorce sa modernisation pour tirer le meilleur parti d’un emplacement idéal. Dynamique et vivante, Metz vit au rythme de la nature, de la culture, du sport et de la gastronomie !?\r\n?\r\nRésidence?\r\n?\r\nLe style moderne de la résidence se poursuit à l’intérieur avec des appartements fonctionnels et lumineux. Les grandes surfaces vitrées laissent entrer la lumière naturelle et baignent les pièces d’une atmosphère paisible. La résidence est sécurisée avec un accès par digicode et visiophone', 'Non', 'PINEL', '2T 2024', '7%', '112 avenue de thionville', 'METZ', '57050', 'B1', '', '61a88c5c804620.02258988.'),
(159, 'Les allées Esterel', 'Pichet', '61a88e477ed352.04793949.jpeg', 'Département: ?\r\n?\r\nLe Var est assurément l\'un des plus beaux départements de France et détient 400 Km de littoraux.?\r\n?\r\nFréjus?\r\n?\r\nSituée au bord de la Méditerranée, Fréjus est une ville historique du Var. Cette station balnéaire dispose d’un emplacement géographique privilégié, à mi-chemin entre Saint-Tropez et Cannes.?\r\n?\r\nRésidence  ?\r\n?\r\nAlliant luminosité et fonctionnalité, les appartements des Allées Esterel sont la certitude d’un confort de vie idéal.', 'Oui', 'PINEL', '4T 2023', '8%', '578 Chemin de la vernède', 'Frejus', '83600', 'A', '', '61a88e477f1b27.67752277.'),
(160, 'Les allées de Jade', 'Pichet', '61a88f971d63f9.32613719.jpeg', 'Région Provence-Alpes-Côte d\'Azur :?\r\n?\r\nLa Provence est une région du sud-est de la France située à la frontière de l\'Italie et au bord de la mer Méditerranée. Elle est réputée pour ses paysages variés, des Alpes du Sud et des plaines de Camargue aux vignobles vallonnés et aux oliveraies en passant par les forêts de pins et les champs de lavande.?\r\n?\r\nQuartier Sainte Barbe?\r\n?\r\n6 minutes du centre-ville, établissements scolaires à moins de 5 minutes, 30 minutes du bord de mer.?\r\n?\r\nRésidence : ?\r\n?\r\nElle offre un cadre de vie privilégié au cœur d’un environnement boisé et verdoyant. Tous les appartements sont lumineux et pensés pour vous apporter la douceur du soleil provençal.', 'Oui', 'PINEL', '4T 2023', '8%', 'Avenue Aubanel', 'Draguignan', '83300', 'B1', '', '61a88f971da504.63274991.'),
(161, 'Le Côteau de Villoison', 'Pichet', '61a8922027e829.79606475.webp', 'Département : ?\r\n?\r\nElle a tout pour plaire. Que l\'on soit étudiant, jeune actif, quadra ou senior, la Haute-Garonne attire par sa douceur de vivre. Pour son dynamisme, sa qualité de vie, son accès à l\'enseignement supérieur, aux soins, pour la famille.?\r\n?\r\nQuartier?\r\n?\r\nSituée dans un environnement pavillonnaire des plus tranquilles et proche des commerces, la résidence offre un cadre de vie agréable et verdoyant. Possédant une large gamme de services et de nombreuses infrastructures scolaires, Villabé saura séduire les familles et les jeunes actifs souhaitant s’installer à proximité de Paris et des zones d’emploi du sud de la capitale?\r\n?\r\nRésidence ?\r\n?\r\nL’ensemble Le Coteau de Villoison a été pensé comme un petit hameau. Les maisons proposent des pièces de vie orientées plein sud et disposent de jardins privatifs avec des vues sur la vallée de l’Essonne. ?\r\n?', 'Oui', 'PINEL', '4T 2023', '8%', '1 côte d\'ormoy', 'Villabe', '91100', 'A', '', '61a89220280139.76156481.'),
(162, 'Les Villas du Parc', 'Valorissimo', '61a892f7cc4799.89425229.jpeg', '?\r\nNancy :?\r\n?\r\nParticulièrement attractive pour sa vie universitaire et célèbre pour son patrimoine classé à l’UNESCO, la ville appartient aux grandes agglomérations qui font la richesse de l’Est de la France. À seulement 1h30 de Paris par le TGV, sa situation centrale, au carrefour des grands axes européens, lui permet d’être connectée facilement aux grandes capitales.?\r\n?\r\nQuartier sud de la ville?\r\n?\r\nLes Villas du Parc doivent leur nom notamment aux ?\r\nmaisons situées au cœur du projet. Avec des agencements?\r\nétudiés pour une intimité préservée, chaque maison possède un?\r\njardin privatif agrémenté d’une terrasse.', 'Non', 'PINEL', '4T 2023', '7%', 'Rue Jean Monnet', 'Nancy', '54100', 'B1', '', '61a892f7cc5c58.40927289.'),
(163, 'Cote Garonne', 'Pichet', '61a89410640015.45144441.jpg', 'Bordeaux et sa région : ?\r\n?\r\n1,2 million d\'habitants, plus de 14 000 nouveaux arrivants par an, 3ème agglomération pour le nombre de créations d’entreprises?\r\n?\r\nLormont?\r\n?\r\nSituée au nord-est de Bordeaux, Lormont bénéficie du rayonnement de la Métropole dont elle est membre?\r\n?\r\nUn nouveau quartier ?\r\n?\r\nLes passerelles de Garonne se situe à côté de nombreux commerces et services accessible avec des modes de transport doux. Le quartier possède de magnifiques panoramas sur le rive gauche et est aussi un cadre de vie idéal pour les familles et les jeunes actifs.', 'Oui', 'PINEL', '2T 2023', '8%', 'Rue Banlin', 'LORMONT', '33310', 'B1', '', '61a89410641501.36875206.'),
(164, 'Le 38', 'Valorissimo', '61a894dde9e462.00346937.jpg', 'Quartier du Palais des Rois de majorque?\r\n?\r\nLa résidence se situe en cœur de ville, à 100 m du Palais des Rois de Majorque, œuvre majeure du patrimoine catalan. Cette localisation idéale dans le quartier art déco permettra aux futurs occupants de se rendre à pied à tous les commerces de proximité, d’accéder directement aux lignes de bus, mais également de profiter des commerces et des restaurants du cœur de ville.?\r\n?\r\nRésidence?\r\n?\r\nLa résidence LE 38 bénéficie d\'une architecture contemporaine et élégante grâce à l\'alternance en façade de larges ouvertures vitrées et d\'habillage en tôle perforée. Les volumes intérieurs et les prestations ont été pensés pour apporter confort et bien-être aux occupants avec un impact environnemental réduit.', 'Non', 'PINEL', '4T 2022', '7%', '38 avenue Gilbert Brutus', 'PERPIGNAN', '66000', 'B1', '', '61a894dde9f325.32050372.'),
(165, 'Hevea', 'Tagerim', '61a8957174ed14.48471283.jpg', 'Bordeaux : ?\r\n?\r\n10 000 Nouvelles entreprises, 115 000 étudiants, ville située à 2h de Paris grâce à la LGV Paris/Bordeaux.?\r\n?\r\nBruges?\r\n?\r\nÀ quelques minutes du cœur de Bordeaux, Bruges offre un cadre de vie très nature qui s’harmonise avec un caractère résolument urbain.?\r\n?\r\nLa résidence  ?\r\n?\r\nHévéa, entre ville et nature, une résidence proche de vous. Célibataires, jeunes couples ou familles trouveront aisément leurs marques dans ces appartements, du 2 au 5 pièces. La majorité des appartements s’ouvrent sur des jardins privatifs, balcons, loggias ou terrasses. Chacun révèle de beaux volumes profitant d’aménagements optimums : cuisine ouverte, salle de bains équipée, espace nuit intimiste...?', 'Octobre 2022', 'PINEL', '4T 2023', '6%', 'Avenue Charles de Gaulle', 'BRUGES', '33520', 'B1', '', '61a89571750b26.81085353.'),
(166, 'Le Verger des Farelles', 'Cogedim', '61a897b00d86f6.43883755.', 'Garons?\r\n?\r\nSituée sur le plateau des Costières, grande plaine agricole où les vignes se mêlent aux vergers, la ville de Garons offre l’opportunité d’une vie au calme, proche de la nature, tout en restant aux portes de la cité nîmoise. Petite commune de presque 5 000 habitants, son centre ville comporte tous les services qui animent et facilitent le quotidien : crèches, écoles primaires, commerces de proximité, médiathèque, équipements sportifs et de nombreux praticiens médicaux.?\r\n?\r\nRésidence ?\r\n?\r\nLes logements ont été imaginés pour procurer confort et qualité de vie aux futurs résidents. Les surfaces et la bonne répartition des mètres carrés entre les différents espaces de vie nourrissent un sentiment de bien-être. Profitant de beaux volumes et de généreuses ouvertures, les intérieurs privilégient les teintes claires, optimisant ainsi les reflets d’une lumière douce et naturelle.', 'Janvier 2022', 'PINEL', '3T 2023', '8%', '2 rue Cyrano de Bergerac', 'Garons', '30128', 'B1', '', '61a897b00d87c4.36680866.'),
(167, 'Le Jardin Majorelle', 'Pichet', '61a89cc947b1c7.30266542.jpg', 'Département : ?\r\n?\r\nPlus grand département français, la Gironde est un territoire aux multiples richesses naturelles, grâce à ses paysages contrastés, des vignes du Médoc à la fameuse Dune du Pilat, sans oublier les bords de Garonne.?\r\n?\r\nBordeaux Métropole?\r\n?\r\nLa métropole bordelaise attire des visiteurs, des habitants, mais aussi des entreprises. ?\r\n?\r\nRésidence?\r\nNiché sur les hauteurs de Cenon, au cœur d’un quartier résidentiel, Le Jardin Majorelle bénéficie d’un cadre calme et reposant. Compromis parfait entre sérénité et dynamisme, son environnement compte de nombreux commerces et services de proximité?', 'Oui', 'PINEL', '3T 2023', '8%', 'Avenue René Casagne', 'CENON', '33150', 'B1', '', '61a89cc947cb46.62611669.'),
(168, 'Passage Saint Germain', 'Valorissimo', '61a89e56382b29.72501222.jpg', 'La ville :?\r\n?\r\n9ème commune de France, Ville portuaire, 1,2 million d\'habitants, plus de 14 000 nouveaux arrivants par an, 3ème agglomération pour le nombre de créations d’entreprises.?\r\n?\r\nQuartier Amédée ?\r\n?\r\nCe secteur paisible est émaillé d’échoppes traditionnelles et de commerces animés. Le quartier Amédée Saint-Germain s’attache à perpétuer cet héritage architectural : cohérence et régularité des bâtiments, minéralité, façades sobres, hautes arcades, tout en construisant sa propre identité contemporaine.?\r\n?\r\nLa résidence?\r\n?\r\nPar la richesse et la diversité de ses appartements, la résidence Passages Saint-Germain répond à toutes les envies. Du studio au 5 pièces, certains appartements se déclinent même en duplex. ?', 'Oui', 'PINEL', '3T 2023', '7%', 'Rue Amédée Saint Germain', 'BORDEAUX', '33800', 'B1', '', '61a89e56384546.90089062.'),
(169, 'NAO', 'Cogedim', '61a89f97d7f078.20784710.jpg', 'Toulouse et sa région : ?\r\n?\r\n5,8 millions d\'habitants, la région Occitanie compte également près de 30 000 chercheurs, 15 pôles de compétitivité,  227 148 étudiants et 35 grandes écoles et universités?\r\n?\r\nToulouse, la ville rose?\r\n?\r\nAvec plus de 1 330 000 habitants, Toulouse est la 4ème aire urbaine de France. Elle est un modèle de réussite par la richesse de son patrimoine?\r\n?\r\nRésidence ?\r\n?\r\nOpter pour un cadre de vie confortable et des prestations soignées. L’espace intérieur, ingénieusement agencé et équipé de matériaux de qualité, se prolonge par une grande terrasse ou un jardin privatif qui offre de belles vues dégagées. Le dessin paysager de Nao s’articule autour de nombreuses essences et d’un agréable îlot de fraîcheur en coeur de résidence.?', 'Oui', 'PINEL', '2T2023', '8%', '7 rue Claude Bernard ', 'Toulouse', '31200', 'PINEL', '', '61a89f97d811c1.73818031.'),
(170, 'Pure Valescure', 'Cogedim', '61a8a09ae7c8f6.53100550.jpg', 'Département: ?\r\n?\r\nNichée entre la forêt des Maures et le massif de l’Esterel, la Communauté d’Agglomération Var Esterel Méditerranée jouit d’une attractivité exceptionnelle. Face à la Méditerranée, elle constitue une destination recherchée par les investisseurs, qui souhaitent convertir leur bien en une résidence secondaire.?\r\n?\r\nFréjus?\r\n?\r\nAu cœur d’un bassin d’emplois de près de 1700 entreprises réparties en 29 zones d’activités, l’adresse garantit le succès de votre placement immobilier?\r\n?\r\nRésidence  ?\r\n?\r\nMarquée par l’élégance contemporaine, la réalisation dévoile un cœur d’ilot arboré avec piscine privée et pool house.?', 'Oui', 'PINEL', '3T 2023', '8%', 'Chemin Valescure', 'Fréjus', '83600', 'A', '', '61a8a09ae824a0.06610514.'),
(171, 'Hôtel NCA', 'Angelys', '61a8a32c53d171.39203912.jpg', 'Nice : ?\r\n?\r\nNice, capitale du département des Alpes-Maritimes sur la Côte d\'Azur, se dresse sur les rives caillouteuses de la Baie des Anges. Fondée par les Grecs et plus tard une retraite pour l\'élite européenne du XIXe siècle, la ville a également longtemps attiré des artistes.?\r\n?\r\nRésidence?\r\n?\r\nSituée dans un quartier calme résidentiel de la ville, HÔTEL NCA est une résidence à proximité des commerces, des transports, des centres de loisirs et établissements de services. La résidence vous propose un éventail de logements studio qui s’étendent sur des balcons. ', 'Oui', 'TOURISME', '3T 2024', '8%', 'Avenue Costa Bella', 'Nice', '6200', 'A', '', '61a8a32c53e412.01957782.'),
(172, 'Stud\'Campus', 'Cogedim', '61a8a3fc95b861.08770141.jpg', 'Roubaix?\r\n?\r\nEn périphérie de Lille, Roubaix n’a rien à envier à sa belle voisine ! Portée par un vent de renouveau et son dynamisme permanent, elle séduit par ses dimensions à taille humaine et son atmosphère accueillante si propre aux villes des Hauts-de-France.?\r\n?\r\nRésidence?\r\n?\r\nSituée à 15 mn à pied du cœur de Roubaix, la résidence s’inscrit dans le quartier universitaire, à deux pas de l’Institut du Marketing et du Management de la Distribution, de l’IUT, de l’École Supérieure Arts Appliqués et Textile et d’un site de l’Université de Lille dédié aux langues étrangères. Pratique pour le quotidien des étudiants, l’adresse bénéficie d’une grande variété de commerces et de restaurants. Proche d’infrastructures sportives et culturelles de renom comme le Colisée et le centre nautique Thalassa, elle est parfaitement connectée à la métropole et à ses centres d’intérêt.?', 'Oui', 'Etudiants', '3T 2023', '8,40%', 'Rue de l\'Ouest', 'ROUBAIX', '59100', 'B1', '', '61a8a3fc95f097.07406648.'),
(173, 'West Campus', 'CAP WEST', '61a8a5347b5b76.35668941.jpg', 'Département : ?\r\n?\r\n1er bassin d’emploi en région avec + de 20 000 entreprises implantées, elle est la destination touristique majeure en France.?\r\n?\r\nTours métropole?\r\n?\r\nTours métropole mise sur l’économie de la connaissance et fait de l’innovation un levier de compétitivité autour de savoir-faire dans les domaines de la micro-électronique, de la santé et de l’intelligence des patrimoine?\r\n?\r\nQuartier Chambray?\r\n?\r\nVille incontournable à l’entrée de la Métropole tourangelle, Chambray-Lès-Tours est réputée pour sa qualité de vie.', 'Oui', 'Etudiants', '1T 2023', '12%', 'Avenue Alexandre Minkewski', 'Chambray-les-tours', '37170', 'B1', '', '61a8a5347b7033.50560268.'),
(174, 'Newton', 'Pichet', '61a8f49e4b65a9.74415174.jpeg', 'Angers\r\n\r\nAu coeur d’une communauté urbaine de près de 300 000 habitants, Angers a su préserver et mettre en valeur son environnement naturel. C’est d’ailleurs la première ville verte de France. Elle se positionne également en tête dans le secteur du végétal grâce à Vegepolys Valley, son pôle mondial de compétitivité.\r\n\r\nRésidence\r\n\r\nNewTown constitue l’accord parfait entre un cadre de vie agréable et une proximité immédiate avec tous les services utiles au quotidien.\r\nTous les appartements du T2 au T4 offrent de généreux espaces extérieurs (loggias, balcons, terrasses) pour se détendre dans une ambiance tranquille.\r\nLa résidence vous propose également un environnement chaleureux avec des espaces communs fortement végétalisés, notamment un parc arboré et un verger.\r\nProfitez d’un cadre à la fois paisible et urbain à NewTown', 'Avril 2022', 'PINEL', '3T 2024', '8%', 'Rue des grands châlets', 'Angers', '49000', 'B1', '', '61a8f49e4d7ed8.61968388.'),
(175, 'Loreden Connexion', 'Pichet', '61a8f84cd657b4.34363167.jpeg', 'Bordeaux une métropole rayonnante\r\n\r\nAu cœur du plus grand département de France, entre les coteaux viticoles et les plages océanes, la métropole de Bordeaux s’est totalement métamorphosée ces dernières années pour devenir une agglomération européenne de premier plan. Terre de prédilection des start-up, des cadres français, des touristes, la Métropole propose un cadre de vie particulièrement privilégié. Les nouvelles ambitions écologiques et les grands projets d’équipement font aujourd’hui de Bordeaux une ville résolument tournée vers les enjeux futurs.\r\n\r\nConnexion à la ville\r\n\r\nTout est pensé à Connexion pour faciliter la mobilité des habitants vers le centre-ville et la rive droite en général. Les modes de transport doux sont naturellement privilégiés puisque la place centrale du quartier sera le débouché de la Brazzaligne combinant transport en commun et piste cyclable. Avec l’implantation d’un nouvel arrêt de Batcub à deux pas des résidences et l’arrêt de tramway La Buttinière à quelques minutes à pied, les habitants bénéficient de facilités de déplacement nombreuses.', 'Oui', 'PINEL', '1T 2024', '8%', 'l\'hermitage sud', 'Lormont', '33 310', 'B1', 'Du T2 au T3', '61a8f84cd6ad68.08094798.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userType` varchar(111) NOT NULL DEFAULT 'user',
  `initials` varchar(111) NOT NULL,
  `tel` int(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(1500) NOT NULL,
  `passwordConfirmation` varchar(1500) NOT NULL,
  `commissionStage` varchar(111) NOT NULL,
  `commissionRate` int(111) NOT NULL,
  `token` varchar(1111) DEFAULT NULL,
  `rtoken_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userType`, `initials`, `tel`, `email`, `password`, `passwordConfirmation`, `commissionStage`, `commissionRate`, `token`, `rtoken_at`) VALUES
(54, 'admin', 'Aïna(Dev)', 623696984, 'ainapukipuki@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$a24zeklnLzA5Ti9UZzB2cA$lYv1emXaguo3wF0JcC9wUVwNTTuVBA4lT02XjBFlW5w', '$argon2i$v=19$m=65536,t=4,p=1$S1VQc2ZJVXprRVRaL0twLg$UphbjDI8UmiVtPaWTe/zBI5rsfC9f/6GgxjnuXZBg6k', 'Partenaire', 1000, NULL, NULL),
(55, 'admin', 'Administrateur', 623696984, 'admin@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NmpOaFk4aHkvRUE4SjU4UA$bIuHbX71SIP6PdDvFHJyKZZUcDX/SEKD3K/JOAYjjrQ', '$argon2i$v=19$m=65536,t=4,p=1$dG5HMkU3R3JTbDZrbE9XNw$ncDMb66p3aSxUjwyDkp+30TPJvl63SYIX6RPQa+AsxI', 'Partenaire', 1000, NULL, NULL),
(56, 'user', 'Romain', 12121212, 'romain@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$cERKRExYUE9hZXVmN3Z3Lw$jBvFOYedsracI/hOBs9BO62G/BXBByqze5tK7ZMMSlk', '$argon2i$v=19$m=65536,t=4,p=1$LmxxRDh1RzQwTC5qbG9JSA$YyIFi71801XYizADZY6D1lMVRirXHcjabo1PoiaXmZ0', 'Partenaire', 3, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commission_stage`
--
ALTER TABLE `commission_stage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commission_stage`
--
ALTER TABLE `commission_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
