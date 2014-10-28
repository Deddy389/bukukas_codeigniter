-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2014 at 11:56 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bukukas`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `gen_saldo_awal_akhir`(AS_TGLENTRY VARCHAR(10))
BEGIN
    
    DECLARE LD_SALDO DOUBLE;
    DECLARE LD_COUNT INT;
	SELECT 
	SUM(CASE WHEN LEFT(no_bukti,2) = 'KD' THEN
		NILAI
	       WHEN LEFT(no_bukti,2) = 'BD' THEN
		NILAI
	       ELSE
	        0
	       END) +
	       SUM(CASE WHEN LEFT(no_bukti,2) = 'KC' THEN
		NILAI * -1
	       WHEN LEFT(no_bukti,2) = 'BC' THEN
		NILAI * -1
	       ELSE
	        0
	       END) 
	INTO LD_SALDO			
	FROM entry_buku_kas
	WHERE tgl_entry = AS_TGLENTRY;
	DELETE FROM SALDO
	WHERE tgl_entry = SUBDATE(AS_TGLENTRY,-1);
	SELECT COUNT(*)
	INTO LD_COUNT
	FROM SALDO
	WHERE tgl_entry = AS_TGLENTRY;	
	
	IF LD_COUNT > 0 THEN
 	  -- SALDO EKSISTING
	  UPDATE saldo
	  SET akhir = LD_SALDO
	  WHERE tgl_entry = AS_TGLENTRY;
	ELSE
	  INSERT INTO SALDO(tgl_entry,akhir)	
	  VALUES (AS_TGLENTRY,LD_SALDO);	
	END IF;
	
	-- SALDO KEDEPAN
	INSERT INTO SALDO(tgl_entry,awal)	
	VALUES (SUBDATE(AS_TGLENTRY,-1),LD_SALDO);
	
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `tgl_batch` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`tgl_batch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`tgl_batch`, `status`) VALUES
('0000-00-00', 'OPEN'),
('2013-12-29', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `entry_buku_kas`
--

CREATE TABLE IF NOT EXISTS `entry_buku_kas` (
  `no_bukti` varchar(10) NOT NULL,
  `tgl_entry` date NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_bukti`,`tgl_entry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entry_buku_kas`
--

INSERT INTO `entry_buku_kas` (`no_bukti`, `tgl_entry`, `nilai`, `keterangan`) VALUES
('KC001', '2013-01-10', 11015015, 'Penarikan iuran dan manfaat pensiun'),
('KC001', '2013-02-01', 15000000, 'Setoran Fee'),
('KC001', '2013-03-11', 10000000, 'Setoran Fee'),
('KC001', '2013-04-02', 7000000, 'Setoran Fee'),
('KC001', '2013-05-02', 16910412, 'Manfaat Pensiun an Isna'),
('KC001', '2013-06-05', 799000, 'Penarikan Iuran an Ujang'),
('KC001', '2013-07-04', 2325000, 'Penarikan an Dewi Lucilia Lasut 2002.02146.KP'),
('KC001', '2013-08-15', 3313500, 'Penarikan iuran an Joki Sanja Hutama / 1999.04585.KP'),
('KC001', '2013-09-05', 3088554, 'Pembayaran Manfaat Pensiun an Agustono 1999.06300.KP'),
('KC002', '2013-01-10', 10000000, 'Setoran Fee'),
('KC002', '2013-02-07', 17917000, 'Penarikan iuran an 3Peserta'),
('KC002', '2013-03-14', 612300, 'Penarikan Iuran an Wiwiek L'),
('KC002', '2013-04-03', 7847867, 'Penarikan, Pembatalan Peserta Group dan Individu'),
('KC002', '2013-05-02', 3125627, 'Manfaat Pensiun an Naam'),
('KC002', '2013-06-05', 10990372, 'Manfaat Pensiun an Sapto'),
('KC002', '2013-07-11', 3064733, 'Manfaat Pensiun an Kusmayadi/1999.06260.KP'),
('KC002', '2013-09-06', 3500000, 'Fee Dplk Ke Pendiri'),
('KC003', '2013-01-17', 36170291, 'Penarikan iuran, manfaat pensiun Group dan Individu'),
('KC003', '2013-02-18', 17940300, 'Setoran Fee'),
('KC003', '2013-03-21', 2168900, 'Penarikan iuran an Noval'),
('KC003', '2013-04-11', 15903719, 'Penarikan iuran Peserta Group dan Individu'),
('KC003', '2013-05-02', 1599824, 'Penarikan Iuran an Ir. Heri S'),
('KC003', '2013-06-05', 1461650, 'Penarikan Iuran an Nur Utomo'),
('KC003', '2013-07-11', 3914393, 'Penarikan Iuran an Utari D / 2000.00929.KP'),
('KC004', '2013-01-23', 5658000, 'Penarikan iuran an 3peserta'),
('KC004', '2013-04-15', 10000000, 'Setoran Fee '),
('KC004', '2013-05-02', 1152148, 'Penarikan Iuran an Effendi'),
('KC004', '2013-06-11', 8000000, 'Setoran Fee ke Pendiri'),
('KC004', '2013-07-11', 1524313, 'Manfaat Pensiun an Suhendar / 2000.03583.KP'),
('KC004', '2013-08-29', 7854947, 'Pembayaran Manfaat Pensiun an Tutuk Kun Mardiningsih 1999.06240.KP'),
('KC005', '2013-01-30', 14473350, 'Penarikan iuran an 4Peserta'),
('KC005', '2013-02-28', 23470525, 'Penarkan manfaat pensiun Group dan Individu'),
('KC005', '2013-03-28', 8442879, 'Penarikan iuran an Yuretha'),
('KC005', '2013-04-19', 8645417, 'Pembayaran manfaat pensiun an Fitriadi'),
('KC005', '2013-05-02', 4950750, 'Penarikan Iuran Chaerullah'),
('KC005', '2013-06-13', 2292613, 'Manfaat Pensiun an Atri'),
('KC005', '2013-07-11', 744000, 'Penarikan Iuran an Utari D / 2000.00929.KP'),
('KC005', '2013-08-30', 7050000, 'Penarikan iuran an Amrizal 2001.03527.KP'),
('KC006', '2013-02-28', 7000000, 'Setoran Fee'),
('KC006', '2013-03-28', 1500000, 'Setoran Fee'),
('KC006', '2013-04-25', 4982000, 'Penarikan Group PKJ TIM an Giyono 1995.00983.KP'),
('KC006', '2013-05-07', 418500, 'Penarikan Iuran an Cri W'),
('KC006', '2013-06-13', 1410000, 'Penarikan Iuran an Aji.S'),
('KC006', '2013-07-12', 5000000, 'Fee DPLK, Untuk kegiatan Operasional'),
('KC006', '2013-08-30', 10000000, 'Perantara Kas Bank (Giro Bank Mandiri)'),
('KC007', '2013-04-25', 752000, 'Penarikan Group Yayasan Dharma an Hasbi 2003.07640.KP'),
('KC007', '2013-05-07', 24400000, 'Setoran Ke Giro Mandiri DPLK'),
('KC007', '2013-06-13', 987000, 'Penarikan iuran an Dedy'),
('KC007', '2013-07-15', 5000000, 'Fee DPLK, untuk Operasional'),
('KC008', '2013-04-25', 2631457, 'Penarikan Group PMI an Farida 2000.02797.KP'),
('KC008', '2013-05-14', 500000, 'Retur iuran an Juhariyah'),
('KC008', '2013-06-19', 4666160, 'Penarikan Iuran an Kasmino'),
('KC008', '2013-07-25', 8321060, 'Manfaat Pensiun an Supendi Dono 2005.00955.KP'),
('KC009', '2013-05-16', 940000, 'Penarikan iuran an Nanang'),
('KC009', '2013-06-27', 4492685, 'Manfaat Pensiun an Kartini'),
('KC009', '2013-07-25', 2832461, 'Manfaat Pensiun an Suherman 2000.02818.KP'),
('KC010', '2013-05-16', 1206152, 'Penarikan iuran an Sunardi'),
('KC010', '2013-06-28', 2800000, 'Setoran Fee ke Pendiri'),
('KC011', '2013-05-16', 1791700, 'Penarikan iuran an Bambang'),
('KC011', '2013-06-28', 20000000, 'Perantara kas bank'),
('KC012', '2013-05-23', 6200000, 'Setoran Fee'),
('KC013', '2013-05-17', 200000, 'Setoran iuran an Dimyati'),
('KC013', '2013-05-23', 489854, 'Penarikan Iuran an Agus S'),
('KC014', '2013-02-22', 5752300, 'Penarikan iuran an Nenden'),
('KC014', '2013-03-27', 6723153, 'Pembayaran manfaat pensiun an 2Peserta'),
('KC014', '2013-05-30', 1605984, 'Manfaat Pensiun an Dewi'),
('KC015', '2013-05-30', 13613128, 'Manfaat Pensiun an Tuch fathul'),
('KC016', '2013-05-31', 2920000, 'Setoran Fee'),
('KC017', '2013-05-07', 3630550, 'Penarikan Iuran an Zainal a'),
('KD000', '2012-12-31', 6633796, 'Saldo Awal 31 Desember 2013'),
('KD001', '2013-01-02', 2270000, 'Setoran iuran an 7Peserta'),
('KD001', '2013-02-01', 200000, 'Setoran iuran an Djungjungan'),
('KD001', '2013-03-01', 1000000, 'Setoran iuran an Parti'),
('KD001', '2013-04-01', 200000, 'Setoran Iuran an Djungjungan'),
('KD001', '2013-05-01', 30000000, 'Setoran Iuran an Lenny'),
('KD001', '2013-06-03', 4700000, 'Setoran Iuran an Bonar P 1999.06214.KP'),
('KD001', '2013-07-03', 4700000, 'Setoran Iuran an DRS. Bonar Siregar 1999.06214.KP'),
('KD001', '2013-08-02', 200000, 'Setoran iuran an Djungjungan Butarbutar 1998.0062.KP'),
('KD001', '2013-09-02', 6400000, 'Setoran iuran an 3 Peserta 2011.02343.KP , 2009.01134.KP , 2009.00023.KP'),
('KD002', '2013-01-03', 200000, 'Setoran iuran an 1Peserta'),
('KD002', '2013-02-04', 4700000, 'Setoran iuran an 12Peserta'),
('KD002', '2013-03-04', 300000, 'Setoran iuran an 2Peserta'),
('KD002', '2013-04-03', 150000, 'Setoran Iuran an 2Peserta'),
('KD002', '2013-05-01', 200000, 'Setoran Iuran an Djungjungan B'),
('KD002', '2013-06-04', 200000, 'Setoran Iuran an Djungjungan 1998.00662.KP'),
('KD002', '2013-07-05', 1410000, 'Setoran Iuran an 2Peserta Mediana, Djungjungan butar butar dan penggantian kartu baru Widjatmiko (te'),
('KD002', '2013-08-13', 3000000, 'Setoran iuran an Lenny Wati 2002.00388.KP'),
('KD002', '2013-08-22', 3022100, 'Penarikan iuran an Suparto 2000.00063.KP'),
('KD002', '2013-09-03', 200000, 'Setoran iuran an Djungjungan Butarbutar 1998.00662.KP'),
('KD003', '2013-01-04', 100000, 'Setoran iuran an 1Peserta'),
('KD003', '2013-02-05', 700000, 'Setoran iuran an 3Peserta  dan Pendaftaran'),
('KD003', '2013-03-05', 350000, 'Setoran iuran an 3Peserta'),
('KD003', '2013-04-03', 7847867, 'Perantara Kas Bank'),
('KD003', '2013-05-02', 1200000, 'Setoran Iuran an Mediana M'),
('KD003', '2013-06-05', 150000, 'Set Iuran an 2 Peserta'),
('KD003', '2013-07-08', 300000, 'Setoran an Iuran an Dimyati 2007.01583.KP'),
('KD003', '2013-08-14', 300000, 'Setoran iuran an Dimyati 2007.01583.KP'),
('KD003', '2013-08-22', 2749309, 'Pembayaran Manfaat Pensiun an Erni Supenti 2000.02803.KP'),
('KD003', '2013-09-05', 5052693, 'Setoran iuran PT. Indra Karya (persero) Periode Februari & Maret 2013'),
('KD004', '2013-01-08', 100000, 'Setoran iuran an Abdul Halim'),
('KD004', '2013-02-06', 150000, 'Setoran iuran an Kasut S'),
('KD004', '2013-03-06', 1200000, 'Setoran iuran an Mediana'),
('KD004', '2013-04-04', 5253590, 'Setoran iuran karyawan PT Indra Karya'),
('KD004', '2013-05-02', 10000000, 'Setoran Iuran an Soesanto'),
('KD004', '2013-06-05', 1173261, 'Set Iuran Karyawan Indra K'),
('KD004', '2013-07-09', 1150000, 'Setoran Iuran an 13 Peserta'),
('KD004', '2013-08-15', 1900000, 'Setoran iuran an 12 Peserta'),
('KD004', '2013-09-06', 100000, 'Setoran iuran an Yudhi D 2012.00032.KP'),
('KD005', '2013-01-09', 960000, 'Setoran iuran an 3Peserta Individu'),
('KD005', '2013-02-07', 17917000, 'Perantara Kas Bank'),
('KD005', '2013-03-07', 50000, 'Setoran iuran an B. Rudi'),
('KD005', '2013-04-08', 10300000, 'Setoran iuran an 3peserta'),
('KD005', '2013-05-02', 1212949, 'Setoran Karyawan Indra K'),
('KD005', '2013-06-05', 13251022, 'Perantara Kas Bank'),
('KD005', '2013-07-11', 2100000, 'Setoran Iuran an 3Peserta'),
('KD005', '2013-08-15', 110000, 'Setoran iuran an Herni Paskah 1999.06293.KP dan Penggantian Kartu baru an Siti R 2009.01134.KP'),
('KD006', '2013-01-10', 11000000, 'Perantara Kas Bank'),
('KD006', '2013-02-11', 1320000, 'Setoran iuran individu dan Fee Pendaftaran'),
('KD006', '2013-03-08', 350000, 'Setoran iuran an 2Peserta'),
('KD006', '2013-04-09', 6200000, 'Setoran iuran an 2Peserta'),
('KD006', '2013-05-06', 10000, 'Penggantian Kartu an Pooe'),
('KD006', '2013-06-07', 810000, 'Setoran Iuran an 5 Peserta'),
('KD006', '2013-07-11', 8000000, 'Perantara kas dan Bank'),
('KD006', '2013-08-16', 1200000, 'Setoran iuran an Mediana M 1998.02813.KP'),
('KD007', '2013-01-11', 500000, 'Setoran iuran an 1Peserta'),
('KD007', '2013-02-13', 2200000, 'Setoran iuran an 12Peserta'),
('KD007', '2013-03-14', 50000, 'Setoran iuran an 1Peserta'),
('KD007', '2013-04-10', 2300000, 'Setoran iuran an 2Peserta'),
('KD007', '2013-05-06', 4200000, 'Setoran Iuran an DRS. Bonar'),
('KD007', '2013-06-10', 1400000, 'Setoran Iuran an 2 Peserta'),
('KD007', '2013-07-15', 10000, 'Pembuatan Kartu baru an Efizah / 2005.04585.KP'),
('KD007', '2013-08-19', 150000, 'Setoran iuran an Untung Yuswanto 2006.00152.KP '),
('KD008', '2013-01-14', 3579814, 'Setoran iuran Peserta Group dan Individu'),
('KD008', '2013-02-14', 2500000, 'Setoran iuran an 2Peserta'),
('KD008', '2013-03-15', 150000, 'Setoran iuran an Dimyati'),
('KD008', '2013-04-12', 150000, 'Setoran Iuran an E Debby dan Indah S'),
('KD008', '2013-05-06', 100000, 'Setoran Iuran an Abdillah'),
('KD008', '2013-06-13', 4689613, 'Perantara Kas dan Bank'),
('KD008', '2013-07-16', 250000, 'Setoran an Hanna J 2009.00067 KP, 2006.02406.KP, B Rudi 2012.00683.KP'),
('KD008', '2013-08-20', 2800000, 'Setoran iuran an 10 Peserta'),
('KD009', '2013-01-15', 200000, 'Setoran iuran an Abdillah'),
('KD009', '2013-02-15', 100000, 'Setoran iuran an B. Rudi'),
('KD009', '2013-03-18', 1200000, 'Setoran iuran an 2Peserta'),
('KD009', '2013-04-15', 1450000, 'Setoran iuran an 17Peserta'),
('KD009', '2013-05-06', 1002000, 'Setoran Iuran an Mieke'),
('KD009', '2013-06-13', 200000, 'Setoran Iuran an Yudhi'),
('KD009', '2013-07-17', 10619709, 'Setoran Iuran an 9 Peserta dan Group PT. Dharma Lautan Nusantara'),
('KD009', '2013-08-20', 7669709, 'Setoran iuran Group PT. Dharma Lautan Nusantara Bulan Juli 2013 an 51 Peserta'),
('KD010', '2013-01-16', 10000, 'Fee pendaftaran an Didi septy'),
('KD010', '2013-02-18', 600000, 'Setoran iuran an 2Peserta'),
('KD010', '2013-03-19', 16070333, 'Setoran iuran individu dan Group'),
('KD010', '2013-04-16', 1000000, 'Setoran iuran an an Yayah'),
('KD010', '2013-05-06', 200000, 'Setoran Iuran an ABD Rohman'),
('KD010', '2013-06-13', 1260000, 'Setoran an 15 Peserta Individu'),
('KD010', '2013-07-19', 2522172, 'Setoran iuran PT.Indra Karya (persero) kantor pusat Jakarta Iuran bln Mei-Juni 2013 (terlampir)'),
('KD010', '2013-07-31', 3782360, 'Pembayaran manfaat pensiun an Wuryaningsih / 1999.06307.KP'),
('KD010', '2013-08-21', 150000, 'Setoran iuran an B. Rudi Hartono 2012.00683.KP'),
('KD011', '2013-01-17', 35000000, 'Perantara Kas dan Bank'),
('KD011', '2013-02-19', 6355958, 'Setoran iuran an 5Peserta individu dan group'),
('KD011', '2013-03-22', 610000, 'Setoran iuran an 2Peserta dan Fee Pendaftaran'),
('KD011', '2013-04-17', 50000, 'Setoran iuran an E Debby'),
('KD011', '2013-05-07', 150000, 'Setoran Iuran an Daniel'),
('KD011', '2013-06-18', 3050000, 'Setoran Iuran an 9 Peserta'),
('KD011', '2013-07-23', 2000000, 'Setoran iuran an Wisik R 2002.03651.KP'),
('KD011', '2013-07-31', 15000000, 'Perantara Kas Bank (setoran kelebihan salso kas) Ke Giro bank Mandiri'),
('KD011', '2013-08-21', 1261047, 'Setoran iuran Group PT. Indra Karya (persero) Iuran Juli an 31 Peserta Terlampir'),
('KD012', '2013-01-21', 600000, 'Setoran iuran an Kurnia'),
('KD012', '2013-02-21', 600000, 'Setoran iuran an 2Peserta'),
('KD012', '2013-03-25', 1010000, 'Setoran Iuran an 2Peserta dan Fee penggantian kartu'),
('KD012', '2013-04-18', 10388144, 'Setoran iuran an 3Peserta individu dan Group PT DLN'),
('KD012', '2013-05-15', 6966000, 'Setoran Iuran Group PT DLN'),
('KD012', '2013-06-18', 23904182, 'Setoran Iuran Group PT.DLN'),
('KD012', '2013-07-25', 200000, 'Setoran iuran an Yudhi D 2012.00032.KP'),
('KD012', '2013-07-31', 21200000, 'Setoran Fee ke Pendiri (untuk kegitan operasional DPLK)'),
('KD012', '2013-08-26', 6843275, 'Setoran iuran Group, Individu dan Fee pendaftaran'),
('KD013', '2013-01-22', 7105958, 'Setoran iuran individu dan Group'),
('KD013', '2013-02-22', 20000, 'Fee Pendaftaran an 2Peserta'),
('KD013', '2013-02-25', 5000000, 'Setoran iuran an R.Setyo'),
('KD013', '2013-03-27', 4220000, 'Iuran individu an 2Peserta dan Fee pendaftaran'),
('KD013', '2013-04-25', 8365457, 'Perantara Kas Bank'),
('KD013', '2013-05-16', 1000000, 'Setoran iuran an 11Peserta'),
('KD013', '2013-06-18', 60000, 'Setoran Iuran+Biaya Pendf'),
('KD013', '2013-07-26', 5900000, 'Setoran iuran an 4 Peserta'),
('KD013', '2013-08-28', 1300000, 'Setoran iuran an Agus Dadang Avianto 2006.01027.KP'),
('KD014', '2013-01-23', 1600000, 'Setoran iuran an 18Peserta'),
('KD014', '2013-02-26', 5400000, 'Setoran iuran an 2Peserta'),
('KD014', '2013-03-28', 2483276, 'Setoran iuran an 3Peserta dan Group Kopkar Sari Bakti'),
('KD014', '2013-04-25', 210000, 'Setoran Iuran dan Pendaftaran an Rudi'),
('KD014', '2013-05-16', 250000, 'Setoran iuran an 03Peserta'),
('KD014', '2013-06-20', 10000, 'Biaya Pendf an Syurghoni'),
('KD014', '2013-07-29', 31933276, 'Setoran an Iman Z dan Iuran Kopkar Bogasari'),
('KD014', '2013-08-29', 5000000, 'Setoran iuran an DRA Sri Handini 2003.07254.KP 2004.02376.KP'),
('KD015', '2013-01-25', 6155000, 'Setoran iuran an 9Peserta'),
('KD015', '2013-02-27', 1946488, 'Setoran iuran Individu dan Kopkar Sari Bhakti'),
('KD015', '2013-04-25', 110000, 'Setoran iuran dan pendaftaran an Wirawan R'),
('KD015', '2013-05-16', 250000, 'Setoran Iuran + Pendaf Maman'),
('KD015', '2013-06-25', 200000, 'Setoran Iuran an Suryati'),
('KD015', '2013-08-30', 10000, 'Biaya Penggantian kartu baru an Sukarni'),
('KD016', '2013-01-28', 160000, 'Setoran iuran an 2Peserta dan Fee Pendaftaran'),
('KD016', '2013-02-28', 23470525, 'Perantara kas dan bank'),
('KD016', '2013-04-25', 110000, 'Setoran Iuran dan Pendaftaran Salpan'),
('KD016', '2013-05-16', 250000, 'Setoran Iuran + Pendaf Norman'),
('KD016', '2013-06-27', 6743275, 'Setoran Iuran Kopkar dan individu'),
('KD017', '2013-01-29', 19143077, 'Setoran iuran individu dan group'),
('KD017', '2013-02-28', 410000, 'Setoran iuran an 4Peserta dan Fee Pendaftaran'),
('KD017', '2013-04-26', 1010000, 'Setoran iuran an Mieke 2013.00001.KP'),
('KD017', '2013-05-16', 60000, 'Setoran Iuran an Sunardi'),
('KD018', '2013-01-30', 1490000, 'Setoran iuran individu dan fee pendaftaran'),
('KD018', '2013-04-29', 2350000, 'Iuran individu an 8Peserta'),
('KD019', '2013-01-31', 1606488, 'Setoran iuran Kopkar Sari Bhakti dan Fee Pendaftaran'),
('KD019', '2013-04-30', 5716850, 'Iuran Individi, Group, dan Pendaftaran'),
('KD019', '2013-05-27', 138000, 'Setoran iuran an Rima M'),
('KD020', '2013-05-28', 1520000, 'Setoran iuran an Maman S'),
('KD021', '2013-05-28', 10000, 'Fee penggantian kartu an Nur'),
('KD022', '2013-05-29', 1933275, 'Setoran Iuran group an 5 peserta'),
('KD023', '2013-05-30', 12000000, 'Perantara kas bank'),
('KD024', '2013-05-31', 310000, 'Setoran Iuran an dedeh ');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_opname`
--

CREATE TABLE IF NOT EXISTS `hasil_opname` (
  `tgl_opname` date NOT NULL,
  `kd_rincian_uang` varchar(10) NOT NULL,
  `nilai` double NOT NULL,
  `alasan` varchar(200) NOT NULL,
  PRIMARY KEY (`tgl_opname`,`kd_rincian_uang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_opname`
--

INSERT INTO `hasil_opname` (`tgl_opname`, `kd_rincian_uang`, `nilai`, `alasan`) VALUES
('2013-01-31', 'uk100rb', 200, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk10rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk1rb', 1, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk1rts', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk20rb', 2, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk2rb', 2, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk50rb', 21, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk5rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'uk5rts', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'ul1rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'ul1rts', 4, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'ul25plh', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'ul2rts', 3, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'ul5plh', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-01-31', 'ul5rts', 3, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk100rb', 74, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk10rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk1rb', 1, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk1rts', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk20rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk2rb', 2, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk50rb', 4, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk5rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'uk5rts', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'ul1rb', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'ul1rts', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'ul25plh', 0, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'ul2rts', 3, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'ul5plh', 3, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-02-28', 'ul5rts', 3, 'Selisih tersebut disebabkan karena tidak adanya uang dengan pecahan lebih kecil atas transaksi Kas'),
('2013-03-28', 'uk100rb', 70, ''),
('2013-03-28', 'uk10rb', 0, ''),
('2013-03-28', 'uk1rb', 0, ''),
('2013-03-28', 'uk1rts', 0, ''),
('2013-03-28', 'uk20rb', 0, ''),
('2013-03-28', 'uk2rb', 1, ''),
('2013-03-28', 'uk50rb', 4, ''),
('2013-03-28', 'uk5rb', 0, ''),
('2013-03-28', 'uk5rts', 0, ''),
('2013-03-28', 'ul1rb', 0, ''),
('2013-03-28', 'ul1rts', 3, ''),
('2013-03-28', 'ul25plh', 0, ''),
('2013-03-28', 'ul2rts', 2, ''),
('2013-03-28', 'ul5plh', 0, ''),
('2013-03-28', 'ul5rts', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `kode_rincian_uang`
--

CREATE TABLE IF NOT EXISTS `kode_rincian_uang` (
  `kd_rincian_uang` varchar(10) NOT NULL,
  `jenis_uang` varchar(10) NOT NULL COMMENT 'K kertas,L logam',
  `urutan` int(11) NOT NULL,
  `PENGALI` int(11) NOT NULL,
  PRIMARY KEY (`kd_rincian_uang`,`jenis_uang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_rincian_uang`
--

INSERT INTO `kode_rincian_uang` (`kd_rincian_uang`, `jenis_uang`, `urutan`, `PENGALI`) VALUES
('uk100rb', 'K', 1, 100000),
('uk10rb', 'K', 4, 10000),
('uk1rb', 'K', 7, 1000),
('uk1rts', 'K', 9, 100),
('uk20rb', 'K', 3, 20000),
('uk2rb', 'K', 6, 2000),
('uk50rb', 'K', 2, 50000),
('uk5rb', 'K', 5, 5000),
('uk5rts', 'K', 8, 500),
('ul1rb', 'L', 1, 1000),
('ul1rts', 'L', 4, 100),
('ul25plh', 'L', 5, 25),
('ul2rts', 'L', 3, 200),
('ul5plh', 'L', 4, 50),
('ul5rts', 'L', 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `rekening_bank`
--

CREATE TABLE IF NOT EXISTS `rekening_bank` (
  `kode_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_bank`
--

INSERT INTO `rekening_bank` (`kode_bank`, `no_rekening`) VALUES
('BNI', '0012942700'),
('MANDIRI', '0060001239025');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
  `tgl_entry` date NOT NULL,
  `awal` double NOT NULL,
  `akhir` double NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`tgl_entry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`tgl_entry`, `awal`, `akhir`, `status`) VALUES
('2013-09-23', 0, 250000, ''),
('2013-09-24', 250000, 2998194, ''),
('2013-09-25', 2998194, 2000000, ''),
('2013-09-26', 2000000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `uang_bank`
--

CREATE TABLE IF NOT EXISTS `uang_bank` (
  `tgl_entry` date NOT NULL,
  `giro_bank` varchar(50) NOT NULL,
  `rk_bank` double NOT NULL,
  `buku_bank` double NOT NULL,
  `alasan` varchar(200) NOT NULL,
  PRIMARY KEY (`tgl_entry`,`giro_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uang_bank`
--

INSERT INTO `uang_bank` (`tgl_entry`, `giro_bank`, `rk_bank`, `buku_bank`, `alasan`) VALUES
('2013-01-31', 'BNI', 256963287, 256963287, ''),
('2013-01-31', 'MANDIRI', 421674592.89, 421674592, 'Selisih karena pembulatan decimal'),
('2013-03-28', 'BNI', 500940175, 500940175, ''),
('2013-03-28', 'MANDIRI', 484017554.58, 484017554, 'selisih karena pembulatan decimal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
