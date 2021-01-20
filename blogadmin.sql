-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 04:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `author_id`, `post_id`, `created_id`) VALUES
(1, 'testing comment', 2, 11, '2021-01-16 13:02:44'),
(5, 'testing comment', 2, 9, '2021-01-16 13:14:20'),
(6, 'testing comment 32', 2, 10, '2021-01-16 13:18:41'),
(7, 'testing comment 32', 2, 10, '2021-01-16 13:20:06'),
(8, 'testing comment', 2, 6, '2021-01-16 13:21:41'),
(9, 'testing comment', 2, 3, '2021-01-16 13:23:27'),
(10, 'testing comment 32', 2, 10, '2021-01-16 13:24:21'),
(11, 'testing comment', 2, 10, '2021-01-16 13:25:29'),
(12, 'Hey Hey', 2, 3, '2021-01-16 13:30:15'),
(13, 'Hey Hey', 2, 3, '2021-01-16 16:40:06'),
(14, 'wai yan test cmt', 3, 11, '2021-01-17 07:08:27'),
(15, 'Like', 1, 11, '2021-01-17 10:59:09'),
(16, 'Hello', 1, 13, '2021-01-20 15:36:00'),
(17, 'hello', 2, 13, '2021-01-20 15:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `author_id`) VALUES
(3, 'naitar updated UPDATED', 'natiaryu naitar naitarnanaitarhu  ', 'nty.jpg', '2021-01-14 15:55:19', '2021-01-14 15:55:19', 1),
(6, 'naitar 3', 'Threee 3', 'Exe 5.png', '2021-01-15 16:35:03', '2021-01-15 16:35:03', 1),
(7, 'naitaryu 4', 'Four', 'Exe 8.png', '2021-01-15 16:51:07', '2021-01-15 16:51:07', 1),
(8, 'naitaryu 5', 'naitar naitar naitar ', 'Exe 3.png', '2021-01-15 16:52:31', '2021-01-15 16:52:31', 1),
(9, 'Hello WOrdl', 'Testingg', 'Exe  9.png', '2021-01-16 10:09:57', '2021-01-16 10:09:57', 2),
(10, 'SIX', 'Six Testing', 'Exe 6.png', '2021-01-16 10:16:23', '2021-01-16 10:16:23', 2),
(11, 'Seven', 'Seven', 'Exe 2.png', '2021-01-16 10:16:51', '2021-01-16 10:16:51', 2),
(12, 'WebOS 6.0', 'အခုခေတ်လူတွေကတော့ WebOS ဆိုတာကို သိသည့်လူ ရှားလိမ့်မယ်။ iPhone မပေါ်ခင်က Palm phone တွေမှာ Palm OS ဆိုပြီး ရှိတယ်။ ၂၀၀၉ လောက်မှာ Palm OS ကနေ Palm WebOS ဆိုပြီး စခဲ့တာ။ iPhone က ၂၀၀၇ မှာ ထုတ်ပြီး စအောင်မြင်လာပြီး Palm ရဲ့ market တော်တော်များများ ပါသွားသည့် အချိန်ပေါ့။ 2010 မှာ HP က Palm ကို ဝယ်လိုက်တယ်။ အဲဒီ တုန်းကတော့ သေပြီ။ webOS တော့ မစခင် သေပြီလို့ ထင်ခဲ့တာ။ HP က webOS ကို အသေအချာ လုပ်ပြီး ဖုန်းမှာ iPhone နဲ့ ပြိုင်ဖို့ လုပ်ခဲ့တာပဲ။ ပြဿနာက Android က စပြီး အောင်မြင်နေချိန်မှာ webOS နဲ့ တာထွက်ဖို့ ကြိုးစားသည့် HP က မှားတာပဲ။\r\n\r\nwebOS ကို ၂၀၁၀ လောက်မှ စခဲ့ပြီး ၂၀၁၁ လောက်မှာ ထုတ်ဖို့ ကြိုးစားတော့ ပြဿနာတွေ စတာပဲ။ Android က စပြီး အောင်မြင်ချိန် webOS က javascript ကြောင့် performance issue တွေ တော်တော်များ စဖြစ်တာပဲ။ HP TouchPad စင်္ကာပူမှာ ထွက်တော့ ဝယ်ဖို့ ကြိုးစားသေးတယ်။ ဘယ်မှာ မှ မရောင်းဘူး။ ထွက်ပြီး မကြာခင်မှာ အကုန် sold out ဖြစ်ကုန်တာ။ ပစ္စည်း နည်းတာလည်း ပါတာပေါ့။ အဲဒီ တုန်းက webOS အတွက် SDK တွေ down , App တွေရေးကြည့်လုပ်ခဲ့သေးတယ်။ အကုန် javascript နဲ့ ပဲ ချရတာ။', 'HP_Veer.png', '2021-01-17 07:01:45', '2021-01-17 07:01:45', 1),
(13, 'Web Caching', 'ကိုယ့်ရဲ့ website ကတစ်ကယ့် production level ရောက်လို့ traffic တွေအများကြီးရှိလာတဲ့အချိန်မှာပုံမှန်အတိုင်း web server ဆီကို တိုက်ရိုက် Read Write Operations တွေသွားမယ်ဆိုရင် user တွေဆီကို response ပြန်နိုင်မယ့်အချိန်က ကြာသွားတတ်သလို sever ရဲ့ bandwidth usage နဲ့ efficiency ကိုလည်းထိခိုက်စေနိုင်ပါတယ်။ ဒီလိုအခြေအနေမျိုးတွေမှာ ကျနော်တို့ caching strategy ကိုသုံးပြီးတော့လည်းဖြေရှင်းနိုင်ပါတယ်။\r\n\r\nCaching ကဘာလုပ်ပေးနိုင်လဲဆိုတော့ HTTP response တွေကိုယာယီသိမ်းဆည်းထားပေးနိုင်တယ်၊ response ထဲမှာတော့ contents အစုံပါနိုင်တယ်၊ သိမ်းထားပြီးတော့ users တွေ request လုပ်တဲ့အချိန်မှာ ပြန်ပြီးတော့ return လုပ်ပေးတယ်။ ဒီလိုလုပ်နိုင်ခြင်းအားဖြင့်ဘာတွေကောင်းသွားမလဲဆိုတော့ အဓိကကတော့ network traffic ကိုလျော့ချနိုင်ပြီးတော့ user တွေကိုသူတို့လိုချင်တဲ့ content ပိုပြီးတော့မြန်မြန်ဆန်ဆန်ပြပေးနိုင်တယ်။\r\n\r\nဆိုပါစို့၊ user တစ်ယောက်က a programmer website ကနေ blog တစ်ခုကို visit လုပ်ပြီးဖတ်လိုက်တယ်၊ ပထမဦးဆုံးအကြိမ်မှာ ဒီ blog page ကျလာဖို့အတွက် 500 milliseconds ကြာတယ်ဆိုပါစို့။ နောက်တစ်ခေါက် အဲ့ဒီ blog page ကိုပဲ request လုပ်တဲ့အချိန်ကျရင် 500 milliseconds မကြာတော့ဘဲ 50milliseconds ပဲကြာတော့တယ်။ ဘာကြောင့်လဲဆိုတော့ ပထမဦးဆုံးအကြိမ် request လုပ်တဲ့အချိန်မှာ user ကိုပြန်ပေးတဲ့ HTTP response ကို cache ကသိမ်းပေးထားတဲ့အတွက် နောက်တစ်ကြိမ် အလားတူ page ကို request လုပ်တဲ့အချိန်မှာ server အထိမသွားတော့ဘဲ cache က return လုပ်ပေးလိုက်တယ်။ ဒီအတွက်ကြောင့် ပိုပြီးမြန်မြန်ဆန်ဆန် page ကိုမြင်ရတယ်။\r\n\r\nCache ကိုဘယ်မှာတွေသိမ်းလဲဆိုရင်\r\n\r\nBrowser မှာသိမ်းတယ်၊ browser cache/ private cache လို့လည်းပြောလို့ရတယ်၊ ဘာလို့လဲဆိုတော့ browser က cache တွေသည် တစ်ဦးတစ်ယောက်တည်းအတွက်ဖြစ်တဲ့အတွက်ကြောင့်ဖြစ်ပါတယ်။ Private cache ကတော့ user အတွက်အရေးကြီးတဲ့ content တွေကိုဦးစားပေးပြီး cache လုပ်ပါတယ်။ \r\n\r\nProxy cache ဆိုတာလည်းရှိတယ်၊ သူကတော့ request လုပ်တဲ့ client နဲ့ response လုပ်မယ့် server ကြားမှာရှိတဲ့ services တွေကနေဖမ်းထားတဲ့ cache တွေဖြစ်ပါတယ်။ ဥပမာ ကိုယ်က CDN service တစ်ခုခုသုံးထားတယ်ဆိုရင် အဲ့ဒီ service ကပေါ့။ သူကတော့ user တစ်ဦးတစ်ယောက်တည်းအတွက်မဟုတ်ဘဲ network traffic နဲ့ latency ကိုလျော့ချနိုင်ဖို့ အများစု request လုပ်လေ့ရှိကြတဲ့ content တွေကို cache ဖမ်းထားပြီး return ပြန်လုပ်ပေးကြပါတယ်။ \r\n\r\nဒါ့အပြင်မိမိကိုယ်တိုင်လည်း cache layer သက်သက်ဆောက်ထားလို့ရပါတယ်။ ဘယ်လို contents တွေကို cache လုပ်မယ်၊ ဘယ်လို scenario မှာလုပ်မယ် စသည်ဖြင့်ကိုယ်ကြိုက်တဲ့ policy တွေသုံးပြီးဆောက်ထားလို့ရပါတယ်။ သုံးလို့ရတဲ့ services တွေလည်းရှိတယ်၊ ဥပမာ redis တို့ ဘာတို့။\r\nhttps://redis.io/\r\n\r\nဘာတွေကို cache လုပ်လို့ရလဲဆိုတော့ Web Page တစ်ခုတည်ဆောက်တဲ့အချိန်မှာသုံးတဲ့အရာတွေ cache လို့ရတယ်။ HTML, CSS, JS, Media files etc.. cache ဖမ်းတဲ့နေရာမှာဘယ်လို content တွေကို cache သင့်တယ်ဆိုတာမျိုးလည်းရှိတယ်၊ ဥပမာ အရေးကြီးတဲ့ password data တွေ card info တွေဆို cache မလုပ်ထားသင့်ဘူး၊ နောက်ပြီးတော့ changes တွေများနိုင်တဲ့ files တွေဆို cache မလုပ်ထားသင့်ဘူး။\r\n\r\ncache သုံးတာကောင်းတဲ့အချက်တွေလည်းရှိသလို မကောင်းတဲ့အချက်တွေလည်းရှိမယ်။\r\nကောင်းတာတွေကတော့ အပေါ်မှာပြောခဲ့တဲ့အတိုင်း bandwidth သက်သာမယ်၊ page မြန်မြန်ဆန်ဆန်တတ်မယ်။ network traffic လျော့ချနိုင်တဲ့အတွက် server resources တွေသက်သာမယ်။ နောက်တစ်ခုက cache ကိုသုံးပြီးတော့ offline ဖြစ်နေရင်တောင်မှ page ကိုယာယီပြပေးထားလို့ရမယ်။ ဒါတွေကကောင်းတဲ့အချက်တွေဖြစ်ပါတယ်။\r\n\r\nမကောင်းတာတွေကတော့ ကျနော်တို့အားလုံးကြုံဖူးကြတယ်၊ data and content အဟောင်းတွေပြန်ပြတာ၊ stale data လို့လည်းခေါ်တယ်၊ ကိုယ်က changes တစ်ခုခုလုပ်လိုက်ပေမယ့် response ကို cache ဖမ်းထားတာကိုပဲပြန်ပြနေတဲ့အတွက် changes တွေက update မဖြစ်သွားဘူး။\r\n\r\nနောက်တစ်ခုက cache တွေက server power ပိတ်သွားတဲ့အချိန်မှာပျက်သွားကြတယ်။ ဒါကြောင့် server restart တွေဘာတွေလုပ်လိုက်မယ်ဆိုရင် cache တွေပျက်သွားကြတယ်။ cache တွေပျက်သွားပြီဆိုရင်တော့ ဝင်လာသမျှ request တိုင်းက first time လိုပြန်ဖြစ်သွားမယ်။ This can be fixed by writing some policies.\r\n\r\nလိုအပ်တာရှိရင်လည်းဝင်ရောက်ဖြည့်စွက်သွားနိုင်ပါတယ်။\r\nကျေးဇူးတင်ပါတယ်။', 'Exe  9.png', '2021-01-20 15:35:41', '2021-01-20 15:35:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2021-01-12 23:56:19', 1),
(2, 'naitar', 'naitar@gmail.com', 'naitar', '2021-01-16 07:54:23', 0),
(3, 'waiyan', 'waiyan@gmail.com', 'waiyan', '2021-01-17 07:07:58', 0),
(4, 'test1', 'test1@gmail.com', 'test', '2021-01-17 16:03:25', 0),
(7, 'test223', 'test2@gmail.com', 'test2', '2021-01-18 16:12:10', 0),
(8, 'admin2', 'admin2@gmail.com', 'admin2', '2021-01-18 16:14:51', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
