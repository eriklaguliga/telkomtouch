TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `setelah_data_masuk` AFTER INSERT ON `tbl_nota` FOR EACH ROW BEGIN\n INSERT INTO tbl_notif (id_nota, last_edit, tobeuser, isi_nota, tanggal) VALUES\n (new.id_nota, \n new.last_edit,\n new.tobeuser,\n new.isi_nota,\n new.tanggal);\n END'
sql_modes=1342177280
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci'
