<?php

namespace App\Models;

use CodeIgniter\Model;

class DonacionesModel extends Model
{
  protected $tableRecepcion = 'recepcion_donaciones';
  protected $tableEntrega = 'entrega_donaciones';

  protected $primaryKeyRecepcion = 'id_recepcion';
  protected $primaryKeyEntrega = 'id_entrega';

  protected $allowedFieldsRecepcion = ['fecha_recepcion', 'cantidad_total', 'observacion', 'persona_realiza_id', 'responsable_r_id', 'organizacion_realiza_id'];
  protected $allowedFieldsEntrega = ['fecha_entrega', 'cantidad_entregada', 'observacion', 'responsable_entrega_id', 'responsable_recepcion_entrega_id', 'org_receptora_id', 'estado_entrega'];
  // Añade más configuraciones si es necesario

}
