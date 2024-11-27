<?php
namespace App\Models;
use CodeIgniter\Model;
class PersonaModel extends Model{
    protected $table = 'personas'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Llave primaria
    protected $allowedFields = ['nombre', 'email', 'telefono']; // Columnas permitidas
}
?>