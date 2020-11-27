<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelKota;

class Kota extends Controller{

    public function index(){
        $kt = new ModelKota();

        $data = [
            'tampilData' => $kt->tampilData()->getResult()
        ];

        echo View('kota/index', $data);
    }

    public function add(){
        helper('form');
        echo View('kota/tambah');
    }

    public function simpandata(){
        $data = [
            'namakt' => $this->request->getpost('namakt'),
	    'jumlahpddk' => $this->request->getpost('jmlhpdddk')
        ];
        $kt = new ModelKota;

        $simpan = $kt->simpan($data);

        if ($simpan){
            return redirect()->to('/kota/index');
        }
    }

    public function hapus($id){
        $kt = new ModelKota();
        $uri = service('uri');
        $id = $uri->getSegment('3');
        $kt->hapusdata($id);

        return redirect()->to('/kota/index');
    }
    
    public function edit($id){
        helper('form');
        $kt = new ModelKota();
        $uri = service('uri');
        $id = $uri->getSegment('3');
        
        $ambildata = $kt->ambildata($id);

        if(count($ambildata->getResult())> 0){
            $row =$ambildata->getRow();
            $data = [
                'nama' => $row->namakt,
		'jumlahpddk' => $row->jumlahpddk,
            ];

            echo View('kota/edit', $data);
        }
    
    }
    function updatedata(){
        $id = $this->request->getpost('id');
        $data = [
            'nama' => $this->request->getpost('namakt'),
	     'jumlahpddk' => $this->request->getpost('jmlhpddk'),	     
        ];

        $kt = new ModelKota();

        $ubahdata = $kt->editdata($data, $id);

        if($ubahdata){
            return redirect()->to('/kota/index');
        }

    }
}

?>