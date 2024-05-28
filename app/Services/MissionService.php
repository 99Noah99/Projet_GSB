<?php

namespace App\Services;

use App\Models\Mission;

class MissionService
{
    public function getMissionsByUser($userId)
    {
        return Mission::with('ville', 'dernier_historique_statut.statut', 'frais')
            ->where('Id_Utilisateur', $userId)
            ->get();
    }
}
