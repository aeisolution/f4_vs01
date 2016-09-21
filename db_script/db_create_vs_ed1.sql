-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2016 at 11:45 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vs_ed1`
--

-- --------------------------------------------------------

--
-- Table structure for table `attivita`
--

CREATE TABLE `attivita` (
  `ID` int(11) NOT NULL,
  `TicketId` int(11) NOT NULL,
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OperatoreId` int(11) NOT NULL,
  `Descrizione` text,
  `Completato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID`, `Nome`) VALUES
(1, 'Amministrazione'),
(2, 'Telefonia'),
(3, 'Adsl');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `ID` int(11) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `ComuneId` int(11) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ID`, `Cognome`, `Nome`, `ComuneId`, `Telefono`, `Email`, `Note`) VALUES
(1, 'Maddalena', 'Andrea', 2, '', '', ''),
(3, 'Verdi', 'Marco', 2, '', '', ''),
(4, 'Rossi', 'Mario', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comuni`
--

CREATE TABLE `comuni` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comuni`
--

INSERT INTO `comuni` (`ID`, `Nome`) VALUES
(1, 'Palermo'),
(4, 'Caltanissetta'),
(5, 'Agrigento'),
(6, 'Roma'),
(7, 'Milano'),
(8, 'Messina');

-- --------------------------------------------------------

--
-- Table structure for table `operatori`
--

CREATE TABLE `operatori` (
  `ID` int(11) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `ComuneId` int(11) DEFAULT NULL,
  `RepartoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operatori`
--

INSERT INTO `operatori` (`ID`, `Cognome`, `Nome`, `ComuneId`, `RepartoId`) VALUES
(2, 'Operatore 1', 'Andrea', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reparti`
--

CREATE TABLE `reparti` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reparti`
--

INSERT INTO `reparti` (`ID`, `Nome`) VALUES
(1, 'Staff'),
(2, 'Tecnico2');

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `ID` int(11) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Autore` varchar(100) NOT NULL,
  `Descrizione` varchar(1000) NOT NULL,
  `Nomefile` varchar(250) NOT NULL,
  `Dimensione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`ID`, `Titolo`, `Autore`, `Descrizione`, `Nomefile`, `Dimensione`) VALUES
(1, 'Logo BT', 'BT Italia', 'file di prova', 'BT_600x400.png', 104716),
(2, 'non specificato', 'non specificato', '', 'IIS Express php.txt', 294);

-- --------------------------------------------------------

--
-- Table structure for table `stati`
--

CREATE TABLE `stati` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Colore` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stati`
--

INSERT INTO `stati` (`ID`, `Nome`, `Colore`) VALUES
(1, 'Aperto', ''),
(2, 'Chiuso', ''),
(3, 'Lavorazione', ''),
(4, 'Presa in carico', ''),
(5, 'Risolto', ''),
(6, 'Sospeso', ''),
(7, 'Annullato', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ID` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Oggetto` varchar(100) NOT NULL,
  `Descrizione` text NOT NULL,
  `CategoriaId` int(11) DEFAULT NULL,
  `StatoId` int(11) DEFAULT NULL,
  `DataClose` datetime NOT NULL,
  `OperatoreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `ClienteId`, `Data`, `Oggetto`, `Descrizione`, `CategoriaId`, `StatoId`, `DataClose`, `OperatoreId`) VALUES
(1, 1, '2016-09-15 12:21:01', 'Prova', 'Testo di descrizione\r\nprova\r\nprova', 0, 0, '0000-00-00 00:00:00', 0),
(2, 4, '2016-09-15 12:25:59', 'problemi di fatturazione', 'Ricevuta fattura con data scadenza antecendente alla fattura stessa', 3, 0, '0000-00-00 00:00:00', 0),
(3, 1, '2016-09-16 09:32:55', 'Stato automatico', 'problema generale', 1, 5, '0000-00-00 00:00:00', 2),
(4, 1, '2016-09-16 12:30:59', 'Prova gestione', 'nuovo ticket inserito', 3, 6, '0000-00-00 00:00:00', 2),
(5, 4, '2016-09-21 10:06:16', 'richiesta rimborso', 'fatturazione duplicata', 1, 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_work`
--

CREATE TABLE `tickets_work` (
  `ID` int(11) NOT NULL,
  `TicketId` int(11) NOT NULL,
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `StatoId` int(11) NOT NULL,
  `OperatoreId` int(11) NOT NULL,
  `RepartoId` int(11) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets_work`
--

INSERT INTO `tickets_work` (`ID`, `TicketId`, `Data`, `StatoId`, `OperatoreId`, `RepartoId`, `Note`) VALUES
(1, 3, '2016-09-16 12:18:17', 3, 2, 0, 'vsvsvsdvsd'),
(2, 3, '2016-09-16 12:28:21', 6, 2, 0, ''),
(3, 4, '2016-09-16 12:31:45', 3, 2, 0, 'effettuata verifica del contratto della linea adsl'),
(4, 4, '2016-09-16 12:36:41', 6, 2, 0, ''),
(5, 3, '2016-09-16 12:49:33', 1, 2, 1, 'ssssss'),
(6, 3, '2016-09-16 12:49:43', 2, 0, 0, ''),
(7, 3, '2016-09-16 12:52:50', 5, 2, 0, 'ssssss'),
(8, 3, '2016-09-16 12:55:22', 5, 2, 0, 'ssssss'),
(9, 5, '2016-09-21 10:13:19', 4, 2, 2, 'preso in carico per analisi ....'),
(10, 5, '2016-09-21 10:14:18', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`) VALUES
(1, 'a.maddalena', 'andrea');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vclienti`
--
CREATE TABLE `vclienti` (
`ID` int(11)
,`Cognome` varchar(100)
,`Nome` varchar(100)
,`ComuneId` int(11)
,`Telefono` varchar(30)
,`Email` varchar(150)
,`Note` text
,`Comune` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `voperatori`
--
CREATE TABLE `voperatori` (
`ID` int(11)
,`Cognome` varchar(100)
,`Nome` varchar(100)
,`ComuneId` int(11)
,`RepartoId` int(11)
,`Reparto` varchar(100)
,`Comune` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtickets`
--
CREATE TABLE `vtickets` (
`ID` int(11)
,`ClienteId` int(11)
,`Data` datetime
,`Oggetto` varchar(100)
,`Descrizione` text
,`DataClose` datetime
,`CategoriaId` int(11)
,`StatoId` int(11)
,`Categoria` varchar(100)
,`Stato` varchar(50)
,`Cliente` varchar(201)
,`OperatoreId` int(11)
,`Operatore` varchar(201)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtickets_work`
--
CREATE TABLE `vtickets_work` (
`ID` int(11)
,`TicketId` int(11)
,`Data` datetime
,`StatoId` int(11)
,`OperatoreId` int(11)
,`RepartoId` int(11)
,`Note` text
,`Reparto` varchar(100)
,`Stato` varchar(50)
,`Operatore` varchar(201)
);

-- --------------------------------------------------------

--
-- Structure for view `vclienti`
--
DROP TABLE IF EXISTS `vclienti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vclienti`  AS  select `clienti`.`ID` AS `ID`,`clienti`.`Cognome` AS `Cognome`,`clienti`.`Nome` AS `Nome`,`clienti`.`ComuneId` AS `ComuneId`,`clienti`.`Telefono` AS `Telefono`,`clienti`.`Email` AS `Email`,`clienti`.`Note` AS `Note`,`comuni`.`Nome` AS `Comune` from (`clienti` left join `comuni` on((`clienti`.`ComuneId` = `comuni`.`ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `voperatori`
--
DROP TABLE IF EXISTS `voperatori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `voperatori`  AS  select `operatori`.`ID` AS `ID`,`operatori`.`Cognome` AS `Cognome`,`operatori`.`Nome` AS `Nome`,`operatori`.`ComuneId` AS `ComuneId`,`operatori`.`RepartoId` AS `RepartoId`,`reparti`.`Nome` AS `Reparto`,`comuni`.`Nome` AS `Comune` from ((`operatori` left join `reparti` on((`operatori`.`RepartoId` = `reparti`.`ID`))) left join `comuni` on((`operatori`.`ComuneId` = `comuni`.`ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vtickets`
--
DROP TABLE IF EXISTS `vtickets`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtickets`  AS  select `tickets`.`ID` AS `ID`,`tickets`.`ClienteId` AS `ClienteId`,`tickets`.`Data` AS `Data`,`tickets`.`Oggetto` AS `Oggetto`,`tickets`.`Descrizione` AS `Descrizione`,`tickets`.`DataClose` AS `DataClose`,`tickets`.`CategoriaId` AS `CategoriaId`,`tickets`.`StatoId` AS `StatoId`,`categorie`.`Nome` AS `Categoria`,`stati`.`Nome` AS `Stato`,concat(`clienti`.`Cognome`,' ',`clienti`.`Nome`) AS `Cliente`,`tickets`.`OperatoreId` AS `OperatoreId`,concat(`operatori`.`Cognome`,' ',`operatori`.`Nome`) AS `Operatore` from ((((`tickets` left join `categorie` on((`tickets`.`CategoriaId` = `categorie`.`ID`))) left join `stati` on((`tickets`.`StatoId` = `stati`.`ID`))) left join `clienti` on((`tickets`.`ClienteId` = `clienti`.`ID`))) left join `operatori` on((`tickets`.`OperatoreId` = `operatori`.`ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vtickets_work`
--
DROP TABLE IF EXISTS `vtickets_work`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtickets_work`  AS  select `tickets_work`.`ID` AS `ID`,`tickets_work`.`TicketId` AS `TicketId`,`tickets_work`.`Data` AS `Data`,`tickets_work`.`StatoId` AS `StatoId`,`tickets_work`.`OperatoreId` AS `OperatoreId`,`tickets_work`.`RepartoId` AS `RepartoId`,`tickets_work`.`Note` AS `Note`,`reparti`.`Nome` AS `Reparto`,`stati`.`Nome` AS `Stato`,concat(`operatori`.`Cognome`,' ',`operatori`.`Nome`) AS `Operatore` from (((`tickets_work` left join `operatori` on((`tickets_work`.`OperatoreId` = `operatori`.`ID`))) left join `reparti` on((`tickets_work`.`RepartoId` = `reparti`.`ID`))) left join `stati` on((`tickets_work`.`StatoId` = `stati`.`ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comuni`
--
ALTER TABLE `comuni`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `operatori`
--
ALTER TABLE `operatori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reparti`
--
ALTER TABLE `reparti`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stati`
--
ALTER TABLE `stati`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickets_work`
--
ALTER TABLE `tickets_work`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comuni`
--
ALTER TABLE `comuni`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `operatori`
--
ALTER TABLE `operatori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reparti`
--
ALTER TABLE `reparti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stati`
--
ALTER TABLE `stati`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tickets_work`
--
ALTER TABLE `tickets_work`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
