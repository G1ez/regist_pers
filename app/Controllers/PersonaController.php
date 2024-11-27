<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class PersonaController extends BaseController
{
    protected $personaModel;

    public function __construct()
    {
        $this->personaModel = new PersonaModel();
    }

    // Mostrar lista de personas
    public function index()
    {
        $data['personas'] = $this->personaModel->findAll();
        return view('personas/index', $data);
    }

    // Mostrar formulario para crear nueva persona
    public function create()
    {
        return view('personas/create');
    }

    // Guardar nueva persona
    public function store()
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'telefono' => 'required|min_length[10]|max_length[15]',
        ];

        if (!$this->validate($rules)) {
            return view('personas/create', [
                'validation' => $this->validator,
            ]);
        }

        $this->personaModel->save([
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
        ]);

        session()->setFlashdata('success', 'Persona agregada correctamente');
        return redirect()->to('/personas');
    }

    // Mostrar formulario para editar una persona
    public function edit($id)
    {
        $data['persona'] = $this->personaModel->find($id);

        if (!$data['persona']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Persona con ID $id no encontrada");
        }

        return view('personas/edit', $data);
    }

    // Actualizar una persona
    public function update($id)
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'telefono' => 'required|min_length[10]|max_length[15]',
        ];

        if (!$this->validate($rules)) {
            return view('personas/edit', [
                'validation' => $this->validator,
                'persona' => $this->personaModel->find($id),
            ]);
        }

        $this->personaModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
        ]);

        session()->setFlashdata('success', 'Persona actualizada correctamente');
        return redirect()->to('/personas');
    }

    // Eliminar una persona
    public function delete($id)
    {
        if (!$this->personaModel->find($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Persona con ID $id no encontrada");
        }

        $this->personaModel->delete($id);
        session()->setFlashdata('success', 'Persona eliminada correctamente');
        return redirect()->to('/personas');
    }
}
?>