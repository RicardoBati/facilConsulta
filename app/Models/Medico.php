<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Medico extends Model implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id'
    ];

    private $id;
    private $nome;
    private $especialidade;
    private $cidade_id;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspecialidade(): ?string
    {
        return $this->especialidade;
    }

    public function setEspecialidade(string $especialidade) : self
    {
        $this->attributes['especialidade'] = $especialidade;
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome($nome) : self
    {
        $this->attributes['nome'] = $nome;
        return $this;
    }

    public function getCidadeId(): ?int
    {
        return $this->cidade_id;
    }

    public function setCidadeId(int $cidade_id): ?self
    {
        $this->attributes['cidade_id'] = $cidade_id;
        return $this;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
