-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2017 at 04:43 AM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_slug` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `posturl_slug` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disabled` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `main` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `order`, `name`, `name_slug`, `posturl_slug`, `description`, `type`, `icon`, `disabled`, `main`, `created_at`, `updated_at`) VALUES
(1, '1', 'Улс төр', 'uls-tur', 'uls-tur', '', 'news', 'file-text', '0', '1', '0000-00-00 00:00:00', '2017-12-22 11:21:46'),
(2, '2', 'Нийгэм эдийн засаг', 'niigem', 'niigem', 'Нийгэм эдийн засгийн мэдээлэл', 'news', 'th-list', '0', '1', '0000-00-00 00:00:00', '2017-12-22 11:21:57'),
(3, '3', 'Хууль эрх зүй', 'huuli', 'huuli', 'Хууль эрх зүй', 'news', 'check-square-o', '0', '1', '0000-00-00 00:00:00', '2017-12-22 11:22:06'),
(4, '4', 'Урлаг спорт', 'sport', 'sport', '', 'news', 'question-circle', '0', '1', '0000-00-00 00:00:00', '2017-12-22 11:22:16'),
(5, '6', 'Бичлэг', 'videos', 'video', '', 'video', 'youtube-play', '0', '1', '0000-00-00 00:00:00', '2017-12-22 10:38:10'),
(6, '5', 'Чөлөөт цаг', 'freetime', 'freetime', '', 'news', 'fa fa-home', '0', '1', '2017-12-22 10:38:50', '2017-12-22 11:22:31'),
(7, '', 'Яамд', 'yam', '', '', '1', '', '0', '0', '2017-12-22 10:39:36', '2017-12-22 10:39:36'),
(8, '', 'Гишүүд', 'gishuud', '', '', '1', '', '0', '0', '2017-12-22 10:39:52', '2017-12-22 10:39:52'),
(9, '', 'УИХ', 'uih', '', '', '1', '', '0', '0', '2017-12-22 10:40:25', '2017-12-22 10:40:25'),
(10, '', 'Ерөнхийлөгч', 'president', '', '', '1', '', '0', '0', '2017-12-22 10:41:18', '2017-12-22 10:41:18'),
(11, '', 'Улс төр', 'a', '', '', '1', '', '0', '0', '2017-12-22 10:41:48', '2017-12-22 10:41:48'),
(12, '', 'Нийгэм эдийн засаг', 'a', '', '', '2', '', '0', '0', '2017-12-22 10:42:13', '2017-12-22 10:42:13'),
(13, '', ' Хууль эрх зүй', 'a', '', '', '3', '', '0', '0', '2017-12-22 10:42:48', '2017-12-22 10:42:48'),
(14, '', 'Урлаг спорт', 'a', '', '', '4', '', '0', '0', '2017-12-22 10:43:01', '2017-12-22 10:43:01'),
(15, '', 'Чөлөөт цаг', 'a', '', '', '6', '', '0', '0', '2017-12-22 10:43:15', '2017-12-22 10:43:15'),
(16, '', 'Бичлэг', 'a', '', '', '5', '', '0', '0', '2017-12-22 10:43:26', '2017-12-22 10:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `label_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `stared` tinyint(1) NOT NULL,
  `important` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrys`
--

CREATE TABLE `entrys` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entrys`
--

INSERT INTO `entrys` (`id`, `post_id`, `user_id`, `order`, `type`, `title`, `body`, `image`, `video`, `source`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0, 'text', ' Дундговь аймгаас УИХ-д сонгогдсон Б.Наранхүү гишүүнийг УИХ-аас эгүүлэн татах асуудлаар өнөөдөр Үндсэн Хуулийн Цэцэд хандсан байна.  ', '<p>&nbsp;Дундговь аймгаас УИХ-д сонгогдсон Б.Наранхүү гишүүнийг УИХ-аас эгүүлэн татах асуудлаар өнөөдөр Үндсэн Хуулийн Цэцэд хандсан байна.&nbsp;</p><p>Үндсэн Хуульд \"Улсын Их Хурлын гишүүн бол ард түмний элч мөн бөгөөд нийт иргэн, улсын ашиг сонирхлыг эрхэмлэн баримтална\" гэсэн байдаг.&nbsp;</p><p>Гэвч Б.Наранхүү гишүүн УИХ-ын чуулганы нэгдсэн хуралдаанд хангалттай суухгүй байгаа нь энэхүү үүргээ гүйцэтгэж чадаж байгаа эсэх нь эргэлзээтэй болоод байгаа юм.&nbsp;</p><p>Тэгвэл Улсын Их Хурлын тухай хуулийн 6 дугаар зүйлийн 6.6.5 дахь хэсэгт “Үндсэн хуулийн цэц гишүүнийг эгүүлэн татах үндэслэлтэй гэсэн дүгнэлт гаргасныг Улсын Их Хурал хүлээн авсан” үндэслэлээр чөлөөлөгдөхийг хуульчлан заасан. Иймд хуульд заасан бүрэн эрхээ хэрэгжүүлэхгүй байгаа дээр &nbsp;УИХ-ын гишүүн Б. Наранхүүг&nbsp;эгүүлэн татах үндэслэлтэй эсэх талаар дүгнэлт гаргуулахаар хуульч Б.Гүнбилэг, Д.Миеэгомбо, Ч.Жадамба &nbsp;нар Үндсэн хуулийн цэцэд өнөөдөр ханджээ.</p>', NULL, NULL, '', '2017-12-22 11:16:18', '2017-12-22 11:16:18', NULL),
(2, 2, 1, 0, 'text', '\"Сүүлийн үед олны анхаарал татаад байгаа ТЕГ-ын дарга асан Б.Хурцыг БНСУ-д Элчин сайдаар явуулах эсэх асуудалд ч хүлээзнэх шаардлага үүссэн.', '<p>\"Сүүлийн үед олны анхаарал татаад байгаа ТЕГ-ын дарга асан Б.Хурцыг БНСУ-д Элчин сайдаар явуулах эсэх асуудалд ч хүлээзнэх шаардлага үүссэн. Учир нь Б.Хурцыг Элчин сайдаар томилох тухайд УИХ-тай зөвшилцөх явцад анхаарал татсан олон асуудал яригдсан тул энэ бүхнийг тодорхой болтол Ерөнхийлөгчийн зүгээс түүнийг томилж явуулах боломжгүй гэж үзсэн байна\" гэж&nbsp;<a href=\"http://www.president.mn/content/12769\" target=\"_blank\">Ерөнхийлөгчийн Тамгын газрын албан ёсны сайтад түүний байр суурийг илэрхийлсэн байна.</a>&nbsp;</p><p>Мөн Ерөнхийлөгч Х.Баттулга Монгол Улсаас гадаадын зарим улсуудад суух Элчин сайд нарыг томилох асуудал удааширч байгаа тул үүнийг ойрын хугацаанд шийдвэрлэх шаардлага байгаатай холбогдуулан&nbsp; Монгол Улсын Ерөнхий сайд У.Хүрэлсүхэд өнөөдөр албан бичиг хүргүүллээ.&nbsp;</p>', NULL, NULL, '', '2017-12-22 11:18:36', '2017-12-22 11:18:36', NULL),
(3, 3, 1, 0, 'text', 'МҮХАҮТ-аас жил бүр уламжлал болгон тухайн оны онцлох 10 аж ахуйн нэгж, салбарын шилдгүүдийг тодруулдаг \"Энтрепренер 2017\" шагнал гардуулах ёслолын арга хэмжээ өнөөдөр боллоо. ', '<p>Энэ шагнал нь бизнесийн бурхан Меркури хөшөө бөгөөд нийт 48 компани хүртлээ.</p><p>Шилдгүүдийг нэрлэж байна.</p><p><strong><u>Оны онцлох аж ахуйн нэгжүүд&nbsp;</u></strong></p><p><strong>ГРАНПРИ:</strong> Мобиком Корпораци ХХК</p><ul><li>Эрдэнэт Үйлдвэр ХХК</li><li>АПУ ХК</li><li>Сүү ХК</li><li>ХААН Банк</li><li>Энержи Ресурс ХХК</li><li>Номин Холдинг ХХК</li><li>Тэсо Корпораци ХХК</li><li>М Си Эс Кока Кола ХХК</li><li>Голомт банк</li><li>Гоёл кашмер ХХК</li></ul><p><strong>\"ENTREPRENEUR - 2017\" шалгарсан бизнес эрхлэгчид</strong></p><p><strong><u>Үндэсний үйлдвэрлэгч - Оны онцлох Энтрепренер&nbsp;</u></strong></p><ul><li>Монос косметик ХХК</li></ul><p><strong>Оны онцлох Экспортлогч – Энтрепренер</strong></p><ul><li>Ханбогд Кашемир ХХК</li></ul><p><strong><u>Хөрөнгө оруулалтын - Оны онцлох Энтрепренер</u></strong>&nbsp;</p><ul><li>Алтай Агро Трейдинг ХХК</li><li>Скай Хайпермаркет ХХК</li></ul><p><strong><u>Оны онцлох Импортлогч&nbsp; &nbsp;- Энтрепренер</u></strong></p><ul><li>Наран косметик ХХК&nbsp;</li></ul><p><strong><u>Инноваци нэвтрүүлэгч - Оны онцлох Энтрепренер</u></strong></p><ul><li>Эм судлалын хүрээлэн&nbsp;</li><li>Эко ноос ХХК</li></ul><p><strong><u>Компанийн нийгмийн хариуцлагыг хэрэгжүүлэгч- Оны онцлох Энтрепренер</u></strong></p><ul><li>Монгол эм импекс ХХК</li><li>Наран фүүдс ХХК</li></ul><p><u><strong>Гарааны бизнес эрхлэгч Оны онцлох Энтрепренер</strong></u></p><ul><li>Талын эзэн ХХК</li><li>Залуу Зохион Бүтээгч Шинийг Санаачлагчдын&nbsp; Нийгэмлэг ТББ</li></ul><p><u><strong>Сайн засаглалыг хэрэгжүүлэгч - Оны онцлох Энтрепренер</strong></u></p><ul><li>НБИК ХХК</li><li>Монголиан Коппер Корпорейшн ХХК</li></ul><p><u><strong>Хүнсний салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Өгөөж Чихэр Боов ХХК&nbsp;</li></ul><p><u><strong>Худалдааны салбарын – Оны онцлох Энтрепренер</strong></u></p><ul><li>Номин Тав Трейд ХХК&nbsp;</li></ul><p><u><strong>Үйлчилгээний салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Нью тур Сафари ХХК</li></ul><p><u><strong>Барилгын салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Монкон констракшн ХХК</li></ul><p><u><strong>Эрчим хүчний салбарын - Оны онцлох Энтрепренер&nbsp;</strong></u></p><ul><li>Эрдэнэт Үйлдвэр ХХК-ийн Дулааны цахилгаан станц&nbsp;&nbsp;</li></ul><p><strong><u>Даатгалын салбарын - Оны онцлох Энтрепренер</u></strong></p><ul><li>Тэнгэр даатгал ХХК</li></ul><p><u><strong>Аялал жуулчлалын салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Цолмон трэвел ХХК&nbsp;</li><li>Баянгол зочид буудал ХК</li></ul><p><u><strong>ББСБ-ын салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Инвескор ББСБ ХХК</li></ul><p><u><strong>ЖДҮ-ийн – Оны онцлох Энтрепренер</strong></u></p><ul><li>Одь Тан ХХК</li><li>Бурханлаг гоо сайхан ХХК</li><li>Гет женероус ХХК</li></ul><p><u><strong>Тээвэр Ложистикийн салбарын – Оны онцлох Энтрепренер</strong></u></p><ul><li>УБТЗ-ын ОУТЗуучлалын төв</li><li>Туушин ХХК</li></ul><p><u><strong>Үл хөдлөх хөрөнгийн салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>М Си Эс Эстэйтс&nbsp; ХХК</li></ul><p><u><strong>Эрүүл мэндийн салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Ази фарма ХХК</li></ul><p><u><strong>Хөнгөн Үйлдвэрлэлийн салбарын - Оны онцлох Энтрепренер</strong></u></p><ul><li>Мөнхийн үсэг ХХК</li></ul><p><strong>\"GREENPRENEUR - 2017\"</strong></p><p><u><strong>Байгальд ээлтэй ногоон технологи нэвтрүүлэгч</strong></u></p><ul><li>Клин Энержи Азиа ХХК</li><li>Хэв хашмал ХХК</li></ul><p><u><strong>Байгалийг нөхөн сэргээгч&nbsp;</strong></u></p><ul><li>Эко минерал ХХК</li></ul><p><u><strong>Экологийн цэвэр бүтээгдэхүүн үйлдвэрлэгч&nbsp;</strong></u></p><ul><li>Фалькэ Экологи ХХК</li></ul><p><u><strong>Сэргээгдэх эрчим хүч үйлдвэрлэгч</strong></u></p><ul><li>Солар повер Интернэйшнл ХХК</li></ul><p><u><strong>Тогтвортой үйлдвэрлэлийн менежмент нэвтрүүлэгч Энтрепренер</strong></u></p><ul><li>Ган хийц ХК</li></ul><p><strong>Ази Номхон Далайн Орнуудын Худалдаа Аж Үйлдвэрийн Танхимуудын Холбооны “Алтанцом” шагнал</strong></p><ul><li>Ай Ти Зон ХХК тус тус шалгарлаа.</li></ul><p>&nbsp;</p><p><strong>МҮХАҮТ</strong>&nbsp;нь бизнесийн орчныг сайжруулахад бизнес эрхлэгчдийн оролцоог хангах, төр хувийн хэвшлийн хэлэлцлийн тогтолцоог бүрдүүлэх, Бизнесийн холбогдолтой хууль тогтоомж, бодлогын бичиг баримтыг боловсруулах, шийдвэрлэх, хэрэгжүүлэх, сайжруулах бүх шатанд бизнес эрхлэгчдийн нийтлэг эрх ашгийг илэрхийлэн хамгаалах, Эдийн засаг, зах зээлийн өөрчлөлтөнд мэдрэмжтэй хандаж гишүүд, бизнес эрхлэгчид, түншлэгч байгууллагуудыг үнэ цэнэтэй мэдлэг, мэдээллээр хангах зэрэг зорилтын хүрээнд үйл ажиллагаагаа явуулдаг билээ.</p>', NULL, NULL, '', '2017-12-22 11:20:39', '2017-12-22 11:20:39', NULL),
(4, 4, 1, 0, 'text', 'Сүүлийн хэдэн сар 19 мянган ам.доллар хүртлээ өсөөд байсан биткойны ханш өнөөдөр 20 гаруй хувиар, энэ сарын хамгийн өндөр ханшаасаа 40 хувиар унаж 13 мянга гаруй ам.долларт хүрээд байна.', '<p><strong>Сүүлийн хэдэн сар 19 мянган ам.доллар хүртлээ өсөөд байсан биткойны ханш өнөөдөр 20 гаруй хувиар, энэ сарын хамгийн өндөр ханшаасаа 40 хувиар унаж&nbsp;13 мянга гаруй ам.долларт хүрээд байна.&nbsp;</strong>Гэхдээ энэ Баасан гараг бүх криптовалютын хувьд уналтын өдөр байлаа. Тухайлбал биткойн кэш 38&nbsp;хувиар, биткойны дараа орох этериум ч 24 цагийн дотор 26 хувиар унаж 630 ам.долларт хүрээд байгаа юм.&nbsp;<br></p>', NULL, NULL, '', '2017-12-22 11:26:09', '2017-12-22 11:26:09', NULL),
(5, 5, 1, 0, 'text', 'НӨАТ-ын ээлжит сугалаа өнөөдөр явагдаж 11 дүгээр сард баримтаа бүртгүүлсэн азтанууд тодорлоо. ', '<p>НӨАТ-ын ээлжит сугалаа өнөөдөр явагдаж 11 дүгээр сард баримтаа бүртгүүлсэн азтанууд тодорлоо.&nbsp;</p><p>Энэ удаагийн сугалааны:</p><p><strong>Азын дугаар</strong>&nbsp;<strong>71 48 29 81</strong></p><p><strong>Супер шагналын дугаар 77 48 54 95</strong></p><p>Уг тохирлоор:</p><ul><li>20 мянган төгрөгийн азтан 12 965</li><li>100 мянган төгрөгийн азтан 1 331</li><li>500 мянган төгрөгийн азтан 130</li><li>4 сая төгрөгийн азтан 14</li><li>20 сая төгрөгийн азтан 1&nbsp;тодорлоо.</li></ul><p>Харин 100 сая төгрөг болон супер шагналын эзэн тодорсонгүй.&nbsp;&nbsp;</p>', NULL, NULL, '', '2017-12-22 11:28:48', '2017-12-22 11:28:48', NULL),
(6, 6, 1, 0, 'text', 'Сурагчдыг 2018 оны нэгдүгээр сарын 1-нээс хоёрдугаар сарын 1-ний хугацаанд амраахаар болжээ', '<p><strong>&nbsp;Засгийн газрын ээлжит бус хуралдаан өнөөдөр /2017 оны 12 дугаар сарын 22/ боллоо -</strong></p><p>Монгол Улсын Ерөнхий сайд У.Хүрэлсүх томуу, томуу төст өвчний өвчлөл ихэсч байгаатай холбоотойгоор шаардлагатай бол сурагчдын хоёрдугаар улирлын амралтын хугацааг сунгах чиглэл өгч, Засгийн газрын дараагийн хуралдаанд танилцуулахыг холбогдох сайд нарт үүрэг болголоо.</p><p>Ерөнхий боловсролын сургуулийн сурагчдыг 2018 оны нэгдүгээр сарын 1-нээс хоёрдугаар сарын 1-ний хугацаанд амраахаар урьдчилсан төлөвлөлт хийж байна гэж&nbsp;<strong>БСШУС-ын сайд Ц.Цогзолмаа ярилаа.</strong></p><p>Засгийн газрын хуралдааны дараа&nbsp;<strong>Эрүүл мэндийн сайд Д.Сарангэрэл&nbsp;</strong>\"Амбулаторийн нийт үзлэгт томуу, томуу төст өвчний өвчлөл 21 аймагт 5.6 хувьтай байна. Сургуулийн ирц 75, цэцэрлэгийн ирц 95 хувьтай байна.</p><p>Нийслэл хотод 849 хүүхдийн орон дээр 1,500 гаруй хүүхэд байна. Энэ нь ачаалал 80 гаруй хувиар нэмэгдсэн гэсэн үг. Өнгөрсөн 7 хоногийн судалгаанаас энэ 7 хоногийн судалгааг харахад томуу, томуу төст өвчний өвчлөл 1.3 хувиар нэмэгдсэн учраас бид цаг алдахгүйн тулд сурагчдын амралтыг наашлуулах нь зүйтэй гэдэг шийдвэр гаргаж байна. Өөрөөр хэлбэл бид сурагчдын амралтыг наашлуулж&nbsp;1 дүгээр сарын 1-нээс хоёрдугаар сарын 1-н хүртэл&nbsp;сурагчдыг амраахаар боллоо\" гэв.&nbsp;</p>', NULL, NULL, '', '2017-12-22 11:30:16', '2017-12-22 11:30:16', NULL),
(7, 7, 1, 0, 'text', 'Хөдөлмөрийн баатар Б.Лхагвасүрэнгийн эмчилгээнд зориулж Засгийн газраас 25 сая төгрөг хандивлахаар боллоо', '<p><strong>Монгол Улсын Хөдөлмөрийн баатар, Ардын уран зохиолч Б.Лхагвасүрэн нь ходоодны хорт хавдраар өвчилсөн тухай харамсалтай мэдээ гараад байгаа билээ. Тэгвэл Засгийн газраас өнөөдөр их зохиолчид эмчилгээний хандив өгөх шийдвэр гаргажээ.&nbsp;</strong></p><p>Тодруулбал \"Хөдөлмөрийн баатар, Төрийн шагналт, СГЗ Б.Лхагвасүрэн гуайн эмчилгээнд Засгийн газрын зүгээс 25 сая төгрөг хандивлахаар боллоо. Нөөц сангаас 10 сая төгрөг, БСШУСЯ-наас 10 сая төгрөг, ЭМЯ-наас&nbsp;5 сая төгрөг эмчилгээнд нь зориулж гаргахаар шийдлээ. Ерөнхий сайдын зүгээс танхимын гишүүддээ хандаж хувиасаа хандив тусламж өгөхийг уриаллаа\" хэмээн&nbsp;<strong>Засгийн газрын ХМОНХА-ны дарга Ц.Ганзориг мэдээллээ.&nbsp;</strong></p>', NULL, NULL, '', '2017-12-22 11:31:03', '2017-12-22 11:31:03', NULL),
(8, 8, 1, 0, 'text', 'ФОТО: “Сант” сургуулийн 20 ЖИЛИЙН ойд зориулсан “Щелкунчик” бүжгэн жүжиг тоглогдлоо', '<p>ФОТО: “Сант” сургуулийн 20 ЖИЛИЙН ойд зориулсан “Щелкунчик” бүжгэн жүжиг тоглогдлоо<br></p>', NULL, NULL, '', '2017-12-22 11:32:17', '2017-12-22 11:32:17', NULL),
(9, 8, 1, 1, 'image', '', '', '2017-12/22/8-1-f70ebbc8e579ecc8439e6d4825374186.jpg', NULL, '', '2017-12-22 11:32:17', '2017-12-22 11:32:17', NULL),
(10, 9, 1, 0, 'text', 'Улсын Их Хурлын гишүүн, Нийгмийн бодлого, боловсрол, соёл, шинжлэх ухааны байнгын хорооны дарга Ё.Баатарбилэг өнөөдөр БНСУ-ын нэр хүндтэй найруулагч Пэ Гён Хуан-тай уулзлаа.', '<p>Улсын Их Хурлын гишүүн, Нийгмийн бодлого, боловсрол, соёл, шинжлэх ухааны байнгын хорооны дарга Ё.Баатарбилэг өнөөдөр БНСУ-ын нэр хүндтэй найруулагч Пэ Гён Хуан-тай уулзлаа.</p><p>Уулзалтаар, 2020 онд тохиох&nbsp; Монгол Улс, БНСУ-ын хооронд дипломат харилцаа тогтоосны 30 жилийн ойд зориулсан урлаг, соёлын арга хэмжээний талаар ярилцсан юм. Энэ хүрээнд&nbsp;&nbsp;Сөүл хотод&nbsp;\"Гранд опера Чингис хаан\" дуурийг тоглуулах талаар талууд санал солилцлоо.</p><p>Мөн Монгол Улсын Засгийн газар, БНСУ-ын Засгийн газар хоорондын шугамаар Монгол Улсад Дуурийн театрын барилга шинээр барихад дэмжлэг үзүүлэх хүсэлтийг Байнгын хорооны дарга Ё.Баатарбилэг тавьсны хариуд найруулагч Пэ Гён Хуан дэмжиж ажиллахаа илэрхийлэв. Тэрбээр БНСУ-ын Урлаг, соёлын яаманд асуудлыг уламжилж, яриа хэлцлийг эхлүүлнэ гэдгээ хэллээ.</p><p>Найруулагч Пэ Гён Хуан нь 2003 онд есөн сая ам.долларын хөрөнгө оруулалтаар \"Гранд опера Аида\" дуурийг бүтээжээ гэж&nbsp;<strong>УИХ-ын Хэвлэл мэдээлэл, олон нийттэй харилцах хэлтсээс мэдээлэв.</strong></p>', NULL, NULL, '', '2017-12-22 11:33:17', '2017-12-22 11:33:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_02_193005_create_translations_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_09_09_004605_create_settings_table', 1),
('2015_09_15_105839_create_posts_table', 1),
('2015_09_15_172559_create_categories_table', 1),
('2015_09_22_133125_create_pool_votes_table', 1),
('2015_09_25_110638_create_entrys_table', 1),
('2015_09_29_073303_create_popularity_stats_table', 1),
('2015_10_06_171448_create_pages_table', 1),
('2015_10_06_195254_create_widget_table', 1),
('2015_11_01_075837_create_reaction_votes_table', 1),
('2015_11_01_183249_create_posts_table_pagination', 1),
('2015_11_05_073240_create_users_table_banner', 1),
('2015_11_24_162414_create_followers_table', 1),
('2015_11_27_114411_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `popularity_stats`
--

CREATE TABLE `popularity_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trackable_id` bigint(20) UNSIGNED NOT NULL,
  `trackable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `one_day_stats` int(11) NOT NULL DEFAULT '0',
  `seven_days_stats` int(11) NOT NULL DEFAULT '0',
  `thirty_days_stats` int(11) NOT NULL DEFAULT '0',
  `all_time_stats` int(11) NOT NULL DEFAULT '0',
  `raw_stats` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `popularity_stats`
--

INSERT INTO `popularity_stats` (`id`, `trackable_id`, `trackable_type`, `one_day_stats`, `seven_days_stats`, `thirty_days_stats`, `all_time_stats`, `raw_stats`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:16:19', '2017-12-22 11:16:19'),
(2, 2, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:18:38', '2017-12-22 11:18:38'),
(3, 3, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:20:41', '2017-12-22 11:20:41'),
(4, 4, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:26:11', '2017-12-22 11:26:11'),
(5, 5, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:28:50', '2017-12-22 11:28:50'),
(6, 6, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:30:17', '2017-12-22 11:30:18'),
(7, 7, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:31:05', '2017-12-22 11:31:05'),
(8, 8, 'App\\Posts', 1, 1, 1, 1, 'a:1:{s:10:\"2017-12-22\";i:1;}', '2017-12-22 11:32:19', '2017-12-22 11:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ordertype` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_in_homepage` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shared` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `tags` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `featured_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pagination` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `type`, `ordertype`, `slug`, `title`, `body`, `thumb`, `approve`, `show_in_homepage`, `shared`, `tags`, `created_at`, `updated_at`, `featured_at`, `published_at`, `deleted_at`, `pagination`) VALUES
(1, 1, 9, 'news', '', 'bnarankhg-uikh-yn-gishnees-eglen-tatakh-asuudlaar-ndsen-khuuliyn-tsetsed-khandlaa', 'Б.Наранхүүг УИХ-ын гишүүнээс эгүүлэн татах асуудлаар Үндсэн Хуулийн Цэцэд хандлаа', ' Дундговь аймгаас УИХ-д сонгогдсон Б.Наранхүү гишүүнийг УИХ-аас эгүүлэн татах асуудлаар өнөөдөр Үндсэн Хуулийн Цэцэд хандсан байна. \n', '2017-12/22/bnarankhg-uikh-yn-gishnees-eglen-tatakh-asuudlaar-ndsen-khuuliyn-tsetsed-khandlaa_1513970177', 'yes', NULL, '0', '', '2017-12-22 11:16:18', '2017-12-22 11:16:18', NULL, '2017-12-22 11:16:18', NULL, NULL),
(2, 1, 11, 'news', '', 'ernkhiylgch-asuudal-todorkhoy-boltol-bkhurtsyg-bnsu-d-suukh-elchingeer-tomilokh-bolomzhgy-gezh-zzhee', 'Ерөнхийлөгч асуудал тодорхой болтол Б.Хурцыг БНСУ-д суух Элчингээр ТОМИЛОХ БОЛОМЖГҮЙ гэж үзжээ', '\"Сүүлийн үед олны анхаарал татаад байгаа ТЕГ-ын дарга асан Б.Хурцыг БНСУ-д Элчин сайдаар явуулах эсэх асуудалд ч хүлээзнэх шаардлага үүссэн.', '2017-12/22/ernkhiylgch-asuudal-todorkhoy-boltol-bkhurtsyg-bnsu-d-suukh-elchingeer-tomilokh-bolomzhgy-gezh-zzhee_1513970316', 'yes', 'yes', '0', '', '2017-12-22 11:18:36', '2017-12-22 11:35:19', '2017-12-22 11:35:14', '2017-12-22 11:18:36', NULL, NULL),
(3, 1, 11, 'news', '', 'entreprener-2017-shagnalyn-ezed-todorloo', '\"Энтрепренер 2017\" шагналын ЭЗЭД ТОДОРЛОО', 'МҮХАҮТ-аас жил бүр уламжлал болгон тухайн оны онцлох 10 аж ахуйн нэгж, салбарын шилдгүүдийг тодруулдаг \"Энтрепренер 2017\" шагнал гардуулах ёслолын арга хэмжээ өнөөдөр боллоо. ', '2017-12/22/entreprener-2017-shagnalyn-ezed-todorloo_1513970439', 'yes', NULL, '0', '', '2017-12-22 11:20:39', '2017-12-22 11:20:39', NULL, '2017-12-22 11:20:39', NULL, NULL),
(4, 1, 12, 'news', '', 'bitkoyny-khansh-driyn-dotor-20-garuy-khuviar-unalaa', 'Биткойны ханш өдрийн дотор 20 гаруй хувиар уналаа', 'Биткойны ханш өдрийн дотор 20 гаруй хувиар уналаа', '2017-12/22/bitkoyny-khansh-driyn-dotor-20-garuy-khuviar-unalaa_1513970769', 'yes', 'yes', '0', '', '2017-12-22 11:26:09', '2017-12-22 11:35:09', '2017-12-22 11:35:04', '2017-12-22 11:26:09', NULL, NULL),
(5, 1, 12, 'news', '', 'noat-20-saya-tgrgiyn-neg-aztan-todorloo', 'НӨАТ: 20 сая төгрөгийн нэг азтан тодорлоо', 'НӨАТ-ын ээлжит сугалаа өнөөдөр явагдаж 11 дүгээр сард баримтаа бүртгүүлсэн азтанууд тодорлоо. ', '2017-12/22/noat-20-saya-tgrgiyn-neg-aztan-todorloo_1513970928', 'yes', NULL, '0', '', '2017-12-22 11:28:48', '2017-12-22 11:28:48', NULL, '2017-12-22 11:28:48', NULL, NULL),
(6, 1, 12, 'news', '', 'suragchdyg-2018-ony-negdgeer-saryn-1-nees-khoerdugaar-saryn-1-niy-khugatsaand-amraakhaar-bolzhee', 'Сурагчдыг 2018 оны нэгдүгээр сарын 1-нээс хоёрдугаар сарын 1-ний хугацаанд амраахаар болжээ', 'Сурагчдыг 2018 оны нэгдүгээр сарын 1-нээс хоёрдугаар сарын 1-ний хугацаанд амраахаар болжээ', '2017-12/22/suragchdyg-2018-ony-negdgeer-saryn-1-nees-khoerdugaar-saryn-1-niy-khugatsaand-amraakhaar-bolzhee_1513971015', 'yes', NULL, '0', '', '2017-12-22 11:30:16', '2017-12-22 11:30:16', NULL, '2017-12-22 11:30:16', NULL, NULL),
(7, 1, 12, 'news', '', 'khdlmriyn-baatar-blkhagvasrengiyn-emchilgeend-zoriulzh-zasgiyn-gazraas-25-saya-tgrg-khandivlakhaar-bolloo', 'Хөдөлмөрийн баатар Б.Лхагвасүрэнгийн эмчилгээнд зориулж Засгийн газраас 25 сая төгрөг хандивлахаар боллоо', 'Хөдөлмөрийн баатар Б.Лхагвасүрэнгийн эмчилгээнд зориулж Засгийн газраас 25 сая төгрөг хандивлахаар боллоо', '2017-12/22/khdlmriyn-baatar-blkhagvasrengiyn-emchilgeend-zoriulzh-zasgiyn-gazraas-25-saya-tgrg-khandivlakhaar-b_1513971063', 'yes', NULL, '0', '', '2017-12-22 11:31:03', '2017-12-22 11:31:03', NULL, '2017-12-22 11:31:03', NULL, NULL),
(8, 1, 14, 'news', '', 'foto-sant-surguuliyn-20-zhiliyn-oyd-zoriulsan-shchelkunchik-bzhgen-zhzhig-toglogdloo', 'ФОТО: “Сант” сургуулийн 20 ЖИЛИЙН ойд зориулсан “Щелкунчик” бүжгэн жүжиг тоглогдлоо', 'ФОТО: “Сант” сургуулийн 20 ЖИЛИЙН ойд зориулсан “Щелкунчик” бүжгэн жүжиг тоглогдлоо', '2017-12/22/foto-sant-surguuliyn-20-zhiliyn-oyd-zoriulsan-shchelkunchik-bzhgen-zhzhig-toglogdloo_1513971137', 'yes', 'yes', '0', '', '2017-12-22 11:32:17', '2017-12-22 11:34:58', '2017-12-22 11:34:53', '2017-12-22 11:32:17', NULL, NULL),
(9, 1, 14, 'news', '', 'mongol-ulsad-duuriyn-teatryn-barilga-shineer-barikh-asuudlaar-yaria-kheltsel-ekhllekheer-bolov', 'Монгол Улсад Дуурийн театрын барилга шинээр барих асуудлаар яриа хэлцэл эхлүүлэхээр болов', 'Улсын Их Хурлын гишүүн, Нийгмийн бодлого, боловсрол, соёл, шинжлэх ухааны байнгын хорооны дарга Ё.Баатарбилэг өнөөдөр БНСУ-ын нэр хүндтэй найруулагч Пэ Гён Хуан-тай уулзлаа.', '2017-12/22/mongol-ulsad-duuriyn-teatryn-barilga-shineer-barikh-asuudlaar-yaria-kheltsel-ekhllekheer-bolov_1513971196', 'yes', NULL, '0', '', '2017-12-22 11:33:17', '2017-12-22 11:33:17', NULL, '2017-12-22 11:33:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `reaction_type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'p-buzzynews', '\"on\"'),
(2, 'p-buzzylists', '\"on\"'),
(3, 'p-buzzyvideos', '\"on\"'),
(4, 'p-buzzypolls', '\"on\"'),
(5, 'siteposturl', '\"1\"'),
(6, 'AutoInHomepage', '\"true\"'),
(7, 'languagetype', '\"en_US\"'),
(8, 'sitefontfamily', '\"\'Lato\', Helvetica, Arial, sans-serif\"'),
(9, 'googlefont', '\"Lato:400,500,500italic,600,700&amp;subset=latin,latin-ext\"');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usertype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username_slug` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `about` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebookurl` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitterurl` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weburl` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `splash` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `username`, `username_slug`, `name`, `town`, `genre`, `icon`, `email`, `password`, `facebook_id`, `about`, `facebookurl`, `twitterurl`, `weburl`, `remember_token`, `created_at`, `updated_at`, `splash`) VALUES
(1, 'Admin', 'admin', 'admin', NULL, NULL, '', NULL, 'admin@admin.com', '$2y$10$g4chBnMIs0F4RzacjIs0ReNM.HdsN0tCSSL0uJMmntwPhFTZJ6QAi', NULL, NULL, NULL, NULL, NULL, 'eDJfuPudsR', '2017-12-22 00:05:32', '2017-12-22 00:05:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `display` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrys`
--
ALTER TABLE `entrys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popularity_stats`
--
ALTER TABLE `popularity_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_username_slug_unique` (`username_slug`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entrys`
--
ALTER TABLE `entrys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `popularity_stats`
--
ALTER TABLE `popularity_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
