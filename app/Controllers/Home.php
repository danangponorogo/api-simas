<?php

namespace App\Controllers;

use App\Models\BezzetingModel;
use App\Models\BiodataModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function getBiodata($skpd_id = '')
    {
        $biodata = new BiodataModel();
        $data = $biodata->select([
            'skpd_id',
            'nip_baru',
            'nama',
            'gelar_depan',
            'gelar_belakang'
        ]);

        $data = (empty($skpd_id)) ? $data->findAll() : $data->where('skpd_id', $skpd_id)->findAll();

        return $this->response->setJSON($data);
    }

    public function getBezzeting()
    {
        $bezzeting = new BezzetingModel();
        $data = $bezzeting->select([
            'id idsimpeg',
            'pId pidsimpeg',
            'name nama',
            'eselon_id ideselon',
            'jabatan_id idjabatan'
        ])->where('pId !=', 0)->findAll();

        return $this->response->setJSON($data);
    }
}
