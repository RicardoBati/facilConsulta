<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'celular'
    ];

    private $id;
    private $nome;
    private $cpf;
    private $celular;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(int $cpf) : self
    {
        $this->attributes['cpf'] = $cpf;
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(String $nome) : self
    {
        $this->attributes['nome'] = $nome;
        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(String $celular) : self
    {
        $this->attributes['celular'] = $celular;
        return $this;
    }
}
