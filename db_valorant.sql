-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 04:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_valorant`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(11) NOT NULL,
  `nama_agent` varchar(255) NOT NULL,
  `foto_agent` varchar(255) NOT NULL,
  `biografi` varchar(1000) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_senjata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id_agent`, `nama_agent`, `foto_agent`, `biografi`, `id_role`, `id_senjata`) VALUES
(8, 'Astra', 'Astra.png', 'Ghanaian Agent Astra harnesses the energies of the cosmos to reshape battlefields to her whim. With full command of her astral form and a talent for deep strategic foresight, shes always eons ahead of her enemys next move.', 4, 7),
(9, 'Yoru', 'yoru.png', 'Japanese native, Yoru, rips holes straight through reality to infiltrate enemy lines unseen. Using deception and aggression in equal measure, he gets the drop on each target before they know where to look.', 3, 3),
(10, 'Brimstone', 'Brimstone.png', 'Joining from the USA, Brimstones orbital arsenal ensures his squad always has the advantage. His ability to deliver utility precisely and from a distance makes him an unmatched boots-on-the-ground commander.', 4, 12),
(11, 'Phoenix', 'Phoenixx.png', 'Hailing from the U.K., Phoenixs star power shines through in his fighting style, igniting the battlefield with flash and flare. Whether hes got backup or not, hell rush into a fight on his own terms.', 3, 9),
(12, 'Sage', 'sage.png', 'The stronghold of China, Sage creates safety for herself and her team wherever she goes. Able to revive fallen friends and stave off aggressive pushes, she provides a calm center to a hellish fight.', 1, 13),
(13, 'Sova', 'Sova.png', 'Born from the eternal winter of Russias tundra, Sova tracks, finds, and eliminates enemies with ruthless efficiency and precision. His custom bow and incredible scouting abilities ensure that even if you run, you cannot hide.', 2, 11),
(14, 'Viper', 'Viper.png', 'The American chemist, Viper deploys an array of poisonous chemical devices to control the battlefield and cripple the enemys vision. If the toxins dont kill her prey, her mind games surely will.', 4, 14),
(15, 'Cypher', 'Cypher.png', 'The Moroccan information broker, Cypher is a one-man surveillance network who keeps tabs on the enemys every move. No secret is safe. No maneuver goes unseen. Cypher is always watching.', 1, 5),
(16, 'Reyna', 'Reyna.png', 'Forged in the heart of Mexico, Reyna dominates single combat, popping off with each kill she scores. Her capability is only limited by her raw skill, making her highly dependent on performance.', 3, 3),
(17, 'Killjoy', 'KillJoy_.png', 'The genius of Germany. Killjoy secures the battlefield with ease using her arsenal of inventions. If the damage from her gear doesnt stop her enemies, her robots debuff will help make short work of them.', 1, 10),
(18, 'Skye', 'Skye.png', 'Hailing from Australia, Skye and her band of beasts trail-blaze the way through hostile territory. With her creations hampering the enemy, and her power to heal others, the team is strongest and safest by Skyes side.', 2, 15),
(19, 'Raze', 'Raze.png', 'Raze explodes out of Brazil with her big personality and big guns. With her blunt-force-trauma playstyle, she excels at flushing entrenched enemies and clearing tight spaces with a generous dose of “boom.”', 3, 16),
(20, 'Jett', 'Jett.png', 'Representing her home country of South Korea, Jetts agile and evasive fighting style lets her take risks no one else can. She runs circles around every skirmish, cutting enemies before they even know what hit them.', 3, 2),
(21, 'Omen', 'Omen.png', 'A phantom of a memory, Omen hunts in the shadows. He renders enemies blind, teleports across the field, then lets paranoia take hold as his foe scrambles to learn where he might strike next.', 4, 6),
(22, 'Breach', 'Breach.png', 'Breach, the bionic Swede, fires powerful, targeted kinetic blasts to aggressively clear a path through enemy ground. The damage and disruption he inflicts ensures no fight is ever fair.', 2, 16),
(23, 'KAY/O', 'KAYO.png', 'KAY/O is a machine of war built for a single purpose: neutralizing radiants. His power to suppress enemy abilities cripples his opponents capacity to fight back, securing him and his allies the ultimate edge.', 2, 16),
(24, 'Chamber', 'Chamber.png', 'Well dressed and well armed, French weapons designer Chamber expels aggressors with deadly precision. He leverages his custom arsenal to hold the line and pick off enemies from afar, with a contingency built for every plan.', 1, 11),
(25, 'Neon', 'Neon_KeyArt-Web.png', 'Filipino Agent Neon surges forward at shocking speeds, discharging bursts of bioelectric radiance as fast as her body generates it. She races ahead to catch enemies off guard, then strikes them down quicker than lightning.', 3, 10),
(26, 'Fade', 'Fade_Key_Art_587x900_for_Website.png', 'Turkish bounty hunter, Fade, unleashes the power of raw nightmares to seize enemy secrets. Attuned with terror itself, she hunts targets and reveals their deepest fears—before crushing them in the dark.', 2, 3),
(27, 'Harbor', 'Harbor_KeyArt-web.png', 'Hailing from Indias coast, Harbor storms the field wielding ancient technology with dominion over water. He unleashes frothing rapids and crushing waves to shield his allies and pummel those that oppose him.', 4, 7),
(28, 'Gekko', 'V_AGENTS_587x900_Gekko2.png', 'Gekko the Angeleno leads a tight-knit crew of calamitous creatures. His buddies bound forward, scattering enemies out of the way, with Gekko chasing them down to regroup and go again.', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roleagent`
--

CREATE TABLE `roleagent` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roleagent`
--

INSERT INTO `roleagent` (`id_role`, `nama_role`) VALUES
(1, 'Sentinel'),
(2, 'Initiator'),
(3, 'Duelist'),
(4, 'Controller');

-- --------------------------------------------------------

--
-- Table structure for table `senjata`
--

CREATE TABLE `senjata` (
  `id_senjata` int(11) NOT NULL,
  `nama_senjata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `senjata`
--

INSERT INTO `senjata` (`id_senjata`, `nama_senjata`) VALUES
(1, 'Vandal'),
(2, 'Phantom'),
(3, 'Spectre'),
(4, 'Classic'),
(5, 'Ghost'),
(6, 'Guardian'),
(7, 'Bulldog'),
(8, 'Marshal'),
(9, 'Sheriff'),
(10, 'Frenzy'),
(11, 'Operator'),
(12, 'Odin'),
(13, 'Stinger'),
(14, 'Shorty'),
(15, 'Bucky'),
(16, 'Judge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`),
  ADD KEY `agent_ibfk_1` (`id_role`),
  ADD KEY `id_senjata` (`id_senjata`);

--
-- Indexes for table `roleagent`
--
ALTER TABLE `roleagent`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `senjata`
--
ALTER TABLE `senjata`
  ADD PRIMARY KEY (`id_senjata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roleagent`
--
ALTER TABLE `roleagent`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `senjata`
--
ALTER TABLE `senjata`
  MODIFY `id_senjata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roleagent` (`id_role`),
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`id_senjata`) REFERENCES `senjata` (`id_senjata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
