<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'Productos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_producto'; // Clave primaria de la tabla
    protected $allowedFields = ['nombre', 'descripcion', 'unidad_medida', 'categoria', 'marca', 'fecha_vencimiento']; // Campos permitidos para insertar y actualizar

    // Función para obtener todos los productos donados
    public function getProductos()
    {
        return $this->findAll();
    }

    // Función para obtener un producto por su ID
    public function getProducto($id)
    {
        return $this->find($id);
    }

    // Función para agregar un nuevo producto
    public function agregarProducto($data)
    {
        return $this->insert($data);
    }

    // Función para actualizar un producto existente
    public function actualizarProducto($id, $data)
    {
        return $this->update($id, $data);
    }

    // Función para eliminar un producto
    public function eliminarProducto($id)
    {
        return $this->delete($id);
    }
}
