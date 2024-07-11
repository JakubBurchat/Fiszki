-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 10:11 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiszki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(3, 'internet'),
(4, 'data'),
(5, 'programming'),
(18, 'big data'),
(19, 'data mining'),
(20, 'software licensing');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `userID`, `description`, `topic`) VALUES
(1, 12, 'Test funkcji feedback.', 'Test'),
(3, 12, 'To jest test numer 2.', 'Test2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mode`
--

CREATE TABLE `mode` (
  `ID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `maxpoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`ID`, `name`, `maxpoints`) VALUES
(1, 'wpisywanie', 5),
(2, 'wybór', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `score`
--

CREATE TABLE `score` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `mode` int(11) NOT NULL,
  `points` float NOT NULL,
  `time` int(11) NOT NULL,
  `percent` int(10) NOT NULL,
  `live_mode` tinyint(1) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(96) NOT NULL,
  `admin` tinyint(1) DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `banndate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `login`, `password`, `mail`, `admin`, `banned`, `banndate`) VALUES
(8, 'admin', '$2y$10$MG6f5spSU74U803UaM5FA..DGiuRMDk48MG/JSYOivgYgsdgpdIwy', 'admin@example.com', 1, 0, NULL),
(12, 'user', '$2y$10$efWGDJkTTZ3nbR4skotLqOZCw0o4bwlPkzkfFymTSS9dLU.SbkBre', 'user@example.com', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `word`
--

CREATE TABLE `word` (
  `ID` int(11) NOT NULL,
  `polish` varchar(32) NOT NULL,
  `english` varchar(32) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`ID`, `polish`, `english`, `categoryID`, `description`) VALUES
(111, 'słowo kluczowe', 'keyword', 3, 'Keyword optimization is essential for improving search engine rankings.\r'),
(112, 'przeglądarka', 'browser', 3, 'Safari and Chrome are two of the most popular browsers today.\r'),
(113, 'wyszukiwanie indeksowe', 'indexed search', 3, 'Google\'s indexed search allows for faster results when browsing websites.\r'),
(114, 'link zewnętrzny', 'outside link', 3, 'Including high-quality outside links can improve the credibility of a webpage.\r'),
(115, 'lista wyników wyszukiwania', 'hit list', 3, 'The hit list revealed the top ten websites for the given search query.\r'),
(116, 'wystąpienie', 'occurence', 3, 'The occurrence of fake news has increased significantly in recent years.\r'),
(117, 'kolejka priorytetowa', 'priority queue', 3, 'A priority queue is used to process time-sensitive data first.\r'),
(118, 'istotny/trafny', 'relevant', 3, 'Only relevant articles should be included in academic research papers.\r'),
(119, 'fragment', 'snippet', 3, 'The snippet provided a brief overview of the article before clicking on it.\r'),
(120, 'znaczna część', 'chunk', 3, 'The programmer divided the code into smaller chunks to make it more manageable.\r'),
(121, 'klasyfikować/oceniać', 'to rate', 3, 'The company was able to rate their customer satisfaction based on surveys.\r'),
(122, 'wpis', 'entry', 3, 'Investigators cross-referenced paper orders with computer entries made by the broker.'),
(136, 'wąskie gardło', 'bottleneck', 3, 'The bottleneck in the server caused the website to crash.\r'),
(137, 'uszkodzenie obwodu', 'circuit failure', 3, 'The circuit failure resulted in a power outage throughout the entire building.\r'),
(138, 'obudowywanie danych', 'data encapsulation', 3, 'Data encapsulation is important for protecting sensitive information.\r'),
(139, 'czynnik', 'factor', 3, 'The factor that contributed most to the success of the campaign was effective marketing.\r'),
(140, 'analiza składniowa', 'parsing', 3, 'The parsing of the large dataset took several hours to complete.\r'),
(141, 'stos', 'stack', 3, 'The stack data structure is commonly used in programming languages.\r'),
(142, 'pobierać', 'to fetch', 3, 'The web crawler will fetch information from all linked pages.\r'),
(143, 'zniekształcać', 'to garble', 3, 'The email was garbled due to poor internet connection, making it difficult to read.\r'),
(144, 'fluktuacje', 'jitter', 3, 'Jitter is the variation in delay between packets of data transmitted over a network\r'),
(145, 'pobierać/odnaleźć', 'to retrieve', 3, 'I finally managed to retrieve the deleted data.\r'),
(146, 'przekazywanie znacznika', 'token passing', 3, 'To avoid chaos, the token passing procedure is used, it ensures that not all participants send data to the network at the same time.\r'),
(147, 'przewód', 'wire', 3, 'Don\'t touch those wires whatever you do.\r'),
(165, 'eksploracja danych', 'data mining', 4, 'Data mining is the process of finding anomalies, patterns and correlations within large data sets to predict outcomes.\r'),
(166, 'identyfikacja wzorca', 'pattern identification', 4, 'Pattern identification is the process of finding recurring trends in data set.\r'),
(167, 'modelowanie ilościowe', 'quantitative modelling', 4, 'Quantitative modelling involves using mathematical equations and formulas to represent patterns in data sets.\r'),
(168, 'etykieta klasy', 'class label', 4, '\"A class label assigns a specific category to a data point, such as \"\"male\"\" or \"\"female\"\".\"\r'),
(169, 'przynależność do klasy', 'class membership', 4, 'Class membership refers to the inclusion of a data point in a specific group within a data set.\r'),
(170, 'zmienna objaśniająca', 'explanatory variable', 4, 'An explanatory variable is a factor that is believed to influence the outcome of a data analysis\r'),
(171, 'zmienna', 'variable', 4, 'Variables are factors that can change or influence the results of a data analysis.\r'),
(172, 'odporny na błędy', 'fault-tolerant', 4, 'Fault-tolerant systems are designed to continue functioning despite encountering errors or faults in the data\r'),
(173, 'fałszywy wzorzec', 'spurious pattern', 4, 'Spurious patterns refer to misleading trends or correlations in data that are not causally related.\r'),
(174, 'wartość skrajna', 'outlier', 4, 'Outliers are data points that lie outside of the normal range and may disrupt data analysis.\r'),
(180, 'węzeł wyjściowy', 'burst node', 4, 'Burst nodes indicate a sudden increase in activity or trend in a specific area of a data set.\r'),
(181, 'węzeł losowy', 'chance node', 4, 'Chance nodes represent uncertain outcomes or probabilities in decision tree models.\r'),
(182, 'węzeł decyzyjny', 'decision node', 4, 'Decision nodes are points in a decision tree where a choice must be made between different paths based on specific criteria.\r'),
(183, 'węzeł końcowy', 'end node', 4, 'End nodes mark the final result or conclusion in a decision tree analysis.\r'),
(184, 'liść / węzeł liścia', 'leaf node', 4, 'Leaf nodes refer to the final, most detailed level of categories in a decision tree.\r'),
(185, 'przycinanie sieci', 'network pruning', 4, 'Network pruning is the process of removing unnecessary or incorrect connections within a data network to improve its efficiency.\r'),
(186, 'węzeł zbiorczy', 'sink node', 4, 'Sink nodes collect incoming data from multiple sources and pass it on to other nodes in a data network.\r'),
(187, 'analiza różnicowa', 'differential analysis', 4, 'Differential analysis involves comparing two or more data sets to identify differences or similarities.\r'),
(188, 'zbiór produktów', 'itemset', 4, 'Itemsets refer to groups of items or variables that are often analyzed together.\r'),
(189, 'reszta (w analizie regresji)', 'residual', 4, 'Residuals are the differences between the expected and observed values in a data set after performing a statistical model.\r'),
(250, 'przetwarzanie wsadowe', 'batch processing', 18, 'the method computers use to periodically complete high-volume, repetitive data jobs\r'),
(251, 'klaster', 'cluster', 18, 'group of data points\r'),
(252, 'poufność', 'confidentiality', 18, 'the state of keeping or being kept secret or private\r'),
(253, 'przetwarzanie danych', 'data processing', 18, 'the carrying out of operations on data, especially by a computer, to retrieve, transform, or classify information\r'),
(254, 'odbiorca danych', 'data recipient', 18, 'the accredited organisation or person receiving data\r'),
(255, 'wolumen danych', 'data volume', 18, 'the size of data sets that an organization has collected to be analyzed and processed\r'),
(256, 'zbiór danych', 'data set', 18, 'a collection of related sets of information that is composed of separate elements but can be manipulated as a unit by a computer\r'),
(257, 'zróżnicowane dane', 'disparate data', 18, 'data that are unalike and are distinctly different\r'),
(258, 'przetwarzanie rozproszone', 'distributed processing', 18, 'a specific task can be broken up into functions, and the functions are dispersed across two or more interconnected processors\r'),
(259, 'odporny na błędy', 'fault-tolerant', 18, 'the resilient property that enables a system to continue operating properly in the event of failure\r'),
(260, 'struktura', 'framework', 18, 'a basic structure underlying a system, concept, or text\r'),
(261, 'niejednorodność', 'heterogeneity', 18, 'the quality or state of being diverse in character or content\r'),
(262, 'opóźnienie', 'latency', 18, 'the delay before a transfer of data begins following an instruction for its transfer\r'),
(263, 'wzorzec', 'pattern', 18, 'an example for others to follow\r'),
(264, 'wydajność', 'performance', 18, 'the capabilities of a machine\r'),
(265, 'ogromne ilości danych', 'slew of data', 18, 'a large number of data\r'),
(266, 'tabelaryczna baza danych', 'tabular database', 18, 'a database that is structured in a tabular form\r'),
(267, 'tuple', 'krotka', 18, 'an ordered set of data constituting a record\r'),
(268, 'prędkość', 'velocity', 18, 'the speed of something in a given direction\r'),
(269, 'wiarygodność', 'veracity', 18, 'conformity to facts / accuracy\r'),
(270, 'sztuczna inteligencja', 'artificial intelligence', 19, 'the development or application of computer systems able to perform tasks normally requiring human intelligence '),
(271, 'gałąź', 'branch', 19, 'a conceptual subdivision of a subject\r'),
(272, 'węzeł wyjściowy', 'burst node', 19, 'a node where two or more activities start after it has been completed\r'),
(273, 'etykieta klasy', 'class label', 19, 'the discrete attribute whose value you want to predict based on the values of other attributes\r'),
(274, 'klastrowanie', 'clustering', 19, 'have similar numerical values\r'),
(275, 'współliniowy', 'collinear', 19, 'lying in the same straight line\r'),
(276, 'zbiegające się ścieżki', 'converging paths', 19, 'paths which move towards the same point where they join or meet\r'),
(277, 'drzewo decyzyjne', 'decision tree', 19, 'a non-parametric supervised learning algorithm, which is utilized for both classification and regression tasks\r'),
(278, 'rozszerzenie', 'extension', 19, 'a part that is added to something to enlarge or prolong it\r'),
(279, 'schemat blokowy', 'flow chart', 19, 'a graphical representation of a computer program in relation to its sequence of functions\r'),
(280, 'prognozowanie', 'forecasting', 19, 'a calculation or estimate of future events, especially coming weather or a financial trend\r'),
(281, 'niejednorodny', 'heterogeneous', 19, 'diverse in character or content\r'),
(282, 'niedoskonały', 'imperfect', 19, 'not perfect / faulty or incomplete\r'),
(283, 'zmienna wejściowa', 'input variable', 19, 'data that is fed into an algorithm\r'),
(284, 'dane historyczne', 'legacy data', 19, 'information that is stored in outdated or obsolete systems, formats, or technologies\r'),
(285, 'przycinanie sieci', 'network pruning', 19, 'to reduce a heavy network to obtain a light-weight form by removing redundancy\r'),
(286, 'wartość skrajna', 'outlier', 19, 'a data point on a graph or in a set of results that is very much bigger or smaller than the next nearest data point\r'),
(287, 'rozpoznanie wzorców', 'pattern recognition', 19, 'a data analysis method that uses machine learning algorithms to automatically recognize regularities in data\r'),
(288, 'równanie regresji', 'regression equation', 19, 'formula assesses the relationship between the dependent and independent variables\r'),
(289, 'podzbiór', 'subset', 19, 'a set of which all the elements are contained in another set\r'),
(290, 'kopia zapasowa', 'backup copy', 20, 'a duplicate instance of a data file, application, system or server\r'),
(291, 'współużytkownik', 'concurrent user', 20, 'people simultaneously accessing or using the resource\r'),
(292, 'właściciel praw autorskich', 'copyright holder', 20, 'person who owns the exclusive rights of ownership\r'),
(293, 'rdzeń', 'core', 20, 'the part of something that is central to its existence\r'),
(294, 'wyłączne prawa', 'exclusive rights', 20, 'an action or acquire a benefit and to permit or deny others the right to perform the same action or to acquire the same benefit\r'),
(295, 'opłata', 'fee', 20, 'money paid as part of a special transaction, for example for a privilege or for admission to something\r'),
(296, 'kluczowa funkcja', 'key feature', 20, 'those features of the Scheme that are necessary for it to comply with\r'),
(297, 'serwer sieciowy', 'network server', 20, 'powerful computer that act as central repositories within a network environment, offering a variety of shared resources to other computers in the network\r'),
(298, 'zainstalowany fabrycznie', 'pre-installed', 20, 'already installed on a device at the time of purchase\r'),
(299, 'udoskonalenie', 'refinement', 20, 'the improvement or clarification of something by the making of small changes\r'),
(300, 'plomba', 'seal', 20, 'a thing regarded as a confirmation or guarantee of something\r'),
(301, 'warunki korzystania', 'terms of use', 20, 'the rules, specifications, and requirements for the use of a product or service\r'),
(302, 'wersja testowa', 'trial version', 20, 'a fully-functioning copy of the product, but will only run for some period of time\r'),
(303, 'gwarancja', 'warranty', 20, 'a written guarantee, issued to the purchaser of an article by its manufacturer, promising to repair or replace it if necessary within a specified period of time\r'),
(304, 'tantiemy', 'royalties', 20, 'a sum paid to a patentee for the use of a patent or to an author for each copy sold or for each public performance of a work\r'),
(305, 'dostawca oprogramowania', 'software vendor', 20, 'a company that develops and sells software\r'),
(306, 'licencjodawca', 'licensor', 20, 'a person or organization who gives another person or organization official permission to make, do, or own something\r'),
(307, 'dostępny', 'accessible', 20, 'able to be reached or entered\r'),
(308, 'dozwolony użytek', 'fair use', 20, 'use something without the need for permission from or payment to the copyright holder\r'),
(309, 'udzielić zezwolenia', 'to grant permission', 20, 'when someone with authority allow someone else to do or have something\r'),
(370, 'wskaźnik', 'pointer', 5, 'is used to store the memory address of other variables, functions, or even other pointers'),
(371, 'liczba całkowita', 'integer', 5, 'a whole number from the set of negative, non-negative, and positive numbers'),
(372, 'liczba zmiennoprzecinkowa', 'float number', 5, 'a data type composed of a number that is not an integer, because it includes a fraction represented in decimal format'),
(373, 'algorytm', 'algorithm', 5, 'a set of instructions or rules designed to solve a definite problem'),
(374, 'wartość logiczna', 'boolean', 5, 'an expression used for creating statements that are either TRUE or FALSE'),
(375, 'błąd', 'bug', 5, 'a general term used to denote an unexpected error or defect in hardware or software, which causes it to malfunction'),
(376, 'znak', 'char', 5, 'a display unit of information equal to one alphabetic letter or symbol'),
(377, 'tablica', 'array', 5, 'a list or group of similar types of data values that are grouped'),
(378, 'wyjątek', 'exception', 5, 'a special, unexpected and anomalous condition encountered during the execution of a program'),
(379, 'pętla ', 'loop', 5, 'a sequence of instructions that repeat the same process over and over until a condition is met and it receives the order to stop'),
(380, 'pakiet', 'package', 5, 'an organized module of related interfaces and classes'),
(381, 'interfejs użytkownika', 'front-end', 5, 'the user interface of a computer or any device'),
(382, 'instrukcja', 'statement', 5, 'a single line of code written legally in a programming language that expresses an action to be carried out'),
(383, 'składnia', 'syntax', 5, 'set of rules on how statements can be conveyed'),
(384, 'wyrażenie regularne', 'regex', 5, 'a string of text that lets you create patterns that help match, locate, and manage text'),
(385, 'nawiasy klamrowe', 'curly brackets', 5, 'are used to enclose groups of statements or blocks of code'),
(386, 'współbieżność', 'concurrency', 5, 'the occurrence of multiple events within overlapping time frames'),
(387, 'klucz obcy', 'foreign key', 5, 'a column or set of columns that link its table and another table'),
(388, 'stos', 'stack', 5, 'a data structure that only operates on the most recent item added'),
(389, 'niezdefiniowany', 'undefined', 5, 'anything that lacks a description or is not declared');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indeksy dla tabeli `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user_2` (`user`,`date`),
  ADD KEY `mode` (`mode`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`mode`) REFERENCES `mode` (`ID`);

--
-- Constraints for table `word`
--
ALTER TABLE `word`
  ADD CONSTRAINT `word_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
