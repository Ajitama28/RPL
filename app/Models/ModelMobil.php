<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMobil extends Model
{
    protected $table = 'Mobil';
    protected $allowedFields = ['idKendaraan', 'no_polisi', 'nama_kendaraan', 'type', 'tanggal_pajak'
                                , 'status', 'warna', 'harga_sewa', 'foto'];

    public function simpan($record)
    {
        $foto = $record['foto'];
        if (is_uploaded_file($foto) && !empty($foto->isValid()) && !$foto->hasMoved()) {
            $newName = $foto->getFileName();
            $foto->move('D:/Kuliah/Semester 4/RPL/UAS/', $newName); // Ganti dengan direktori upload yang sesuai

            $record['foto'] = $newName;
        } else {
            echo "<h2>Gagal Upload Foto</h2>";
        }
            
        $this->save([
            'idKendaraan' => $record['idk'],
            'no_polisi' => $record['plat'],
            'nama_kendaraan' => $record['nama'],
            'type' => $record['tipe'],
            'tanggal_pajak' => $record['tgl_pjk'],
            'status' => $record['status'],
            'warna' => $record['warna'],
            'harga_sewa' => $record['sewa'],
            'foto' => $record['foto'],
        ]);

    }
}