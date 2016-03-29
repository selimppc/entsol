--
-- Dumping data for table `menu_panel`
--

INSERT INTO `menu_panel` (`id`, `menu_id`, `menu_type`, `menu_name`, `route`, `parent_menu_id`, `icon_code`, `menu_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'ROOT', 'ROOT', '#', 0, NULL, 0, 'active', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'MENU', 'Journal Voucher', 'journal/voucher-head', 15, 'fa fa-money', 0, 'active', NULL, NULL, '2016-03-07 21:47:45', '2016-03-16 01:04:38'),
(3, 1, 'MENU', 'Chart of Accounts', 'chart-of-accounts', 15, 'fa fa-list-alt', 0, 'active', NULL, NULL, '2016-03-07 21:48:02', '2016-03-16 01:04:15'),
(4, 1, 'MODU', 'User', '#', 1, 'menu-icon fa fa-user-md', 2, 'active', NULL, NULL, '2016-03-07 21:48:17', '2016-03-16 01:08:31'),
(5, 1, 'MODU', 'dashboard', 'dashboard', 1, 'menu-icon fa fa-dashboard', 0, 'active', NULL, NULL, '2016-03-14 23:12:17', '2016-03-16 01:26:09'),
(6, 1, 'MODU', 'Administration', '#', 1, 'menu-icon fa fa-columns', 1, 'active', NULL, NULL, '2016-03-14 23:14:32', '2016-03-16 00:58:45'),
(7, 1, 'MENU', 'Menu Panel', 'admin/menu-panel', 6, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:15:28', '2016-03-15 05:17:35'),
(8, 1, 'MENU', 'User List', 'user/user-list', 4, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:16:27', '2016-03-15 05:17:52'),
(9, 1, 'MENU', 'Role User', 'user/index-role-user', 4, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:16:59', '2016-03-15 05:18:24'),
(10, 1, 'MENU', 'Permission Role', 'user/index-permission-role', 4, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:17:29', '2016-03-15 05:18:43'),
(11, 1, 'MODU', 'Master Setup', '#', 1, 'menu-icon fa fa-columns', 3, 'active', NULL, NULL, '2016-03-14 23:18:12', '2016-03-16 01:01:42'),
(12, 1, 'MENU', 'Group One', 'group-one', 11, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:18:41', '2016-03-14 23:18:41'),
(13, 1, 'MENU', 'Branch', 'branch', 11, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:19:03', '2016-03-14 23:19:03'),
(14, 1, 'MENU', 'Currency', 'currency', 11, NULL, 0, 'active', NULL, NULL, '2016-03-14 23:19:24', '2016-03-14 23:19:24'),
(15, 1, 'MODU', 'General Ledger', '#', 1, 'fa fa-usd', 4, 'active', NULL, NULL, '2016-03-14 23:20:30', '2016-03-16 01:03:50'),
(16, 1, 'MENU', 'Reverse Entry', 'reverse/reverse-voucher', 15, 'fa fa-money', 0, 'active', NULL, NULL, '2016-03-14 23:29:37', '2016-03-16 01:04:52'),
(17, 1, 'MENU', 'Payment Voucher', 'payment/payment-voucher', 15, 'fa fa-money', 0, 'active', NULL, NULL, '2016-03-14 23:30:26', '2016-03-16 01:05:08'),
(18, 1, 'MENU', 'Receipt Voucher', 'receipt/receipt-voucher', 15, 'fa fa-money', 0, 'active', NULL, NULL, '2016-03-14 23:30:50', '2016-03-16 01:05:46'),
(19, 1, 'MENU', 'Settings', 'gl/settings', 15, 'fa  fa-gear', 0, 'active', NULL, NULL, '2016-03-14 23:31:18', '2016-03-16 01:06:09'),
(20, 1, 'MENU', 'Reports', 'reports/account-reports', 15, 'fa fa-clipboard', 0, 'active', NULL, NULL, '2016-03-14 23:31:37', '2016-03-16 00:36:38');