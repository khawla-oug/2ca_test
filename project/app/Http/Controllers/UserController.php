<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    //Afficher la liste des utilisateurs (pour l'admin).
     
    public function index()
    {
        $this->authorize('isAdmin'); // Seuls les admins peuvent voir cette page.
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Afficher le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Enregistrer un nouvel utilisateur.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,author,visitor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Afficher les informations d'un utilisateur.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Afficher le formulaire de modification d'un utilisateur.
     */
    public function edit(User $user)
    {
        $this->authorize('isAdmin'); // Seuls les admins peuvent modifier un utilisateur.
        return view('users.edit', compact('user'));
    }

    /**
     * Mettre à jour un utilisateur.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,author,visitor',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprimer un utilisateur.
     */
    public function destroy(User $user)
    {
        $this->authorize('isAdmin'); // Seuls les admins peuvent supprimer un utilisateur.
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Afficher le formulaire de connexion.
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Connexion de l'utilisateur.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Connexion réussie.');
        }

        return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
    }

    /**
     * Déconnexion de l'utilisateur.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Déconnecté avec succès.');
    }

}
