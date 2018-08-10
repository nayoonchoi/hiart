-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 18-07-31 23:12
-- 서버 버전: 5.7.22
-- PHP 버전: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `art_platform`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `artwork`
--

CREATE TABLE `artwork` (
  `artwork_id` int(10) NOT NULL,
  `artwork_title` varchar(15) DEFAULT NULL,
  `artwork_kinds` varchar(10) DEFAULT NULL,
  `artwork_materials` varchar(10) DEFAULT NULL,
  `artwork_workdate` date DEFAULT NULL,
  `artwork_price` int(10) DEFAULT NULL,
  `artwork_issold` varchar(1) DEFAULT '0',
  `artwork_description` text,
  `artwork_regTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `artwork_size` varchar(50) DEFAULT NULL,
  `exhibit_id` int(10) DEFAULT NULL,
  `seller_id` int(10) NOT NULL,
  `artwork_image` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `artwork`
--

INSERT INTO `artwork` (`artwork_id`, `artwork_title`, `artwork_kinds`, `artwork_materials`, `artwork_workdate`, `artwork_price`, `artwork_issold`, `artwork_description`, `artwork_regTime`, `artwork_size`, `exhibit_id`, `seller_id`, `artwork_image`) VALUES
(1, '꿈의 세상', '회화', '캔버스', '2018-05-25', 100000, '0', '꿈의세계를 나타내었다', '2018-05-27 00:00:00', '20cm*20cm', NULL, 1, ''),
(2, '홍익인의 하루', '판화', '캔버스', '2018-04-25', 150000, '0', '홍익인의 일상을 나타냄', '2018-05-27 00:00:00', NULL, 1, 1, ''),
(3, '미대생 일상', '사진', '종이', '2018-03-25', 200000, '0', '미대생의 일상을 담은사진', '2018-05-27 00:00:00', '20cm*20cm', NULL, 1, ''),
(4, '잠', '아트상품', '목조', '2018-01-25', 10000, '0', '거실에 놓기 좋은 인테리어제품', '2018-05-27 00:00:00', NULL, 1, 1, ''),
(5, '외톨이', '디자인', '캔버스', '2018-03-25', 1000, '0', '인테리어 제품', '2018-05-27 00:00:00', '100cm*100cm', 1, 1, ''),
(6, '여유로운 시간', '회화', '캔버스', '2018-05-25', 1000000, '0', '여유로운 시간을 느껴보세요', '2018-05-30 00:00:00', '10cm*10cm', 1, 1, ''),
(7, '승리', '공예', '플라스틱', '2018-05-21', 900000, '0', '승리를 추상적으로 나타낸 작품', '2018-05-27 00:00:00', NULL, 1, 1, ''),
(8, '겁쟁이', NULL, '캔버스', '2018-05-25', 80000, '1', NULL, '2018-05-27 00:00:00', '100cm*40cm', 1, 1, ''),
(9, '친구', '디자인', '캔버스', '2018-05-25', 80000, '0', NULL, '2018-05-27 00:00:00', ' ', 1, 1, ''),
(10, '엄마', '회화', '캔버스', '2018-05-25', 30000, '0', '엄마의 사랑을 나타낸 작품', '2018-05-27 00:00:00', '20cm*20cm', 1, 1, ''),
(11, '꿈의 나라', '회화', '캔버스', '2018-07-04', 80000, '0', '테스트입니다.', '2018-07-25 19:01:15', '2', 1, 5, 0x696d616765732e6a7067);

-- --------------------------------------------------------

--
-- 테이블 구조 `exhibition`
--

CREATE TABLE `exhibition` (
  `exhibit_id` int(10) NOT NULL,
  `exhibit_title` varchar(8) DEFAULT NULL,
  `exhibit_sdate` date DEFAULT NULL,
  `exhibit_edate` date DEFAULT NULL,
  `exhibit_place` varchar(20) DEFAULT NULL,
  `exhibit_details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `exhibition`
--

INSERT INTO `exhibition` (`exhibit_id`, `exhibit_title`, `exhibit_sdate`, `exhibit_edate`, `exhibit_place`, `exhibit_details`) VALUES
(1, '홍익컴공', '2018-06-05', '2018-07-23', '홍익대학교현대미술관1관', '많이 보러와주세여.'),
(2, '무적컴공', '2017-04-02', '2017-04-28', '홍익대학교소극장', '사랑합니다.'),
(3, '최강공대', '2016-12-03', '2017-01-02', '홍대학교신축강당', '꼭 보러 오실거죠?'),
(4, '단결홍익', '2015-07-02', '2015-12-01', '홍익대학교현대미술관2관', '나가시는 문은 왼쪽입니다.'),
(5, '민족사학', '2018-01-30', '2018-02-22', '홍익대학교대학로캠퍼스지하1층', ''),
(6, '홍익사랑', '2017-02-23', '2017-03-05', '홍익대총동문회관아트갤러리', '총동문회관은 처음이죠?'),
(7, '한마음', '2018-10-11', '2018-10-13', '홍익대학교현대미술관1관', '과자사다주세요'),
(8, '자주창조', '2018-11-10', '2018-12-10', '홍익대학교현대미술관2관', '힘드네요'),
(9, '협동정진', '2017-01-04', '2017-01-30', '홍익대학교현대미술관1관', '신비롭고 재미난 야작의 세계'),
(10, '홍익인간', '2016-02-01', '2016-03-01', '홍익대학교신축강당', '헷 끝이다');

-- --------------------------------------------------------

--
-- 테이블 구조 `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(10) NOT NULL,
  `manager_pw` char(40) NOT NULL,
  `manager_stid` varchar(15) NOT NULL,
  `manager_phone` varchar(14) NOT NULL,
  `manager_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_pw`, `manager_stid`, `manager_phone`, `manager_email`) VALUES
(1, 'qkqhqkqh', 'B581042', '010-3000-5678', 'kljfsleji@naver.com'),
(2, 'cjswocjswo', ' B211023', '010-4567-2000', 'gkgk@naver.com'),
(3, ' ajdcjddl', 'B135083', '010-4321-1064', 'dsjflei@gmail.com'),
(4, 'EhrEhrgo', 'B623123', '010-9747-1023', 'jsfleji@naver.com'),
(5, 'anjgkwl', 'B781032', '010-7838-1942', 'jsfei@naver.com');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `member_id` int(20) NOT NULL,
  `member_username` varchar(20) DEFAULT NULL,
  `member_pw` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_nickname` varchar(100) DEFAULT NULL,
  `member_phone` varchar(100) DEFAULT NULL,
  `member_stid` varchar(100) DEFAULT NULL,
  `member_gender` varchar(100) DEFAULT NULL,
  `member_email` varchar(100) DEFAULT NULL,
  `member_image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`member_id`, `member_username`, `member_pw`, `member_name`, `member_nickname`, `member_phone`, `member_stid`, `member_gender`, `member_email`, `member_image`) VALUES
(1, 'akad', '1aabac6d068eef6a7bad3fdf50a05cc8', 'dd', 'dd', 'dd', 'dd', 'female', 'nayoon210@naver.com', '테스트.png'),
(2, 'gg', '73c18c59a39b18382081ec00bb456d43', 'gg', 'gg', 'gg', 'gg', 'male', 'nayoon210@naver.com', '테스트.png'),
(5, 'hi', '49f68a5c8493ec2c0bf489821c21fc3b', 'hi', 'hi', 'hi', 'hi', 'male', 'nayoon210@naver.com', ''),
(6, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'test', 'test', 'male', 'nayoon210@naver.com', 'MCDomTnR_400x400.jpg'),
(7, 'test3', '8ad8757baa8564dc136c1e07507f4a98', 'test3', 'test3', 'test3', 'test3', 'male', 'test3@hanmail.com', ''),
(14, 'test6', '4cfad7076129962ee70c36839a1e3e15', 'test6', 'nickname', 'phonenum', 'studentid', 'male', 'emal@email.com', 'C:Bitnamiwampstack-7.1.19-1apache2htdocsHI_ARTviewaccountmemberimgerd.JPG'),
(15, 'test8', '5e40d09fa0529781afd1254a42913847', 'test8', 'test8', 'test8', 'test8', 'male', 'aka@aka', '..accountmemberimg홈페이지.JPG'),
(16, 'test9', '739969b53246b2c727850dbb3490ede6', 'test9', 'test9', 'test9', 'test9', 'male', 'choicnyy@gmail.com', '30.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `hit` int(11) DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `qna`
--

INSERT INTO `qna` (`id`, `title`, `description`, `author`, `created`, `hit`, `password`) VALUES
(1, 'About JavaScript', '<h3>Desctiption</h3>\r\n<p>JavaScript  is a dynamic computer programming language. It is most commonly used as part of web browsers, whose implementations allow client-side scripts to interact with the user, control the browser, communicate asynchronously, and alter the document content that is displayed.</p>\r\n<p>\r\nDespite some naming, syntactic, and standard library similarities, JavaScript and Java are otherwise unrelated and have very different semantics. The syntax of JavaScript is actually derived from C, while the semantics and design are influenced by the Self and Scheme programming languages.\r\n</p>\r\n<h3>See Also</h3>\r\n<ul>\r\n  <li><a href=\"http://en.wikipedia.org/wiki/Dynamic_HTML\">Dynamic HTML and Ajax (programming)</a></li>\r\n  <li><a href=\"http://en.wikipedia.org/wiki/Web_interoperability\">Web interoperability</a></li>\r\n  <li><a href=\"http://en.wikipedia.org/wiki/Web_accessibility\">Web accessibility</a></li>\r\n</ul>\r\n', 'egoing', '2015-03-31 12:14:00', 2, '0'),
(2, 'Variable and Constant', '<h3>Desciption</h3>\r\n\r\nIn computer programming, a variable or scalar is a storage location paired with an associated symbolic name (an identifier), which contains some known or unknown quantity or information referred to as a value. The variable name is the usual way to reference the stored value; this separation of name and content allows the name to be used independently of the exact information it represents. The identifier in computer source code can be bound to a value during run time, and the value of the variable may thus change during the course of program execution.\r\n\r\n<h3>See Also</h3>\r\n<ul>\r\n<li>Non-local variable</li>\r\n<li>Variable interpolation</li>\r\n</ul>\r\n', 'k8805', '2015-05-14 10:04:00', 0, '0'),
(3, 'Opeartor', '<h2>Operator</h2>\r\n<h3>Description</h3>\r\n<p>Programming languages typically support a set of operators: constructs which behave generally like functions, but which differ syntactically or semantically from usual functions</p>\r\n<p>Common simple examples include arithmetic (addition with +, comparison with >) and logical operations (such as AND or &&). </p>\r\n', 'egoing', '2015-06-18 05:00:00', 0, '0'),
(4, 'Conditional', '<h3>Description</h3>\r\n<p>In computer science, conditional statements, conditional expressions and conditional constructs are features of a programming language which perform different computations or actions depending on whether a programmer-specified boolean condition evaluates to true or false. Apart from the case of branch predication, this is always achieved by selectively altering the control flow based on some condition.</p>\r\n<p>In imperative programming languages, the term \"conditional statement\" is usually used, whereas in functional programming, the terms \"conditional expression\" or \"conditional construct\" are preferred, because these terms all have distinct meanings.</p>\r\n<h3>See Also</h3>\r\n<ul>\r\n<li><a href=\"http://en.wikipedia.org/wiki/Branch_(computer_science)\" title=\"Branch (computer science)\">Branch (computer science)</a></li>\r\n<li><a href=\"http://en.wikipedia.org/wiki/Conditional_compilation\" title=\"Conditional compilation\">Conditional compilation</a></li>\r\n<li><a href=\"http://en.wikipedia.org/wiki/Dynamic_dispatch\" title=\"Dynamic dispatch\">Dynamic dispatch</a> for another way to make execution choices</li>\r\n<li><a href=\"http://en.wikipedia.org/wiki/McCarthy_Formalism\" title=\"McCarthy Formalism\">McCarthy Formalism</a> for history and historical references</li>\r\n<li><a href=\"http://en.wikipedia.org/wiki/Named_condition\" title=\"Named condition\" class=\"mw-redirect\">Named condition</a></li>\r\n<li><a href=\"http://en.wikipedia.org/wiki/Test_(Unix)\" title=\"Test (Unix)\">Test (Unix)</a></li>\r\n<li><a href=\"http://en.wikipedia.org/wiki/Yoda_conditions\" title=\"Yoda conditions\">Yoda conditions</a></li>\r\n</ul>', 'c2', '2015-07-25 00:00:00', 1, '0'),
(5, '1', '1', '1', '2018-07-14 18:10:45', 1, '0'),
(6, '21', '33', '22', '2018-07-14 18:13:12', 1, '0'),
(7, '14', '15', '13', '2018-07-14 19:44:25', 0, '0'),
(8, '5677', '5789', '1234', '2018-07-14 19:50:33', 2, '0'),
(9, '5677', '5789', '1235', '2018-07-14 19:51:14', 1, '0'),
(10, '1231', '2314', '1929', '2018-07-14 19:51:47', 1, '0'),
(11, 'test6', '65', 'test', '2018-07-14 19:52:45', 2, '0'),
(12, '43', '56', '13', '2018-07-17 22:17:48', 7, '0'),
(17, '달나', '달집라ㅓㄷㅎ', '후후', '2018-07-18 02:13:33', 2, ''),
(18, '다다', '다렇ㄱ미', '하나더', '2018-07-18 02:21:20', 2, ''),
(26, '아아', '아아', '아아', '2018-07-18 16:50:58', 1, ''),
(27, '어어어', '어어어\r\n', '어어', '2018-07-18 16:54:57', 1, ''),
(28, 'ㄴㄹㅇ라ㅓㄴ리', 'ㄷ라ㅓㄴ다ㅣ', '124325', '2018-07-18 16:56:19', 3, '달'),
(29, 'ㄴㅇ라미ㅏ허', '아러니ㅏ험자ㅣㄷ', '234234', '2018-07-18 16:58:47', 4, '아아'),
(30, '테', 'ㅇ나ㅓㄹ니ㅏ얼', '테스트', '2018-07-25 16:54:32', 1, '테스트');

-- --------------------------------------------------------

--
-- 테이블 구조 `qnacom`
--

CREATE TABLE `qnacom` (
  `co_no` int(10) UNSIGNED NOT NULL,
  `b_no` int(10) UNSIGNED NOT NULL,
  `co_order` int(10) UNSIGNED DEFAULT '0',
  `co_content` text NOT NULL,
  `co_id` varchar(20) NOT NULL,
  `co_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `qnacom`
--

INSERT INTO `qnacom` (`co_no`, `b_no`, `co_order`, `co_content`, `co_id`, `co_password`) VALUES
(1, 29, 1, '바보', 'ㅎㅎ', '*A4B6157319038724E3560894F7F932C8886EBFCF'),
(2, 28, 2, '나나', '11', '*AA803D048B666A933E512AA53B36C70174A37D1E'),
(3, 28, 3, 'ddd', 'dd', '*D97C650E9DDB6233CC2F7222E938F0C04278D1A8'),
(4, 28, 4, 'wk', '54321', '*273162E1A674997C0F6481B0BB677E62B5065A00'),
(5, 29, 5, 'gd', '4321', '*C05C68552A6E2FC59ECC2FF0C50D51BB930F47FC'),
(6, 29, 5, 'fdfdfd', '321', '*7297C3E22DEB91303FC493303A8158AD4231F486'),
(7, 30, 7, '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `trade`
--

CREATE TABLE `trade` (
  `trade_id` int(10) NOT NULL,
  `buyer_id` int(10) DEFAULT NULL,
  `seller_id` int(10) DEFAULT NULL,
  `artwork_id` int(10) DEFAULT NULL,
  `trade_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`artwork_id`),
  ADD KEY `exhibit_id` (`exhibit_id`),
  ADD KEY `artwork_ibfk_1` (`seller_id`);

--
-- 테이블의 인덱스 `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`exhibit_id`);

--
-- 테이블의 인덱스 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `qnacom`
--
ALTER TABLE `qnacom`
  ADD PRIMARY KEY (`co_no`);

--
-- 테이블의 인덱스 `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`trade_id`),
  ADD KEY `member_id` (`buyer_id`),
  ADD KEY `artwork_id` (`artwork_id`),
  ADD KEY `trade_ibfk_2` (`seller_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `artwork`
--
ALTER TABLE `artwork`
  MODIFY `artwork_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `exhibit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 테이블의 AUTO_INCREMENT `qnacom`
--
ALTER TABLE `qnacom`
  MODIFY `co_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 테이블의 AUTO_INCREMENT `trade`
--
ALTER TABLE `trade`
  MODIFY `trade_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `artwork_ibfk_2` FOREIGN KEY (`exhibit_id`) REFERENCES `exhibition` (`exhibit_id`);

--
-- 테이블의 제약사항 `trade`
--
ALTER TABLE `trade`
  ADD CONSTRAINT `trade_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `trade_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `trade_ibfk_3` FOREIGN KEY (`artwork_id`) REFERENCES `artwork` (`artwork_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
