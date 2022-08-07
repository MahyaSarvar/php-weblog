-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 01:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Gaming'),
(2, 'Programming'),
(3, 'Smartphones');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_id`, `status`) VALUES
(1, 'sahar', 'awesome!', 1, 1),
(2, 'aliq', 'LOL...', 2, 0),
(3, 'sara', '(^_^)', 1, 0),
(4, 'mahya', 'good!', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category_id`, `body`, `author`, `image`) VALUES
(1, 'Sony Sees Profit Rise on Music, Films; Says People Playing Less Games as COVID-19 Restrictions Decrease', 1, 'Sony\'s profit edged up 3 percent in the last quarter, weathering production setbacks from COVID-19 lockdowns in Shanghai and a trend away from video gaming as pandemic restrictions eased elsewhere.\r\n\r\nTokyo-based Sony\'s April-June profit totaled JPY 218 billion (roughly Rs. 12,96,000 crore), up from 212 billion yen a year earlier, the Japanese electronics and entertainment company said Friday.\r\n\r\nQuarterly sales rose 2 percent to JPY 2.31 trillion (roughly Rs. 37,45,00,000 crore), on the back of strong demand in Sony\'s music operations, including for Harry Styles\' Harry\'s House and Doja Cat\'s Planet Her.\r\nAmong the better performers in movies was Morbius, a film based on the Marvel Comics hero. But Sony is hoping Bullet Train, starring Brad Pitt and set for release in August, will do well at the box office.\r\n\r\nSony, which makes the PlayStation video game consoles, Bravia TVs and Columbia Pictures films, said sales from its music streaming service rose during the quarter. Despite some concern about a global economic slowdown, the streaming business was expected to remain stable, said Chief Financial Officer Hiroki Totoki.\r\n\r\nSales fell in the video games sector and technology services. One reason was that, as restrictions related to the coronavirus pandemic eased, people were playing games less and instead going out, Totoki said.\r\nAlso, a shortage of computer chips has slowed production of the Sony\'s PlayStation 5 machine.\r\n\r\nSony\'s game software sales fell in the latest quarter, while costs for developing software rose. Sony acknowledged the slowdown in shipments may dampen the momentum of game players\' interest in PlayStation 5. But the company is banking on major game titles slated for release later in the year to revive sales.\r\n\r\nSony said it expects its full fiscal year profit to fall to JPY 800 billion (roughly Rs. 47,60,000 crore) from the previous year\'s JPY 882 billion(roughly Rs. 52,45,000 crore).', 'Mohammad Sadegh', '5.jpg'),
(2, 'Backbone One PlayStation Edition Controller for iPhone Launched, Sony Adds 1440p Support to PS5', 1, 'Backbone One PlayStation Edition controller for iPhone has been launched in select countries. iPhone users can now play PS5 and PS4 games directly on their handsets by connecting the controller to the phone and using the PS Remote Play app. (The app also facilitates PlayStation gaming on PC, Mac, and Android devices.) And naturally, the controller can be used to play App Store games on your iPhone. Moreover, the Backbone One PlayStation Edition controller for Android is coming in November. In PlayStation-related news, Sony has started rolling out a new PS5 system software beta that includes 1440p support.\r\nBackbone One PlayStation Edition controller for iPhone price, availability\r\n\r\nThe Backbone One PlayStation Edition controller for iPhone price has been set at $99.99 (roughly Rs. 8,000) in the US and it is available for purchase in Black and White colour options. Sony partnered with Backbone to launch the controller in Australia, Canada, France, Germany, Italy, Mexico, New Zealand, the Netherlands, Spain, Sweden, the UK, and the US. The controller will be available for purchase in more countries later.\r\n\r\nAs mentioned, Backbone One PlayStation Edition controller for Android will start shipping from November this year, and it will have the same $99.99 (roughly Rs. 8,000) price tag as the iPhone controller.\r\nBackbone One PlayStation Edition controller features\r\n\r\nThe White-coloured option of the controller has the same buttons layout as the DualSense controller. The Black colour option has the button layout as the Xbox controllers. As per a PlayStation blog, the Backbone One PlayStation Edition controller for iPhone is inspired by the “elegant colours, materials, and finishes of the PS5 console\'s DualSense wireless controller, all the way down to the transparent face buttons and its visually distinctive, floating appearance.”\r\n\r\nAs mentioned, Backbone One also works with App Store games, including Genshin Impact, Fantasian, and Call of Duty: Mobile, and other game streaming services that support controllers, such as Xbox Cloud Gaming. The Backbone App can be used for a customised PlayStation experience, and PlayStation integrations including custom glyphs as well as the ability to browse hundreds of game titles, are included in the app. The controller does not require charging and is powered by the iPhone device.\r\n\r\nYou also get access to over 350 console games included with purchase of a Backbone One. Perks such as three-month access to custom emoji, longer messages, and server-specific profiles on Discord Nitro, a month\'s access to Apple Arcade as well as two month\'s Google Stadia Pro are bundled with the controller. It has a collapsible design, offers low-latency connection, support to capture game clips and screenshots, and 3.5mm headphone jack. It includes a Backbone App launch button, screenshot button, and mute button.\r\n\r\nIn another development related to PlayStation, a new PS5 system software beta that includes 1440p support, gamelists, and additional updates has started to roll out to invited participants in select countries. The PS5 beta introduces support for 1440p HDMI video output, essentially enabling players to choose an additional visual setting on compatible PC monitors and TVs, as well as benefit from improved anti-aliasing through supersampling down from a higher native resolution (like 4K) to 1440p output.', 'sahar', '7.jpg'),
(4, 'Analogue Deep Learning Offers Faster AI Computation With Lower Energy Consumption, MIT Researchers Say', 2, 'The amount of time, effort, and money needed to train ever-more-complex neural network models are soaring as researchers push the limits of machine learning. Analogue deep learning, a new branch of artificial intelligence, promises faster computation with less energy consumption.\r\n\r\nThe findings of the research were published in the journal \'Science\'. Programmable resistors are the key building blocks in analog deep learning, just like transistors are the core elements for digital processors. By repeating arrays of programmable resistors in complex layers, researchers can create a network of analogue artificial \"neurons\" and \"synapses\" that execute computations just like a digital neural network.\r\n\r\nThis network can then be trained to achieve complex AI tasks like image recognition and natural language processing.\r\nA multidisciplinary team of MIT researchers set out to push the speed limits of a type of human-made analogue synapse that they had previously developed. They utilized a practical inorganic material in the fabrication process that enables their devices to run 1 million times faster than previous versions, which is also about 1 million times faster than the synapses in the human brain.\r\n\r\nMoreover, this inorganic material also makes the resistor extremely energy-efficient. Unlike materials used in the earlier version of their device, the new material is compatible with silicon fabrication techniques. This change has enabled fabricating devices at the nanometer scale and could pave the way for integration into commercial computing hardware for deep-learning applications.\r\n\r\n\"With that key insight, and the very powerful nanofabrication techniques we have at MIT.nano, we have been able to put these pieces together and demonstrate that these devices are intrinsically very fast and operate with reasonable voltages,\" said senior author Jesus A. del Alamo, the Donner Professor in MIT\'s Department of Electrical Engineering and Computer Science (EECS). \"This work has really put these devices at a point where they now look really promising for future applications.\"\r\n\"The working mechanism of the device is the electrochemical insertion of the smallest ion, the proton, into an insulating oxide to modulate its electronic conductivity. Because we are working with very thin devices, we could accelerate the motion of this ion by using a strong electric field and push these ionic devices to the nanosecond operation regime,\" explained senior author Bilge Yildiz, the Breene M. Kerr Professor in the departments of Nuclear Science and Engineering and Materials Science and Engineering.\r\n\r\n\"The action potential in biological cells rises and falls with a timescale of milliseconds since the voltage difference of about 0.1 volts is constrained by the stability of water,\" said senior author Ju Li, the Battelle Energy Alliance Professor of Nuclear Science and Engineering and professor of materials science and engineering, \"Here we apply up to 10 volts across a special solid glass film of nanoscale thickness that conducts protons, without permanently damaging it. And the stronger the field, the faster the ionic devices.\"\r\n\r\nThese programmable resistors vastly increase the speed at which a neural network is trained, while drastically reducing the cost and energy to perform that training. This could help scientists develop deep learning models much more quickly, which could then be applied in uses like self-driving cars, fraud detection, or medical image analysis.\r\n\r\n\"Once you have an analogue processor, you will no longer be training networks everyone else is working on. You will be training networks with unprecedented complexities that no one else can afford to, and therefore vastly outperform them all. In other words, this is not a faster car, this is a spacecraft,\" added lead author and MIT postdoc Murat Onen.', 'Saheb Mim', '8.jpg'),
(11, 'Vivo Y02s With Mediatek Helio P35 Listed on Official Website: Launch Expected Soon', 1, '<p>Vivo Y02s has been a part of the rumour mill in the last few weeks. The smartphone is expected to arrive in August and has already been spotted on various certification websites. Now, the Vivo Y02s has appeared on Vivo\'s official global website. It simply indicates an imminent launch of the smartphone. Vivo\'s official website has also revealed some of the specifications of the upcoming Vivo smartphone. The company has confirmed that the Vivo Y02s will sport a 6.51-inch Halo FullView display and house a 5000mAh battery.</p><p>As stated above, the Vivo Y02s has now appeared on <a href=\"https://pricee.com/api/redirect/t.php?from=gadgets360&amp;redirect=https%3A%2F%2Fwww.vivo.com%2Fen%2Fproducts%2Fy02s\">Vivo\'s global website</a>. The listing has revealed the key specifications of the smartphone on the dedicated webpage. However, the exact details of the launch and the pricing of the upcoming smartphone have still not been revealed.</p><p>The Vivo Y02s smartphone has been listed on the company\'s dedicated webpage in Fluorite Black and Vibrant Blue colour options.</p><h2>Vivo Y02s specifications</h2><p>The global website of <a href=\"https://gadgets360.com/mobiles/vivo-phones\">Vivo</a> shows that the Vivo Y02s will sport a 6.51-inch Halo FullView display along with a 2.5D curved design. The back panel of the smartphone is made with a glass-like texture with an anti-scratch and anti-fingerprint features.</p><p>Under the hood, the Vivo Y02s will be powered by a MediaTek Helio P35 chipset with 3GB of RAM and 32GB of internal storage. As mentioned above, the smartphone packs a 5,000mAh battery and gets a USB Type-C port.</p><p>The company claims that the Vivo Y02s offers up to 18 hours of online HD video streaming, 7 hours of gaming, or 22 hours of music playback. Furthermore, it will be running Funtouch OS that comes with an Ultra-Game mode.</p><p>In terms of the camera, the smartphone features an 8-megapixel primary sensor on the back with an LED flash. On the front, the smartphone has a 5-megapixel sensor for selfies and video calls along with an Aura Screen Light feature, which basically lights up the screen to brighten up those selfies at night.</p>', 'AliQ', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts_slider`
--

CREATE TABLE `posts_slider` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_slider`
--

INSERT INTO `posts_slider` (`id`, `post_id`, `active`) VALUES
(1, 1, 1),
(2, 4, 0),
(3, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`) VALUES
(1, 'sadegh', 'sadegh@gmail.com'),
(2, 'ali', 'ali@gmail.com'),
(3, 'sara', 'sara@gmail.com'),
(4, 'ali', 'ali@gmail.com'),
(6, 'marzieh', 'marzieh@gmail.com'),
(8, 'a', 'a@s'),
(9, 'a', 'a@s'),
(10, 'a', 'a@s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'navid@gmail.com', '123456'),
(2, 'ali@gmail.com', '1234567');

--
-- Indexes for dumped tables
--

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
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `posts_slider`
--
ALTER TABLE `posts_slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts_slider`
--
ALTER TABLE `posts_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_slider`
--
ALTER TABLE `posts_slider`
  ADD CONSTRAINT `posts_slider_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
