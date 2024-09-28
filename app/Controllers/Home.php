<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_rapor;

class Home extends BaseController
{
	public function dashboard()
	{
        if (session()->get('id_level') > 0) {
		$model=new M_rapor;

        $this->log_activity('User Membuka Dashboard');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view('header',$data);
		echo view('menu', $data);
		echo view('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function login()
	{
        // if (session()->get('id_level') > 0) {
		$model=new M_rapor;
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		$this->log_activity('User ke Halaman Login');

		echo view('header', $data);
		echo view('login', $data);
		// echo view('footer');
    // } else {
    //     return redirect()->to('home/login');
    // }
	}

	public function aksilogin()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password');
        $captchaAnswer = $this->request->getPost('captcha_answer');

		$this->log_activity('User melakukan Login');

        $model = new M_rapor();
        $where = array(
            'username' => $u,
            'password' => md5($p)
        );

        $cek = $model->getWhere('tb_user', $where);

        // Offline CAPTCHA answer (should match the one generated in the view)
        if (!$this->isOnline() && !empty($captchaAnswer)) {
            $correctAnswer = $this->request->getPost('correct_captcha_answer');
            if ($captchaAnswer != $correctAnswer) {
                return redirect()->to('Home/login')->with('error', 'Incorrect offline CAPTCHA.');
            }
        }

        if ($cek > 0) {
            // Handle sessions as usual
            session()->set('id_user', $cek->id_user);
            session()->set('id_level', $cek->id_level);
            session()->set('email', $cek->email);
            session()->set('username', $cek->username);

            // Redirect to the dashboard
            return redirect()->to('Home/dashboard');
        } else {
            return redirect()->to('Home/login');
        }
    }

    // Function to check if the client is online
    private function isOnline()
    {
        // A simple method to check if the client is online (can be more sophisticated)
        return @fopen("http://www.google.com:80/", "r");
    }


	public function logout()
	{
		$this->log_activity('User Melakukan Log Out');
		session()->destroy();
		return redirect()->to('Home/login');
	}

    public function setting()
	{
		if(session()->get('id_level') == '1'){
		$model = new M_rapor;

        $this->log_activity('User Membuka Menu Setting');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view('header',$data);
		echo view('menu',$data);
		echo view('setting', $data);
		echo view('footer');
		// print_r($data);
	}else{
		return redirect()->to('home/error404');
	}
	}

    public function aksi_e_setting()
{
    $model = new M_rapor();

    $this->log_activity('User Melakukan Edit Setting');

    $a = $this->request->getPost('nama_web');
    $icon = $this->request->getFile('logo_tab');
    $dash = $this->request->getFile('logo_dashboard');
    $login = $this->request->getFile('logo_login');

	// $this->log_activity('User melakukan Setting');

    // Debugging: Log received data
    log_message('debug', 'Website Name: ' . $a);
    log_message('debug', 'Tab Icon: ' . ($icon ? $icon->getName() : 'None'));
    log_message('debug', 'Dashboard Icon: ' . ($dash ? $dash->getName() : 'None'));
    log_message('debug', 'Login Icon: ' . ($login ? $login->getName() : 'None'));

    $data = ['nama_web' => $a];

    if ($icon && $icon->isValid() && !$icon->hasMoved()) {
        $icon->move(ROOTPATH . 'public/img/avatar/', $icon->getName());
        $data['logo_tab'] = $icon->getName();
    }

    if ($dash && $dash->isValid() && !$dash->hasMoved()) {
        $dash->move(ROOTPATH . 'public/img/avatar/', $dash->getName());
        $data['logo_dashboard'] = $dash->getName();
    }

    if ($login && $login->isValid() && !$login->hasMoved()) {
        $login->move(ROOTPATH . 'public/img/avatar/', $login->getName());
        $data['logo_login'] = $login->getName();
    }

    $where = ['id_setting' => 1];
    $model->edit('tb_setting', $data, $where);

    return redirect()->to('home/setting');
}

    public function tahun_ajaran()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Tahun Ajaran');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->tampil('tb_tahun_ajaran');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('tahun_ajaran',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function aksi_t_tahun_ajaran()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Tahun Ajaran');

		$a = $this->request->getPost('tahun_ajaran');
		
		$isi = array(

					'tahun_ajaran' => $a
					
		);
		
		$model->tambah('tb_tahun_ajaran', $isi);
		return redirect()->to('Home/tahun_ajaran');

	}

	public function aksi_e_tahun_ajaran()
    {
        $model = new M_rapor();

        // Log the activity
        $this->log_activity('User Melakukan Edit Tahun Ajaran');
        
        // Retrieve form data
        $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');
        $a = $this->request->getPost('tahun_ajaran');

        // Data array for updating the record
        $data = [
            'tahun_ajaran' => $a
        ];

        // Update the record in the 'tb_tahun_ajaran' table where 'id_tahun_ajaran' matches
        $model->edit('tb_tahun_ajaran', $data, ['id_tahun_ajaran' => $id_tahun_ajaran]);

        // Redirect with a success message
        return redirect()->to('Home/tahun_ajaran')->with('success', 'Data Tahun Ajaran berhasil diperbarui.');
    }

    public function semester()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Semester');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->tampil('tb_semester');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('semester',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function aksi_t_semester()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Semester');

		$a = $this->request->getPost('semester');
		
		$isi = array(

					'nama_semester' => $a
					
		);
		
		$model->tambah('tb_semester', $isi);
		return redirect()->to('Home/semester');

	}

	public function aksi_e_semester()
	{
    $model = new M_rapor(); // Load your model

    $this->log_activity('User Melakukan Edit Semster');

    // Retrieve form data
    $id_semester = $this->request->getPost('id_semester');
    $semester = $this->request->getPost('semester');

    // Data array for updating the record
    $data = [
        'nama_semester' => $semester
    ];

    // Update the record in the 'tb_semester' table where 'id_semester' matches
    $model->edit('tb_semester', $data, ['id_semester' => $id_semester]);

    // Redirect with a success message
    return redirect()->to('Home/semester')->with('success', 'Data Semester berhasil diperbarui.');
	}

    public function blok()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Blok');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
        $data['erwin'] = $model->join('tb_blok',
		'tb_tahun_ajaran',
		'tb_blok.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran');

		$data['t'] = $model->tampil('tb_tahun_ajaran');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('blok',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function aksi_t_blok()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Blok');

		$a = $this->request->getPost('blok');
        // $b = $this->request->getPost('tahun_ajaran');
		
		$isi = array(

					'nama_blok' => $a,
                    // 'id_tahun_ajaran' => $b
					
		);
		
		$model->tambah('tb_blok', $isi);
		return redirect()->to('Home/blok');

	}

	public function aksi_e_blok()
	{
    $model = new M_rapor(); // Load your model

    $this->log_activity('User Melakukan Edit Blok');

    // Retrieve form data
    $id_blok = $this->request->getPost('id_blok');
    $blok = $this->request->getPost('blok');
	// $tahun_ajaran = $this->request->getPost('tahun_ajaran');

    // Data array for updating the record
    $data = [
        'nama_blok' => $blok,
		// 'id_tahun_ajaran' => $tahun_ajaran
    ];

    // Update the record in the 'tb_semester' table where 'id_semester' matches
    $model->edit('tb_blok', $data, ['id_blok' => $id_blok]);

    // Redirect with a success message
    return redirect()->to('Home/blok')->with('success', 'Data Semester berhasil diperbarui.');
	}

    public function jurusan()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Jurusan');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->tampil('tb_jurusan');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('jurusan',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function aksi_t_jurusan()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Jurusan');

		$a = $this->request->getPost('jurusan');
		
		$isi = array(

					'nama_jurusan' => $a
					
		);
		
		$model->tambah('tb_jurusan', $isi);
		return redirect()->to('Home/jurusan');

	}

	public function aksi_e_jurusan()
	{
    $model = new M_rapor(); // Load your model

    $this->log_activity('User Melakukan Edit Jurusan');

    // Retrieve form data
    $id_jurusan = $this->request->getPost('id_jurusan');
    $jurusan = $this->request->getPost('jurusan');
	

    // Data array for updating the record
    $data = [
        'nama_jurusan' => $jurusan
    ];

    // Update the record in the 'tb_semester' table where 'id_semester' matches
    $model->edit('tb_jurusan', $data, ['id_jurusan' => $id_jurusan]);

    // Redirect with a success message
    return redirect()->to('Home/jurusan')->with('success', 'Data Semester berhasil diperbarui.');
	}

    public function kelas()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Kelas');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->tampil('tb_kelas');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('kelas',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function aksi_t_kelas()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Kelas');

		$a = $this->request->getPost('kelas');
		
		$isi = array(

					'nama_kelas' => $a
					
		);
		
		$model->tambah('tb_kelas', $isi);
		return redirect()->to('Home/kelas');

	}

    public function aksi_e_kelas()
{
    $model = new M_rapor();

    // Logging activity edit kelas
    $this->log_activity('User Melakukan Edit Kelas');
    
    // Mengambil data dari form
    $id_kelas = $this->request->getPost('id_kelas');
    $nama_kelas = $this->request->getPost('kelas');

    // Data untuk diupdate
    $data = [
        'nama_kelas' => $nama_kelas
    ];

    // Memanggil fungsi edit di model
    $model->edit('tb_kelas', $data, ['id_kelas' => $id_kelas]);

    // Redirect setelah berhasil update
    return redirect()->to('Home/kelas')->with('success', 'Data kelas berhasil diperbarui.');
}

    public function rombel()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Rombek');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->joinThreeTables('tb_rombel','tb_kelas','tb_jurusan',
        'tb_rombel.id_kelas = tb_kelas.id_kelas',
        'tb_rombel.id_jurusan = tb_jurusan.id_jurusan');

		$data['k'] = $model->tampil('tb_kelas');
        $data['j'] = $model->tampil('tb_jurusan');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('rombel',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

//     public function t_rombel()
// 	{
//         // if (session()->get('id_level') > 0) {
// 		$model = new M_rapor;

//         // $this->log_activity('User Membuka Form Tambah Kelas');

//         // $where = array('id_user' => session()->get('id_user'));
//         // $data['user'] = $model->getWhere('tb_user', $where);

//         $where = array('id_setting' => 1);
// 		$data['setting'] = $model->getWhere('tb_setting',$where);

// 		$where=array('id_user'=>session()->get('id'));
// 		$data['erwin'] = $model->joinThreeTables('tb_rombel','tb_kelas','tb_jurusan',
//         'tb_rombel.id_kelas = tb_kelas.id_kelas',
//         'tb_rombel.id_jurusan = tb_jurusan.id_jurusan');

//         $data['k'] = $model->tampil('tb_kelas');
//         $data['j'] = $model->tampil('tb_jurusan');

// 		echo view ('header', $data);
// 		echo view ('menu', $data);
// 		echo view ('t_rombel',$data);
// 		echo view ('footer');

//     // } else {
//     //     return redirect()->to('home/login');
//     // }
// }

	public function aksi_t_rombel()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Rombel');

		$a = $this->request->getPost('rombel');
        $b = $this->request->getPost('kelas');
        $c = $this->request->getPost('jurusan');
		
		$isi = array(

					'nama_rombel' => $a,
                    'id_kelas' => $b,
                    'id_jurusan' => $c
					
		);
		
		$model->tambah('tb_rombel', $isi);
		return redirect()->to('Home/rombel');

	}

    public function aksi_e_rombel()
{
    $model = new M_rapor();

    // Log aktivitas
    $this->log_activity('User Melakukan Edit Rombel');
    
    // Ambil data dari form
    $id_rombel = $this->request->getPost('id_rombel');
    $nama_rombel = $this->request->getPost('rombel');
    $kelas = $this->request->getPost('kelas');
    $jurusan = $this->request->getPost('jurusan');

    // Data yang akan di-update
    $data = [
        'nama_rombel' => $nama_rombel,
        'id_kelas' => $kelas,
        'id_jurusan' => $jurusan
    ];

    // Update data di tabel 'tb_rombel'
    $model->edit('tb_rombel', $data, ['id_rombel' => $id_rombel]);

    return redirect()->to(base_url('home/rombel'))->with('success', 'Data berhasil diupdate');
}

    public function mapel()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Mapel');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->tampil('tb_mapel');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('mapel',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

	public function aksi_t_mapel()
	{
		$model = new M_rapor();

        $this->log_activity('User Melakukan Tambah Mapel');

		$a = $this->request->getPost('mapel');
        $b = $this->request->getPost('kkm');
		
		$isi = array(

					'nama_mapel' => $a,
                    'kkm' => $b
					
		);
		
		$model->tambah('tb_mapel', $isi);
		return redirect()->to('Home/mapel');

	}

    public function aksi_e_mapel()
{
    $model = new M_rapor();

    // Log aktivitas edit
    $this->log_activity('User Melakukan Edit Mapel');
    
    $id_mapel = $this->request->getPost('id_mapel');
    $mapel = $this->request->getPost('mapel');
    $kkm = $this->request->getPost('kkm');

    $data = [
        'nama_mapel' => $mapel,
        'kkm' => $kkm
    ];

    // Panggil fungsi edit di model, sesuai dengan contoh edit 3 argumen
    $model->edit('tb_mapel', $data, ['id_mapel' => $id_mapel]);

    return redirect()->to('home/mapel')->with('success', 'Data Mapel berhasil diperbarui.');
}

    public function jadwal()
{
    if (session()->get('id_level') > 0) {
    $model = new M_rapor;

    $this->log_activity('User Membuka Menu Jadwal');

    $where = array('id_user' => session()->get('id_user'));
    $data['user'] = $model->getWhere('tb_user', $where);

    $where = array('id_setting' => 1);
    $data['setting'] = $model->getWhere('tb_setting',$where);

    $where=array('id_user'=>session()->get('id'));
    $data['r'] = $model->tampil('tb_rombel');
    $data['b'] = $model->tampil('tb_blok');
    $data['t'] = $model->tampil('tb_tahun_ajaran');
    $data['guru'] = $model->tampil('tb_guru');
    $data['mapel'] = $model->tampil('tb_mapel');

    echo view ('header', $data);
    echo view ('menu', $data);
    echo view ('jadwal',$data);
    echo view ('footer');

} else {
    return redirect()->to('home/login');
}
    
}

public function hapus_jadwal()
{
    // Mendapatkan data yang dikirim melalui POST
    $id_rombel = $this->request->getPost('rombel');
    $id_blok = $this->request->getPost('blok');
    $id_tahun_ajaran = $this->request->getPost('tahun_ajaran');

    // Pastikan semua parameter diterima
    if ($id_rombel && $id_blok && $id_tahun_ajaran) {
        // Memanggil model untuk menghapus jadwal
        $model = new M_rapor(); // ganti dengan model yang digunakan
        $result = $model->hapus_jadwal($id_rombel, $id_blok, $id_tahun_ajaran);

        // Mengembalikan respons dalam format JSON berdasarkan hasil penghapusan
        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Jadwal berhasil dihapus']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menghapus jadwal']);
        }
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Parameter tidak lengkap']);
    }
}

    public function update_jadwal()
    {
        $model = new M_rapor();

        $sesi = $this->request->getPost('sesi');
        $id_guru = $this->request->getPost('nama_guru');
        $id_mapel = $this->request->getPost('nama_mapel');

        $result = $model->update_jadwal($sesi, $id_guru, $id_mapel);

        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }


    public function get_jadwal()
    {
        $model = new M_rapor();

        // Mengambil data dari POST request
        $rombel = $this->request->getPost('rombel');
        $blok = $this->request->getPost('blok');
        $tahun_ajaran = $this->request->getPost('tahun_ajaran');

        // Memanggil fungsi get_jadwal dari model
        $jadwal = $model->get_jadwal($rombel, $blok, $tahun_ajaran);

        // Mengirim data dalam format JSON sebagai respons AJAX
        return $this->response->setJSON($jadwal);
    }

    public function t_jadwal()
	{
        if (session()->get('id_level') > 0) {
		$model=new M_rapor;

        $this->log_activity('User Membuka Tambah Jadwal');

		$where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

        $data['erwin'] = $model->joinSixTables('tb_jadwal','tb_blok','tb_rombel','tb_tahun_ajaran','tb_guru','tb_mapel',
        'tb_jadwal.id_blok = tb_blok.id_blok',
        'tb_jadwal.id_rombel = tb_rombel.id_rombel',
        'tb_jadwal.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran',
        'tb_jadwal.id_guru = tb_guru.id_guru',
        'tb_jadwal.id_mapel = tb_mapel.id_mapel',);

        $data['b'] = $model->tampil('tb_blok');
        $data['r'] = $model->tampil('tb_rombel');
        $data['t'] = $model->tampil('tb_tahun_ajaran');
        $data['g'] = $model->tampil('tb_guru');
        $data['m'] = $model->tampil('tb_mapel');

		echo view('header',$data);
		echo view('menu', $data);
        echo view('t_jadwal',$data);
		echo view('footer');
		// echo view('header');
    } else {
        return redirect()->to('home/login');
    }
	}

    public function aksi_t_jadwal()
{
    $model = new M_rapor();

    // Log activity if needed
    $this->log_activity('User Melakukan Tambah Jadwal');

    // Get form data
    $blok = $this->request->getPost('blok');
    $rombel = $this->request->getPost('rombel');
    $tahunAjaran = $this->request->getPost('tahun_ajaran');

    // Insert schedule data for each session
    for ($i = 1; $i <= 5; $i++) {
        $guru = $this->request->getPost('guru' . $i);
        $mapel = $this->request->getPost('mapel' . $i);

        // Prepare data for each session
        $isi = [
            'id_blok' => $blok,
            'id_rombel' => $rombel,
            'id_tahun_ajaran' => $tahunAjaran,
            'id_guru' => $guru,
            'id_mapel' => $mapel,
            'sesi' => 'SESI ' . $i, // Set the session name based on the loop index
        ];

        // Insert into tb_jadwal
        $model->tambah('tb_jadwal', $isi);
    }

    return redirect()->to('Home/jadwal');
}

public function edit_jadwal() {
    $model = new M_rapor();  // Assuming this is the model for tb_jadwal

    $this->log_activity('User Melakukan Edit Jadwal');

    // Retrieve POST data
    $id_jadwal = $this->request->getPost('id_jadwal');
    $id_guru = $this->request->getPost('nama_guru');
    $id_mapel = $this->request->getPost('nama_mapel');

    // Prepare update data
    $data = [
        'id_guru' => $id_guru,
        'id_mapel' => $id_mapel
    ];

    // Define where condition
    // Update the jadwal
    $model->edit('tb_jadwal', $data, ['id_jadwal' => $id_jadwal]);
    return redirect()->to('Home/jadwal')->with('success', 'Data Tahun Ajaran berhasil diperbarui.');
}

public function guru()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Guru');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->tampil('tb_guru');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('guru',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

    public function aksi_t_guru()
{
    $model = new M_rapor();

    // Logging activity for adding a teacher
    $this->log_activity('User Melakukan Tambah Guru');

    // Get data from the form
    $nik = $this->request->getPost('nik');
    $nama_guru = $this->request->getPost('nama_guru');
    $jk = $this->request->getPost('jk');

    // Data to be inserted
    $data = [
        'nik' => $nik,
        'nama_guru' => $nama_guru,
        'jk' => $jk
    ];

    // Call the function to add the data in the model
    $model->tambah('tb_guru', $data);

    // Redirect after successfully adding the teacher
    return redirect()->to('Home/guru')->with('success', 'Data guru berhasil ditambahkan.');
}

public function aksi_e_guru()
{
    $model = new M_rapor();

    // Logging activity for editing a teacher
    $this->log_activity('User Melakukan Edit Guru');
    
    // Get data from the form
    $id_guru = $this->request->getPost('id_guru');
    $nik = $this->request->getPost('nik');
    $nama_guru = $this->request->getPost('nama_guru');
    $jk = $this->request->getPost('jk');

    // Data to be updated
    $data = [
        'nik' => $nik,
        'nama_guru' => $nama_guru,
        'jk' => $jk
    ];

    // Call the function to edit the data in the model
    $model->edit('tb_guru', $data, ['id_guru' => $id_guru]);

    // Redirect after successfully updating the teacher
    return redirect()->to('Home/guru')->with('success', 'Data guru berhasil diperbarui.');
}

public function siswa()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_rapor;
        
        $this->log_activity('User Membuka Menu Siswa');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

		$where=array('id_user'=>session()->get('id'));
		$data['erwin'] = $model->join('tb_siswa','tb_rombel',
        'tb_siswa.id_rombel = tb_rombel.id_rombel');

		$data['rombel'] = $model->tampil('tb_rombel');

        $where = array('id_setting' => 1);
		$data['setting'] = $model->getWhere('tb_setting',$where);



		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('siswa',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

    public function aksi_t_siswa()
{
    $model = new M_rapor();

    // Logging activity for adding a student
    $this->log_activity('User Melakukan Tambah Siswa');

    // Get data from the form
    $nis = $this->request->getPost('nis');
    $nama_siswa = $this->request->getPost('nama_siswa');
    $tgl_lahir = $this->request->getPost('tgl_lahir');
    $rombel = $this->request->getPost('rombel');

    // Data to be inserted
    $data = [
        'nis' => $nis,
        'nama_siswa' => $nama_siswa,
        'tgl_lahir' => $tgl_lahir,
        'id_rombel' => $rombel
    ];

    // Call the function to add the data in the model
    $model->tambah('tb_siswa', $data);

    // Redirect after successfully adding the student
    return redirect()->to('Home/siswa')->with('success', 'Data siswa berhasil ditambahkan.');
}

public function aksi_e_siswa()
{
    $model = new M_rapor();

    // Logging activity for editing a student
    $this->log_activity('User Melakukan Edit Siswa');
    
    // Get data from the form
    $id_siswa = $this->request->getPost('id_siswa');
    $nis = $this->request->getPost('nis');
    $nama_siswa = $this->request->getPost('nama_siswa');
    $tgl_lahir = $this->request->getPost('tgl_lahir');
    $rombel = $this->request->getPost('rombel');

    // Data to be updated
    $data = [
        'nis' => $nis,
        'nama_siswa' => $nama_siswa,
        'tgl_lahir' => $tgl_lahir,
        'id_rombel' => $rombel
    ];

    // Call the function to edit the data in the model
    $model->edit('tb_siswa', $data, ['id_siswa' => $id_siswa]);

    // Redirect after successfully updating the student
    return redirect()->to('Home/siswa')->with('success', 'Data siswa berhasil diperbarui.');
}


    public function profile()
    {
        if (session()->get('id_level') > 0) {
            $model = new M_rapor();

            $this->log_activity('User Membuka Menu Profile');

            $where = array('id_user' => session()->get('id_user'));
            $data['user'] = $model->getWhere('tb_user', $where);
            
            $where = array('id_user' => session()->get('id_user'));
            $data['darren'] = $model->getwhere('tb_user', $where);

            $where = array('id_setting' => 1);
		    $data['setting'] = $model->getWhere('tb_setting',$where);

            echo view('header', $data);
            echo view('menu', $data);
            echo view('profile',$data);
            echo view('footer');
        } else {
            return redirect()->to('home/login');
        }
    }

    public function editfoto()
{
    $model = new M_rapor(); // Make sure this model handles updates to tb_user
    
    $this->log_activity('User Mengedit Foto Profile');
    
    // Get current user data
    $userId = session()->get('id_user'); // Correct the session key
    $userData = $model->getById($userId); // Ensure this retrieves the correct user data

    // Check if a file was uploaded
    if ($file = $this->request->getFile('foto')) {
        if ($file->isValid() && !$file->hasMoved()) {
            $newFileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/img/avatar/', $newFileName); // Save file to the file system
            
            // If the user already has a profile photo, delete the old one
            if ($userData->foto && file_exists(ROOTPATH . 'public/img/avatar/' . $userData->foto)) {
                unlink(ROOTPATH . 'public/img/avatar/' . $userData->foto);
            }
            
            // Update the database with the new file name
            $userDataUpdate = ['foto' => $newFileName];
            $model->edit('tb_user', $userDataUpdate, ['id_user' => $userId]);
        }
    }

    return redirect()->to('home/profile');
}

    public function aksi_e_profile()
    {
        if (session()->get('id_level') > 0) {
            $model = new M_rapor();

            $this->log_activity('User Melakukan Edit Profile');

            $yoga = $this->request->getPost('username');
            $yoga1 = $this->request->getPost('email');
            $id = session()->get('id_user');

            $where = array('id_user' => $id); // Jika id_user adalah kunci utama untuk menentukan record


            $isi = array(
                'username' => $yoga,
                'email' => $yoga1
            );

            $model->edit('tb_user', $isi, $where);
            return redirect()->to('home/profile');
            
        } else {
            return redirect()->to('home/login');
        }
    }

    public function resetpassword($id)
{
    $model = new M_rapor;

    $this->log_activity('User Melakukan Reset Password ke Default');

    $table = 'tb_user';
    $kolom = 'id_user';
    
    // Update the password directly without confirmation
    $data = array(
        'password' => md5('1'), // Note: Using md5, but it's better to use password_hash for security.
    );

    // Update the password in the database
    $model->resetpassword($table, $kolom, $id, $data);
    
    // Redirect back to the user list with a success message
    return redirect()->to('Home/user')->with('success', 'Password reset to default (1) successfully.');
}


    public function aksi_changepass()
    {
        $model = new M_rapor();

        $this->log_activity('User Mengganti Password Lama ke Baru');

        $oldPassword = $this->request->getPost('old');
        $newPassword = $this->request->getPost('new');
        $userId = session()->get('id_level');

        // Dapatkan password lama dari database
        $currentPassword = $model->getPassword($userId);

        // Verifikasi apakah password lama cocok
        if (md5($oldPassword) !== $currentPassword) {
            // Set pesan error jika password lama salah
            session()->setFlashdata('error', 'Password lama tidak valid.');
            return redirect()->back()->withInput();
        }

        // Update password baru
        $data = [
            'password' => md5($newPassword),
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s')
        ];
        $where = ['id_user' => $userId];

        $model->edit('tb_user', $data, $where);

        // Set pesan sukses
        session()->setFlashdata('success', 'Password berhasil diperbarui.');
        return redirect()->to('home/profile');
    }


    public function penilaian()
{
    $model = new M_rapor;

    $this->log_activity('User Membuka Penilaian');

    $userId = session()->get('id_user'); // Correct the session key
    // Debug: Check if id_user is available

    $where = array('id_user' => session()->get('id_user'));
    $data['user'] = $model->getWhere('tb_user', $where);

    $where = array('id_setting' => 1);
	$data['setting'] = $model->getWhere('tb_setting',$where);

    $where = array('id_user' => $userId);
    
    // Get the user-specific penilaian data with joins
    $data['yoga'] = $model->getPenilaianWithJoins($where);
    $data['tahun_ajaran'] = $model->tampil('tb_tahun_ajaran');
    $data['semester'] = $model->tampil('tb_semester');
    $data['blok'] = $model->tampil('tb_blok');
    $data['siswa'] = $model->tampil('tb_siswa');
    $data['mapel'] = $model->tampil('tb_mapel');
    
    // Load the views with the resulting data
    echo view('header',$data);
    echo view('menu',$data);
    echo view('penilaian', $data);
    echo view('footer');
}


    public function tambah_penilaian()
	{
        $model = new M_rapor;

        $this->log_activity('User Membuka Tambah Penilaian');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

        $where = array('id_setting' => 1);
	    $data['setting'] = $model->getWhere('tb_setting',$where);        

		$data['tahun_ajaran'] = $model->tampil('tb_tahun_ajaran');
        $data['semester'] = $model->tampil('tb_semester');
        $data['blok'] = $model->tampil('tb_blok');
        $data['siswa'] = $model->tampil_siswa();
        $data['mapel'] = $model->tampil('tb_mapel');
       

		echo view('header',$data);
		echo view('menu',$data);
		echo view('t_penilaian', $data);
		echo view('footer');
	}

    public function aksi_t_penilaian()
{
    // Get input values from the form
    $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');
    $id_semester = $this->request->getPost('id_semester');
    $id_blok = $this->request->getPost('id_blok');
    $id_siswa = $this->request->getPost('id_siswa');
    $id_mapel = $this->request->getPost('id_mapel');
    $nilai_tugas = $this->request->getPost('nilaitugas');
    $nilai_midblok = $this->request->getPost('nilaimid');
    $nilai_finalblok = $this->request->getPost('nilaifinal');

    // Get the logged-in user ID from the session
    $id_user = session()->get('id_user'); // Assuming 'id' is stored in session
    
    // Calculate total nilai (average)
    $total_nilai = ($nilai_tugas + $nilai_midblok + $nilai_finalblok) / 3;

    // Determine predikat based on total nilai
    if ($total_nilai > 92) {
        $predikat = 'A';
    } elseif ($total_nilai > 83) {
        $predikat = 'B';
    } elseif ($total_nilai >= 75) {
        $predikat = 'C';
    } else {
        $predikat = 'D';
    }

    // Prepare data for insertion
    $data = [
        'id_tahun_ajaran' => $id_tahun_ajaran,
        'id_semester' => $id_semester,
        'id_blok' => $id_blok,
        'id_siswa' => $id_siswa,
        'id_mapel' => $id_mapel,
        'nilai_tugas' => $nilai_tugas,
        'nilai_midblok' => $nilai_midblok,
        'nilai_finalblok' => $nilai_finalblok,
        'total_nilai' => $total_nilai, // Include total nilai
        'predikat' => $predikat,       // Include predikat
        'id_user' => $id_user          // Add id_user from session
    ];

    // Insert the data using the model
    $model = new M_rapor();
    $inserted = $model->tambah('tb_penilaian', $data);

    // Check if insertion was successful and redirect
    if ($inserted) {
        return redirect()->to('home/penilaian')->with('success', 'Data penilaian berhasil ditambahkan');
    } else {
        return redirect()->to('home/penilaian')->with('error', 'Gagal menambahkan data penilaian');
    }
}

public function aksi_e_penilaian()
{
    $model = new M_rapor();
    
    // Retrieve POST data from the form
    $id_penilaian = $this->request->getPost('id_penilaian'); // Ensure this matches the form input name
    $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');
    $id_semester = $this->request->getPost('id_semester');
    $id_blok = $this->request->getPost('id_blok'); // Retrieve id_blok from the form input
    $id_siswa = $this->request->getPost('id_siswa');
    $id_mapel = $this->request->getPost('id_mapel');
    $nilai_tugas = $this->request->getPost('nilai_tugas');
    $nilai_midblok = $this->request->getPost('nilai_midblok');
    $nilai_finalblok = $this->request->getPost('nilai_finalblok');

    // Calculate total score
    $total_nilai = ($nilai_tugas + $nilai_midblok + $nilai_finalblok) / 3;

    // Determine predikat based on total nilai
    if ($total_nilai > 92) {
        $predikat = 'A';
    } elseif ($total_nilai > 83) {
        $predikat = 'B';
    } elseif ($total_nilai >= 75) {
        $predikat = 'C';
    } else {
        $predikat = 'D';
    }

    // Prepare the data for updating
    $data = array(
        'id_tahun_ajaran' => $id_tahun_ajaran,
        'id_semester' => $id_semester,
        'id_blok' => $id_blok,  // Add id_blok to the data
        'id_siswa' => $id_siswa,
        'id_mapel' => $id_mapel,
        'nilai_tugas' => $nilai_tugas,
        'nilai_midblok' => $nilai_midblok,
        'nilai_finalblok' => $nilai_finalblok,
        'total_nilai' => $total_nilai,
        'predikat' => $predikat  // Add predikat to the data
    );

    // Define the condition for the update
    $where = array('id_penilaian' => $id_penilaian);

    // Perform the update
    $model->edit('tb_penilaian', $data, $where);

    // Redirect after the update
    return redirect()->to('home/penilaian')->with('success', 'Data penilaian berhasil diupdate');
}

public function hapus_penilaian($id)
{
    $model = new M_rapor();
    $this->log_activity('User Menghapus Penilaian');
    $where = array('id_penilaian' => $id);
    $model->hapus('tb_penilaian', $where);

    return redirect()->to('Home/penilaian');
}public function raport()
{
    $model = new M_rapor;

    $this->log_activity('User Membuka Raport');
    
    $where = array('id_user' => session()->get('id_user'));
    $data['user'] = $model->getWhere('tb_user', $where);

    $where = array('id_setting' => 1);
	$data['setting'] = $model->getWhere('tb_setting',$where);
   
    // Get the user-specific penilaian data with joins
    $data['siswa'] = $model->tampil_siswa();
    $data['tahun_ajaran'] = $model->tampil('tb_tahun_ajaran');
    $data['semester'] = $model->tampil('tb_semester');
    $data['blok'] = $model->tampil('tb_blok');
    
    // Load the views with the resulting data
    echo view('header',$data);
    echo view('menu',$data);
    echo view('raport', $data);
    echo view('footer');
}

public function aksi_laporan_pdf()
{

        // Check if the user has permission for 'laporan'
            $pdf = new \TCPDF();
            $model = new M_rapor();

            // Get input values from the request
            $id_siswa = $this->request->getGet('id_siswa');
            $id_tahun_ajaran = $this->request->getGet('id_tahun_ajaran');
            $id_semester = $this->request->getGet('id_semester');
            $id_blok = $this->request->getGet('id_blok');

            // Retrieve the necessary data with joins
            $data['tb_penilaian'] = $model->getPenilaianData($id_siswa, $id_tahun_ajaran, $id_semester, $id_blok);

            // Set up PDF metadata
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle('Raport Siswa');
            $pdf->SetSubject('Raport');
            $pdf->SetKeywords('Raport, PDF');
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // Set margins and add a page
            $pdf->SetMargins(5, 5, 5); // Left, Top, Right
            $pdf->AddPage();

            // Set font and content
            $pdf->SetFont('helvetica', '', 10); // Font size 10px
            $html = view('print_raport', $data); // Replace with your view

            // Output the HTML content in PDF
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output PDF
            $pdf->Output('raport.pdf', 'I');
            exit();
       
    }

    private function log_activity($activity)
    {
		$model = new M_rapor();
        $data = [
            'id_user'    => session()->get('id_user'),
            'activity'   => $activity,
			'timestamp' => date('Y-m-d H:i:s'),
			'delete_at' => '0'
        ];

        $model->tambah('tb_activity', $data);
	}

    public function activity()
    {
        if (session()->get('id_level')>0) {
            $model = new M_rapor();
            
            $where = array('id_user'=>session()->get('id_user'));
            $data['user'] = $model->getWhere('tb_user', $where);
            
            $where = array('id_setting' => 1);
            $data['setting'] = $model->getWhere('tb_setting',$where);
            
            $this->log_activity('User membuka Log Activity');
            
            $data['erwin'] = $model->join('tb_activity', 'tb_user',
            'tb_activity.id_user = tb_user.id_user',$where);

        echo view('header' ,$data);
		echo view('menu',$data);
		echo view('activity',$data);
		echo view('footer');
	
		}else{
			return redirect()->to('home/login');
		}
        }

}
