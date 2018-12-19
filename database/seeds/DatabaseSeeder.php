<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->insert(['description' => 'Internet Banking & E-Channel']);
        DB::table('categories')->insert(['description' => 'Server Farm Internal & Intranet']);
        DB::table('categories')->insert(['description' => 'H2H & WAN']);
        DB::table('categories')->insert(['description' => 'Remote Office & LAN HQ']);
        DB::table('categories')->insert(['description' => 'Network Security']);

        DB::table('slas')->insert(['description' => 'Open Port', 'lama_kerja' => 8, 'tingkat_keberhasilan' => 95]);
        DB::table('slas')->insert(['description' => 'Device Connection', 'lama_kerja' => 4, 'tingkat_keberhasilan' => 98]);
        DB::table('slas')->insert(['description' => 'Host to Host', 'lama_kerja' => 4, 'tingkat_keberhasilan' => 99.98]);
        DB::table('slas')->insert(['description' => 'Application Service Delivery', 'lama_kerja' => 4, 'tingkat_keberhasilan' => 98]);
        DB::table('slas')->insert(['description' => 'LAN Connection', 'lama_kerja' => 4, 'tingkat_keberhasilan' => 98]);
		DB::table('slas')->insert(['description' => 'Remote Access', 'lama_kerja' => 4, 'tingkat_keberhasilan' => 98]);


		DB::table('users')->insert([
			'name' => 'administrator',		
			'username' => 'admin',		
			'email' => str_random(5). '@bca.co.id',		
			'password' => bcrypt('secret'),	
		]);

		DB::table('services')->insert([
			'no_remedy' => 'CRQ000000194656',
			'project_name' => 'Open Port Config New Server UNIX',
			'requester_name' => 'Muhammad Fadhil Rezka',
			'category' => 1,
			'created_at' => '9/18/2018'
			]
		);

		DB::table('services')->insert([
			'no_remedy' => 'CRQ000000194789',
			'project_name' => 'Open Port Config New Server Wintel 2',
			'requester_name' => 'Fredy Sitorus',
			'category' => 2,
			'created_at' => '9/18/2018',
		]);

		DB::table('services')->insert([
			'no_remedy' => 'CRQ000000194657',
			'project_name' => 'Open Port Config New Server Wintel',
			'requester_name' => 'Fredy Sitorus',
			'category' => 2,
			'created_at' => '9/18/2018',
		]);

		DB::table('services')->insert([
			'no_remedy' => 'CRQ000000194658',
			'project_name' => 'Open Port Config New Server BCAF',
			'requester_name' => 'Riady C.',
			'category' => 3,
			'created_at' => '9/18/2018',
		]);

		DB::table('services')->insert([
			'no_remedy' => 'CRQ000000194659',
			'project_name' => 'Open Port Config New Server DevOps',
			'requester_name' => 'Wihandi',
			'category' => 4,
			'created_at' => '9/18/2018',
		]);

		DB::table('services')->insert([
			'no_remedy' => 'CRQ000000195191',
			'project_name' => 'Open Port Config New Server UNIX',
			'requester_name' => 'Muhammad Fadhil Rezka',
			'category' => 4,
			'created_at' => '9/18/2018',
		]);

		DB::table('aplication_service_deliveries')->insert([
			'service_id' => '2',
			'finish_date' => '09/10/18',
			'service_aplikasi' => 'load balancer',
			'lokasi' => 'menara bca',
			'pic' => 'Hikam Hidayat',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_host_to_hosts')->insert([
			'service_id' => '3',
			'finish_date' => '09/10/18',
			'pic' => 'Kevin Prabowo Tedjo',
			'nama_partner' => 'PT Duta teknologi Kreatif',
			'link_komunikasi' => 'MPLS Telkom',
			'site' => 'MBCA',
			'ip_server_partner' => '192.168.87.82',
			'ip_server_bca' => '10.20.200.255(192.168.88.105)',
			'ip_p2p_bca' => '192.168.7.1',
			'ip_p2p_partner' => '192.168.15.125',
			'port_aplikasi' => 'tcp/49301',
			'protocol' => 'TCP',
			'arah_akses' => 'BCA ke partner',
			'nama_aplikasi' => 'Akses DEV ESB',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_host_to_hosts')->insert([
			'service_id' => '2',
			'finish_date' => '09/10/18',
			'pic' => 'Kevin Prabowo Tedjo',
			'nama_partner' => 'PT Testing aja Dulu',
			'link_komunikasi' => 'MPLS Telkom',
			'site' => 'WSA2',
			'ip_server_partner' => '192.168.87.96',
			'ip_server_bca' => '10.20.200.255(192.168.88.105)',
			'ip_p2p_bca' => '192.168.7.1',
			'ip_p2p_partner' => '192.168.15.125',
			'port_aplikasi' => 'tcp/49301',
			'protocol' => 'TCP',
			'arah_akses' => 'BCA ke partner',
			'nama_aplikasi' => 'Akses DEV ESB',
			'created_at' => '9/19/2018',
		]);

		DB::table('form_open_ports')->insert([
			'service_id' => '1',
			'pic' => 'Veronica Fortunata',
			'source_ip' => '10.6.3.126',
			'destination_ip' => '10.0.51.128-135',
			'protocol' => 'tcp',
			'port' => '135',
			'arah' => '2',
			'action' => 'Open',
			'fungsi' => 'monitoring',
			'finish_date' => '09/10/18',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_open_ports')->insert([
			'service_id' => '2',
			'pic' => 'Ronny',
			'source_ip' => '10.7.5.126',
			'destination_ip' => '10.0.53.126',
			'protocol' => 'tcp',
			'port' => '1910',
			'arah' => '2',
			'action' => 'Open',
			'fungsi' => 'akses',
			'finish_date' => '09/11/18',
			'created_at' => '9/19/2018',
		]);

		DB::table('form_open_ports')->insert([
			'service_id' => '4',
			'pic' => 'Ronny',
			'source_ip' => '10.6.68.68',
			'destination_ip' => '10.6.3.54',
			'protocol' => 'tcp',
			'port' => '21165',
			'arah' => '2',
			'action' => 'Open',
			'fungsi' => 'Ops Center',
			'finish_date' => '09/19/18',
			'created_at' => '9/19/2018',
		]);

		DB::table('form_koneksi_device_ke_jaringans')->insert([
			'service_id' => '1',
			'finish_date' => '09/10/18',
			'pic' => 'Felix Angkasa',
			'nama_server' => 'kp2dgms01',
			'ip_address' => '10.6.78.126',
			'koneksi_perangkat_network' => 'WSA2-MGMT',
			'interface' => '1/45',
			'deskripsi' => 'koneksi management',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_koneksi_device_ke_jaringans')->insert([
			'service_id' => '2',
			'finish_date' => '09/10/18',
			'pic' => 'Felix Angkasa',
			'nama_server' => 'kp2dgms01',
			'ip_address' => '10.6.78.125',
			'koneksi_perangkat_network' => 'WSA2-MGMT',
			'interface' => '1/45',
			'deskripsi' => 'koneksi management',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_pendaftaran_remote_accesses')->insert([
			'service_id' => '4',
			'finish_date' => '09/10/18',
			'pic' => 'Veronica Fortunata',
			'jenis_remote_access' => 'Internal',
			'jenis_user_remote' => 'Staff GTI',
			'environment' => 'Production',
			'unit_kerja' => 'Network Security',
			'berlaku_sampai_dengan' =>'6 September 2020',
			'nama_pic' => 'Arman Nurhalim',
			'nama_server' => 'ASDM',
			'ip_address' => '10.4.0.21',
			'protocol' => 'tcp',
			'port' => '22',
			'client' => 'SSH',
			'deskripsi' => 'koneksi SSH ke server',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_pendaftaran_remote_accesses')->insert([
			'service_id' => '4',
			'finish_date' => '09/18/18',
			'pic' => 'Veronica Fortunata',
			'jenis_remote_access' => 'Internal',
			'jenis_user_remote' => 'Staff GTI',
			'environment' => 'Production',
			'unit_kerja' => 'Network Security',
			'berlaku_sampai_dengan' =>'6 September 2020',
			'nama_pic' => 'Arman Nurhalim',
			'nama_server' => 'MBank',
			'ip_address' => '10.0.50.126',
			'protocol' => 'tcp',
			'port' => '22',
			'client' => 'SSH',
			'deskripsi' => 'koneksi SSH ke server',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_load_balancers')->insert([
			'aplication_service_deliveries_id' => '1',
			'ip_server' => '10.0.50.248',
			'ip_load_balancer' => '10.0.50.230',
			'port' => 'tcp/9500',
			'url' => 'apaapabisa.com',
			'ssl' => 'tidak',
			'persistence' => 'tidak',
			'metode' => 'least connection',
			'keterangan' => 'test',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_web_application_firewalls')->insert([
			'aplication_service_deliveries_id' => '1',
			'ip_server_lb' => '10.0.50.230',
			'port' => 'tcp/9500',
			'ssl' => 'tidak',
			'source_ip' => 'any',
			'url' => 'apaapabisa.com',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_application_accelerations')->insert([
			'aplication_service_deliveries_id' => '1',
			'ip_server_lb' => '10.0.50.230',
			'port' => 'tcp/9500',
			'ssl' => 'tidak',
			'url' => 'apaapabisa.com',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_application_accelerations')->insert([
			'aplication_service_deliveries_id' => '2',
			'ip_server_lb' => '10.0.50.130',
			'port' => 'tcp/9600',
			'ssl' => 'tidak',
			'url' => 'testingajadulu',
			'created_at' => '9/18/2018',
		]);

		DB::table('form_multiple_active_data_centers')->insert([
			'aplication_service_deliveries_id' => '1',
			'lokasi' => 'internal',
			'ip_server_lb' => '10.0.50.230',
			'port' => 'tcp/9500',
			'url' => 'apaapabisa.com',
			'persistence' => 'tidak',
			'metode' => 'least connection',
			'keterangan' => 'atif di banyak tempat',
			'created_at' => '9/18/2018',
		]);

		DB::table('articles')->insert([
			'judul' => 'Network Data Center Mendapatkan Certifikasi ISO 9001',
			'isi' => 'Network Data Center BCA telah mendapatkan Certifikasi ISO 9001 pada tahun 2015',
			'image' => 'image.jpg',
			'created_at' => '9/18/2018',
		]);
			
		DB::table('form_permohonan_koneksi_lans')->insert([
			'service_id' => '4',
			'finish_date' => '09/10/18',
			'pic' => 'Yohan Prasetyo Sugianto',
			'tanggal_pemakaian' => '10 September 2018',
			'lokasi' => 'Menara BCA',
			'lantai' => '15',
			'antivirus' => 'Ya',
			'total_user_per_device' => '1',
			'koneksi_ke_switch' => 'LAN-D',
			'port_switch' => '1/30',
			'segment_ip_address' => '10.21.34.48',
			'ip_phone' => 'Cisco',
			'lama_pemakaian' => '1 bulan',
			'bypass_nas_ise' =>  'tidak',
			'created_at' => '9/18/2018',
			'mac_address' => 'AA:BB:CC:DD'	
		]);

		DB::table('form_permohonan_koneksi_lans')->insert([
			'service_id' => '4',
			'finish_date' => '09/10/18',
			'pic' => 'Yohan Prasetyo Sugianto',
			'tanggal_pemakaian' => '20 September 2018',
			'lokasi' => 'Menara BCA',
			'lantai' => '33',
			'antivirus' => 'Ya',
			'total_user_per_device' => '1',
			'koneksi_ke_switch' => 'LAN-D',
			'port_switch' => '1/33',
			'segment_ip_address' => '10.21.34.69',
			'ip_phone' => 'Cisco',
			'lama_pemakaian' => '2 bulan',
			'bypass_nas_ise' =>  'tidak',
			'created_at' => '9/18/2018',
			'mac_address' => 'AA:BB:CC:DD'
		]);
			
		// factory(App\Service::class, 50)->create();
		// factory(App\Form_Open_Port::class, 50)->create();
		// factory(App\Form_Host_to_Host::class, 50)->create();
		// factory(App\Form_Permohonan_Koneksi_Lan::class, 50)->create();
		// factory(App\Aplication_Service_Delivery::class, 50)->create();
		// factory(App\Form_Pendaftaran_Remote_Access::class, 50)->create();
		// factory(App\Form_Koneksi_Device_ke_Jaringan::class, 50)->create();
		// factory(App\Article::class, 50)->create();		
    }
}
