<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelProvinsi;

class Provinsi extends Controller{

    public function index(){
        $prov = new ModelProvinsi();

        $data = [
            'tampilData' => $prov->tampilData()->getResult()
        ];

        echo View('provinsi/index', $data);
    }

    public function add(){
        helper('form');
        echo View('provinsi/tambah');
    }

    public function simpandata(){
        $data = [
            'namaprov' => $this->request->getpost('namaprov')
        ];
        $prov = new ModelProvinsi;

        $simpan = $prov->simpan($data);

        if ($simpan){
            return redirect()->to('/provinsi/index');
        }
    }

    public function hapus($id){
        $prov = new ModelProvinsi();
        $uri = service('uri');
        $id = $uri->getSegment('3');
        $prov->hapusdata($id);

        return redirect()->to('/provinsi/index');
    }
    
    public function edit($id){
        helper('form');
        $prov = new ModelProvinsi();
        $uri = service('uri');
        $id = $uri->getSegment('3');
        
        $ambildata = $prov->ambildata($id);

        if(count($ambildata->getResult())> 0){
            $row =$ambildata->getRow();
            $data = [
                'nama' => $row->namaprov,
            ];

            echo View('provinsi/edit', $data);
        }
    
    }
    function updatedata(){
        $id = $this->request->getpost('id');
        $data = [
            'nama' => $this->request->getpost('namaprov'),
        ];

        $prov = new ModelProvinsi();

        $ubahdata = $prov->editdata($data, $id);

        if($ubahdata){
            return redirect()->to('/provinsi/index');
        }

    }
}

?>