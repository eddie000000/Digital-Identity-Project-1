-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-03 14:10:56
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `network_security`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `account` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_company` tinyint(1) DEFAULT NULL,
  `uid_cid` text DEFAULT NULL,
  `First_time_login` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`account`, `password`, `user_company`, `uid_cid`, `First_time_login`) VALUES
('justin', '1073522', 0, 'U0001', 0),
('eddie', '1073524', 0, 'U0002', 0),
('chang', '1073125', 0, 'U0003', 0),
('sharen', '1073521', 0, 'U0004', 0),
('mike', '1073517', 1, 'C0001', 0),
('leo', '1073523', 1, 'C0002', 0),
('leah', '966213', 1, 'C0003', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `Company_id` text NOT NULL,
  `Company_name` text NOT NULL,
  `Company_addr` text NOT NULL,
  `Company_repre` text NOT NULL,
  `Company_phone` text NOT NULL,
  `Company_pubkey` text NOT NULL,
  `Company_prikey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `company`
--

INSERT INTO `company` (`Company_id`, `Company_name`, `Company_addr`, `Company_repre`, `Company_phone`, `Company_pubkey`, `Company_prikey`) VALUES
('C0001', '元智大學資訊學院英語學士班', '桃園市中壢區遠東路135號 1313室', '林璟騰', '(03)463-8800', 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCmkANmC849IOntYQQdSgLvMMGm8V/u838ATHaoZwvweoYyd+/7Wx+bx5bdktJb46YbqS1vz3VRdXsyJIWhpNcmtKhYinwcl83aLtzJeKsznppqMyAIseaKIeAm6tT8uttNkr2zOymL/PbMpByTQeEFlyy1poLBwrol0F4USc+owwIDAQAB', 'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKaQA2YLzj0g6e1hBB1KAu8wwabxX+7zfwBMdqhnC/B6hjJ37/tbH5vHlt2S0lvjphupLW/PdVF1ezIkhaGk1ya0qFiKfByXzdou3Ml4qzOemmozIAix5ooh4Cbq1Py6202SvbM7KYv89sykHJNB4QWXLLWmgsHCuiXQXhRJz6jDAgMBAAECgYAIF5cSriAm+CJlVgFNKvtZg5Tk93UhttLEwPJC3D7IQCuk6A7Qt2yhtOCvgyKVNEotrdp3RCz++CY0GXIkmE2bj7i0fv5vT3kWvO9nImGhTBH6QlFDxc9+p3ukwsonnCshkSV9gmH5NB/yFoH1m8tck2GmBXDj+bBGUoKGWtQ7gQJBANR/jd5ZKf6unLsgpFUS/kNBgUa+EhVg2tfr9OMioWDvMSqzG/sARQ2AbO00ytpkbAKxxKkObPYsn47MWsf5970CQQDIqRiGmCY5QDAaejW4HbOcsSovoxTqu1scGc3Qd6GYvLHujKDoubZdXCVOYQUMEnCD5j7kdNxPbVzdzXll9+p/AkEAu/34iXwCbgEWQWp4V5dNAD0kXGxs3SLpmNpztLn/YR1bNvZry5wKew5hz1zEFX+AGsYgQJu1g/goVJGvwnj/VQJAOe6f9xPsTTEb8jkAU2S323BG1rQFsPNgjY9hnWM8k2U/FbkiJ66eWPvmhWd7Vo3oUBxkYf7fMEtJuXu+JdNarwJAAwJK0YmOLxP4U+gTrj7y/j/feArDqBukSngcDFnAKu1hsc68FJ/vT5iOC6S7YpRJkp8egj5opCcWaTO3GgC5Kg=='),
('C0002', '台積電', '新竹市東區力行六路8號', '張忠謀', '0922099131', 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIk9j16w9zrT6/nYkx4NRnv08tnDgbJYEgMqCugl3Kjp2x0Jq9c71eTlsyfPFV6MA+CGc6k96Pz1dskQY6zAv3nDmf/0SqRO61OlFDrjAbnoWiem6GKfmpJpbqceeNByhQtjWs0BnESdzrv2aTH9q17FLEDrwpcaqAlr5nmyUJawIDAQAB', 'MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAMiT2PXrD3OtPr+diTHg1Ge/Ty2cOBslgSAyoK6CXcqOnbHQmr1zvV5OWzJ88VXowD4IZzqT3o/PV2yRBjrMC/ecOZ//RKpE7rU6UUOuMBuehaJ6boYp+akmlupx540HKFC2NazQGcRJ3Ou/ZpMf2rXsUsQOvClxqoCWvmebJQlrAgMBAAECgYBHFW6cqLOPMWS9j90hWiaspfYvmd+gb0g12vtrHTSUJrroW5+baLtCAs77M6Br69LFqUC8V89WdArtpO/qQooyk/pMJqasMwdq3QEcQWY3cfIi6So2al0vN0NRtx+pGoCqU73s6NbnG1ZHsGu9FvyRjIWikEAqqXg8GSfGAKDP8QJBAOeGDixB/ouTGnXw1igZT62pFbDAl5lCtir0VnkpvCt0Js+ujIiVwiajtrVR1Rlgy+nWXg8kOO36e26Nl3zcw78CQQDdyESMdbA5cHAExKvWWNT6KzdrB/F4Aed+MoQpOULejM42xCMuRuyep/I8z6k1ICp/y2SiB5Vo0+m39vplDrVVAkBL1jpwPtG9MFs7hL7xdZEG5lrHgd5mglafbVeh6ozLgwlvf9JirwNgmsGvVPXDkVRZ7TD0Lr5DHYgu50xWxw2LAkAQN2yLuK9CA+6s6pSF/8jS4gYTVWlalQkQOTFgskcpbrJFXuITqCv1DeKwf56nu8pfvceF8XgDSjt0sCJu8TxhAkAh5xHdKlvRfhb+mb/TVuc5CSfVuqwmAHAoMtE3XPqMkCxXnunW71uSeOUehTuy6Oe9Q6yGlY9RcEBWF370b+8Z'),
('C0003', '現代財富科技有限公司', '台北市信義區忠孝東路五段68號25樓', '英屬島商', '0227221314', 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDCGCMeLxxmbyROOI7+i1PnviSGCUjKmnrVqJSH4wnWAkyJ/3PUeBOCvCEg32ovOdazU87DGFsswdZLyOuw7LY+wh05bdzemJUoUGV//HazPD4d4eTz+i2kVxEkq4o9OEUYey3HQygLac+rG9OUuhws8vwb/DuZPEb/Pa4gIFSrQIDAQAB', 'MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMMIYIx4vHGZvJE44jv6LU+e+JIYJSMqaetWolIfjCdYCTIn/c9R4E4K8ISDfai851rNTzsMYWyzB1kvI67Dstj7CHTlt3N6YlShQZX/8drM8Ph3h5PP6LaRXESSrij04RRh7LcdDKAtpz6sb05S6HCzy/Bv8O5k8Rv89riAgVKtAgMBAAECgYAxQeRglf3CEzn005EP5NeczGGrRD3c69FkhrToWN9k8G8iI8eOnPcxvsGQNkV+YHduD3x7RV01vuGUPLueX/7DLYU8vX2E/tekcxgM0ny9bfCFRxm5zrZmlris65Xos/QGTS6Lrsxu0NxBRorOEZgdD518kfHerPGIB7kG1T++YQJBAN+LTIRMc4EhXmqeo3/LJOMJKpJ+iPwRtG67zFadkwphsT7PCOPiSmzQkbSswYW0dC6aX6EKrmCpToaKa4VQ/e8CQQDfWV1Lmzd2Jo5cThGkQa9wL4TGfTZAGf0bVou34EObHNy/EOxA9Wo19u+9S7JZDCptxN1oGlTSaeAgadkyBhUjAkEAuBYNZ/FROOiSyPhkqetPMAuvXD4JbpLh5EKQrk9K9ESo4pE5v/fs1BkZtBCDuSh2eJ412/dgzEcAXHkGvB2LTwJAPQQ86JrO3AhMfAsX5rfLJerVayRp3bk73GwYX3N1BLst00TcRiLFkViUxjIX1xvru3E8y2PmKFWkVTaVj4T54QJBAKGGXE/rZwod9DFWaHPb05iGmKA9s4Llj2anF1G66jKrvxJKYpJ3OIqYI33mrkxSSd3AMQAMbwrFpt/r/QHCf6E=');

-- --------------------------------------------------------

--
-- 資料表結構 `contract`
--

CREATE TABLE `contract` (
  `User_id` text NOT NULL,
  `Company_id` text NOT NULL,
  `Contract_end_date` date NOT NULL,
  `Contract_avail` tinyint(1) NOT NULL,
  `Contract_name` text NOT NULL,
  `Contract_level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `contract`
--

INSERT INTO `contract` (`User_id`, `Company_id`, `Contract_end_date`, `Contract_avail`, `Contract_name`, `Contract_level`) VALUES
('U0001', 'C0001', '2022-12-25', 1, '申請合約', '第一級'),
('U0002', 'C0002', '2022-02-23', 1, '手機門號申請', '第二級'),
('U0003', 'C0003', '2023-04-21', 1, '開戶申請', '第二級'),
('U0004', 'C0001', '2022-07-25', 1, '網路合約', '第二級');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `User_id` text NOT NULL,
  `User_name` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birth` date NOT NULL,
  `user_phone` text NOT NULL,
  `user_parent` text NOT NULL,
  `user_spouse` text NOT NULL,
  `user_addr` text NOT NULL,
  `user_idnum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`User_id`, `User_name`, `user_gender`, `user_birth`, `user_phone`, `user_parent`, `user_spouse`, `user_addr`, `user_idnum`) VALUES
('U0001', '林璟翔', 'Male', '2000-04-05', '0908511587', '林爸爸', '無', '桃園市遠東路135號', 'O123456789'),
('U0002', '林璟騰', 'Male', '2000-04-26', '0978288555', '林爸爸 林媽媽', '無', '彰化縣田中鎮豆花路50號', 'P126544978'),
('U0003', '張經略', 'Male', '1998-02-22', '0923456123', '張爸 張媽', '新垣結衣', '桃園市八德區永豐南路3550弄30號', 'A115879455'),
('U0004', '曾雅詩', 'Female', '2000-01-31', '0988876543', '曾爸 曾媽', '不存在', '新竹市中山北路2段', 'K264581319');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
