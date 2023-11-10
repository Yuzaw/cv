CREATE DATABASE cv;
USE CV;
CREATE TABLE cv_data (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nama VARCHAR(100) NOT NULL,
	alamat TEXT NOT NULL,
	telepon VARCHAR(20) NOT NULL,
	email VARCHAR(255) NOT NULL,
	web VARCHAR(255) NOT NULL,
	pendidikan TEXT NOT NULL,
	pengalaman_kerja TEXT NOT NULL,
	keterampilan TEXT NOT NULL,
	foto_path VARCHAR(255) NOT NULL
);

INSERT INTO cv_data (`nama`, `alamat`, `telepon`, `email`, `web`, `pendidikan`, `pengalaman_kerja`, `keterampilan`, `foto_path`) VALUES('Muhammad Fatih Bari', 'Perumahan Metro Cilegon Cluster Royal Garden Blok Q8 No 3A, Jombang, Kota Cilegon, Banten', '082180587421', 'fatihbari37@gmail.com', 'Belum ada', 'S1-Informatika', 'Belum ada', 'Programming', 'foto.jpg')

SELECT * FROM cv_data

CREATE TABLE comments (
	cv_id INT PRIMARY KEY AUTO_INCREMENT,
	comment_text TEXT NOT NULL
);

SELECT * FROM comments