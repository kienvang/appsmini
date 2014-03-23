/*
SQLyog Community v9.60 Beta2
MySQL - 5.5.16 : Database - appsmini
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `app_user` */

DROP TABLE IF EXISTS `app_user`;

CREATE TABLE `app_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `app_user` */

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Administrator','1',NULL,NULL),('__NV_BANLE','10','','s:0:\"\";'),('__NV_BANLE','11',NULL,NULL),('__NV_BANLE','13',NULL,NULL),('__NV_BANLE','16',NULL,NULL),('__NV_BANLE','2',NULL,NULL),('__NV_BANLE','3',NULL,NULL),('__NV_BANLE','5',NULL,NULL),('__NV_BANLE','7',NULL,NULL),('__NV_BANSI','11','','s:0:\"\";'),('__NV_KHO','12',NULL,NULL),('__NV_KHO','18',NULL,NULL),('__NV_QUANLI','15',NULL,NULL),('__NV_QUANLI','6',NULL,NULL),('__NV_QUANLI','9',NULL,NULL),('__NV_THUNGAN','10',NULL,NULL),('__NV_THUNGAN','14',NULL,NULL),('__NV_THUNGAN','17',NULL,NULL),('__NV_THUNGAN','8',NULL,NULL);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`bizrule`,`data`) values ('Administrator',2,NULL,NULL,NULL),('shop-branchCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-branchDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-branchDeleteEmployee',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-branchIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-branchUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-branchView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-brandCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-brandDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-brandIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-brandListBrand',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-brandUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-brandView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-categoryAddAttr',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-categoryCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-categoryDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-categoryIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-categoryUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-categoryView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-colorCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-colorDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-colorIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-colorUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-colorView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-customerCreateRetail',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-customerRetail',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-customerUpdateRetail',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-customerViewRetail',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-customerWhole',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtAdmin',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtAdminPartner',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtConfirm',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtDeadline',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtFirstDebt',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtImport',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtPartner',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtPartnerExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtPartnerFirstDebt',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtPartnerPayment',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtRepayment',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-debtWholesale',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-defaultIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-defaultTest',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importAdmin',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDebt',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetail',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailAdmin',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailAjax',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailExportExcelQuantity',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailProductComplete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importDetailView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-importView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-modelCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-modelDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-modelIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-modelListModel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-modelUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-modelView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-partnerCreate',0,'','','s:0:\"\";'),('shop-partnerDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-partnerIndex',0,'','','s:0:\"\";'),('shop-partnerUpdate',0,'','','s:0:\"\";'),('shop-partnerView',0,'','','s:0:\"\";'),('shop-priceTypeCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-priceTypeDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-priceTypeIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-priceTypeUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-priceTypeView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionAdmin',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productActionView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productAddAttr',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productAjax',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productAjaxList',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productImageDel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productImageSetOwner',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productImageUpload',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemChangeStock',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemChangeStockExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemCheckStock',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemCheckStockExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemExportExcel',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemRollback',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productItemView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productPrice',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productPriceItem',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productTraceAdmin',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productTraceCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productTraceDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productTraceIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productTraceUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productTraceView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-productViewPrice',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-reportInventory',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-ReportListModel',0,NULL,NULL,'N;'),('shop-reportListProduct',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-reportRevenue',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-ReportRevenueCashier',0,NULL,NULL,'N;'),('shop-reportTest',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-ReportTransfer',0,NULL,NULL,'N;'),('shop-saleAutocomplete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleEdit',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleGetCashierByBranch',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleGetSalePersonByBranch',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleList',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleLoadProduct',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleSearchProducts',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-saleView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-supplierCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-supplierDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-supplierIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-supplierUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-supplierView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-toolAdminAddController',0,'','','s:0:\"\";'),('shop-UnitCreate',0,NULL,NULL,'N;'),('shop-UnitIndex',0,NULL,NULL,'N;'),('shop-UnitUpdate',0,NULL,NULL,'N;'),('shop-UnitView',0,NULL,NULL,'N;'),('shop-warehouseCreate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-warehouseDelete',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-warehouseIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-warehouseUpdate',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-warehouseView',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-wholeSaleAutocomplete',0,'','','s:0:\"\";'),('shop-wholeSaleEdit',0,'','','s:0:\"\";'),('shop-wholeSaleIndex',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-wholeSaleList',0,NULL,NULL,'s:7:\"s:0:\"\";\";'),('shop-wholeSaleView',0,'','','s:0:\"\";'),('site-error',0,'','','s:0:\"\";'),('siteError',0,'','','s:0:\"\";'),('user-UserAdmin',0,NULL,NULL,'N;'),('user-UserCreate',0,NULL,NULL,'N;'),('user-UserDelete',0,NULL,NULL,'N;'),('user-UserIndex',0,NULL,NULL,'N;'),('user-UserUpdate',0,NULL,NULL,'N;'),('user-UserView',0,NULL,NULL,'N;'),('_BAN_LE',1,'','','s:0:\"\";'),('_BAN_SI',1,'','','s:0:\"\";'),('_CAPNHAT_IMEI-SERIAL',1,'','','s:0:\"\";'),('_CONGNO_DAILY',1,'','','s:0:\"\";'),('_CONGNO_NCC',1,'','','s:0:\"\";'),('_KHO_CHUYEN-HANG',1,'','','s:0:\"\";'),('_KHO_NHAP-HANG',1,'','','s:0:\"\";'),('_KHO_TRA-HANG',1,'','','s:0:\"\";'),('_KIEM_KHO',1,'','','s:0:\"\";'),('_QL_BANLE',1,'','','s:0:\"\";'),('_QL_BANSI',1,'','','s:0:\"\";'),('_QL_CUAHANG',1,'','','s:0:\"\";'),('_QL_DAILY',1,'','','s:0:\"\";'),('_QL_KHACHHANG',1,'','','s:0:\"\";'),('_QL_KHO',1,'','','s:0:\"\";'),('_QL_NCC',1,'','','s:0:\"\";'),('_QL_NV',1,'','','s:0:\"\";'),('_SUPERADMIN',1,'','','s:0:\"\";'),('_THUNGAN',1,'','','s:0:\"\";'),('_XEMKHO',1,'','','s:0:\"\";'),('_XEM_IMEI-SERIAL',1,'','','s:0:\"\";'),('__NV_BANLE',2,'','','s:0:\"\";'),('__NV_BANSI',2,'','','s:0:\"\";'),('__NV_KETOAN',2,'','','s:0:\"\";'),('__NV_KHO',2,'','','s:0:\"\";'),('__NV_QUANLI',2,'','','s:0:\"\";'),('__NV_THUNGAN',2,'','','s:0:\"\";');

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('_QL_CUAHANG','shop-branchCreate'),('_SUPERADMIN','shop-branchCreate'),('_QL_CUAHANG','shop-branchDelete'),('_SUPERADMIN','shop-branchDelete'),('_QL_CUAHANG','shop-branchDeleteEmployee'),('_SUPERADMIN','shop-branchDeleteEmployee'),('_QL_CUAHANG','shop-branchIndex'),('_SUPERADMIN','shop-branchIndex'),('_QL_CUAHANG','shop-branchUpdate'),('_SUPERADMIN','shop-branchUpdate'),('_QL_CUAHANG','shop-branchView'),('_SUPERADMIN','shop-branchView'),('_QL_CUAHANG','shop-brandCreate'),('_SUPERADMIN','shop-brandCreate'),('_SUPERADMIN','shop-brandDelete'),('_SUPERADMIN','shop-brandIndex'),('_SUPERADMIN','shop-brandListBrand'),('_SUPERADMIN','shop-brandUpdate'),('_SUPERADMIN','shop-brandView'),('_SUPERADMIN','shop-categoryAddAttr'),('_SUPERADMIN','shop-categoryCreate'),('_SUPERADMIN','shop-categoryDelete'),('_SUPERADMIN','shop-categoryIndex'),('_SUPERADMIN','shop-categoryUpdate'),('_SUPERADMIN','shop-categoryView'),('_SUPERADMIN','shop-colorCreate'),('_SUPERADMIN','shop-colorDelete'),('_SUPERADMIN','shop-colorIndex'),('_SUPERADMIN','shop-colorUpdate'),('_SUPERADMIN','shop-colorView'),('_QL_KHACHHANG','shop-customerCreateRetail'),('_SUPERADMIN','shop-customerCreateRetail'),('_QL_KHACHHANG','shop-customerRetail'),('_SUPERADMIN','shop-customerRetail'),('_QL_KHACHHANG','shop-customerUpdateRetail'),('_SUPERADMIN','shop-customerUpdateRetail'),('_QL_KHACHHANG','shop-customerViewRetail'),('_SUPERADMIN','shop-customerViewRetail'),('_QL_KHACHHANG','shop-customerWhole'),('_SUPERADMIN','shop-customerWhole'),('_CONGNO_NCC','shop-debtAdmin'),('_SUPERADMIN','shop-debtAdmin'),('_THUNGAN','shop-debtAdmin'),('_CONGNO_DAILY','shop-debtAdminPartner'),('_SUPERADMIN','shop-debtAdminPartner'),('_CONGNO_DAILY','shop-debtConfirm'),('_CONGNO_NCC','shop-debtConfirm'),('_SUPERADMIN','shop-debtConfirm'),('_CONGNO_NCC','shop-debtCreate'),('_SUPERADMIN','shop-debtCreate'),('_THUNGAN','shop-debtCreate'),('_CONGNO_DAILY','shop-debtDeadline'),('_SUPERADMIN','shop-debtDeadline'),('_CONGNO_DAILY','shop-debtDelete'),('_CONGNO_NCC','shop-debtDelete'),('_SUPERADMIN','shop-debtDelete'),('_CONGNO_NCC','shop-debtExportExcel'),('_SUPERADMIN','shop-debtExportExcel'),('_SUPERADMIN','shop-debtFirstDebt'),('_KHO_NHAP-HANG','shop-debtImport'),('_SUPERADMIN','shop-debtImport'),('_THUNGAN','shop-debtImport'),('_CONGNO_NCC','shop-debtIndex'),('_SUPERADMIN','shop-debtIndex'),('_THUNGAN','shop-debtIndex'),('_CONGNO_DAILY','shop-debtPartner'),('_SUPERADMIN','shop-debtPartner'),('_CONGNO_DAILY','shop-debtPartnerExportExcel'),('_SUPERADMIN','shop-debtPartnerExportExcel'),('_SUPERADMIN','shop-debtPartnerFirstDebt'),('_CONGNO_DAILY','shop-debtPartnerPayment'),('_SUPERADMIN','shop-debtPartnerPayment'),('_CONGNO_DAILY','shop-debtRepayment'),('_SUPERADMIN','shop-debtRepayment'),('_SUPERADMIN','shop-debtUpdate'),('_THUNGAN','shop-debtUpdate'),('_CONGNO_DAILY','shop-debtView'),('_CONGNO_NCC','shop-debtView'),('_SUPERADMIN','shop-debtView'),('_THUNGAN','shop-debtView'),('_SUPERADMIN','shop-debtWholesale'),('_SUPERADMIN','shop-defaultIndex'),('_SUPERADMIN','shop-defaultTest'),('_KHO_NHAP-HANG','shop-importAdmin'),('_SUPERADMIN','shop-importAdmin'),('_KHO_NHAP-HANG','shop-importCreate'),('_SUPERADMIN','shop-importCreate'),('_SUPERADMIN','shop-importDebt'),('_KHO_NHAP-HANG','shop-importDelete'),('_SUPERADMIN','shop-importDelete'),('_KHO_NHAP-HANG','shop-importDetail'),('_SUPERADMIN','shop-importDetail'),('_KHO_NHAP-HANG','shop-importDetailAdmin'),('_SUPERADMIN','shop-importDetailAdmin'),('_SUPERADMIN','shop-importDetailAjax'),('_SUPERADMIN','shop-importDetailCreate'),('_KHO_NHAP-HANG','shop-importDetailDelete'),('_SUPERADMIN','shop-importDetailDelete'),('_SUPERADMIN','shop-importDetailExportExcel'),('_SUPERADMIN','shop-importDetailExportExcelQuantity'),('_SUPERADMIN','shop-importDetailIndex'),('_SUPERADMIN','shop-importDetailProductComplete'),('_SUPERADMIN','shop-importDetailUpdate'),('_KHO_NHAP-HANG','shop-importDetailView'),('_SUPERADMIN','shop-importDetailView'),('_SUPERADMIN','shop-importExportExcel'),('_QL_KHO','shop-importIndex'),('_SUPERADMIN','shop-importIndex'),('_KHO_NHAP-HANG','shop-importUpdate'),('_SUPERADMIN','shop-importUpdate'),('_KHO_NHAP-HANG','shop-importView'),('_SUPERADMIN','shop-importView'),('_SUPERADMIN','shop-modelCreate'),('_SUPERADMIN','shop-modelDelete'),('_SUPERADMIN','shop-modelIndex'),('_SUPERADMIN','shop-modelListModel'),('_SUPERADMIN','shop-modelUpdate'),('_SUPERADMIN','shop-modelView'),('_QL_DAILY','shop-partnerCreate'),('_SUPERADMIN','shop-partnerCreate'),('_QL_DAILY','shop-partnerDelete'),('_SUPERADMIN','shop-partnerDelete'),('_QL_DAILY','shop-partnerIndex'),('_SUPERADMIN','shop-partnerIndex'),('_QL_DAILY','shop-partnerUpdate'),('_SUPERADMIN','shop-partnerUpdate'),('_QL_DAILY','shop-partnerView'),('_SUPERADMIN','shop-partnerView'),('_SUPERADMIN','shop-priceTypeCreate'),('_SUPERADMIN','shop-priceTypeDelete'),('_SUPERADMIN','shop-priceTypeIndex'),('_SUPERADMIN','shop-priceTypeUpdate'),('_SUPERADMIN','shop-priceTypeView'),('_SUPERADMIN','shop-productActionAdmin'),('_KHO_CHUYEN-HANG','shop-productActionCreate'),('_SUPERADMIN','shop-productActionCreate'),('_KHO_CHUYEN-HANG','shop-productActionDelete'),('_SUPERADMIN','shop-productActionDelete'),('_SUPERADMIN','shop-productActionExportExcel'),('_KHO_CHUYEN-HANG','shop-productActionIndex'),('_SUPERADMIN','shop-productActionIndex'),('_KHO_CHUYEN-HANG','shop-productActionUpdate'),('_SUPERADMIN','shop-productActionUpdate'),('_KHO_CHUYEN-HANG','shop-productActionView'),('_SUPERADMIN','shop-productActionView'),('_SUPERADMIN','shop-productAddAttr'),('_KHO_NHAP-HANG','shop-productAjax'),('_SUPERADMIN','shop-productAjax'),('_CAPNHAT_IMEI-SERIAL','shop-productAjaxList'),('_KHO_NHAP-HANG','shop-productAjaxList'),('_SUPERADMIN','shop-productAjaxList'),('_SUPERADMIN','shop-productCreate'),('_SUPERADMIN','shop-productDelete'),('_SUPERADMIN','shop-productImageDel'),('_SUPERADMIN','shop-productImageSetOwner'),('_SUPERADMIN','shop-productImageUpload'),('_SUPERADMIN','shop-productIndex'),('_KHO_CHUYEN-HANG','shop-productItemChangeStock'),('_SUPERADMIN','shop-productItemChangeStock'),('_SUPERADMIN','shop-productItemChangeStockExportExcel'),('_KIEM_KHO','shop-productItemCheckStock'),('_SUPERADMIN','shop-productItemCheckStock'),('_KIEM_KHO','shop-productItemCheckStockExportExcel'),('_SUPERADMIN','shop-productItemCheckStockExportExcel'),('_SUPERADMIN','shop-productItemCreate'),('_KHO_NHAP-HANG','shop-productItemDelete'),('_SUPERADMIN','shop-productItemDelete'),('_SUPERADMIN','shop-productItemExportExcel'),('_XEM_IMEI-SERIAL','shop-productItemExportExcel'),('_SUPERADMIN','shop-productItemIndex'),('_XEM_IMEI-SERIAL','shop-productItemIndex'),('_KHO_TRA-HANG','shop-productItemRollback'),('_SUPERADMIN','shop-productItemRollback'),('_CAPNHAT_IMEI-SERIAL','shop-productItemUpdate'),('_SUPERADMIN','shop-productItemUpdate'),('_KHO_CHUYEN-HANG','shop-productItemView'),('_KHO_NHAP-HANG','shop-productItemView'),('_KHO_TRA-HANG','shop-productItemView'),('_SUPERADMIN','shop-productItemView'),('_XEM_IMEI-SERIAL','shop-productItemView'),('_SUPERADMIN','shop-productPrice'),('_SUPERADMIN','shop-productPriceItem'),('_SUPERADMIN','shop-productTraceAdmin'),('_SUPERADMIN','shop-productTraceCreate'),('_KHO_CHUYEN-HANG','shop-productTraceDelete'),('_KHO_TRA-HANG','shop-productTraceDelete'),('_SUPERADMIN','shop-productTraceDelete'),('_SUPERADMIN','shop-productTraceIndex'),('_SUPERADMIN','shop-productTraceUpdate'),('_SUPERADMIN','shop-productTraceView'),('_SUPERADMIN','shop-productUpdate'),('_QL_BANSI','shop-productView'),('_SUPERADMIN','shop-productView'),('_QL_BANSI','shop-productViewPrice'),('_SUPERADMIN','shop-productViewPrice'),('_SUPERADMIN','shop-reportInventory'),('_SUPERADMIN','shop-ReportListModel'),('_SUPERADMIN','shop-reportListProduct'),('_SUPERADMIN','shop-reportRevenue'),('_SUPERADMIN','shop-ReportRevenueCashier'),('_SUPERADMIN','shop-reportTest'),('_SUPERADMIN','shop-ReportTransfer'),('_BAN_LE','shop-saleAutocomplete'),('_QL_BANLE','shop-saleAutocomplete'),('_QL_BANSI','shop-saleAutocomplete'),('_SUPERADMIN','shop-saleAutocomplete'),('_QL_BANLE','shop-saleEdit'),('_SUPERADMIN','shop-saleEdit'),('_BAN_LE','shop-saleGetCashierByBranch'),('_BAN_SI','shop-saleGetCashierByBranch'),('_QL_BANLE','shop-saleGetCashierByBranch'),('_QL_BANSI','shop-saleGetCashierByBranch'),('_SUPERADMIN','shop-saleGetCashierByBranch'),('_BAN_LE','shop-saleGetSalePersonByBranch'),('_BAN_SI','shop-saleGetSalePersonByBranch'),('_QL_BANLE','shop-saleGetSalePersonByBranch'),('_QL_BANSI','shop-saleGetSalePersonByBranch'),('_SUPERADMIN','shop-saleGetSalePersonByBranch'),('_BAN_LE','shop-saleIndex'),('_QL_BANLE','shop-saleIndex'),('_SUPERADMIN','shop-saleIndex'),('_QL_BANLE','shop-saleList'),('_SUPERADMIN','shop-saleList'),('_BAN_LE','shop-saleLoadProduct'),('_BAN_SI','shop-saleLoadProduct'),('_QL_BANLE','shop-saleLoadProduct'),('_QL_BANSI','shop-saleLoadProduct'),('_SUPERADMIN','shop-saleLoadProduct'),('_BAN_LE','shop-saleSearchProducts'),('_BAN_SI','shop-saleSearchProducts'),('_QL_BANLE','shop-saleSearchProducts'),('_QL_BANSI','shop-saleSearchProducts'),('_SUPERADMIN','shop-saleSearchProducts'),('_BAN_LE','shop-saleView'),('_QL_BANLE','shop-saleView'),('_SUPERADMIN','shop-saleView'),('_QL_NCC','shop-supplierCreate'),('_SUPERADMIN','shop-supplierCreate'),('_QL_NCC','shop-supplierDelete'),('_SUPERADMIN','shop-supplierDelete'),('_QL_NCC','shop-supplierIndex'),('_SUPERADMIN','shop-supplierIndex'),('_QL_NCC','shop-supplierUpdate'),('_SUPERADMIN','shop-supplierUpdate'),('_QL_NCC','shop-supplierView'),('_SUPERADMIN','shop-supplierView'),('_SUPERADMIN','shop-toolAdminAddController'),('_SUPERADMIN','shop-UnitCreate'),('_SUPERADMIN','shop-UnitIndex'),('_SUPERADMIN','shop-UnitUpdate'),('_SUPERADMIN','shop-UnitView'),('_QL_KHO','shop-warehouseCreate'),('_SUPERADMIN','shop-warehouseCreate'),('_QL_KHO','shop-warehouseDelete'),('_SUPERADMIN','shop-warehouseDelete'),('_QL_KHO','shop-warehouseIndex'),('_SUPERADMIN','shop-warehouseIndex'),('_XEMKHO','shop-warehouseIndex'),('_QL_KHO','shop-warehouseUpdate'),('_SUPERADMIN','shop-warehouseUpdate'),('_QL_KHO','shop-warehouseView'),('_SUPERADMIN','shop-warehouseView'),('_XEMKHO','shop-warehouseView'),('_BAN_SI','shop-wholeSaleAutocomplete'),('_QL_BANSI','shop-wholeSaleAutocomplete'),('_SUPERADMIN','shop-wholeSaleAutocomplete'),('_QL_BANSI','shop-wholeSaleEdit'),('_SUPERADMIN','shop-wholeSaleEdit'),('_BAN_SI','shop-wholeSaleIndex'),('_QL_BANSI','shop-wholeSaleIndex'),('_SUPERADMIN','shop-wholeSaleIndex'),('_QL_BANSI','shop-wholeSaleList'),('_SUPERADMIN','shop-wholeSaleList'),('_BAN_SI','shop-wholeSaleView'),('_QL_BANSI','shop-wholeSaleView'),('_SUPERADMIN','shop-wholeSaleView'),('_SUPERADMIN','site-error'),('_SUPERADMIN','siteError'),('_QL_NV','user-UserAdmin'),('_SUPERADMIN','user-UserAdmin'),('_QL_NV','user-UserCreate'),('_SUPERADMIN','user-UserCreate'),('_QL_NV','user-UserDelete'),('_SUPERADMIN','user-UserDelete'),('_QL_NV','user-UserIndex'),('_SUPERADMIN','user-UserIndex'),('_QL_NV','user-UserUpdate'),('_SUPERADMIN','user-UserUpdate'),('_QL_NV','user-UserView'),('_SUPERADMIN','user-UserView'),('__NV_BANLE','_BAN_LE'),('__NV_THUNGAN','_BAN_LE'),('__NV_BANSI','_BAN_SI'),('__NV_KETOAN','_CONGNO_DAILY'),('__NV_KETOAN','_CONGNO_NCC'),('__NV_KHO','_KHO_CHUYEN-HANG'),('__NV_KHO','_KHO_NHAP-HANG'),('__NV_KHO','_KHO_TRA-HANG'),('__NV_KHO','_KIEM_KHO'),('__NV_THUNGAN','_KIEM_KHO'),('__NV_QUANLI','_QL_BANLE'),('__NV_THUNGAN','_QL_BANLE'),('__NV_BANSI','_QL_BANSI'),('__NV_QUANLI','_QL_BANSI'),('__NV_QUANLI','_QL_CUAHANG'),('__NV_KETOAN','_QL_DAILY'),('__NV_KHO','_QL_KHO'),('__NV_KETOAN','_QL_NCC'),('Administrator','_QL_NV'),('__NV_QUANLI','_QL_NV'),('Administrator','_SUPERADMIN'),('__NV_THUNGAN','_THUNGAN'),('__NV_BANLE','_XEMKHO'),('__NV_THUNGAN','_XEMKHO'),('__NV_BANLE','_XEM_IMEI-SERIAL'),('__NV_BANSI','_XEM_IMEI-SERIAL'),('__NV_KHO','_XEM_IMEI-SERIAL'),('__NV_THUNGAN','_XEM_IMEI-SERIAL');

/*Table structure for table `qa_answer` */

DROP TABLE IF EXISTS `qa_answer`;

CREATE TABLE `qa_answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resource` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_id` int(10) DEFAULT NULL,
  `is_right` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `qa_answer` */

insert  into `qa_answer`(`id`,`name`,`resource`,`question_id`,`is_right`) values (17,NULL,'QXxCo13954907976345.png',1,0),(19,NULL,'meSEg1395490834671.png',1,0),(20,NULL,'BNSAv13954908346713.png',1,0);

/*Table structure for table `qa_event` */

DROP TABLE IF EXISTS `qa_event`;

CREATE TABLE `qa_event` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` int(10) DEFAULT NULL,
  `end_date` int(10) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `qa_event` */

insert  into `qa_event`(`id`,`name`,`start_date`,`end_date`,`enable`) values (1,'dasdas',1394643600,1395075600,1);

/*Table structure for table `qa_question` */

DROP TABLE IF EXISTS `qa_question`;

CREATE TABLE `qa_question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `number` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `qa_question` */

insert  into `qa_question`(`id`,`number`,`name`,`type`) values (1,1,'dsadasdsa','option_image'),(2,3,'text','option_text');

/*Table structure for table `qa_result` */

DROP TABLE IF EXISTS `qa_result`;

CREATE TABLE `qa_result` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `question_params` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_params` text COLLATE utf8_unicode_ci,
  `question_id` int(10) DEFAULT NULL,
  `answer_id` int(10) DEFAULT NULL,
  `result_text` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result_right` tinyint(1) DEFAULT NULL,
  `result_params` text COLLATE utf8_unicode_ci,
  `event_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `qa_result` */

/*Table structure for table `system_user` */

DROP TABLE IF EXISTS `system_user`;

CREATE TABLE `system_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(128) NOT NULL,
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `system_user` */

insert  into `system_user`(`id`,`username`,`password`,`createtime`,`lastvisit`,`superuser`,`status`) values (1,'admin','6694ea5330bcc59ab1b41b455fa75528:Vorqm96zTz0bJSDKmNwAuAnH21EqN99w',1382502486,1395473029,1,1),(13,'banhang_2','edbfc9b4f41c96075bb998f5ea6bce7e:yMpYRjNhMhwfSQ8rit1i6uOCQWHzlzl0',1385012954,1386151247,0,1),(12,'kho_1','8307525391423e7aa3e7a540295fd8d9:LYemmc6LiuHuWc7mjy9crntyJxUYVGaS',1384783735,1386165132,0,1),(11,'banhang_1','836008eda0a5208853859ca136f24c60:WQQ1I1VCYxTbedRFZfyLglP9LAVFcwJz',1384782299,1386210237,0,1),(10,'cashier_1','0a4eb767924fa01af24cd21964c4070d:YUU2SENR2rsNlIYIqaiHUpUTqD2d6EEs',1384782216,1386474653,0,1),(9,'quanli_1','d8c75a55f649bd3f7b588683063baa0f:XqRJHDcU8tehB9PfrEEyNBcqnlFbFLzQ',1384782165,1386165040,0,1),(14,'cashier_02','d5adebdd85ce0775a7aa6836dd399631:DMT6klm3ovJdZzO7tPsw7igOYuKObcRW',1385013007,0,0,1),(15,'quanli_02','11e7de00fc39247abc248b1df62ffce2:NZ7GuyPR3YVv3zwhK6wp6PZ9HMgb8JqJ',1385013072,0,0,1),(16,'banhang_03','9d0ab2299f905af169235b0013864b19:LtWaqOY9bFe2pYuyzvCGRpeQerfE7zpH',1385016581,0,0,0),(17,'Thungan03','06dd46f5a9caa0b467b4d3549bb5d164:18hN1CK5O5gYo23pIOHhyIVPFQcVfLUh',1385468832,0,0,0),(18,'kho_2','0b22c760cdcf07990d14962581f174cd:swVhXXciEpihP3trWEoZuAvhnLAd6j0F',1386164703,0,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
