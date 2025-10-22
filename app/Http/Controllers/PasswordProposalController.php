<?php

namespace App\Http\Controllers;

use App\Models\PasswordProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasswordProposalController extends Controller
{
    /**
     * Show the password proposal form.
     */
    public function create()
    {
        return view('password-proposal.create');
    }

    /**
     * Store a new password proposal.
     */
    public function store(Request $request)
    {
        // Validar los datos usando las reglas del modelo
        $validator = Validator::make($request->all(), PasswordProposal::validationRules(), PasswordProposal::validationMessages());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear la propuesta
        $proposal = PasswordProposal::create($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('password-proposal.create')
            ->with('success', '¡Propuesta enviada exitosamente! Gracias por participar en el concurso.');
    }

    /**
     * Display a listing of password proposals (para administradores).
     */
    public function index()
    {
        $proposals = PasswordProposal::orderBy('created_at', 'desc')->get();

        return view('password-proposal.index', compact('proposals'));
    }

    /**
     * Display the specified password proposal.
     */
    public function show(PasswordProposal $passwordProposal)
    {
        return view('password-proposal.show', compact('passwordProposal'));
    }
}
