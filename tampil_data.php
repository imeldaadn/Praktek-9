<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

    <body>
            <div class="table-responsive">
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal Pendaftaran</th>
                    <th scope="col">Jenis Pendaftaran</th>
                    <th scope="col">Tanggal Masuk Sekolah</th> 
                    <th scope="col">NIS</th>
                    <th scope="col">No Peserta Ujian</th>
                    <th scope="col">PAUD</th>
                    <th scope="col">TK</th>
                    <th scope="col">No. Seri SKHUN</th>
                    <th scope="col">No. Seri Ijazah</th>
                    <th scope="col">Hobi</th>
                    <th scope="col">Cita-cita</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Berkebutuhan Khusus</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">RT</th>
                    <th scope="col">RW</th>
                    <th scope="col">Dusun</th>
                    <th scope="col">Kelurahan/Desa</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Tempat tinggal</th>
                    <th scope="col">Transportasi</th>
                    <th scope="col">No. Hp</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Penerima KPS/PKH/KIP</th>
                    <th scope="col">No. KPS/PKH/KIP</th>
                    <th scope="col">Kewarganegaraan</th>
                    <th scope="col">Negara</th>
                    <th scope="col">Nama Ayah</th>
                    <th scope="col">Tahun Lahir</th>
                    <th scope="col">Pendidikan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Penghasilan</th>
                    <th scope="col">Berkebutuhan Khusus</th>
                    <th scope="col">Nama Ibu</th>
                    <th scope="col">Tahun Lahir</th>
                    <th scope="col">Pendidikan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Penghasilan</th>
                    <th scope="col">Berkebutuhan Khusus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'koneksi_form.php';
                        //tabel data_peserta
                        $query_siswa = "SELECT * FROM data_peserta"; 
                        $result_siswa = mysqli_query($koneksi, $query_siswa);

                        //tabel data_pribadi
                        $query_pribadi = "SELECT * FROM data_pribadi"; 
                        $result_pribadi = mysqli_query($koneksi, $query_pribadi);

                        //tabel data_ortu
                        $query_ortu = "SELECT * FROM data_ortu"; 
                        $result_ortu = mysqli_query($koneksi, $query_ortu);
                        $no = 1;

                        if ($result_siswa->num_rows>0 && $result_pribadi->num_rows>0 && $result_ortu->num_rows>0) {
                            while (($row_siswa = $result_siswa->fetch_assoc()) && ($row_pribadi = $result_pribadi->fetch_assoc()) 
                            && ($row_ortu = $result_ortu->fetch_assoc())) 
                            {
                            $jenis_pendaftaran = $row_siswa['jenis_pendaftaran']=='01'?'Siswa Baru':'Pindahan';
                            $pernah_paud       = $row_siswa['pernah_paud']=='y'?'Ya':'Tidak';
                            $pernah_tk         = $row_siswa['pernah_tk']=='y'?'Ya':'Tidak';
                            $jenis_kelamin     = $row_pribadi['jenis_kelamin']=='P'?'Perempuan':'Laki-laki';
                            $kps_pkh_kip       = $row_pribadi['kps_pkh_kip']=='y'?'Ya':'Tidak';
                            $kewarganegaraan   = $row_pribadi['kewarganegaraan']=='WNI'?'Indonesia':'Asing';
                                echo "<tr>";
                                echo "<td>".$no."</td>";
                                echo "<td>".$row_siswa['tgl_otomatis']."</td>";
                                echo "<td>".$jenis_pendaftaran."</td>";
                                echo "<td>".$row_siswa['tgl_masuk']."</td>";
                                echo "<td>".$row_siswa['nis']."</td>";
                                echo "<td>".$row_siswa['noper_ujian'] . "</td>";
                                echo "<td>".$pernah_paud."</td>";
                                echo "<td>".$pernah_tk."</td>";
                                echo "<td>".$row_siswa['seri_skhun']."</td>";
                                echo "<td>".$row_siswa['seri_ijazah']."</td>";
                                echo "<td>".$row_siswa['hobi']."</td>";
                                echo "<td>".$row_siswa['cita_cita']."</td>";
                                echo "<td>".$row_pribadi['nama_lngkp']."</td>";
                                echo "<td>".$jenis_kelamin."</td>";
                                echo "<td>".$row_pribadi['nisn']."</td>";
                                echo "<td>".$row_pribadi['nik']."</td>";
                                echo "<td>".$row_pribadi['tempat_lahir']."</td>";
                                echo "<td>".$row_pribadi['tgl_lahir']."</td>";
                                echo "<td>".$row_pribadi['agama']."</td>";
                                echo "<td>".$row_pribadi['kebutuhan_khusus_anak']."</td>";
                                echo "<td>".$row_pribadi['alamat_jalan']."</td>";
                                echo "<td>".$row_pribadi['rt']."</td>";
                                echo "<td>".$row_pribadi['rw']."</td>";
                                echo "<td>".$row_pribadi['dusun']."</td>";
                                echo "<td>".$row_pribadi['kelurahan_desa']."</td>";
                                echo "<td>".$row_pribadi['kecamatan']."</td>";
                                echo "<td>".$row_pribadi['kode_pos']."</td>";
                                echo "<td>".$row_pribadi['tempat_tinggal']."</td>";
                                echo "<td>".$row_pribadi['transportasi']."</td>";
                                echo "<td>".$row_pribadi['no_hp']."</td>";
                                echo "<td>".$row_pribadi['no_telp']."</td>";
                                echo "<td>".$row_pribadi['email']."</td>";
                                echo "<td>".$kps_pkh_kip."</td>";
                                echo "<td>".$row_pribadi['no_kps_pkh_kip']."</td>";
                                echo "<td>".$kewarganegaraan."</td>";
                                echo "<td>".$row_pribadi['nama_negara']."</td>";
                                echo "<td>".$row_ortu['nama_ayah']."</td>";
                                echo "<td>".$row_ortu['tahun_lahir_ayah']."</td>";
                                echo "<td>".$row_ortu['pendidikan_ayah']."</td>";
                                echo "<td>".$row_ortu['pekerjaan_ayah']."</td>";
                                echo "<td>".$row_ortu['penghasilan_ayah']."</td>";
                                echo "<td>".$row_ortu['kebutuhan_khusus_ayah']."</td>";
                                echo "<td>".$row_ortu['nama_ibu']."</td>";
                                echo "<td>".$row_ortu['tahun_lahir_ibu']."</td>";
                                echo "<td>".$row_ortu['pendidikan_ibu']."</td>";
                                echo "<td>".$row_ortu['pekerjaan_ibu']."</td>";
                                echo "<td>".$row_ortu['penghasilan_ibu']."</td>";
                                echo "<td>".$row_ortu['kebutuhan_khusus_ibu']."</td>";
                                echo "</tr>";
                                $no++;
                            }
                        }
                        else {
                            echo "<tr><td colspan='45'>Tidak ada data registrasi</td></tr>";
                        }
                    ?>
                </tbody>
                </table>
            </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>