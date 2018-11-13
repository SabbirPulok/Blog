-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 04:42 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir Pulok', 'sabbir.pulak@gmail.com', 'Teacher', '$2y$10$akwcjf96kRBBdmvpRijmeec6Pqxz7W8yRFYMwFuSj4yLQrf1ELEqq', 'ywrluDB5Fxg8IUVH8fUmH1NP8dc8AhoKCexkJt6MQW5nPev05rMj66xEFIst', '2018-10-27 04:34:49', '2018-10-28 20:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', NULL, NULL),
(2, 'Computer Science & Engineering', '2018-10-30 23:11:42', '2018-10-30 23:11:42'),
(3, 'Algorithm', '2018-10-31 03:09:21', '2018-10-31 03:09:21'),
(4, 'Problem Solving', '2018-10-31 03:15:21', '2018-10-31 03:15:21'),
(5, 'Statistics', '2018-10-31 03:59:34', '2018-10-31 03:59:34'),
(6, 'Data Science', '2018-10-31 04:04:18', '2018-10-31 04:04:18'),
(7, 'CSE 3_2', '2018-11-05 14:26:46', '2018-11-05 14:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 'Sabbir Pulok', 'sabbir.pulak@gmail.com', 'Good job!', 1, 2, '2018-11-09 07:38:13', '2018-11-09 07:38:13'),
(3, 'Sabbir Pulok', 'sabbir.pulak@gmail.com', 'Nice!!', 1, 2, '2018-11-10 05:47:36', '2018-11-10 05:47:36'),
(4, 'Zabir', 'zabir@gmail.com', 'Good Algorithm!', 1, 2, '2018-11-12 13:30:07', '2018-11-12 13:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_08_12_151830_create_posts_table', 1),
(7, '2018_10_11_053902_add_slugs_to_users', 1),
(8, '2018_10_26_141044_create_admins_table', 2),
(9, '2018_10_28_133218_create_categories_table', 3),
(10, '2018_10_28_141421_add_category_id_to_posts', 3),
(11, '2018_11_04_162437_create_tags_table', 4),
(12, '2018_11_04_163759_create_post_tag_table', 5),
(13, '2018_11_08_154857_create_comments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'First Post', 'This is my first post.', 'first_post', 1, '2018-10-17 02:35:38', '2018-10-17 02:35:38'),
(2, 'Minimax Algorithm with Alpha-beta pruning', 'Minimax is a recursive algorithm which is used to choose an optimal move for a player assuming that the other player is also playing optimally. It is used in games such as tic-tac-toe, go, chess, isola, checkers, and many other two-player games. Such games are called games of perfect information because it is possible to see all the possible moves of a particular game. There can be two-player games which are not of perfect information such as Scrabble because the opponent’s move cannot be predicted.\r\n\r\nIt is similar to how we think when we play a game: “if I make this move, then my opponent can only make only these moves,” and so on.\r\n\r\nMinimax is called so because it helps in minimizing the loss when the other player chooses the strategy having the maximum loss.', 'Artifical_Intelligence', 2, '2018-10-31 03:08:15', '2018-10-31 03:08:15'),
(3, 'How to solve nondeterministic polynomial (NP) challenge problems in programming contests', 'This problem will stay at the back of your mind throughout the contest. So, it is better to start a little late. More often than not, the problems within our league are solved within the first 80% of the contest’s duration. The challenge problem can be started then.\r\n3 mins\r\nIn this article, we talk about what Challenge problems are and how to solve them. I find them the most attractive questions in a long contest. However, students new to competitive programming often avoid them because they seem weird at first. Let’s try and change that perception.\r\n\r\nWhat are Challenge problems?\r\n\r\nA challenge problem in a programming contest uses NP (Nondeterministic Polynomial) problems to test a candidate. With no perfect answer, candidates are tested on how good they are at finding approximate solutions. This is why the evaluation is score based.\r\n\r\nThe top scorer is given a score of 100, while the others are given relative scores. Usually, problem statements are simple and allow candidates to find interesting nuances while solving. Because of the generality of the problem, candidates can choose numerous approaches to optimize their score. These include Number Theory, Graphs, Data Science, etc…\r\n\r\nSome problems require prior knowledge of algorithms, but the best challenge problems are those which have simple explanations and lots of scope for improvement. Such problems allow beginners to try and test their approximate solutions while making sure that the experienced players are tested too.', 'NP_problems', 4, '2018-10-31 03:17:14', '2018-10-31 03:17:14'),
(4, 'Breadth First Search example (BFS) – How GPS navigation works', 'Digital maps, unlike humans, see streets as a bunch of nodes. The 2.6-mile road from the Columbus Circle station (59 st) to Cathedral Pkwy (110 st) is called Central Park West. We (humans) consider this road a single entity (You may divide it into few more segments based on metro stations or intersections, but not more than that).But a GPS navigation or any other digital map divides it into hundreds of segments, with some only 24 meters long. A GPS looks at this street as a graph divided into vertices and edges.Breadth First search (BFS) is an algorithm for traversing or searching tree or graph data structures. It starts at the tree root (or some arbitrary node of a graph, sometimes referred to as a “search key”‘) and explores the neighbor nodes first, before moving to the next level neighbors', 'BFS_on_GPS', 7, '2018-10-31 03:58:24', '2018-11-06 07:38:39'),
(5, 'How football betting odds work using Poisson distribution', '6 mins\r\nToward the end of the 19th century, Russia-born Polish economist, Ladislaus Bortkiewicz came up with a strategy to predict the incidence of deaths among Prussian soldiers from horse kicks.\r\n\r\nAnd he did this how? He applied the Poisson distribution. It ended becoming a famous example by the way.\r\n\r\nFast forward a bit…\r\n\r\nPoisson distribution can be used in many scenarios—importantly and interestingly in betting.\r\n\r\nSports betting is a global phenomenon, and it is estimated that this industry is worth between $700bn and $1tn globally. And football betting is most popular among all sports.\r\n\r\nBut how does football betting odds work? how are football betting odds calculated?\r\n\r\nIt’s difficult to believe that a simple mathematical equation – Poisson distribution is used to calculate the odds for a football match. Betting on a team winning or losing is done based on the calculation explaining the sports betting across a globe.', 'possion_distribution', 2, '2018-10-31 04:00:31', '2018-11-06 07:39:51'),
(6, 'The Bots of Wall Street', 'There are about 20 major stock exchanges around the world, with each country having many more regulated stock exchanges. A large stock exchange like NASDAQ, does about 10 million trades, with over 1-2 billion shares traded every day.\r\n\r\nMovies like the Wolf of Wall Street have popularised the image of a stockbroker and their glamorous high flying life. And if your image of what a stock trading unit looks like, is something like the image below, then we don’t blame you –\r\n\r\nThis image is very disconnected from reality. Almost 90% of all short term trade, and about 50-70% of all trade, is done by stock trading algorithms. These are machine learning algorithms that buy and sell in the stock market, at a phenomenally fast pace.', 'stock_exchanges', 3, '2018-10-31 04:02:32', '2018-10-31 04:02:32'),
(7, 'Object Detection for Self Driving Cars', 'In this blog, we will extend our learning and will dive deeper into the YOLO algorithm. We will learn topics such as intersection over area metrics, non maximal suppression, multiple object detection, anchor boxes, etc. Finally, we will build an object detection detection system for a self-driving car using the YOLO algorithm. We will be using the Berkeley driving dataset to train our model.\r\n\r\nData Preprocessing\r\nBefore, we get into building the various components of the object detection model, we will perform some preprocessing steps. The preprocessing steps involve resizing the images (according to the input shape accepted by the model) and converting the box coordinates into the appropriate form. Since we will be building a object detection for a self-driving car, we will be detecting and localizing eight different classes. These classes are ‘bike’, ‘bus’, ‘car’, ‘motor’, ‘person’, ‘rider’, ‘train’, and ‘truck’.', 'object_detection', 6, '2018-10-31 04:05:30', '2018-10-31 04:05:30'),
(10, 'Interrupts', 'Interrupts are central to operating systems, as they provide an efficient way for the operating system to interact with and react to its environment. The alternative – having the operating system \"watch\" the various sources of input for events (polling) that require action – can be found in older systems with very small stacks (50 or 60 bytes) but is unusual in modern systems with large stacks. Interrupt-based programming is directly supported by most modern CPUs. Interrupts provide a computer with a way of automatically saving local register contexts, and running specific code in response to events. Even very basic computers support hardware interrupts, and allow the programmer to specify code which may be run when that event takes place.\r\n\r\nWhen an interrupt is received, the computer\'s hardware automatically suspends whatever program is currently running, saves its status, and runs computer code previously associated with the interrupt; this is analogous to placing a bookmark in a book in response to a phone call. In modern operating systems, interrupts are handled by the operating system\'s kernel. Interrupts may come from either the computer\'s hardware or the running program.\r\n\r\nWhen a hardware device triggers an interrupt, the operating system\'s kernel decides how to deal with this event, generally by running some processing code. The amount of code being run depends on the priority of the interrupt (for example: a person usually responds to a smoke detector alarm before answering the phone). The processing of hardware interrupts is a task that is usually delegated to software called a device driver, which may be part of the operating system\'s kernel, part of another program, or both. Device drivers may then relay information to a running program by various means.\r\n\r\nA program may also trigger an interrupt to the operating system. If a program wishes to access hardware, for example, it may interrupt the operating system\'s kernel, which causes control to be passed back to the kernel. The kernel then processes the request. If a program wishes additional resources (or wishes to shed resources) such as memory, it triggers an interrupt to get the kernel\'s attention.', 'interrupt', 7, '2018-11-06 07:28:48', '2018-11-06 07:32:02'),
(11, 'Memory Management On RAM', 'Among other things, a multiprogramming operating system kernel must be responsible for managing all system memory which is currently in use by programs. This ensures that a program does not interfere with memory already in use by another program. Since programs time share, each program must have independent access to memory.\r\n\r\nCooperative memory management, used by many early operating systems, assumes that all programs make voluntary use of the kernel\'s memory manager, and do not exceed their allocated memory. This system of memory management is almost never seen any more, since programs often contain bugs which can cause them to exceed their allocated memory. If a program fails, it may cause memory used by one or more other programs to be affected or overwritten. Malicious programs or viruses may purposefully alter another program\'s memory, or may affect the operation of the operating system itself. With cooperative memory management, it takes only one misbehaved program to crash the system.\r\n\r\nMemory protection enables the kernel to limit a process\' access to the computer\'s memory. Various methods of memory protection exist, including memory segmentation and paging. All methods require some level of hardware support (such as the 80286 MMU), which doesn\'t exist in all computers.\r\n\r\nIn both segmentation and paging, certain protected mode registers specify to the CPU what memory address it should allow a running program to access. Attempts to access other addresses trigger an interrupt which cause the CPU to re-enter supervisor mode, placing the kernel in charge. This is called a segmentation violation or Seg-V for short, and since it is both difficult to assign a meaningful result to such an operation, and because it is usually a sign of a misbehaving program, the kernel generally resorts to terminating the offending program, and reports the error.\r\n\r\nWindows versions 3.1 through ME had some level of memory protection, but programs could easily circumvent the need to use it. A general protection fault would be produced, indicating a segmentation violation had occurred; however, the system would often crash anyway.', 'memory_management', 7, '2018-11-06 07:30:35', '2018-11-06 07:30:35'),
(12, 'Multitasking', 'Multitasking refers to the running of multiple independent computer programs on the same computer; giving the appearance that it is performing the tasks at the same time. Since most computers can do at most one or two things at one time, this is generally done via time-sharing, which means that each program uses a share of the computer\'s time to execute.\r\n\r\nAn operating system kernel contains a scheduling program which determines how much time each process spends executing, and in which order execution control should be passed to programs. Control is passed to a process by the kernel, which allows the program access to the CPU and memory. Later, control is returned to the kernel through some mechanism, so that another program may be allowed to use the CPU. This so-called passing of control between the kernel and applications is called a context switch.\r\n\r\nAn early model which governed the allocation of time to programs was called cooperative multitasking. In this model, when control is passed to a program by the kernel, it may execute for as long as it wants before explicitly returning control to the kernel. This means that a malicious or malfunctioning program may not only prevent any other programs from using the CPU, but it can hang the entire system if it enters an infinite loop.\r\n\r\nModern operating systems extend the concepts of application preemption to device drivers and kernel code, so that the operating system has preemptive control over internal run-times as well.\r\n\r\nThe philosophy governing preemptive multitasking is that of ensuring that all programs are given regular time on the CPU. This implies that all programs must be limited in how much time they are allowed to spend on the CPU without being interrupted. To accomplish this, modern operating system kernels make use of a timed interrupt. A protected mode timer is set by the kernel which triggers a return to supervisor mode after the specified time has elapsed. (See above sections on Interrupts and Dual Mode Operation.)\r\n\r\nOn many single user operating systems cooperative multitasking is perfectly adequate, as home computers generally run a small number of well tested programs. The AmigaOS is an exception, having preemptive multitasking from its very first version. Windows NT was the first version of Microsoft Windows which enforced preemptive multitasking, but it didn\'t reach the home user market until Windows XP (since Windows NT was targeted at professionals).', 'multitasking', 7, '2018-11-06 07:32:39', '2018-11-06 07:49:33'),
(13, 'Sensors and Transducers', 'The word “Transducer” is the collective term used for both Sensors which can be used to sense a wide range of different energy forms such as movement, electrical signals, radiant energy, thermal or magnetic energy etc, and Actuators which can be used to switch voltages or currents.\r\n\r\nThere are many different types of sensors and transducers, both analogue and digital and input and output available to choose from. The type of input or output transducer being used, really depends upon the type of signal or process being “Sensed” or “Controlled” but we can define a sensor and transducers as devices that converts one physical quantity into another.\r\n\r\nDevices which perform an “Input” function are commonly called Sensors because they “sense” a physical change in some characteristic that changes in response to some excitation, for example heat or force and covert that into an electrical signal. Devices which perform an “Output” function are generally called Actuators and are used to control some external device, for example movement or sound.', 'sensor_transducer', 7, '2018-11-06 07:37:01', '2018-11-06 07:37:01'),
(14, 'Hamming Code', '<p>In telecommunication, Hamming codes are a family of linear error-correcting codes. Hamming codes can detect up to two-bit errors or correct one-bit errors without detection of uncorrected errors. By contrast, the simple parity code cannot correct errors, and can detect only an odd number of bits in error. Hamming codes are perfect codes, that is, they achieve the highest possible rate for codes with their block length and minimum distance of three.</p>\r\n<p>Richard Hamming invented Hamming codes in 1950 as a way of automatically correcting errors introduced by punched card readers. In his original paper, Hamming elaborated his general idea, but specifically focused on the Hamming(7,4) code which adds three parity bits to four bits of data.</p>', 'hamming_code', 2, '2018-11-06 07:41:50', '2018-11-12 14:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(5, 7, 6, NULL, NULL),
(6, 10, 7, NULL, NULL),
(7, 10, 8, NULL, NULL),
(8, 11, 7, NULL, NULL),
(9, 11, 8, NULL, NULL),
(11, 12, 8, NULL, NULL),
(12, 10, 4, NULL, NULL),
(13, 13, 4, NULL, NULL),
(15, 4, 6, NULL, NULL),
(19, 14, 5, NULL, NULL),
(20, 3, 10, NULL, NULL),
(21, 4, 10, NULL, NULL),
(22, 2, 10, NULL, NULL),
(23, 5, 10, NULL, NULL),
(24, 5, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Peripherals & Interface', '2018-11-05 04:25:26', '2018-11-05 04:25:26'),
(5, 'Computer Network', '2018-11-05 05:27:22', '2018-11-05 05:27:22'),
(6, 'Artificial Intelligence', '2018-11-05 14:27:11', '2018-11-05 14:27:11'),
(7, 'Computer Architecture', '2018-11-05 14:27:22', '2018-11-05 14:27:22'),
(8, 'Operating System', '2018-11-05 14:27:34', '2018-11-05 14:27:34'),
(10, 'Algorithm', '2018-11-06 07:42:59', '2018-11-06 07:42:59'),
(11, 'Statistics', '2018-11-06 07:48:12', '2018-11-06 07:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir Pulok', 'sabbir.pulak@gmail.com', '$2y$10$M04QXwrrm.bfUPbEk9w5EeZCzWiiVYssW0rMZzMmbNovd4wtL5aoS', 'tmAuhagmuVpvyFPjoadbvFSiUAjLMG9C9hRTAF7v61E9K9sTOGbHyfcPtEgJ', '2018-10-18 15:18:47', '2018-11-12 13:34:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
