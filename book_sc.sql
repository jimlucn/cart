-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-09-14 10:50:15
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book_sc`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` char(16) NOT NULL,
  `password` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` char(30) NOT NULL,
  `author` char(100) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `catid` int(10) unsigned DEFAULT NULL,
  `price` float(4,2) NOT NULL,
  `description` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `catid`, `price`, `description`) VALUES
('9787115284167', '李金明 李金荣 编著', '中文版Photoshop CS6完全自学教程(全新CS6升级版)', 3, 99.00, '本书是初学者快速自学Photoshop CS6的经典畅销教程。全书共分22章，从最基础的PhotoshopCS6安装和使用方法开始讲起，以循序渐进的方式详细解读图像基本操作、选区、图层、绘画、颜色调整、照片修饰、CameraRaw、路径、文字、滤镜、外挂滤镜和插件、Web、视频和动画、3D、动作等功能，深入剖析了图层、蒙版和通道等软件核心功能与应用技巧，内容基本涵盖了PhotoshopCS6全部工具和命令。书中精心安排了265个具有针对性的实例(全部提供视频教学录像)，不仅可以帮助读者轻松掌握软件使用方法，更能应对数码照片处理、平面设计、特效制作等实际工作需要。读者还可以通过本书索引查询Photoshop各种工具和命令，了解各种门类的实例。　\n　随书光盘中包含所有实例的素材、最终效果文件和视频录像，并附赠海量设计资源和学习资料，包括近千种画笔库、形状库、动作库、渐变库、样式库，以及106集的Photoshop基础学习录像和《Photoshop外挂滤镜使用手册》电子书。　　\n本书适合广大Photoshop初学者，以及有志于从事平面设计、插画设计、包装设计、网页制作、三维动画设计、影视广告设计等工作的人员使用，同时也适合高等院校相关专业的学生和各类培训班的学员参考阅读。'),
('9787121201677', '谢希仁', '计算机网络（第6版）（含CD光盘1张）', 3, 39.00, '谢希仁编著的《计算机网络(附光盘第6版)》自1989年首次出版以来，曾于1994年、1999年、2003年和2008年分别出了修订版。在2006年本书通过了教育部的评审，被纳入普通高等教育“十一五”国家级规划教材；2008年出版的第5版获得了教育部2009年精品教材称号，并于2012年11月被列为“十二五”普通高等教育本科国家级规划教材。《计算机网络》第6版，在原有结构和内容的基础上，根据教学大纲的要求和计算机网络的最新发展，作了必要的增补、调整和修改，以适应当前教学的需要。\r\n　　全书分为10章，比较全面系统地介绍了计算机网络的发展和原理体系结构、物理层、数据链路层(包括局域网)、网络层、运输层、应用层、网络安全、因特网上的音频／视频服务、无线网络和移动网络，以及下一代因特网等内容。各章均附有习题(附录A给出了部分习题的答案和提示)。随书配套的光盘中有全书课件及计算机网络最基本概念的演示(PowerPoint文件)，供读者参考。\r\n　　《计算机网络(附光盘第6版)》的特点是概念准确、论述严谨、内容新颖、图文并茂，突出基本原理和基本概念的阐述，同时力图反映计算机网络的一些最新发展。本书可供电气信息类和计算机类专业的大学本科生和研究生使用，对从事计算机网络工作的工程技术人员也有参考价值。'),
('9787513317528', '冈岛秀治', '最有趣的生物教科书(全4册）', 2, 99.00, '对周围的一切充满好奇，他们热爱自然，喜欢动物，渴望认识流光溢彩的世界。\n本书的作者是日本生物学领域的权威专家，他们收集了自然界中各种常见的生物，细致入微地描绘了它们的形态、生活习性和生长过程。摄影师用 镜头捕捉到各种小生物的清晰样貌，让这套书更加真实、美妙，每一页都呈现出大自然的神奇灵动。\n《最有趣的生物教科书》让孩子从认识周围的生物开始，学习如何观察、提问、思考答案，探索更广阔的世界。'),
('9787513318310', '肯·布莱克布恩 杰夫·拉默斯', '超级纸飞机(全2册）', 2, 99.00, '在充斥各种电子游戏的现代科技社会，纸飞机唤起了无数人简单快乐的童年回忆。它不仅是孩子们爱不释手的折纸游戏，还承载了许多美好的梦想和希望。\n作者肯布莱克布恩是曾多次打破纸飞机飞行吉尼斯世界纪录的波音公司资深工程师，他将航空航天知识与纸飞机完美结合，详细介绍了纸飞机的飞行原理和制作方法。书中提供了36种纸飞机的制作、调试和拆卸方法，让孩子在裁剪、粘贴和折叠的过程中培养对科学的兴趣，激发想象力，提高空间思维能力和动手能力。'),
('9787533677350', '让-吕克·勒波甘文', '红狼鲍勃', 2, 36.80, '小狼迪迪和妈妈、弟弟生活在森林深处的一栋大房子里。因为肚子疼，他已经三天没去上学了。这天，迪迪瞥见小路尽头闪过一个红色的影子，他趴在窗口仔细一看，竟然是红狼鲍勃，强壮无比，长满獠牙，据说最爱吃小孩儿的可怕的红狼鲍勃！迪迪吓得脸都绿了，一下子晕倒在厨房的地板上。妈妈吓坏了，大呼救命，可是能帮她把迪迪送到医院的只有可怕的红狼鲍勃，妈妈只好把迪迪托付给他。不一会儿，红狼鲍勃就背着迪迪消失在了漆黑的森林里……一个充满悬念和小幽默的温情故事，给冷漠残酷的世界带来爱与希望。'),
('9787535482488', '仲尼', '如果还能再见你', 1, 39.80, '金牌畅销书作家仲尼2015年*触动人心的情感故事集；继《谢谢你曾来过我的世界》畅销百万册后，仲尼再次书写生命中的遇见与别离；为了忘却一个人，穿越大半个地球，开始了一段不期而遇的旅程，在威尼斯、名古屋、戛纳、米兰……11座城市，遇见11段故事，纠结彷徨，痛心侧骨。国内知名独立设计师精心设计，全彩四色印刷，打造阅读盛宴。'),
('9787544278126', '帕特丽夏·康薇尔', '开膛手杰克结案报告', 1, 37.00, '《开膛手杰克结案报告》内容简介：开膛手杰克，世界十大变态杀手之一，世界十大未解奇案之首。1888年8月7日至11月7日期间在伦敦白教堂一带，残忍地封喉剖腹杀害至少五名妓女。而后，多次写信给媒体和警察，出言挑衅。各种猜想和多名嫌疑人被提起，但此案始终无法破解。\r\n　　“首席女法医”康薇尔运用现代化的检验手段和对犯罪行为的最新认识，结合自己的法医知识，对嫌疑人留下的资料，以及开膛手书信进行研究。她在其中发现大量线索。同时，她从开膛手信件封信上取下有效的DNA样本，通过复杂的比对，最终将矛头指向……'),
('9787550014299', '宋小君', '玩命爱一个姑娘', 1, 35.00, '《玩命爱一个姑娘》发布在网上后，短短两三天阅读量破亿，百度搜索量达千万次，引发网友和媒体的激烈讨论，刷爆朋友圈，累积至今微信过20亿次阅读。作者继续嬉笑怒骂地从旁观者的角度，讲述身边朋友跌宕起伏又搞怪爆笑的爱情故事。\n这些故事成为一种缅怀，缅怀那些在记忆里永远鲜活的青春，缅怀那些一往情深玩命去爱的少年时光。\n或者成为一种警醒，警醒自己别把爱情当成可有可无的爱好，爱情才是平凡生活中必不可少、不可一世的英雄梦想。\n或者成为一种还击，在有人怀疑爱情这东西是不是已经玩儿完的时候，让他好好看看那些玩命去爱的人'),
('9787564722494', '未来教育教学与研究中心', '未来教育. 全国计算机等级考试上机考试题库二级MS Office高级应用（2015年9月无纸化考试专用）', 3, 29.80, '本书依据教育部考试中心最新发布的《全国计算机等级考试大纲》，在最新无纸化真考题库的基础上编写而成。本书在编写过程中，编者充分考虑等级考试考生的实际特点，并根据考生的学习规律进行科学、合理的安排。\r\n全书共5部分，主要内容包括：上机考试指南、操作题考点详解、上机考试题库、参考答案及解析、新增真考题库试题及解析（2015年3月）以及选择题真考题库及高频考点速记小册子。\r\n本书配套光盘中在设计的过程中充分体现了人性化的特点。通过配套软件的使用，考生可以提前熟悉无纸化考试环境及考试流程，提前识无纸化真题之“庐山真');

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` char(60) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, '小说'),
(2, '童书'),
(3, '计算机');

-- --------------------------------------------------------

--
-- 表的结构 `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(60) NOT NULL,
  `address` char(80) NOT NULL,
  `city` char(30) NOT NULL,
  `state` char(20) DEFAULT NULL,
  `zip` char(10) DEFAULT NULL,
  `country` char(20) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL,
  `order_status` char(10) DEFAULT NULL,
  `ship_name` char(60) NOT NULL,
  `ship_address` char(80) NOT NULL,
  `ship_city` char(30) NOT NULL,
  `ship_state` char(20) DEFAULT NULL,
  `ship_zip` char(10) DEFAULT NULL,
  `ship_country` char(20) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `item_price` float(4,2) NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `username` char(30) NOT NULL,
  `password` char(40) NOT NULL,
  `email` char(50) NOT NULL,
  `cellphone` int(11) unsigned NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
