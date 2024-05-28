<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\MissionService;
use App\Services\HistoriqueStatutService;
use Illuminate\Http\Request;

class ComptableController extends Controller
{
    protected $userService;
    protected $missionService;
    protected $historiqueStatutService;

    public function __construct(
        UserService $userService,
        MissionService $missionService,
        HistoriqueStatutService $historiqueStatutService
    ) {
        $this->userService = $userService;
        $this->missionService = $missionService;
        $this->historiqueStatutService = $historiqueStatutService;
    }

    public function show_ListeVisiteur()
    {
        $tab_infos_users = $this->userService->getUsersWithMissionCount(2);
        return view('Comptabilite.utilisateur', ['tab_infos_users' => $tab_infos_users]);
    }

    public function show_ListeMission_ParVisiteur($id) //mission(s) du visiteur vue par le comptable lorsqu'il a cliquer sur un utilisateur
    {
        $tous_missions = $this->missionService->getMissionsByUser($id);
        $userInfo = $this->userService->getUserById($id);
        return view('GestionFrais.show_liste_mission', [
            'missions' => $tous_missions, 'userInfo' => $userInfo
        ]);
    }

    public function valider_mission(Request $request)
    {
        $this->historiqueStatutService->changeMissionStatus($request->id, 2);
        return redirect()->back();
    }

    public function refuser_mission(Request $request)
    {
        $this->historiqueStatutService->changeMissionStatus($request->id, 4);
        return redirect()->back();
    }
}
