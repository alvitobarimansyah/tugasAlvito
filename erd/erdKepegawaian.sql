use kepegawaian;
insert into divisi(nama)values
('Dewan Direksi'),
('Manager'),
('Staff');
select *from divisi;
insert into jabatan(nama)values
('Direktur Utama'),
('Direktur Keuangan'),
('Direktur'),
('Direktur Pemasaran'),
('Direktur Operasional'),
('IT'),
('Jaringan'),
('Projek'),
('Engineering'),
('Operasional'),
('Marketing'),
('Keuangan dan Umum'),
('Administrasi dan Gudang');
select * from jabatan;
insert into pegawai(nip,nama,gender,iddivisi,idjabatan,alamat,foto)values
('202103L001','Alvito','L',1, 1,'Jakarta','alvito.jpg'),
('202103L002','Sunan','L',1,2,'Jakarta','sunan.jpg'),
('202103P003','Sarlin','P',1,3,'Bogor','sarlin.jpg'),
('202103L004','Alfian','L',1,4,'Jakarta','alfian.jpg'),
('202103L005','Danu','L',1,5,'Jakarta','danu.jpg'),
('202103L006','Rio','L',2,6,'Jakarta','rio.jpg'),
('202103P007','Helen','P',2,7,'Jakarta','helen.jpg'),
('202103P008','Okta','P',2,8,'Jakarta','okta.jpg'),
('202103L009','Seno','L',2,9,'Jakarta','seno.jpg'),
('202103P010','Sella','P',2,10,'Jakarta','sella.jpg'),
('202103P011','Riyah','P',2,11,'Jakarta','riyah.jpg'),
('202103P012','Esthu','P',2,12,'Bekasi','esthu.jpg'),
('202103P013','Cony','P',2,13,'Jakarta','cony.jpg'),
('202103P014','Ilena','P',3,6,'Jakarta','ilena.jpg'),
('202103L015','Dimas','L',3,7,'Jakarta','dimas.jpg'),
('202103L016','Ridwan','L',3,8,'Jakarta','ridwan.jpg'),
('202103P017','Naila','P',3,9,'Jakarta','naila.jpg'),
('202103L018','Noris','L',3,10,'Jakarta','noris.jpg'),
('202103L019','Agung','L',3,11,'Jakarta','agung.jpg'),
('202103L020','Fajar','P',3,12,'Jakarta','fajar.jpg'),
('202103L021','Dimas A.','L',3,13,'Jakarta','dimas.jpg');
select * from pegawai;
insert into gaji(idpegawai,gapok,tunjab,lain2)values
(1,'20000000','10000000','5000000'),
(2,'15000000','7500000','3750000'),
(3,'15000000','7500000','3750000'),
(4,'15000000','7500000','3750000'),
(5,'15000000','7500000','3750000'),
(6,'10000000','5000000','2500000'),
(7,'10000000','5000000','2500000'),
(8,'10000000','5000000','2500000'),
(9,'10000000','5000000','2500000'),
(10,'10000000','5000000','2500000'),
(11,'10000000','5000000','2500000'),
(12,'10000000','5000000','2500000'),
(13,'10000000','5000000','2500000'),
(14,'5000000','2500000','1250000'),
(15,'5000000','2500000','1250000'),
(16,'5000000','2500000','1250000'),
(17,'5000000','2500000','1250000'),
(18,'5000000','2500000','1250000'),
(19,'5000000','2500000','1250000'),
(20,'5000000','2500000','1250000'),
(21,'5000000','2500000','1250000');
select *from gaji;
select pegawai.nip as NIP,pegawai.nama as NAMA, pegawai.gender as GENDER, divisi.nama as DIVISI,  
jabatan.nama as JABATAN , pegawai.alamat as ALAMAT, pegawai.foto as FOTO from pegawai 
inner join divisi on divisi.id = pegawai.iddivisi
inner join jabatan on jabatan.id = pegawai.idjabatan;
select  pegawai.nip as NIP, pegawai.nama as Nama, divisi.nama as Divisi, jabatan.nama as Jabatan, gaji.gapok as GajiPokok, gaji.tunjab as Bpjs, gaji.lain2 as Komisi from gaji
inner join pegawai on pegawai.id = gaji.idpegawai
inner join divisi on divisi.id = pegawai.iddivisi
inner join jabatan on jabatan.id = pegawai.idjabatan;