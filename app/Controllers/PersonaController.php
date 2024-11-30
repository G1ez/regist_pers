<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Libraries\TwigRenderer;

class PersonaController extends BaseController
{
    protected $personaModel;
    protected $twig;

    public function __construct()
    {
        $this->personaModel = new PersonaModel();
        $this->twig = new TwigRenderer(); // Instancia la clase TwigRenderer
    }

    // Mostrar lista de personas
    public function index()
    {
        $data['personas'] = $this->personaModel->findAll();
        $this->twig->render('personas/index', $data); // Renderiza usando Twig
    }

    // Mostrar formulario para crear nueva persona
    public function create()
    {
        $this->twig->render('personas/create'); // Renderiza el formulario
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
            return $this->twig->render('personas/create', [
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

        $this->twig->render('personas/edit', $data); // Renderiza el formulario de edición
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
            return $this->twig->render('personas/edit', [
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
