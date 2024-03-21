-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchen_story_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(100) NOT NULL,
  `ad_html` text NOT NULL,
  `ad_position` varchar(50) NOT NULL,
  `ad_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_seotitle` varchar(255) DEFAULT NULL,
  `category_description` text NOT NULL,
  `category_seodescription` text DEFAULT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_featured` tinyint(1) NOT NULL DEFAULT 0,
  `category_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_seotitle`, `category_description`, `category_seodescription`, `category_slug`, `category_image`, `category_featured`, `category_status`) VALUES
(2, 'Desserts', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'desserts', 'category_1618205843.jpg', 1, 1),
(3, 'Smoothies', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'smoothies', 'category_1620054252.jpg', 1, 1),
(4, 'Pizza', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'pizza', 'category_1620054496.jpg', 1, 1),
(5, 'Pasta', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'pasta', 'category_1620054659.jpg', 1, 1),
(6, 'Burger', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'burger', 'category_1620054798.jpg', 1, 1),
(7, 'Breakfast', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'breakfast', 'category_1620054842.jpg', 1, 1),
(8, 'Vegan', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', '', 'vegan', 'category_1620055458.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `item_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'lwkl ', '2024-01-25 03:00:56', '2024-01-25 03:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `difficulties`
--

CREATE TABLE `difficulties` (
  `difficult_id` int(11) NOT NULL,
  `difficult_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `difficulties`
--

INSERT INTO `difficulties` (`difficult_id`, `difficult_title`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `email_id` int(2) NOT NULL,
  `email_title` varchar(50) NOT NULL,
  `email_fromname` varchar(50) NOT NULL,
  `email_plaintext` varchar(5) NOT NULL DEFAULT 'false',
  `email_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `email_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `emailtemplates`
--

INSERT INTO `emailtemplates` (`email_id`, `email_title`, `email_fromname`, `email_plaintext`, `email_disabled`, `email_content`) VALUES
(1, 'New User Registered (Welcome Email)', 'RealFood', 'false', 0, '[{\"message\":\"<!doctype html>\\r\\n<html xmlns=\\\"http:\\/\\/www.w3.org\\/1999\\/xhtml\\\" xmlns:v=\\\"urn:schemas-microsoft-com:vml\\\" xmlns:o=\\\"urn:schemas-microsoft-com:office:office\\\">\\r\\n\\r\\n<head>\\r\\n<title>\\r\\n\\r\\n<\\/title>\\r\\n<!--[if !mso]> -->\\r\\n<meta http-equiv=\\\"X-UA-Compatible\\\" content=\\\"IE=edge\\\">\\r\\n<!--<![endif]-->\\r\\n<meta http-equiv=\\\"Content-Type\\\" content=\\\"text\\/html; charset=UTF-8\\\">\\r\\n<meta name=\\\"viewport\\\" content=\\\"width=device-width, initial-scale=1\\\">\\r\\n<style type=\\\"text\\/css\\\">\\r\\n#outlook a {\\r\\npadding: 0;\\r\\n}\\r\\n\\r\\n.ReadMsgBody {\\r\\nwidth: 100%;\\r\\n}\\r\\n\\r\\n.ExternalClass {\\r\\nwidth: 100%;\\r\\n}\\r\\n\\r\\n.ExternalClass * {\\r\\nline-height: 100%;\\r\\n}\\r\\n\\r\\nbody {\\r\\nmargin: 0;\\r\\npadding: 0;\\r\\n-webkit-text-size-adjust: 100%;\\r\\n-ms-text-size-adjust: 100%;\\r\\n}\\r\\n\\r\\ntable,\\r\\ntd {\\r\\nborder-collapse: collapse;\\r\\nmso-table-lspace: 0pt;\\r\\nmso-table-rspace: 0pt;\\r\\n}\\r\\n\\r\\nimg {\\r\\nborder: 0;\\r\\nheight: auto;\\r\\nline-height: 100%;\\r\\noutline: none;\\r\\ntext-decoration: none;\\r\\n-ms-interpolation-mode: bicubic;\\r\\n}\\r\\n\\r\\np {\\r\\ndisplay: block;\\r\\nmargin: 13px 0;\\r\\n}\\r\\n<\\/style>\\r\\n<!--[if !mso]><!-->\\r\\n<style type=\\\"text\\/css\\\">\\r\\n@media only screen and (max-width:480px) {\\r\\n@-ms-viewport {\\r\\nwidth: 320px;\\r\\n}\\r\\n@viewport {\\r\\nwidth: 320px;\\r\\n}\\r\\n}\\r\\n<\\/style>\\r\\n<!--<![endif]-->\\r\\n<!--[if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]-->\\r\\n<!--[if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]-->\\r\\n\\r\\n\\r\\n<style type=\\\"text\\/css\\\">\\r\\n@media only screen and (min-width:480px) {\\r\\n.mj-column-per-100 {\\r\\nwidth: 100% !important;\\r\\n}\\r\\n}\\r\\n<\\/style>\\r\\n\\r\\n\\r\\n<style type=\\\"text\\/css\\\">\\r\\n<\\/style>\\r\\n\\r\\n<\\/head>\\r\\n\\r\\n<body style=\\\"background-color:#f9f9f9;\\\">\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #333957 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 130px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"130\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Welcome!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hello {USER_NAME}!<\\/div>\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><br \\/>Thank you for signing up. We\'re really happy to have you! Click the link below to login to your account:<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#333333\\\"><a style=\\\"background: #333333; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> Login to Your Account <\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Cheers,<br \\/><a style=\\\"color: #2f67f6;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n\\r\\n<\\/html>\",\"subject\":\"Welcome to {SITE_NAME}\"}]'),
(2, 'Forgot Password - Reset Link', 'RealFood', 'false', 0, '[{\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #333957 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 130px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"130\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Reset Password<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hi {USER_NAME},<br \\/><br \\/>We received a request to reset your password. Use the button below to set up a new password for your account.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#333333\\\"><a style=\\\"background: #333333; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{RESET_URL}\\\"> Reset Password<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: underline; font-size: 16px; line-height: 22px; text-align: center; color: #555;\\\">This link will be valid for the next 24 hours.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">If you did not make this request, just ignore this email.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Cheers,<br \\/><a style=\\\"color: #2f67f6;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notification\"},{\"lang\":\"ar\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">\\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">\\u0645\\u0631\\u062d\\u0628\\u0627 {USER_NAME},<br \\/><br \\/>\\u0644\\u0642\\u062f \\u062a\\u0644\\u0642\\u064a\\u0646\\u0627 \\u0637\\u0644\\u0628\\u064b\\u0627 \\u0644\\u0625\\u0639\\u0627\\u062f\\u0629 \\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643. \\u0627\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0627\\u0644\\u0632\\u0631 \\u0623\\u062f\\u0646\\u0627\\u0647 \\u0644\\u0625\\u0639\\u062f\\u0627\\u062f \\u0643\\u0644\\u0645\\u0629 \\u0645\\u0631\\u0648\\u0631 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0644\\u062d\\u0633\\u0627\\u0628\\u0643.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{RESET_URL}\\\"> \\u0625\\u0639\\u0627\\u062f\\u0629 \\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0627\\u0644\\u0622\\u0646<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: underline; font-size: 16px; line-height: 22px; text-align: center; color: #555;\\\">\\u0633\\u064a\\u0643\\u0648\\u0646 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0637 \\u0635\\u0627\\u0644\\u062d\\u064b\\u0627 \\u0644\\u0645\\u062f\\u0629 24 \\u0633\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0642\\u0627\\u062f\\u0645\\u0629.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">\\u0625\\u0630\\u0627 \\u0644\\u0645 \\u062a\\u0643\\u0646 \\u0642\\u062f \\u0642\\u062f\\u0645\\u062a \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u060c \\u0641\\u062a\\u062c\\u0627\\u0647\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0641\\u0642\\u0637.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">\\u0645\\u0639 \\u062a\\u062d\\u064a\\u0627\\u062a\\u064a,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"\\u0625\\u0634\\u0639\\u0627\\u0631\"},{\"lang\":\"es\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Restablecer Contrase&ntilde;a<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hola {USER_NAME},<br \\/><br \\/>Recibimos una solicitud para restablecer su contrase&ntilde;a. Utilice el bot&oacute;n de abajo para configurar una nueva contrase&ntilde;a para su cuenta.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{RESET_URL}\\\"> Restablecer Ahora<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: underline; font-size: 16px; line-height: 22px; text-align: center; color: #555;\\\">Este enlace ser&aacute; v&aacute;lido durante las pr&oacute;ximas 24 horas.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Si no realiz&oacute; esta solicitud, simplemente ignore este correo electr&oacute;nico.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Saludos,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notificaci\\u00f3n\"}]');
INSERT INTO `emailtemplates` (`email_id`, `email_title`, `email_fromname`, `email_plaintext`, `email_disabled`, `email_content`) VALUES
(3, 'Password Reset - Confirmation', 'RealFood', 'false', 0, '[{\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Password Changed!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hi {USER_NAME},<br \\/><br \\/>Your password has been changed. <br \\/><br \\/>Didn&rsquo;t change your password? <a style=\\\"color: #2f67f6;\\\" href=\\\"{SITE_DOMAIN}\\\">Contact Support<\\/a> so we can make sure no one else is trying to access your account.<br \\/><br \\/>Use the button below to return to the login page:<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> Login to Your Account<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Cheers,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notification\"},{\"lang\":\"ar\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">\\u062a\\u0645 \\u062a\\u063a\\u064a\\u064a\\u0631 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0633\\u0631!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u0645\\u0631\\u062d\\u0628\\u0627 {USER_NAME},<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u062a\\u0645 \\u062a\\u063a\\u064a\\u064a\\u0631 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0633\\u0631 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643.<\\/span><\\/span><\\/div>\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u0644\\u0645 \\u062a\\u063a\\u064a\\u0631 \\u0643\\u0644\\u0645\\u0629 \\u0645\\u0631\\u0648\\u0631\\u0643\\u061f <a href=\\\"{SITE_DOMAIN}\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0627\\u0644\\u062f\\u0639\\u0645<\\/a> \\u062d\\u062a\\u0649 \\u0646\\u062a\\u0645\\u0643\\u0646 \\u0645\\u0646 \\u0627\\u0644\\u062a\\u0623\\u0643\\u062f \\u0645\\u0646 \\u0639\\u062f\\u0645 \\u0645\\u062d\\u0627\\u0648\\u0644\\u0629 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u0622\\u062e\\u0631 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u0625\\u0644\\u0649 \\u062d\\u0633\\u0627\\u0628\\u0643.<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u0627\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0627\\u0644\\u0632\\u0631 \\u0623\\u062f\\u0646\\u0627\\u0647 \\u0644\\u0644\\u0639\\u0648\\u062f\\u0629 \\u0625\\u0644\\u0649 \\u0635\\u0641\\u062d\\u0629 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644:<\\/span><\\/span><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">\\u0645\\u0639 \\u062a\\u062d\\u064a\\u0627\\u062a\\u064a,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"\\u0625\\u0634\\u0639\\u0627\\u0631\"},{\"lang\":\"es\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">&iexcl;Contrase&ntilde;a Cambiada!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">Hola {USER_NAME},<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">Tu contrase&ntilde;a ha sido cambiada. <\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">&iquest;No cambiaste tu contrase&ntilde;a? <a href=\\\"{SITE_DOMAIN}\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">Comun&iacute;quese con Soporte<\\/a> para que podamos asegurarnos de que nadie m&aacute;s intente acceder a su cuenta.<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">Utilice el bot&oacute;n de abajo para volver a la p&aacute;gina de inicio de sesi&oacute;n:<\\/span><\\/span><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> Ingrese a su cuenta<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Saludos,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notificaci\\u00f3n\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `item`, `user`) VALUES
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_header` tinyint(1) DEFAULT 0,
  `menu_footer` tinyint(1) DEFAULT 0,
  `menu_sidebar` tinyint(1) DEFAULT 0,
  `menu_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_header`, `menu_footer`, `menu_sidebar`, `menu_status`) VALUES
(1, 'Header', 1, NULL, NULL, 1),
(2, 'Footer', NULL, 1, NULL, 1),
(3, 'Sidebar', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `navigation_id` int(11) NOT NULL,
  `navigation_order` int(11) NOT NULL,
  `navigation_url` varchar(150) DEFAULT NULL,
  `navigation_label` varchar(50) DEFAULT NULL,
  `navigation_target` varchar(50) NOT NULL,
  `navigation_type` varchar(50) NOT NULL,
  `navigation_page` int(11) DEFAULT NULL,
  `navigation_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`navigation_id`, `navigation_order`, `navigation_url`, `navigation_label`, `navigation_target`, `navigation_type`, `navigation_page`, `navigation_menu`) VALUES
(4, 1, NULL, NULL, '_self', 'page', 2, 1),
(5, 2, NULL, NULL, '_self', 'page', 4, 1),
(6, 1, NULL, NULL, '_self', 'page', 5, 2),
(7, 2, NULL, NULL, '_self', 'page', 1, 2),
(8, 0, '/', 'Home', '_self', 'custom', NULL, 1),
(9, 0, '/', 'Home Page', '_self', 'custom', NULL, 2),
(10, 3, '/', 'Home', '_self', 'custom', NULL, 3),
(11, 4, NULL, NULL, '_self', 'page', 2, 3),
(12, 5, NULL, NULL, '_self', 'page', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(150) NOT NULL,
  `page_content` text NOT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 1,
  `page_private` tinyint(1) NOT NULL DEFAULT 0,
  `page_footer` tinyint(1) NOT NULL DEFAULT 1,
  `page_ad_header` tinyint(1) NOT NULL DEFAULT 0,
  `page_ad_footer` tinyint(1) NOT NULL DEFAULT 0,
  `page_ad_sidebar` tinyint(1) NOT NULL DEFAULT 0,
  `page_template` varchar(50) NOT NULL DEFAULT 'blank',
  `page_slug` varchar(150) NOT NULL,
  `page_seotitle` varchar(150) NOT NULL,
  `page_seodescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_content`, `page_status`, `page_private`, `page_footer`, `page_ad_header`, `page_ad_footer`, `page_ad_sidebar`, `page_template`, `page_slug`, `page_seotitle`, `page_seodescription`) VALUES
(1, 'Terms and Conditions', '<h4>What is Lorem Ipsum?</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h4>Why do we use it?</h4>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>\r\n<p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 0, 1, 0, 0, 0, 'terms', 'terms-and-conditions', '', ''),
(2, 'Search', '', 1, 0, 1, 0, 0, 0, 'search', 'search', '', ''),
(3, 'Sample Page', '', 1, 0, 1, 0, 0, 0, 'blank', 'sample-page', '', ''),
(4, 'Members', '', 1, 0, 1, 0, 0, 0, 'members', 'members', '', ''),
(5, 'Privacy Policy', '<h4>What is Lorem Ipsum?</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h4>Why do we use it?</h4>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>\r\n<p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 0, 1, 0, 0, 0, 'privacy', 'privacy-policy', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `recipe_title` varchar(255) NOT NULL,
  `recipe_seotitle` varchar(255) DEFAULT NULL,
  `recipe_description` text NOT NULL,
  `recipe_seodescription` text DEFAULT NULL,
  `recipe_category` int(11) DEFAULT NULL,
  `recipe_time` varchar(255) NOT NULL,
  `recipe_slug` varchar(255) NOT NULL,
  `recipe_servings` varchar(255) NOT NULL,
  `recipe_difficult` int(11) DEFAULT NULL,
  `recipe_author` int(11) NOT NULL,
  `recipe_ingredients` text NOT NULL,
  `recipe_instructions` text NOT NULL,
  `recipe_image` varchar(255) NOT NULL,
  `recipe_video` varchar(255) DEFAULT NULL,
  `recipe_carbs` varchar(55) DEFAULT NULL,
  `recipe_protein` varchar(55) DEFAULT NULL,
  `recipe_fat` varchar(55) DEFAULT NULL,
  `recipe_kcal` varchar(55) DEFAULT NULL,
  `recipe_featured` tinyint(1) NOT NULL DEFAULT 0,
  `recipe_facts` tinyint(1) NOT NULL DEFAULT 1,
  `recipe_status` tinyint(1) NOT NULL DEFAULT 1,
  `recipe_created` datetime NOT NULL DEFAULT current_timestamp(),
  `recipe_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_title`, `recipe_seotitle`, `recipe_description`, `recipe_seodescription`, `recipe_category`, `recipe_time`, `recipe_slug`, `recipe_servings`, `recipe_difficult`, `recipe_author`, `recipe_ingredients`, `recipe_instructions`, `recipe_image`, `recipe_video`, `recipe_carbs`, `recipe_protein`, `recipe_fat`, `recipe_kcal`, `recipe_featured`, `recipe_facts`, `recipe_status`, `recipe_created`, `recipe_updated`) VALUES
(1, 'Mighty Super Cheesecake', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 2, '45 Min', 'mighty-super-cheesecake', '4', 2, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1618205715.jpg', 'afE7WD2raMw', '29g', '7g', '35g', '356 Kcal', 1, 1, 1, '2021-04-14 07:35:15', '2024-01-25 08:35:02'),
(2, 'Mozzarella Cheese Bruschetta', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 5, '5 Min', 'broad-beans-tomato-garlic-mozzarella-cheese-bruschetta', '2', 1, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620056120.jpg', '', '29g', '7g', '35g', '256 Kcal', 1, 1, 1, '2021-04-12 07:35:15', '2021-05-15 13:24:28'),
(3, 'Spinach and Cheese Pasta', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 8, '15 Min', 'spinach-and-cheese-pasta', '4', 1, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1619359174.jpg', '', '29g', '7g', '35g', '356 Kcal', 1, 1, 1, '2021-04-12 07:35:15', '2021-05-15 13:24:27'),
(5, 'Brownies with Walnuts', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 2, '25 Min', 'brownies-with-walnuts', '3', 2, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620058937.jpg', '', '29g', '7g', '35g', '356 Kcal', 0, 1, 1, '2021-04-12 07:35:15', '2021-05-14 23:29:25'),
(6, 'Berries and Banana Smoothie', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 3, '5 Min', 'berries-and-banana-smoothie', '1', 1, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620059598.jpg', '', '29g', '7g', '35g', '356 Kcal', 1, 1, 1, '2021-04-12 07:35:15', '2021-05-25 22:59:04'),
(7, 'How to make fast margherita pizza', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 4, '45 Min', 'how-to-make-fast-margherita-pizza', '4', 2, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620060146.jpg', 'L3f7WnO0MvQ', '29g', '7g', '35g', '356 Kcal', 1, 1, 1, '2021-04-12 07:35:15', '2022-02-03 22:28:10'),
(8, 'Crispy Burger with Blue Cheese', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 6, '30 Min', 'crispy-burger-with-blue-cheese', '4', 2, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620060348.jpg', '', '29g', '7g', '35g', '356 Kcal', 0, 1, 1, '2021-04-12 07:35:15', '2021-05-14 23:29:23'),
(9, 'Tasty croissant and tea', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 7, '25 Min', 'tasty-croissant-and-tea', '3', 3, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620061168.jpg', '', '29g', '7g', '35g', '356 Kcal', 0, 1, 1, '2021-04-12 07:35:15', '2021-05-15 13:24:32'),
(10, 'Blueberries and Cream almond', '', 'Nam aliquam sem et tortor consequat. Odio tempor orci dapibus ultrices in iaculis. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sed risus ultricies tristique nulla aliquet. Excepteur sint occaecat cupidatat non proident', '', 7, '8 Min', 'blueberries-and-cream-almond-oatmeal', '2', 1, 1, '400g graham crackers,150g unsalted butters,300g marshmallows,3 drops blue food gel,250ml thickened/whipping cream', 'To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.,Pour mixture into a 20cm (8”) tart tin. Use the back of a spoon to firmly press the mixture', 'recipe_1620061767.jpg', '', '29g', '7g', '35g', '356 Kcal', 1, 1, 1, '2021-04-12 07:35:15', '2021-05-19 21:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Editor'),
(3, 'Subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `st_dateformat` varchar(20) NOT NULL DEFAULT 'd/m/Y',
  `st_langdir` varchar(55) NOT NULL DEFAULT 'ltr',
  `st_facebook` varchar(255) DEFAULT NULL,
  `st_twitter` varchar(255) DEFAULT NULL,
  `st_youtube` varchar(255) DEFAULT NULL,
  `st_instagram` varchar(255) DEFAULT NULL,
  `st_linkedin` varchar(255) DEFAULT NULL,
  `st_whatsapp` varchar(255) DEFAULT NULL,
  `st_defaultsearchpage` int(11) NOT NULL,
  `st_defaultprivacypage` int(11) NOT NULL,
  `st_defaultmemberspage` int(11) NOT NULL,
  `st_defaulttermspage` int(11) NOT NULL,
  `st_maintenance` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `st_analytics` text NOT NULL,
  `st_recipientemail` varchar(100) NOT NULL,
  `st_smtphost` varchar(50) NOT NULL,
  `st_smtpemail` varchar(100) NOT NULL,
  `st_smtppassword` varchar(50) NOT NULL,
  `st_smtpencrypt` varchar(50) NOT NULL,
  `st_smtpport` varchar(50) NOT NULL,
  `st_recaptchakey` varchar(150) NOT NULL,
  `st_recaptchasecretkey` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `st_dateformat`, `st_langdir`, `st_facebook`, `st_twitter`, `st_youtube`, `st_instagram`, `st_linkedin`, `st_whatsapp`, `st_defaultsearchpage`, `st_defaultprivacypage`, `st_defaultmemberspage`, `st_defaulttermspage`, `st_maintenance`, `st_analytics`, `st_recipientemail`, `st_smtphost`, `st_smtpemail`, `st_smtppassword`, `st_smtpencrypt`, `st_smtpport`, `st_recaptchakey`, `st_recaptchasecretkey`) VALUES
(1, 'd/m/Y', 'ltr', 'https://www.facebook.com/', 'https://twitter.com/home', 'https://www.youtube.com/', '', 'https://www.linkedin.com/', '', 2, 5, 4, 1, 0, '', 'recipient@email.com', 'host', 'email@smtp.com', 'password', 'ssl/tls', '587', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_email` varchar(255) NOT NULL,
  `subscriber_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `th_headerstyle` varchar(50) NOT NULL,
  `th_homestyle` varchar(50) NOT NULL,
  `th_logo` varchar(255) NOT NULL,
  `th_whitelogo` varchar(255) NOT NULL,
  `th_favicon` varchar(255) NOT NULL,
  `th_homebg` varchar(255) NOT NULL,
  `th_testimonial` varchar(255) NOT NULL,
  `th_primarycolor` varchar(50) NOT NULL DEFAULT '#f26522',
  `th_secondarycolor` varchar(50) NOT NULL DEFAULT '#0d215a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `th_headerstyle`, `th_homestyle`, `th_logo`, `th_whitelogo`, `th_favicon`, `th_homebg`, `th_testimonial`, `th_primarycolor`, `th_secondarycolor`) VALUES
(1, 'header1', 'home2', '1706164203.jpeg', '1706164203.jpeg', '1706164203.png', '1618274931.jpg', '', '#ff7a00', '#484848'),
(2, 'header1', 'home2', '1706164203.jpeg', '1706164203.jpeg', '1706164203.png', '1618274931.jpg', '', '#ff7a00', '#484848');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_email` varchar(250) NOT NULL,
  `token_key` varchar(250) NOT NULL,
  `token_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token_email`, `token_key`, `token_date`) VALUES
('support@wicombit.com', '639176f5a34b2cd602dc68d94b8241dc5f86f05a5123c7647be981c3e05d699853187816740be9317fd0457bd7abf0fe8f1d24737ac1ea61eb399e697d8a13a60924c628fe', '2021-07-03 19:17:38'),
('abhishekpro1503@gmail.com', '180d89116d539956224fd962ca0c94ce652546783dfcf3aad4f1c4d62dbe59c459212997328553ff310bb4c6ab833dd5abb721b145827b0d4474d2ec3b0d5e85bf80361cf5', '2021-07-23 07:09:44'),
('ahmedhalahmadi1@gmail.com', '91634b6f34f5d66eeff7c4375680bff2176bdb3648bb3a8a287c47500b4a470a1474b2d08c7f97f8a06325ee47456ae3db7687a17c18b7530c2cf4bcebb7a70ebafb893d4f', '2021-07-26 15:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `tr_maintenancepage` varchar(100) NOT NULL,
  `tr_maintenancetitle` varchar(100) NOT NULL,
  `tr_maintenancesub` text NOT NULL,
  `tr_profilepage` varchar(50) NOT NULL,
  `tr_signinpage` varchar(50) NOT NULL,
  `tr_signuppage` varchar(50) NOT NULL,
  `tr_resetpage` varchar(50) NOT NULL,
  `tr_forgotpage` varchar(50) NOT NULL,
  `tr_termsandconds` text NOT NULL,
  `tr_aboutus` text NOT NULL,
  `tr_eptitle` varchar(100) NOT NULL,
  `tr_epsubtitle` varchar(100) NOT NULL,
  `tr_eptagline` varchar(150) NOT NULL,
  `tr_epbutton` varchar(50) NOT NULL,
  `tr_1` varchar(100) NOT NULL,
  `tr_2` varchar(100) NOT NULL,
  `tr_3` varchar(100) NOT NULL,
  `tr_4` varchar(100) NOT NULL,
  `tr_5` varchar(100) NOT NULL,
  `tr_6` varchar(100) NOT NULL,
  `tr_7` varchar(100) NOT NULL,
  `tr_8` varchar(100) NOT NULL,
  `tr_9` varchar(100) NOT NULL,
  `tr_10` varchar(100) NOT NULL,
  `tr_11` varchar(100) NOT NULL,
  `tr_12` varchar(100) NOT NULL,
  `tr_13` varchar(100) NOT NULL,
  `tr_14` varchar(100) NOT NULL,
  `tr_15` varchar(100) NOT NULL,
  `tr_16` varchar(100) NOT NULL,
  `tr_17` varchar(100) NOT NULL,
  `tr_18` varchar(100) NOT NULL,
  `tr_19` varchar(100) NOT NULL,
  `tr_20` varchar(100) NOT NULL,
  `tr_21` varchar(100) NOT NULL,
  `tr_22` varchar(100) NOT NULL,
  `tr_23` varchar(100) NOT NULL,
  `tr_24` varchar(100) NOT NULL,
  `tr_25` varchar(100) NOT NULL,
  `tr_26` varchar(100) NOT NULL,
  `tr_27` varchar(100) NOT NULL,
  `tr_28` varchar(100) NOT NULL,
  `tr_29` varchar(100) NOT NULL,
  `tr_30` varchar(100) NOT NULL,
  `tr_31` varchar(255) NOT NULL,
  `tr_32` varchar(255) NOT NULL,
  `tr_33` varchar(100) NOT NULL,
  `tr_34` varchar(100) NOT NULL,
  `tr_35` varchar(100) NOT NULL,
  `tr_36` varchar(100) NOT NULL,
  `tr_37` varchar(100) NOT NULL,
  `tr_38` varchar(100) NOT NULL,
  `tr_39` varchar(100) NOT NULL,
  `tr_40` varchar(100) NOT NULL DEFAULT '-',
  `tr_41` varchar(100) NOT NULL DEFAULT '-',
  `tr_42` varchar(100) NOT NULL DEFAULT '-',
  `tr_43` varchar(100) NOT NULL DEFAULT '-',
  `tr_44` varchar(100) NOT NULL DEFAULT '-',
  `tr_45` varchar(100) NOT NULL DEFAULT '-',
  `tr_46` varchar(100) NOT NULL DEFAULT '-',
  `tr_47` varchar(100) NOT NULL DEFAULT '-',
  `tr_48` varchar(100) NOT NULL DEFAULT '-',
  `tr_49` varchar(100) NOT NULL DEFAULT '-',
  `tr_50` varchar(100) NOT NULL DEFAULT '-',
  `tr_51` varchar(100) NOT NULL DEFAULT '-',
  `tr_52` varchar(100) NOT NULL DEFAULT '-',
  `tr_79` varchar(100) NOT NULL DEFAULT '-',
  `tr_80` varchar(100) NOT NULL DEFAULT '-',
  `tr_81` varchar(100) NOT NULL DEFAULT '-',
  `tr_82` varchar(100) NOT NULL DEFAULT '-',
  `tr_83` varchar(100) NOT NULL DEFAULT '-',
  `tr_84` varchar(100) NOT NULL DEFAULT '-',
  `tr_85` varchar(100) NOT NULL DEFAULT '-',
  `tr_86` varchar(100) NOT NULL DEFAULT '-',
  `tr_87` varchar(100) NOT NULL DEFAULT '-',
  `tr_88` varchar(100) NOT NULL DEFAULT '-',
  `tr_89` varchar(100) NOT NULL DEFAULT '-',
  `tr_90` varchar(100) NOT NULL DEFAULT '-',
  `tr_91` varchar(100) NOT NULL DEFAULT '-',
  `tr_92` varchar(100) NOT NULL DEFAULT '-',
  `tr_93` varchar(100) NOT NULL DEFAULT '-',
  `tr_94` varchar(100) NOT NULL DEFAULT '-',
  `tr_95` varchar(100) NOT NULL DEFAULT '-',
  `tr_96` varchar(100) NOT NULL DEFAULT '-',
  `tr_97` varchar(100) NOT NULL DEFAULT '-',
  `tr_98` varchar(100) NOT NULL DEFAULT '-',
  `tr_99` varchar(100) NOT NULL DEFAULT '-',
  `tr_100` varchar(100) NOT NULL DEFAULT '-',
  `tr_101` varchar(50) NOT NULL DEFAULT '-',
  `tr_102` varchar(50) NOT NULL DEFAULT '-',
  `tr_103` varchar(50) NOT NULL DEFAULT '-',
  `tr_104` varchar(50) NOT NULL DEFAULT '-',
  `tr_105` varchar(50) NOT NULL DEFAULT '-',
  `tr_106` varchar(50) NOT NULL DEFAULT '-',
  `tr_107` varchar(50) NOT NULL DEFAULT '-',
  `tr_108` varchar(50) NOT NULL DEFAULT '-',
  `tr_109` varchar(50) NOT NULL DEFAULT '-',
  `tr_110` varchar(50) NOT NULL DEFAULT '-',
  `tr_111` varchar(50) NOT NULL DEFAULT '-',
  `tr_112` varchar(50) NOT NULL DEFAULT '-',
  `tr_113` varchar(50) NOT NULL DEFAULT '-',
  `tr_114` varchar(50) NOT NULL DEFAULT '-',
  `tr_115` text NOT NULL,
  `tr_116` varchar(50) NOT NULL DEFAULT '-',
  `tr_117` varchar(50) NOT NULL DEFAULT '-',
  `tr_118` text NOT NULL,
  `tr_119` text NOT NULL,
  `tr_120` varchar(255) NOT NULL DEFAULT '-',
  `tr_121` varchar(255) NOT NULL DEFAULT '-',
  `tr_122` varchar(255) NOT NULL DEFAULT '-',
  `tr_123` varchar(255) NOT NULL DEFAULT '-',
  `tr_124` varchar(255) NOT NULL DEFAULT '-',
  `tr_125` varchar(255) NOT NULL DEFAULT '-',
  `tr_126` varchar(255) NOT NULL DEFAULT '-',
  `tr_127` varchar(255) NOT NULL DEFAULT '-',
  `tr_128` varchar(255) NOT NULL DEFAULT '-',
  `tr_129` varchar(255) NOT NULL DEFAULT '-',
  `tr_130` varchar(255) NOT NULL DEFAULT '-',
  `tr_131` varchar(255) NOT NULL DEFAULT '-',
  `tr_132` varchar(255) NOT NULL DEFAULT '-',
  `tr_133` varchar(255) NOT NULL DEFAULT '-',
  `tr_134` varchar(255) NOT NULL DEFAULT '-',
  `tr_135` varchar(50) NOT NULL DEFAULT '-',
  `tr_136` varchar(50) NOT NULL DEFAULT '-',
  `tr_137` varchar(50) NOT NULL DEFAULT '-',
  `tr_138` varchar(50) NOT NULL DEFAULT '-',
  `tr_139` varchar(50) NOT NULL DEFAULT '-',
  `tr_140` varchar(50) NOT NULL DEFAULT '-',
  `tr_141` varchar(50) NOT NULL DEFAULT '-',
  `tr_142` varchar(50) NOT NULL DEFAULT '-',
  `tr_143` varchar(50) NOT NULL DEFAULT '-',
  `tr_144` varchar(50) NOT NULL DEFAULT '-',
  `tr_145` varchar(50) NOT NULL DEFAULT '-',
  `tr_146` varchar(50) NOT NULL DEFAULT '-',
  `tr_147` varchar(50) NOT NULL DEFAULT '-',
  `tr_148` varchar(50) NOT NULL DEFAULT '-',
  `tr_149` varchar(50) NOT NULL DEFAULT '-',
  `tr_150` varchar(50) NOT NULL DEFAULT '-',
  `tr_151` varchar(50) NOT NULL DEFAULT '-',
  `tr_152` varchar(50) NOT NULL DEFAULT '-',
  `tr_153` varchar(50) NOT NULL DEFAULT '-',
  `tr_154` varchar(50) NOT NULL DEFAULT '-',
  `tr_155` varchar(50) NOT NULL DEFAULT '-',
  `tr_156` varchar(50) NOT NULL DEFAULT '-',
  `tr_157` varchar(50) NOT NULL DEFAULT '-',
  `tr_158` varchar(50) NOT NULL DEFAULT '-',
  `tr_159` varchar(50) NOT NULL DEFAULT '-',
  `tr_160` varchar(50) NOT NULL DEFAULT '-',
  `tr_161` varchar(50) NOT NULL DEFAULT '-',
  `tr_162` varchar(50) NOT NULL DEFAULT '-',
  `tr_163` varchar(50) NOT NULL DEFAULT '-',
  `tr_164` varchar(50) NOT NULL DEFAULT '-',
  `tr_165` varchar(50) NOT NULL DEFAULT '-',
  `tr_166` varchar(50) NOT NULL DEFAULT '-',
  `tr_167` varchar(50) NOT NULL DEFAULT '-',
  `tr_168` varchar(50) NOT NULL DEFAULT '-',
  `tr_169` varchar(50) NOT NULL DEFAULT '-',
  `tr_170` varchar(50) NOT NULL DEFAULT '-',
  `tr_171` varchar(50) NOT NULL DEFAULT '-',
  `tr_172` varchar(50) NOT NULL DEFAULT '-',
  `tr_173` varchar(50) NOT NULL DEFAULT '-',
  `tr_174` varchar(50) NOT NULL DEFAULT '-',
  `tr_175` varchar(50) NOT NULL DEFAULT '-',
  `tr_176` varchar(50) NOT NULL DEFAULT '-',
  `tr_177` varchar(50) NOT NULL DEFAULT '-',
  `tr_178` varchar(50) NOT NULL DEFAULT '-',
  `tr_179` varchar(50) NOT NULL DEFAULT '-',
  `tr_180` varchar(50) NOT NULL DEFAULT '-',
  `tr_181` varchar(50) NOT NULL DEFAULT '-',
  `tr_182` varchar(50) NOT NULL DEFAULT '-',
  `tr_183` varchar(50) NOT NULL DEFAULT '-',
  `tr_184` varchar(50) NOT NULL DEFAULT '-',
  `tr_185` varchar(50) NOT NULL DEFAULT '-',
  `tr_186` varchar(50) NOT NULL DEFAULT '-',
  `tr_187` varchar(50) NOT NULL DEFAULT '-',
  `tr_188` varchar(50) NOT NULL DEFAULT '-',
  `tr_189` varchar(50) NOT NULL DEFAULT '-',
  `tr_190` varchar(50) NOT NULL DEFAULT '-',
  `tr_191` varchar(50) NOT NULL DEFAULT '-',
  `tr_192` varchar(50) NOT NULL DEFAULT '-',
  `tr_193` varchar(50) NOT NULL DEFAULT '-',
  `tr_194` varchar(50) NOT NULL DEFAULT '-',
  `tr_195` varchar(50) NOT NULL DEFAULT '-',
  `tr_196` varchar(50) NOT NULL DEFAULT '-',
  `tr_197` varchar(50) NOT NULL DEFAULT '-',
  `tr_198` varchar(50) NOT NULL DEFAULT '-',
  `tr_199` varchar(50) NOT NULL DEFAULT '-',
  `tr_200` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`tr_maintenancepage`, `tr_maintenancetitle`, `tr_maintenancesub`, `tr_profilepage`, `tr_signinpage`, `tr_signuppage`, `tr_resetpage`, `tr_forgotpage`, `tr_termsandconds`, `tr_aboutus`, `tr_eptitle`, `tr_epsubtitle`, `tr_eptagline`, `tr_epbutton`, `tr_1`, `tr_2`, `tr_3`, `tr_4`, `tr_5`, `tr_6`, `tr_7`, `tr_8`, `tr_9`, `tr_10`, `tr_11`, `tr_12`, `tr_13`, `tr_14`, `tr_15`, `tr_16`, `tr_17`, `tr_18`, `tr_19`, `tr_20`, `tr_21`, `tr_22`, `tr_23`, `tr_24`, `tr_25`, `tr_26`, `tr_27`, `tr_28`, `tr_29`, `tr_30`, `tr_31`, `tr_32`, `tr_33`, `tr_34`, `tr_35`, `tr_36`, `tr_37`, `tr_38`, `tr_39`, `tr_40`, `tr_41`, `tr_42`, `tr_43`, `tr_44`, `tr_45`, `tr_46`, `tr_47`, `tr_48`, `tr_49`, `tr_50`, `tr_51`, `tr_52`, `tr_79`, `tr_80`, `tr_81`, `tr_82`, `tr_83`, `tr_84`, `tr_85`, `tr_86`, `tr_87`, `tr_88`, `tr_89`, `tr_90`, `tr_91`, `tr_92`, `tr_93`, `tr_94`, `tr_95`, `tr_96`, `tr_97`, `tr_98`, `tr_99`, `tr_100`, `tr_101`, `tr_102`, `tr_103`, `tr_104`, `tr_105`, `tr_106`, `tr_107`, `tr_108`, `tr_109`, `tr_110`, `tr_111`, `tr_112`, `tr_113`, `tr_114`, `tr_115`, `tr_116`, `tr_117`, `tr_118`, `tr_119`, `tr_120`, `tr_121`, `tr_122`, `tr_123`, `tr_124`, `tr_125`, `tr_126`, `tr_127`, `tr_128`, `tr_129`, `tr_130`, `tr_131`, `tr_132`, `tr_133`, `tr_134`, `tr_135`, `tr_136`, `tr_137`, `tr_138`, `tr_139`, `tr_140`, `tr_141`, `tr_142`, `tr_143`, `tr_144`, `tr_145`, `tr_146`, `tr_147`, `tr_148`, `tr_149`, `tr_150`, `tr_151`, `tr_152`, `tr_153`, `tr_154`, `tr_155`, `tr_156`, `tr_157`, `tr_158`, `tr_159`, `tr_160`, `tr_161`, `tr_162`, `tr_163`, `tr_164`, `tr_165`, `tr_166`, `tr_167`, `tr_168`, `tr_169`, `tr_170`, `tr_171`, `tr_172`, `tr_173`, `tr_174`, `tr_175`, `tr_176`, `tr_177`, `tr_178`, `tr_179`, `tr_180`, `tr_181`, `tr_182`, `tr_183`, `tr_184`, `tr_185`, `tr_186`, `tr_187`, `tr_188`, `tr_189`, `tr_190`, `tr_191`, `tr_192`, `tr_193`, `tr_194`, `tr_195`, `tr_196`, `tr_197`, `tr_198`, `tr_199`, `tr_200`) VALUES
('Under Maintenance', 'Website Under Maintenance', 'Sorry for the inconvenience but we’re performing some maintenance at the moment.', 'Profile', 'Sign In', 'Sign Up', 'Reset Password', 'Forgot Password', '<p><strong>Terms &amp; Conditions</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>About Us</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '404', 'Page Not Found', 'The page you are looking for might have been removed had it\'s name changed or is temporarily unavailable.', 'Home Page', 'RealFood', 'realfood,real food recipes', 'Find delicious recipes, meal ideas and Food Love Stories here at Real Food. Our cooking tips will pr', 'Find a Recipe...', 'Create Recipe', 'Latest Recipes', 'Real Food. Real Simple', 'Premium Health Recipes', 'Discover Now', 'View Profile', 'Featured Categories', 'Random Recipes', 'Recipes By Our Community', 'Serv.', 'Verified Account', 'Prep Time', 'Dificult', 'Servings', 'Ingredients', 'Instructions', 'Already made this?', 'Share Your Feedback', 'Nutrition Facts', 'Calories', 'Total Fat', 'Protein', 'Carbs', 'Facebook', 'Twitter', 'Tumblr', 'Pinterest', 'WhatsApp', 'Telegram', 'Deliciousness to your inbox', 'Enjoy weekly hand picked recipes and recommendations', 'By joining our newsletter you agree to our', 'You might also like', 'You must be logged in to submit a recipe', 'Find members...', 'About Us', 'An About Us page helps your company make a good first impression, and is critical for building custo', 'Quick Links', 'Get In Touch', 'Newsletter', 'Suscribe Now', 'Email Address', '© 2022 Real Food', 'Sign In', 'Comment(s)', 'Submit Comment', 'Sign in to post a comment', 'Page', 'Find a recipe...', 'Total Recipes', 'Default', 'Date New to Old', 'Date Old to New', 'Best Rated', 'Any', 'Search', 'Recipes', 'Likes', 'Recipes', 'Member Since', 'My Recipes', 'About Me', 'My Recipes', 'Home', 'No Recipes Found', 'Results', 'Filter', 'Advanced Search', 'Published', 'Deleted', 'Pending', 'Default', 'Date', 'View', 'Image', 'Title', 'Status', 'Actions', 'Nothing found!', 'Modify your search criteria and try again.', 'Page', 'Remove', 'Choose Image', 'Submit a Recipe', 'Do you have a delicious and wildlife-friendly veggie-based dish you think everyone should try? We\'re looking for easy and creative plant-based recipes that anyone can make at home. By sharing a recipe for a wildlife-friendly breakfast, lunch, dinner or “anytime dish,” you can help others choose wild by eating less meat to save more wildlife.', 'Recipe Details', 'Recipe Guidelines', 'Please follow these guidelines when submitting a recipe. Your recipe may be rejected if your recipe does not meet the guidelines.', '<li>The title should be clear and simple and give a good idea of ​​the content and the recipes.</li>\r\n<li>Landscape (horizontal) photos</li>\r\n<li>Photo including your dish</li>\r\n<li>No portrait (vertical) photo</li>\r\n<li>No people or pets in your photo</li>\r\n<li>No personal information (name, age, etc.)</li>\r\n', 'Recipe Title', 'Recipe Description', 'Servings', 'Prep Time', 'Recipe Image', 'PNG or JPEG, max 2MB', 'By checking this box, I warrant that I am the creator and have all applicable rights to this recipe and photo (i.e., it was not taken from a cookbook or website that is not mine)', 'Submit', 'Recipe Ingredients', 'Ingredients should all be separated by commas. e.g. Sugar, Milk, Cheese...', 'Recipe Instructions', 'Instructions should all be separated by commas. e.g. Step 1, Step 2, Step 3...', 'Submit Recipe', 'Avatar', 'Choose Image', 'Most Liked Recipes', 'Following', 'Followers', 'Follow ', 'Unfollow', 'Phone', 'Message', 'I Agree to the', 'Send Message', 'Sign In', 'Email', 'Password', 'Don\'t you have an account?', 'Forgot Password?', 'Sign Up', 'Enter', 'Sign Up', 'Name', 'Already have an account?', 'Sign In', 'I Agree to the', 'Reset Password', 'Back to Sign In', 'Email is Empty', 'Name is Empty', 'Password is Empty', 'Captcha Check Failed', 'Minimum Name Length 3', 'Email is Invalid', 'Password Length 8-32', 'Account Already Registered', 'No User Found', 'Password Reset Email Sent', 'Something Wrong', 'Message is empty', 'Message Has Been Sent', 'Name is Invalid', 'Account Disabled or Not Found', 'You must accept the Legal Notice', 'Incorrect Email or Password', 'Your password has been reset', 'Password does not match', 'You have requested too many password resets.', 'Member Since', 'Admin Area', 'Edit Profile', 'Sign Out', 'My Favorites', 'No Favorites Found', 'New Password', 'Confirm Password', 'Save Changes', 'Cancel', 'Please wait...', 'You have successfully subscribed', 'Your profile was successfully updated', 'Please fill all required fields', 'Only JPG, JPEG, & PNG files are allowed to upload.', 'Image size exceeds 2MB', 'The selected image is too large, maximum 900 width', 'The selected image is too small', 'Successfully Subscribed', 'Recipe Successfully Submitted', 'You cannot publish more than 3 recipes at once', '-', '-'),
('Under Maintenance', 'Website Under Maintenance', 'Sorry for the inconvenience but we’re performing some maintenance at the moment.', 'Profile', 'Sign In', 'Sign Up', 'Reset Password', 'Forgot Password', '<p><strong>Terms &amp; Conditions</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>About Us</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '404', 'Page Not Found', 'The page you are looking for might have been removed had it\'s name changed or is temporarily unavailable.', 'Home Page', 'RealFood', 'realfood,real food recipes', 'Find delicious recipes, meal ideas and Food Love Stories here at Real Food. Our cooking tips will pr', 'Find a Recipe...', 'Create Recipe', 'Latest Recipes', 'Real Food. Real Simple', 'Premium Health Recipes', 'Discover Now', 'View Profile', 'Featured Categories', 'Random Recipes', 'Recipes By Our Community', 'Serv.', 'Verified Account', 'Prep Time', 'Dificult', 'Servings', 'Ingredients', 'Instructions', 'Already made this?', 'Share Your Feedback', 'Nutrition Facts', 'Calories', 'Total Fat', 'Protein', 'Carbs', 'Facebook', 'Twitter', 'Tumblr', 'Pinterest', 'WhatsApp', 'Telegram', 'Deliciousness to your inbox', 'Enjoy weekly hand picked recipes and recommendations', 'By joining our newsletter you agree to our', 'You might also like', 'You must be logged in to submit a recipe', 'Find members...', 'About Us', 'An About Us page helps your company make a good first impression, and is critical for building custo', 'Quick Links', 'Get In Touch', 'Newsletter', 'Suscribe Now', 'Email Address', '© 2022 Real Food', 'Sign In', 'Comment(s)', 'Submit Comment', 'Sign in to post a comment', 'Page', 'Find a recipe...', 'Total Recipes', 'Default', 'Date New to Old', 'Date Old to New', 'Best Rated', 'Any', 'Search', 'Recipes', 'Likes', 'Recipes', 'Member Since', 'My Recipes', 'About Me', 'My Recipes', 'Home', 'No Recipes Found', 'Results', 'Filter', 'Advanced Search', 'Published', 'Deleted', 'Pending', 'Default', 'Date', 'View', 'Image', 'Title', 'Status', 'Actions', 'Nothing found!', 'Modify your search criteria and try again.', 'Page', 'Remove', 'Choose Image', 'Submit a Recipe', 'Do you have a delicious and wildlife-friendly veggie-based dish you think everyone should try? We\'re looking for easy and creative plant-based recipes that anyone can make at home. By sharing a recipe for a wildlife-friendly breakfast, lunch, dinner or “anytime dish,” you can help others choose wild by eating less meat to save more wildlife.', 'Recipe Details', 'Recipe Guidelines', 'Please follow these guidelines when submitting a recipe. Your recipe may be rejected if your recipe does not meet the guidelines.', '<li>The title should be clear and simple and give a good idea of ​​the content and the recipes.</li>\r\n<li>Landscape (horizontal) photos</li>\r\n<li>Photo including your dish</li>\r\n<li>No portrait (vertical) photo</li>\r\n<li>No people or pets in your photo</li>\r\n<li>No personal information (name, age, etc.)</li>\r\n', 'Recipe Title', 'Recipe Description', 'Servings', 'Prep Time', 'Recipe Image', 'PNG or JPEG, max 2MB', 'By checking this box, I warrant that I am the creator and have all applicable rights to this recipe and photo (i.e., it was not taken from a cookbook or website that is not mine)', 'Submit', 'Recipe Ingredients', 'Ingredients should all be separated by commas. e.g. Sugar, Milk, Cheese...', 'Recipe Instructions', 'Instructions should all be separated by commas. e.g. Step 1, Step 2, Step 3...', 'Submit Recipe', 'Avatar', 'Choose Image', 'Most Liked Recipes', 'Following', 'Followers', 'Follow ', 'Unfollow', 'Phone', 'Message', 'I Agree to the', 'Send Message', 'Sign In', 'Email', 'Password', 'Don\'t you have an account?', 'Forgot Password?', 'Sign Up', 'Enter', 'Sign Up', 'Name', 'Already have an account?', 'Sign In', 'I Agree to the', 'Reset Password', 'Back to Sign In', 'Email is Empty', 'Name is Empty', 'Password is Empty', 'Captcha Check Failed', 'Minimum Name Length 3', 'Email is Invalid', 'Password Length 8-32', 'Account Already Registered', 'No User Found', 'Password Reset Email Sent', 'Something Wrong', 'Message is empty', 'Message Has Been Sent', 'Name is Invalid', 'Account Disabled or Not Found', 'You must accept the Legal Notice', 'Incorrect Email or Password', 'Your password has been reset', 'Password does not match', 'You have requested too many password resets.', 'Member Since', 'Admin Area', 'Edit Profile', 'Sign Out', 'My Favorites', 'No Favorites Found', 'New Password', 'Confirm Password', 'Save Changes', 'Cancel', 'Please wait...', 'You have successfully subscribed', 'Your profile was successfully updated', 'Please fill all required fields', 'Only JPG, JPEG, & PNG files are allowed to upload.', 'Image size exceeds 2MB', 'The selected image is too large, maximum 900 width', 'The selected image is too small', 'Successfully Subscribed', 'Recipe Successfully Submitted', 'You cannot publish more than 3 recipes at once', '-', '-'),
('Under Maintenance', 'Website Under Maintenance', 'Sorry for the inconvenience but we’re performing some maintenance at the moment.', 'Profile', 'Sign In', 'Sign Up', 'Reset Password', 'Forgot Password', '<p><strong>Terms &amp; Conditions</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>About Us</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '404', 'Page Not Found', 'The page you are looking for might have been removed had it\'s name changed or is temporarily unavailable.', 'Home Page', 'RealFood', 'realfood,real food recipes', 'Find delicious recipes, meal ideas and Food Love Stories here at Real Food. Our cooking tips will pr', 'Find a Recipe...', 'Create Recipe', 'Latest Recipes', 'Real Food. Real Simple', 'Premium Health Recipes', 'Discover Now', 'View Profile', 'Featured Categories', 'Random Recipes', 'Recipes By Our Community', 'Serv.', 'Verified Account', 'Prep Time', 'Dificult', 'Servings', 'Ingredients', 'Instructions', 'Already made this?', 'Share Your Feedback', 'Nutrition Facts', 'Calories', 'Total Fat', 'Protein', 'Carbs', 'Facebook', 'Twitter', 'Tumblr', 'Pinterest', 'WhatsApp', 'Telegram', 'Deliciousness to your inbox', 'Enjoy weekly hand picked recipes and recommendations', 'By joining our newsletter you agree to our', 'You might also like', 'You must be logged in to submit a recipe', 'Find members...', 'About Us', 'An About Us page helps your company make a good first impression, and is critical for building custo', 'Quick Links', 'Get In Touch', 'Newsletter', 'Suscribe Now', 'Email Address', '© 2022 Real Food', 'Sign In', 'Comment(s)', 'Submit Comment', 'Sign in to post a comment', 'Page', 'Find a recipe...', 'Total Recipes', 'Default', 'Date New to Old', 'Date Old to New', 'Best Rated', 'Any', 'Search', 'Recipes', 'Likes', 'Recipes', 'Member Since', 'My Recipes', 'About Me', 'My Recipes', 'Home', 'No Recipes Found', 'Results', 'Filter', 'Advanced Search', 'Published', 'Deleted', 'Pending', 'Default', 'Date', 'View', 'Image', 'Title', 'Status', 'Actions', 'Nothing found!', 'Modify your search criteria and try again.', 'Page', 'Remove', 'Choose Image', 'Submit a Recipe', 'Do you have a delicious and wildlife-friendly veggie-based dish you think everyone should try? We\'re looking for easy and creative plant-based recipes that anyone can make at home. By sharing a recipe for a wildlife-friendly breakfast, lunch, dinner or “anytime dish,” you can help others choose wild by eating less meat to save more wildlife.', 'Recipe Details', 'Recipe Guidelines', 'Please follow these guidelines when submitting a recipe. Your recipe may be rejected if your recipe does not meet the guidelines.', '<li>The title should be clear and simple and give a good idea of ​​the content and the recipes.</li>\r\n<li>Landscape (horizontal) photos</li>\r\n<li>Photo including your dish</li>\r\n<li>No portrait (vertical) photo</li>\r\n<li>No people or pets in your photo</li>\r\n<li>No personal information (name, age, etc.)</li>\r\n', 'Recipe Title', 'Recipe Description', 'Servings', 'Prep Time', 'Recipe Image', 'PNG or JPEG, max 2MB', 'By checking this box, I warrant that I am the creator and have all applicable rights to this recipe and photo (i.e., it was not taken from a cookbook or website that is not mine)', 'Submit', 'Recipe Ingredients', 'Ingredients should all be separated by commas. e.g. Sugar, Milk, Cheese...', 'Recipe Instructions', 'Instructions should all be separated by commas. e.g. Step 1, Step 2, Step 3...', 'Submit Recipe', 'Avatar', 'Choose Image', 'Most Liked Recipes', 'Following', 'Followers', 'Follow ', 'Unfollow', 'Phone', 'Message', 'I Agree to the', 'Send Message', 'Sign In', 'Email', 'Password', 'Don\'t you have an account?', 'Forgot Password?', 'Sign Up', 'Enter', 'Sign Up', 'Name', 'Already have an account?', 'Sign In', 'I Agree to the', 'Reset Password', 'Back to Sign In', 'Email is Empty', 'Name is Empty', 'Password is Empty', 'Captcha Check Failed', 'Minimum Name Length 3', 'Email is Invalid', 'Password Length 8-32', 'Account Already Registered', 'No User Found', 'Password Reset Email Sent', 'Something Wrong', 'Message is empty', 'Message Has Been Sent', 'Name is Invalid', 'Account Disabled or Not Found', 'You must accept the Legal Notice', 'Incorrect Email or Password', 'Your password has been reset', 'Password does not match', 'You have requested too many password resets.', 'Member Since', 'Admin Area', 'Edit Profile', 'Sign Out', 'My Favorites', 'No Favorites Found', 'New Password', 'Confirm Password', 'Save Changes', 'Cancel', 'Please wait...', 'You have successfully subscribed', 'Your profile was successfully updated', 'Please fill all required fields', 'Only JPG, JPEG, & PNG files are allowed to upload.', 'Image size exceeds 2MB', 'The selected image is too large, maximum 900 width', 'The selected image is too small', 'Successfully Subscribed', 'Recipe Successfully Submitted', 'You cannot publish more than 3 recipes at once', '-', '-'),
('Under Maintenance', 'Website Under Maintenance', 'Sorry for the inconvenience but we’re performing some maintenance at the moment.', 'Profile', 'Sign In', 'Sign Up', 'Reset Password', 'Forgot Password', '<p><strong>Terms &amp; Conditions</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>About Us</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '404', 'Page Not Found', 'The page you are looking for might have been removed had it\'s name changed or is temporarily unavailable.', 'Home Page', 'RealFood', 'realfood,real food recipes', 'Find delicious recipes, meal ideas and Food Love Stories here at Real Food. Our cooking tips will pr', 'Find a Recipe...', 'Create Recipe', 'Latest Recipes', 'Real Food. Real Simple', 'Premium Health Recipes', 'Discover Now', 'View Profile', 'Featured Categories', 'Random Recipes', 'Recipes By Our Community', 'Serv.', 'Verified Account', 'Prep Time', 'Dificult', 'Servings', 'Ingredients', 'Instructions', 'Already made this?', 'Share Your Feedback', 'Nutrition Facts', 'Calories', 'Total Fat', 'Protein', 'Carbs', 'Facebook', 'Twitter', 'Tumblr', 'Pinterest', 'WhatsApp', 'Telegram', 'Deliciousness to your inbox', 'Enjoy weekly hand picked recipes and recommendations', 'By joining our newsletter you agree to our', 'You might also like', 'You must be logged in to submit a recipe', 'Find members...', 'About Us', 'An About Us page helps your company make a good first impression, and is critical for building custo', 'Quick Links', 'Get In Touch', 'Newsletter', 'Suscribe Now', 'Email Address', '© 2022 Real Food', 'Sign In', 'Comment(s)', 'Submit Comment', 'Sign in to post a comment', 'Page', 'Find a recipe...', 'Total Recipes', 'Default', 'Date New to Old', 'Date Old to New', 'Best Rated', 'Any', 'Search', 'Recipes', 'Likes', 'Recipes', 'Member Since', 'My Recipes', 'About Me', 'My Recipes', 'Home', 'No Recipes Found', 'Results', 'Filter', 'Advanced Search', 'Published', 'Deleted', 'Pending', 'Default', 'Date', 'View', 'Image', 'Title', 'Status', 'Actions', 'Nothing found!', 'Modify your search criteria and try again.', 'Page', 'Remove', 'Choose Image', 'Submit a Recipe', 'Do you have a delicious and wildlife-friendly veggie-based dish you think everyone should try? We\'re looking for easy and creative plant-based recipes that anyone can make at home. By sharing a recipe for a wildlife-friendly breakfast, lunch, dinner or “anytime dish,” you can help others choose wild by eating less meat to save more wildlife.', 'Recipe Details', 'Recipe Guidelines', 'Please follow these guidelines when submitting a recipe. Your recipe may be rejected if your recipe does not meet the guidelines.', '<li>The title should be clear and simple and give a good idea of ​​the content and the recipes.</li>\r\n<li>Landscape (horizontal) photos</li>\r\n<li>Photo including your dish</li>\r\n<li>No portrait (vertical) photo</li>\r\n<li>No people or pets in your photo</li>\r\n<li>No personal information (name, age, etc.)</li>\r\n', 'Recipe Title', 'Recipe Description', 'Servings', 'Prep Time', 'Recipe Image', 'PNG or JPEG, max 2MB', 'By checking this box, I warrant that I am the creator and have all applicable rights to this recipe and photo (i.e., it was not taken from a cookbook or website that is not mine)', 'Submit', 'Recipe Ingredients', 'Ingredients should all be separated by commas. e.g. Sugar, Milk, Cheese...', 'Recipe Instructions', 'Instructions should all be separated by commas. e.g. Step 1, Step 2, Step 3...', 'Submit Recipe', 'Avatar', 'Choose Image', 'Most Liked Recipes', 'Following', 'Followers', 'Follow ', 'Unfollow', 'Phone', 'Message', 'I Agree to the', 'Send Message', 'Sign In', 'Email', 'Password', 'Don\'t you have an account?', 'Forgot Password?', 'Sign Up', 'Enter', 'Sign Up', 'Name', 'Already have an account?', 'Sign In', 'I Agree to the', 'Reset Password', 'Back to Sign In', 'Email is Empty', 'Name is Empty', 'Password is Empty', 'Captcha Check Failed', 'Minimum Name Length 3', 'Email is Invalid', 'Password Length 8-32', 'Account Already Registered', 'No User Found', 'Password Reset Email Sent', 'Something Wrong', 'Message is empty', 'Message Has Been Sent', 'Name is Invalid', 'Account Disabled or Not Found', 'You must accept the Legal Notice', 'Incorrect Email or Password', 'Your password has been reset', 'Password does not match', 'You have requested too many password resets.', 'Member Since', 'Admin Area', 'Edit Profile', 'Sign Out', 'My Favorites', 'No Favorites Found', 'New Password', 'Confirm Password', 'Save Changes', 'Cancel', 'Please wait...', 'You have successfully subscribed', 'Your profile was successfully updated', 'Please fill all required fields', 'Only JPG, JPEG, & PNG files are allowed to upload.', 'Image size exceeds 2MB', 'The selected image is too large, maximum 900 width', 'The selected image is too small', 'Successfully Subscribed', 'Recipe Successfully Submitted', 'You cannot publish more than 3 recipes at once', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_description` varchar(255) DEFAULT NULL,
  `user_avatar` varchar(255) DEFAULT 'avatar.png',
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_role` int(11) NOT NULL DEFAULT 3,
  `user_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_description`, `user_avatar`, `user_status`, `user_verified`, `user_role`, `user_updated`, `user_created`) VALUES
(1, 'Karim', 'admin@admin.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1621537827.jpg', 1, 1, 1, '2021-05-24 02:29:30', '2021-04-06 04:16:58'),
(3, 'admin', 'admin@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '', 'avatar.png', 1, 1, 3, '2024-01-24 23:17:59', '2024-01-24 23:16:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`difficult_id`);

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`navigation_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `page_slug` (`page_slug`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD UNIQUE KEY `recipe_slug` (`recipe_slug`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `subscriber_email` (`subscriber_email`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `difficult_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `email_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `navigation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
