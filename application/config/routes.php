<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/beranda/';
$route['404_override'] = 'error_404/index';
$route['translate_uri_dashes'] = FALSE;
// $route['bidang/permukiman/artikel/kategori/(:any)/(:any)'] = 'bidang/dashboard/permukiman_kategori/$1/$2';

//FRONTEND

//Beranda
$route['beranda'] = 'frontend/beranda/index';
$route['beranda/overview'] = 'frontend/beranda/overview';
$route['beranda/calonmahasiswa'] = 'frontend/beranda/calonmahasiswa';
$route['beranda/beasiswa'] = 'frontend/beranda/beasiswa';
$route['beranda/beasiswa/detail/(:any)'] = 'frontend/beranda/detail_beasiswa/$1';
$route['beranda/faq'] = 'frontend/beranda/faq';
$route['beranda/pengumuman'] = 'frontend/beranda/pengumuman';
$route['beranda/pengumuman/detail/(:any)'] = 'frontend/beranda/detail_pengumuman/$1';
$route['beranda/kegiatan'] = 'frontend/beranda/kegiatan';
$route['beranda/kegiatan/detail/(:any)'] = 'frontend/beranda/detail_kegiatan/$1';
$route['beranda/bidangminat/detail/(:any)'] = 'frontend/beranda/detail_bidangminat/$1';
$route['beranda/keketatan'] = 'frontend/beranda/keketatan';


//Berita
$route['berita'] = 'frontend/berita/index';
$route['berita/(:any)'] = 'frontend/berita/index/$1';
$route['berita/detail/(:any)'] = 'frontend/berita/detail/$1';

//Profile Prodi
//Sejarah
$route['profile/sejarah'] = 'frontend/profile/sejarah/index';
//Visi, Misi, Tujuan, dan Moto
$route['profile/visimisi'] = 'frontend/profile/visimisi/index';
//Struktur Organisasi
$route['profile/struktur_organisasi'] = 'frontend/profile/struktur_organisasi/index';
//Dosen & Tenaga Pendidik
$route['profile/dosen'] = 'frontend/profile/dosen/index';
$route['profile/dosen/detail/(:any)'] = 'frontend/profile/dosen/detail/$1';
//Kerjasama
$route['profile/kerjasama'] = 'frontend/profile/kerjasama/index';

//Akademik
//Kurikulum
$route['akademik/kurikulum'] = 'frontend/akademik/kurikulum/index';
//Silabus
$route['akademik/silabus'] = 'frontend/akademik/silabus/index';
//Kalender Akademik
$route['akademik/kalender_akademik'] = 'frontend/akademik/kalender_akademik/index';
//Laboratorium
$route['akademik/laboratorium'] = 'frontend/akademik/laboratorium/index';
//Profile Lulusan
$route['akademik/profile_lulusan'] = 'frontend/akademik/profile_lulusan/index';
//Akreditasi
$route['akademik/akreditasi'] = 'frontend/akademik/akreditasi/index';
//Biaya Kuliah
$route['akademik/biaya_kuliah'] = 'frontend/akademik/biaya_kuliah/index';

//Kemahasiswaan
//Organisasi Mahasiswa
$route['kemahasiswaan/ormawa'] = 'frontend/kemahasiswaan/ormas/index';
//Program Kreativitas Mahasiswa
$route['kemahasiswaan/pkm'] = 'frontend/kemahasiswaan/pkm/index';
$route['kemahasiswaan/pkm/detail/(:any)'] = 'frontend/kemahasiswaan/pkm/detail/$1';
//Prestasi Mahasiswa
$route['kemahasiswaan/prestasi_mahasiswa'] = 'frontend/kemahasiswaan/prestasi_mahasiswa/index';
$route['kemahasiswaan/prestasi_mahasiswa/(:any)'] = 'frontend/kemahasiswaan/prestasi_mahasiswa/index/$1';
$route['kemahasiswaan/prestasi_mahasiswa/detail/(:any)'] = 'frontend/kemahasiswaan/prestasi_mahasiswa/detail/$1';
//Alumni
$route['kemahasiswaan/alumni'] = 'frontend/kemahasiswaan/alumni/index';
$route['kemahasiswaan/alumni/(:any)'] = 'frontend/kemahasiswaan/alumni/index/$1';

//Penelitian & Pengabdian
//Grup Penelitian
$route['penelitian/grup_penelitian'] = 'frontend/penelitian/grup_penelitian/index';
//Hasil Penelitian
$route['penelitian/hasil_penelitian'] = 'frontend/penelitian/hasil_penelitian/index';
$route['penelitian/hasil_penelitian/detail/(:any)'] = 'frontend/penelitian/hasil_penelitian/detail/$1';
//Hasil Pengabdian
$route['penelitian/hasil_pengabdian'] = 'frontend/penelitian/hasil_pengabdian/index';
$route['penelitian/hasil_pengabdian/detail/(:any)'] = 'frontend/penelitian/hasil_pengabdian/detail/$1';

//Kontak
$route['kontak'] = 'frontend/kontak/index';


//LOGIN
$route['login/'] = 'login/index';
$route['login/up'] = 'login/up';
$route['backend/logout'] = 'login/logout';
$route['lupa_password'] = 'login/lupa_password/index';
$route['lupa_password/up'] = 'login/lupa_password/up';
$route['lupa_password/reset/(:any)'] = 'login/lupa_password/reset/$1';
$route['lupa_password/reset/up/(:any)'] = 'login/lupa_password/reset_up/$1';

//BACKEND

//Beranda
//Banner
$route['backend/beranda/banner'] = 'backend/beranda/banner/index';
$route['backend/beranda/banner/create'] = 'backend/beranda/banner/create';
$route['backend/beranda/banner/create/up'] = 'backend/beranda/banner/up';
$route['backend/beranda/banner/update/(:any)'] = 'backend/beranda/banner/update/$1';
$route['backend/beranda/banner/update/down/(:any)'] = 'backend/beranda/banner/down/$1';
$route['backend/beranda/banner/delete/(:any)'] = 'backend/beranda/banner/delete/$1';
$route['backend/beranda/banner/detail/(:any)'] = 'backend/beranda/banner/detail/$1';
//Overview Prodi
$route['backend/beranda/overview'] = 'backend/beranda/overview/index';
$route['backend/beranda/overview/create'] = 'backend/beranda/overview/create';
$route['backend/beranda/overview/create/up'] = 'backend/beranda/overview/up';
$route['backend/beranda/overview/update/(:any)'] = 'backend/beranda/overview/update/$1';
$route['backend/beranda/overview/update/down/(:any)'] = 'backend/beranda/overview/down/$1';
$route['backend/beranda/overview/delete/(:any)'] = 'backend/beranda/overview/delete/$1';
$route['backend/beranda/overview/detail/(:any)'] = 'backend/beranda/overview/detail/$1';
//Galeri
$route['backend/beranda/galeri'] = 'backend/beranda/galeri/index';
$route['backend/beranda/galeri/create'] = 'backend/beranda/galeri/create';
$route['backend/beranda/galeri/create/up'] = 'backend/beranda/galeri/up';
$route['backend/beranda/galeri/update/(:any)'] = 'backend/beranda/galeri/update/$1';
$route['backend/beranda/galeri/update/down/(:any)'] = 'backend/beranda/galeri/down/$1';
$route['backend/beranda/galeri/delete/(:any)'] = 'backend/beranda/galeri/delete/$1';
$route['backend/beranda/galeri/detail/(:any)'] = 'backend/beranda/galeri/detail/$1';
//Beasiswa
$route['backend/beranda/beasiswa'] = 'backend/beranda/beasiswa/index';
$route['backend/beranda/beasiswa/create'] = 'backend/beranda/beasiswa/create';
$route['backend/beranda/beasiswa/create/up'] = 'backend/beranda/beasiswa/up';
$route['backend/beranda/beasiswa/update/(:any)'] = 'backend/beranda/beasiswa/update/$1';
$route['backend/beranda/beasiswa/update/down/(:any)'] = 'backend/beranda/beasiswa/down/$1';
$route['backend/beranda/beasiswa/delete/(:any)'] = 'backend/beranda/beasiswa/delete/$1';
$route['backend/beranda/beasiswa/detail/(:any)'] = 'backend/beranda/beasiswa/detail/$1';
//FAQ
$route['backend/beranda/faq'] = 'backend/beranda/faq/index';
$route['backend/beranda/faq/create'] = 'backend/beranda/faq/create';
$route['backend/beranda/faq/create/up'] = 'backend/beranda/faq/up';
$route['backend/beranda/faq/update/(:any)'] = 'backend/beranda/faq/update/$1';
$route['backend/beranda/faq/update/down/(:any)'] = 'backend/beranda/faq/down/$1';
$route['backend/beranda/faq/delete/(:any)'] = 'backend/beranda/faq/delete/$1';
//Bidang Minat
$route['backend/beranda/bidangminat'] = 'backend/beranda/bidangminat/index';
$route['backend/beranda/bidangminat/create'] = 'backend/beranda/bidangminat/create';
$route['backend/beranda/bidangminat/create/up'] = 'backend/beranda/bidangminat/up';
$route['backend/beranda/bidangminat/update/(:any)'] = 'backend/beranda/bidangminat/update/$1';
$route['backend/beranda/bidangminat/update/down/(:any)'] = 'backend/beranda/bidangminat/down/$1';
$route['backend/beranda/bidangminat/delete/(:any)'] = 'backend/beranda/bidangminat/delete/$1';
$route['backend/beranda/bidangminat/detail/(:any)'] = 'backend/beranda/bidangminat/detail/$1';
//Testimoni
$route['backend/beranda/testimoni'] = 'backend/beranda/testimoni/index';
$route['backend/beranda/testimoni/create'] = 'backend/beranda/testimoni/create';
$route['backend/beranda/testimoni/create/up'] = 'backend/beranda/testimoni/up';
$route['backend/beranda/testimoni/update/(:any)'] = 'backend/beranda/testimoni/update/$1';
$route['backend/beranda/testimoni/update/down/(:any)'] = 'backend/beranda/testimoni/down/$1';
$route['backend/beranda/testimoni/delete/(:any)'] = 'backend/beranda/testimoni/delete/$1';
$route['backend/beranda/testimoni/detail/(:any)'] = 'backend/beranda/testimoni/detail/$1';
//Pengumuman
$route['backend/beranda/pengumuman'] = 'backend/beranda/pengumuman/index';
$route['backend/beranda/pengumuman/create'] = 'backend/beranda/pengumuman/create';
$route['backend/beranda/pengumuman/create/up'] = 'backend/beranda/pengumuman/up';
$route['backend/beranda/pengumuman/update/(:any)'] = 'backend/beranda/pengumuman/update/$1';
$route['backend/beranda/pengumuman/update/down/(:any)'] = 'backend/beranda/pengumuman/down/$1';
$route['backend/beranda/pengumuman/delete/(:any)'] = 'backend/beranda/pengumuman/delete/$1';
$route['backend/beranda/pengumuman/detail/(:any)'] = 'backend/beranda/pengumuman/detail/$1';
//Kegiatan
$route['backend/beranda/kegiatan'] = 'backend/beranda/kegiatan/index';
$route['backend/beranda/kegiatan/create'] = 'backend/beranda/kegiatan/create';
$route['backend/beranda/kegiatan/create/up'] = 'backend/beranda/kegiatan/up';
$route['backend/beranda/kegiatan/update/(:any)'] = 'backend/beranda/kegiatan/update/$1';
$route['backend/beranda/kegiatan/update/down/(:any)'] = 'backend/beranda/kegiatan/down/$1';
$route['backend/beranda/kegiatan/delete/(:any)'] = 'backend/beranda/kegiatan/delete/$1';
$route['backend/beranda/kegiatan/detail/(:any)'] = 'backend/beranda/kegiatan/detail/$1';
//Keketatan
$route['backend/beranda/keketatan'] = 'backend/beranda/keketatan/index';
$route['backend/beranda/keketatan/create'] = 'backend/beranda/keketatan/create';
$route['backend/beranda/keketatan/create/up'] = 'backend/beranda/keketatan/up';
$route['backend/beranda/keketatan/update/(:any)'] = 'backend/beranda/keketatan/update/$1';
$route['backend/beranda/keketatan/update/down/(:any)'] = 'backend/beranda/keketatan/down/$1';
$route['backend/beranda/keketatan/delete/(:any)'] = 'backend/beranda/keketatan/delete/$1';
$route['backend/beranda/keketatan/create2'] = 'backend/beranda/keketatan/create2';
$route['backend/beranda/keketatan/create/up2'] = 'backend/beranda/keketatan/up2';
$route['backend/beranda/keketatan/update2/(:any)'] = 'backend/beranda/keketatan/update2/$1';
$route['backend/beranda/keketatan/update/down2/(:any)'] = 'backend/beranda/keketatan/down2/$1';
$route['backend/beranda/keketatan/delete2/(:any)'] = 'backend/beranda/keketatan/delete2/$1';
// $route['backend/beranda/keketatan/detail/(:any)'] = 'backend/beranda/keketatan/detail/$1';

//Berita
//Kategori Berita
$route['backend/berita/kategori_berita'] = 'backend/berita/kategori_berita/index';
$route['backend/berita/kategori_berita/create'] = 'backend/berita/kategori_berita/create';
$route['backend/berita/kategori_berita/create/up'] = 'backend/berita/kategori_berita/up';
$route['backend/berita/kategori_berita/update/(:any)'] = 'backend/berita/kategori_berita/update/$1';
$route['backend/berita/kategori_berita/update/down/(:any)'] = 'backend/berita/kategori_berita/down/$1';
$route['backend/berita/kategori_berita/delete/(:any)'] = 'backend/berita/kategori_berita/delete/$1';
//Berita
$route['backend/berita'] = 'backend/berita/berita/index';
$route['backend/berita/create'] = 'backend/berita/berita/create';
$route['backend/berita/create/up'] = 'backend/berita/berita/up';
$route['backend/berita/update/(:any)'] = 'backend/berita/berita/update/$1';
$route['backend/berita/update/down/(:any)'] = 'backend/berita/berita/down/$1';
$route['backend/berita/delete/(:any)'] = 'backend/berita/berita/delete/$1';
$route['backend/berita/detail/(:any)'] = 'backend/berita/berita/detail/$1';
//Profile Prodi
//Sejarah
$route['backend/profile/sejarah'] = 'backend/profile/sejarah/index';
$route['backend/profile/sejarah/create'] = 'backend/profile/sejarah/create';
$route['backend/profile/sejarah/create/up'] = 'backend/profile/sejarah/up';
$route['backend/profile/sejarah/update/(:any)'] = 'backend/profile/sejarah/update/$1';
$route['backend/profile/sejarah/update/down/(:any)'] = 'backend/profile/sejarah/down/$1';
$route['backend/profile/sejarah/delete/(:any)'] = 'backend/profile/sejarah/delete/$1';
//Visi, Misi, Tujuan, dan Moto
$route['backend/profile/visimisi'] = 'backend/profile/visimisi/index';
$route['backend/profile/visimisi/create'] = 'backend/profile/visimisi/create';
$route['backend/profile/visimisi/create/up'] = 'backend/profile/visimisi/up';
$route['backend/profile/visimisi/update/(:any)'] = 'backend/profile/visimisi/update/$1';
$route['backend/profile/visimisi/update/down/(:any)'] = 'backend/profile/visimisi/down/$1';
$route['backend/profile/visimisi/delete/(:any)'] = 'backend/profile/visimisi/delete/$1';
//Struktur Organisasi
$route['backend/profile/struktur_organisasi'] = 'backend/profile/struktur_organisasi/index';
$route['backend/profile/struktur_organisasi/create'] = 'backend/profile/struktur_organisasi/create';
$route['backend/profile/struktur_organisasi/create/up'] = 'backend/profile/struktur_organisasi/up';
$route['backend/profile/struktur_organisasi/update/(:any)'] = 'backend/profile/struktur_organisasi/update/$1';
$route['backend/profile/struktur_organisasi/update/down/(:any)'] = 'backend/profile/struktur_organisasi/down/$1';
$route['backend/profile/struktur_organisasi/delete/(:any)'] = 'backend/profile/struktur_organisasi/delete/$1';
//Dosen dan Tenaga Pendidik
$route['backend/profile/dosen'] = 'backend/profile/dosen/index';
$route['backend/profile/dosen/create'] = 'backend/profile/dosen/create';
$route['backend/profile/dosen/create/up'] = 'backend/profile/dosen/up';
$route['backend/profile/dosen/update/(:any)'] = 'backend/profile/dosen/update/$1';
$route['backend/profile/dosen/update/down/(:any)'] = 'backend/profile/dosen/down/$1';
$route['backend/profile/dosen/delete/(:any)'] = 'backend/profile/dosen/delete/$1';
$route['backend/profile/dosen/detail/(:any)'] = 'backend/profile/dosen/detail/$1';
//Dosen Pendidikan
$route['backend/profile/dosen/pendidikan/(:any)'] = 'backend/profile/dosen/pendidikan/$1';
$route['backend/profile/dosen/pendidikan/up/(:any)'] = 'backend/profile/dosen/pendidikan_up/$1';
$route['backend/profile/dosen/pendidikan/delete/(:any)'] = 'backend/profile/dosen/pendidikan_down/$1';
//Dosen Keahlian
$route['backend/profile/dosen/keahlian/(:any)'] = 'backend/profile/dosen/keahlian/$1';
$route['backend/profile/dosen/keahlian/up/(:any)'] = 'backend/profile/dosen/keahlian_up/$1';
$route['backend/profile/dosen/keahlian/delete/(:any)'] = 'backend/profile/dosen/keahlian_down/$1';
//Dosen Minat Penelitian
$route['backend/profile/dosen/minatpenelitian/(:any)'] = 'backend/profile/dosen/minatpenelitian/$1';
$route['backend/profile/dosen/minatpenelitian/up/(:any)'] = 'backend/profile/dosen/minatpenelitian_up/$1';
$route['backend/profile/dosen/minatpenelitian/delete/(:any)'] = 'backend/profile/dosen/minatpenelitian_down/$1';
//Dosen Publikasi
$route['backend/profile/dosen/publikasi/(:any)'] = 'backend/profile/dosen/publikasi/$1';
$route['backend/profile/dosen/publikasi/up/(:any)'] = 'backend/profile/dosen/publikasi_up/$1';
$route['backend/profile/dosen/publikasi/delete/(:any)'] = 'backend/profile/dosen/publikasi_down/$1';
//Dosen Penelitian
$route['backend/profile/dosen/penelitian/(:any)'] = 'backend/profile/dosen/penelitian/$1';
$route['backend/profile/dosen/penelitian/up/(:any)'] = 'backend/profile/dosen/penelitian_up/$1';
$route['backend/profile/dosen/penelitian/delete/(:any)'] = 'backend/profile/dosen/penelitian_down/$1';
//Dosen Pengalaman
$route['backend/profile/dosen/pengalaman/(:any)'] = 'backend/profile/dosen/pengalaman/$1';
$route['backend/profile/dosen/pengalaman/up/(:any)'] = 'backend/profile/dosen/pengalaman_up/$1';
$route['backend/profile/dosen/pengalaman/delete/(:any)'] = 'backend/profile/dosen/pengalaman_down/$1';
//Kerjasama
$route['backend/profile/kerjasama'] = 'backend/profile/kerjasama/index';
$route['backend/profile/kerjasama/create'] = 'backend/profile/kerjasama/create';
$route['backend/profile/kerjasama/create/up'] = 'backend/profile/kerjasama/up';
$route['backend/profile/kerjasama/update/(:any)'] = 'backend/profile/kerjasama/update/$1';
$route['backend/profile/kerjasama/update/down/(:any)'] = 'backend/profile/kerjasama/down/$1';
$route['backend/profile/kerjasama/delete/(:any)'] = 'backend/profile/kerjasama/delete/$1';
$route['backend/profile/kerjasama/detail/(:any)'] = 'backend/profile/kerjasama/detail/$1';

//Akademik

//Kurikulum
$route['backend/akademik/kurikulum'] = 'backend/akademik/kurikulum/index';
$route['backend/akademik/kurikulum/create'] = 'backend/akademik/kurikulum/create';
$route['backend/akademik/kurikulum/create/up'] = 'backend/akademik/kurikulum/up';
$route['backend/akademik/kurikulum/update/(:any)'] = 'backend/akademik/kurikulum/update/$1';
$route['backend/akademik/kurikulum/update/down/(:any)'] = 'backend/akademik/kurikulum/down/$1';
$route['backend/akademik/kurikulum/delete/(:any)'] = 'backend/akademik/kurikulum/delete/$1';
//Kurikulum Semester
$route['backend/akademik/kurikulum/semester/(:any)'] = 'backend/akademik/kurikulum/semester/$1';
$route['backend/akademik/kurikulum/semester/(:any)'] = 'backend/akademik/kurikulum/semester/$1';
$route['backend/akademik/kurikulum/semester/up/(:any)'] = 'backend/akademik/kurikulum/semester_up/$1';
$route['backend/akademik/kurikulum/semester/delete/(:any)'] = 'backend/akademik/kurikulum/semester_down/$1';
//Kurikulum Matkul
$route['backend/akademik/kurikulum/matkul/(:any)'] = 'backend/akademik/kurikulum/matkul/$1';
$route['backend/akademik/kurikulum/matkul/up/(:any)'] = 'backend/akademik/kurikulum/matkul_up/$1';
$route['backend/akademik/kurikulum/matkul/delete/(:any)'] = 'backend/akademik/kurikulum/matkul_down/$1';
//Silabus
$route['backend/akademik/silabus'] = 'backend/akademik/silabus/index';
$route['backend/akademik/silabus/create'] = 'backend/akademik/silabus/create';
$route['backend/akademik/silabus/create/up'] = 'backend/akademik/silabus/up';
$route['backend/akademik/silabus/update/(:any)'] = 'backend/akademik/silabus/update/$1';
$route['backend/akademik/silabus/update/down/(:any)'] = 'backend/akademik/silabus/down/$1';
$route['backend/akademik/silabus/delete/(:any)'] = 'backend/akademik/silabus/delete/$1';
//Kalender Akademik
$route['backend/akademik/kalender_akademik'] = 'backend/akademik/kalender_akademik/index';
$route['backend/akademik/kalender_akademik/create'] = 'backend/akademik/kalender_akademik/create';
$route['backend/akademik/kalender_akademik/create/up'] = 'backend/akademik/kalender_akademik/up';
$route['backend/akademik/kalender_akademik/update/(:any)'] = 'backend/akademik/kalender_akademik/update/$1';
$route['backend/akademik/kalender_akademik/update/down/(:any)'] = 'backend/akademik/kalender_akademik/down/$1';
$route['backend/akademik/kalender_akademik/delete/(:any)'] = 'backend/akademik/kalender_akademik/delete/$1';

$route['backend/akademik/kalender_akademik_file/create'] = 'backend/akademik/kalender_akademik/create_file';
$route['backend/akademik/kalender_akademik_file/create/up'] = 'backend/akademik/kalender_akademik/up_file';
$route['backend/akademik/kalender_akademik_file/update/(:any)'] = 'backend/akademik/kalender_akademik/update_file/$1';
$route['backend/akademik/kalender_akademik_file/update/down/(:any)'] = 'backend/akademik/kalender_akademik/down_file/$1';
$route['backend/akademik/kalender_akademik_file/delete/(:any)'] = 'backend/akademik/kalender_akademik/delete_file/$1';
//Laboratorium
$route['backend/akademik/laboratorium'] = 'backend/akademik/laboratorium/index';
$route['backend/akademik/laboratorium/create'] = 'backend/akademik/laboratorium/create';
$route['backend/akademik/laboratorium/create/up'] = 'backend/akademik/laboratorium/up';
$route['backend/akademik/laboratorium/update/(:any)'] = 'backend/akademik/laboratorium/update/$1';
$route['backend/akademik/laboratorium/update/down/(:any)'] = 'backend/akademik/laboratorium/down/$1';
$route['backend/akademik/laboratorium/delete/(:any)'] = 'backend/akademik/laboratorium/delete/$1';
$route['backend/akademik/laboratorium/detail/(:any)'] = 'backend/akademik/laboratorium/detail/$1';
//Profile Lulusan
$route['backend/akademik/profile_lulusan'] = 'backend/akademik/profile_lulusan/index';
$route['backend/akademik/profile_lulusan/create'] = 'backend/akademik/profile_lulusan/create';
$route['backend/akademik/profile_lulusan/create/up'] = 'backend/akademik/profile_lulusan/up';
$route['backend/akademik/profile_lulusan/update/(:any)'] = 'backend/akademik/profile_lulusan/update/$1';
$route['backend/akademik/profile_lulusan/update/down/(:any)'] = 'backend/akademik/profile_lulusan/down/$1';
$route['backend/akademik/profile_lulusan/delete/(:any)'] = 'backend/akademik/profile_lulusan/delete/$1';
$route['backend/akademik/profile_lulusan/detail/(:any)'] = 'backend/akademik/profile_lulusan/detail/$1';
//Akreditasi
$route['backend/akademik/akreditasi'] = 'backend/akademik/akreditasi/index';
$route['backend/akademik/akreditasi/create'] = 'backend/akademik/akreditasi/create';
$route['backend/akademik/akreditasi/create/up'] = 'backend/akademik/akreditasi/up';
$route['backend/akademik/akreditasi/update/(:any)'] = 'backend/akademik/akreditasi/update/$1';
$route['backend/akademik/akreditasi/update/down/(:any)'] = 'backend/akademik/akreditasi/down/$1';
$route['backend/akademik/akreditasi/delete/(:any)'] = 'backend/akademik/akreditasi/delete/$1';
$route['backend/akademik/akreditasi/detail/(:any)'] = 'backend/akademik/akreditasi/detail/$1';
//Biaya Kuliah
$route['backend/akademik/biaya_kuliah'] = 'backend/akademik/biaya_kuliah/index';
$route['backend/akademik/biaya_kuliah/create'] = 'backend/akademik/biaya_kuliah/create';
$route['backend/akademik/biaya_kuliah/create/up'] = 'backend/akademik/biaya_kuliah/up';
$route['backend/akademik/biaya_kuliah/update/(:any)'] = 'backend/akademik/biaya_kuliah/update/$1';
$route['backend/akademik/biaya_kuliah/update/down/(:any)'] = 'backend/akademik/biaya_kuliah/down/$1';
$route['backend/akademik/biaya_kuliah/delete/(:any)'] = 'backend/akademik/biaya_kuliah/delete/$1';
// $route['backend/akademik/biaya_kuliah/detail/(:any)'] = 'backend/akademik/biaya_kuliah/detail/$1';

//Kemahasiswaan

//Organisasi Mahasiswa
$route['backend/kemahasiswaan/ormawa'] = 'backend/kemahasiswaan/ormas/index';
$route['backend/kemahasiswaan/ormawa/create'] = 'backend/kemahasiswaan/ormas/create';
$route['backend/kemahasiswaan/ormawa/create/up'] = 'backend/kemahasiswaan/ormas/up';
$route['backend/kemahasiswaan/ormawa/update/(:any)'] = 'backend/kemahasiswaan/ormas/update/$1';
$route['backend/kemahasiswaan/ormawa/update/down/(:any)'] = 'backend/kemahasiswaan/ormas/down/$1';
$route['backend/kemahasiswaan/ormawa/delete/(:any)'] = 'backend/kemahasiswaan/ormas/delete/$1';
$route['backend/kemahasiswaan/ormawa/detail/(:any)'] = 'backend/kemahasiswaan/ormas/detail/$1';
//Program Kreativitas Mahasiswa
$route['backend/kemahasiswaan/pkm'] = 'backend/kemahasiswaan/pkm/index';
$route['backend/kemahasiswaan/pkm/create'] = 'backend/kemahasiswaan/pkm/create';
$route['backend/kemahasiswaan/pkm/create/up'] = 'backend/kemahasiswaan/pkm/up';
$route['backend/kemahasiswaan/pkm/update/(:any)'] = 'backend/kemahasiswaan/pkm/update/$1';
$route['backend/kemahasiswaan/pkm/update/down/(:any)'] = 'backend/kemahasiswaan/pkm/down/$1';
$route['backend/kemahasiswaan/pkm/delete/(:any)'] = 'backend/kemahasiswaan/pkm/delete/$1';
$route['backend/kemahasiswaan/pkm/detail/(:any)'] = 'backend/kemahasiswaan/pkm/detail/$1';
//Prestasi Mahasiswa
$route['backend/kemahasiswaan/prestasi_mahasiswa'] = 'backend/kemahasiswaan/prestasi_mahasiswa/index';
$route['backend/kemahasiswaan/prestasi_mahasiswa/create'] = 'backend/kemahasiswaan/prestasi_mahasiswa/create';
$route['backend/kemahasiswaan/prestasi_mahasiswa/create/up'] = 'backend/kemahasiswaan/prestasi_mahasiswa/up';
$route['backend/kemahasiswaan/prestasi_mahasiswa/update/(:any)'] = 'backend/kemahasiswaan/prestasi_mahasiswa/update/$1';
$route['backend/kemahasiswaan/prestasi_mahasiswa/update/down/(:any)'] = 'backend/kemahasiswaan/prestasi_mahasiswa/down/$1';
$route['backend/kemahasiswaan/prestasi_mahasiswa/delete/(:any)'] = 'backend/kemahasiswaan/prestasi_mahasiswa/delete/$1';
$route['backend/kemahasiswaan/prestasi_mahasiswa/detail/(:any)'] = 'backend/kemahasiswaan/prestasi_mahasiswa/detail/$1';
//Alumni
$route['backend/kemahasiswaan/alumni'] = 'backend/kemahasiswaan/alumni/index';
$route['backend/kemahasiswaan/alumni/create'] = 'backend/kemahasiswaan/alumni/create';
$route['backend/kemahasiswaan/alumni/create/up'] = 'backend/kemahasiswaan/alumni/up';
$route['backend/kemahasiswaan/alumni/update/(:any)'] = 'backend/kemahasiswaan/alumni/update/$1';
$route['backend/kemahasiswaan/alumni/update/down/(:any)'] = 'backend/kemahasiswaan/alumni/down/$1';
$route['backend/kemahasiswaan/alumni/delete/(:any)'] = 'backend/kemahasiswaan/alumni/delete/$1';
$route['backend/kemahasiswaan/alumni/detail/(:any)'] = 'backend/kemahasiswaan/alumni/detail/$1';

//Penelitian & Pengabdian

//Grup Penelitian
$route['backend/penelitian/grup_penelitian'] = 'backend/penelitian/grup_penelitian/index';
$route['backend/penelitian/grup_penelitian/create'] = 'backend/penelitian/grup_penelitian/create';
$route['backend/penelitian/grup_penelitian/create/up'] = 'backend/penelitian/grup_penelitian/up';
$route['backend/penelitian/grup_penelitian/update/(:any)'] = 'backend/penelitian/grup_penelitian/update/$1';
$route['backend/penelitian/grup_penelitian/update/down/(:any)'] = 'backend/penelitian/grup_penelitian/down/$1';
$route['backend/penelitian/grup_penelitian/delete/(:any)'] = 'backend/penelitian/grup_penelitian/delete/$1';
//Hasil Penelitian
$route['backend/penelitian/hasil_penelitian'] = 'backend/penelitian/hasil_penelitian/index';
$route['backend/penelitian/hasil_penelitian/create'] = 'backend/penelitian/hasil_penelitian/create';
$route['backend/penelitian/hasil_penelitian/create/up'] = 'backend/penelitian/hasil_penelitian/up';
$route['backend/penelitian/hasil_penelitian/update/(:any)'] = 'backend/penelitian/hasil_penelitian/update/$1';
$route['backend/penelitian/hasil_penelitian/update/down/(:any)'] = 'backend/penelitian/hasil_penelitian/down/$1';
$route['backend/penelitian/hasil_penelitian/delete/(:any)'] = 'backend/penelitian/hasil_penelitian/delete/$1';
//Hasil Pengabdian
$route['backend/penelitian/hasil_pengabdian'] = 'backend/penelitian/hasil_pengabdian/index';
$route['backend/penelitian/hasil_pengabdian/create'] = 'backend/penelitian/hasil_pengabdian/create';
$route['backend/penelitian/hasil_pengabdian/create/up'] = 'backend/penelitian/hasil_pengabdian/up';
$route['backend/penelitian/hasil_pengabdian/update/(:any)'] = 'backend/penelitian/hasil_pengabdian/update/$1';
$route['backend/penelitian/hasil_pengabdian/update/down/(:any)'] = 'backend/penelitian/hasil_pengabdian/down/$1';
$route['backend/penelitian/hasil_pengabdian/delete/(:any)'] = 'backend/penelitian/hasil_pengabdian/delete/$1';

//Kontak
$route['backend/kontak'] = 'backend/kontak/kontak/index';
$route['backend/kontak/create'] = 'backend/kontak/kontak/create';
$route['backend/kontak/create/up'] = 'backend/kontak/kontak/up';
$route['backend/kontak/update/(:any)'] = 'backend/kontak/kontak/update/$1';
$route['backend/kontak/update/down/(:any)'] = 'backend/kontak/kontak/down/$1';
$route['backend/kontak/delete/(:any)'] = 'backend/kontak/kontak/delete/$1';
$route['backend/kontak/detail/(:any)'] = 'backend/kontak/kontak/detail/$1';

//User
$route['backend/user'] = 'backend/user/user/index';
$route['backend/user/create'] = 'backend/user/user/create';
$route['backend/user/create/up'] = 'backend/user/user/up';
$route['backend/user/update/(:any)'] = 'backend/user/user/update/$1';
$route['backend/user/update/down/(:any)'] = 'backend/user/user/down/$1';
$route['backend/user/delete/(:any)'] = 'backend/user/user/delete/$1';
$route['backend/user/detail/(:any)'] = 'backend/user/user/detail/$1';

//Sub Menu
$route['backend/submenu'] = 'backend/submenu/submenu/index';
$route['backend/submenu/create'] = 'backend/submenu/submenu/create';
$route['backend/submenu/create/up'] = 'backend/submenu/submenu/up';
$route['backend/submenu/update/(:any)'] = 'backend/submenu/submenu/update/$1';
$route['backend/submenu/update/down/(:any)'] = 'backend/submenu/submenu/down/$1';
$route['backend/submenu/delete/(:any)'] = 'backend/submenu/submenu/delete/$1';
$route['backend/submenu/detail/(:any)'] = 'backend/submenu/submenu/detail/$1';

//Footer
//Program Studi
$route['backend/footer/prodi'] = 'backend/footer/prodi/index';
$route['backend/footer/prodi/create'] = 'backend/footer/prodi/create';
$route['backend/footer/prodi/create/up'] = 'backend/footer/prodi/up';
$route['backend/footer/prodi/update/(:any)'] = 'backend/footer/prodi/update/$1';
$route['backend/footer/prodi/update/down/(:any)'] = 'backend/footer/prodi/down/$1';
$route['backend/footer/prodi/delete/(:any)'] = 'backend/footer/prodi/delete/$1';

//Sub Menu Dinamis
$route['profile/(:any)'] = 'frontend/submenu/submenu/index/$1';
$route['akademik/(:any)'] = 'frontend/submenu/submenu/index/$1';
$route['kemahasiswaan/(:any)'] = 'frontend/submenu/submenu/index/$1';
$route['penelitian/(:any)'] = 'frontend/submenu/submenu/index/$1';