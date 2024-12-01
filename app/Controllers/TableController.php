<?php
namespace App\Controllers;

use App\Models\TableModel;

class TableController extends BaseController
{
    public function showTable()
    {
        $table = new TableModel();
        $data['table'] = $table->findAll();
        return view('/admin/table/table', $data);
    }
    public function addTable()
    {
        return view('/admin/table/addtable');
    }
    public function storeTable()
    {
        $table = new TableModel();
        $data = [
            'name' => $this->request->getPost('tableName'),
            'seats' => $this->request->getPost('tableSeats'),
            'status' => $this->request->getPost('tableStatus'),
        ];
        $table->save($data);
        return redirect()->to('/admin/table/table')->with('status', 'table ajouter avec success');
    }
    public function edit($id)
    {
        $table = new TableModel();
        $data['table'] = $table->find($id); // Utilisez `find($id)` pour récupérer une seule table par son ID.
        return view('/admin/table/edittable', $data);
    }
    public function editTable($id)
    {
        $table = new TableModel();
        $data = [
            'name' => $this->request->getPost('tableName'),
            'seats' => $this->request->getPost('tableSeats'),
            'status' => $this->request->getPost('tableStatus'),
        ];
        $table->update($id, $data);
        return redirect()->to('/admin/table/table')->with('status', 'table ajouter avec success');
    }
    public function supprimer($id)
    {
        $table = new TableModel();
        $table->delete($id);
        return redirect()->to('/admin/table/table');
    }
}
