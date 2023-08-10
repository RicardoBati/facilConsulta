<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico_paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'paciente_id',
    ];

    private $id;
    private $medico_id;
    private $paciente_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicoId(): ?int
    {
        return $this->medico_id;
    }

    public function setMedicoId(string $medico_id) : self
    {
        $this->attributes['medico_id'] = $medico_id;
        return $this;
    }

    public function getPacienteId(): ?int
    {
        return $this->paciente_id;
    }

    public function setPacienteId(string $paciente_id) : self
    {
        $this->attributes['paciente_id'] = $paciente_id;
        return $this;
    }
}
