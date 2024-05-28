<?php

namespace App\Services;

use App\Models\User;
use App\Models\Mission;

class UserService
{
    public function getUserById($userId)
    {
        return User::where('Id_Utilisateur', $userId)->get()->first();
    }

    public function getAllUsersByFunction($functionId)
    {
        return User::where('Id_Fonction', $functionId)->get();
    }

    public function getMissionCountByUser($userId)
    {
        return Mission::with('dernier_historique_statut')
            ->where('Id_Utilisateur', $userId)
            ->whereHas('dernier_historique_statut', function ($query) {
                $query->where('Id_Statut', '!=', 3);
            })
            ->count();
    }

    public function getUsersWithMissionCount($functionId)
    {
        $users = $this->getAllUsersByFunction($functionId);
        $userMissions = [];

        foreach ($users as $user) {
            $missionCount = $this->getMissionCountByUser($user->Id_Utilisateur);
            $userMissions[] = [$user, $missionCount];
        }

        return $userMissions;
    }
}
