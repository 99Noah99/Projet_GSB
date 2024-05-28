<?php

namespace App\Services;

use App\Models\Historique_Statut;
use Carbon\Carbon;

class HistoriqueStatutService
{
    public function changeMissionStatus($missionId, $statusId)
    {
        return Historique_Statut::create([
            "Id_Mission" => $missionId,
            "Id_Statut" => $statusId,
            "Date_Changement" => Carbon::now()
        ]);
    }
}
