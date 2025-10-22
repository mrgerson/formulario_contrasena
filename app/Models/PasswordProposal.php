<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordProposal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_completo',
        'area_dependencia',
        'correo_corporativo',
        'propuesta_password',
        'explicacion_tecnica',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the validation rules for password proposals.
     *
     * @return array<string, string>
     */
    public static function validationRules(): array
    {
        return [
            'nombre_completo' => 'required|string|max:255',
            'area_dependencia' => 'required|in:Talento Humano,Tecnología / Sistemas,Comercial,Administración,Operaciones,Otro',
            'correo_corporativo' => 'required|email|max:255|unique:password_proposals,correo_corporativo',
            'propuesta_password' => 'required|string|min:12|max:1000',
            'explicacion_tecnica' => 'required|string|max:2000',
        ];
    }

    /**
     * Get the validation messages for password proposals.
     *
     * @return array<string, string>
     */
    public static function validationMessages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre completo es obligatorio.',
            'nombre_completo.max' => 'El nombre completo no puede exceder los 255 caracteres.',
            'area_dependencia.required' => 'Debe seleccionar un área o dependencia.',
            'area_dependencia.in' => 'El área seleccionada no es válida.',
            'correo_corporativo.required' => 'El correo corporativo es obligatorio.',
            'correo_corporativo.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo_corporativo.max' => 'El correo corporativo no puede exceder los 255 caracteres.',
            'correo_corporativo.unique' => 'Este correo electrónico ya ha sido utilizado para enviar una propuesta.',
            'propuesta_password.required' => 'La propuesta de contraseña es obligatoria.',
            'propuesta_password.min' => 'La contraseña debe tener al menos 12 caracteres.',
            'propuesta_password.max' => 'La propuesta de contraseña no puede exceder los 1000 caracteres.',
            'explicacion_tecnica.required' => 'La explicación de la técnica es obligatoria.',
            'explicacion_tecnica.max' => 'La explicación no puede exceder los 2000 caracteres.',
        ];
    }
}
