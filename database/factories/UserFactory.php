<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'requester_name' => $faker->name,
      	'project_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'no_remedy' => $faker->numerify('CRQ000000####'),
      	'category' => $faker->numberBetween($min = 1, $max = 5),          
    ];
});

$factory->define(App\Form_Open_Port::class, function (Faker $faker) {
    return [
    	'pic' => $faker->name,
		'service_id' => $faker->numberBetween($min = 1, $max = 55),
		'source_ip' => $faker->ipv4,
		'destination_ip' => $faker->ipv4,
		'protocol' => $faker->randomElement($array = array ('TCP', 'UDP')),
		'port' => $faker->numberBetween($min = 1, $max = 65535),
		'action' => $faker->randomElement($array = array ('TCP', 'UDP')),
		'arah' => $faker->numberBetween($min = 1, $max = 2),
		'fungsi' => $faker->sentence($nbWords = 6, $variableNbWords = true),	
    ];
});

$factory->define(App\Form_Koneksi_Device_ke_Jaringan::class, function (Faker $faker) {
    return [
    	'pic' => $faker->name,
		'service_id' => $faker->numberBetween($min = 1, $max = 55),
		'nama_server' => $faker->bothify('KP2????##'),
		'ip_address' => $faker->ipv4,
		'koneksi_perangkat_network' => $faker->bothify("WSA2-?????-##"),
		'interface' => $faker->numerify("Eth###/#/##"),
		'deskripsi' => $faker->sentence($nbWords = 6, $variableNbWords = true),	
    ];
});

$factory->define(App\Form_Host_to_Host::class, function (Faker $faker) {
    return [
    	'pic' => $faker->name,
		'service_id' => $faker->numberBetween($min = 1, $max = 55),
		'nama_partner' => $faker->company,
		'link_komunikasi' => $faker->company,
		'site' => $faker->randomElement($array = array ('MBCA', 'WSA2')),
		'ip_server_partner' => $faker->ipv4,
		'ip_server_bca' => $faker->ipv4,
		'ip_p2p_bca' => $faker->ipv4,
		'ip_p2p_partner' => $faker->ipv4,
		'port_aplikasi' => $faker->numberBetween($min = 1, $max = 65535),
		'nama_aplikasi' => $faker->bothify('PT ????## JAYA'),
		'arah_akses' => $faker->randomElement($array = array ('Inbound', 'Outbound')),
    ];
});


$factory->define(App\Form_Pendaftaran_Remote_Access::class, function (Faker $faker) {
    return [
    	'pic' => $faker->name,
		'service_id' => $faker->numberBetween($min = 1, $max = 55),
		'jenis_remote_access' => $faker->randomElement($array = array ('Internal', 'Eksternal')),
		'jenis_user_remote' => $faker->randomElement($array = array ('Staff GTI', 'Non-staff GTI')),
		'environment' => $faker->randomElement($array = array ('Production', 'Development')),
		'unit_kerja' => $faker->randomElement($array = array ('Network Security', 'Server Farm', 'Internet Banking', 'Third Party')),
		'berlaku_sampai_dengan' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'nama_pic' => $faker->name,
		'nama_server' => $faker->bothify('KP2????##'),
		'ip_address' => $faker->ipv4,
		'protocol' => $faker->randomElement($array = array ('TCP', 'UDP')),
		'port' => $faker->numberBetween($min = 1, $max = 65535),
		'client' => $faker->randomElement($array = array ('SSH', 'RDP')),
		'deskripsi' => $faker->sentence($nbWords = 6, $variableNbWords = true),			
    ];
});

$factory->define(App\Form_Permohonan_Koneksi_Lan::class, function (Faker $faker) {
    return [
    	'pic' => $faker->name,
		'service_id' => $faker->numberBetween($min = 1, $max = 55),
		'tanggal_pemakaian' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'lokasi' => $faker->randomElement($array = array ('MBCA', 'WSA2', 'WSBY')),
		'lantai' => $faker->numberBetween($min = 1, $max = 18),
		'antivirus' => $faker->numberBetween($min = 1, $max = 2),
		'total_user_per_device' => $faker->numberBetween($min = 1, $max = 200),
		'koneksi_ke_switch' => $faker->bothify("WSA2-?????-##"),
		'port_switch' => $faker->numerify("Eth###/#/##"),
		'segment_ip_address' => $faker->ipv4 . '/' .  $faker->numberBetween($min = 16, $max = 32),
		'ip_phone' => $faker->randomElement($array = array ('Cisco', 'Avaya', 'Tidak ada')),
		'lama_pemakaian' => $faker->numberBetween($min = 1, $max = 12) . " Bulan",
		'bypass_nas_ise' =>  $faker->numberBetween($min = 1, $max = 2),
    ];
});

$factory->define(App\Aplication_Service_Delivery::class, function (Faker $faker) {
    return [
    	'pic' => $faker->name,
		'service_id' => $faker->numberBetween($min = 1, $max = 55),
		'lokasi' => $faker->randomElement($array = array ('MBCA', 'WSA2', 'WSBY')),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
    	'judul' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    	'isi'=> $faker->paragraph($nbSentences = 50, $variableNbSentences = true),
    	'image' => '',
    	
    ];
});