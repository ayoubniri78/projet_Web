<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('auth'); // Charger le helper auth si nécessaire

        // Vérifier si l'utilisateur est connecté
        $user = auth()->user();
        if (!$user) {
            return redirect()->to('/login'); // Rediriger si non connecté
        }

        // Vérifier si l'utilisateur a l'un des rôles requis
        if (!in_array($user->role, $arguments)) {
            return redirect()->to('/no-access'); // Rediriger si non autorisé
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire après la requête
    }
}
