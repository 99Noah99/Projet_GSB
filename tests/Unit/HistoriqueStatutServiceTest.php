<?php

namespace Tests\Unit\Services;

use Tests\TestCase;

use App\Services\HistoriqueStatutService;
use App\Models\Historique_Statut;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class HistoriqueStatutServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $historiqueStatutService;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $this->historiqueStatutService = new HistoriqueStatutService();
    }

    public function testChangeMissionStatus()
    {
        Historique_Statut::factory()->create();
        // echo Mission::all();
        // echo User::all();
        // dd();
        $missionId = Mission::select('Id_Mission')->get();
        $missionId = $missionId->first()->Id_Mission;
        // echo "ici : " . $missionId . "\n";
        $this->assertDatabaseHas('historique_statut', [
            'Id_Mission' => $missionId,
            'Id_Statut' => 3,
            'Date_Changement' => Carbon::now(),
        ]);

        $newStatut = 1;
        $this->historiqueStatutService->changeMissionStatus($missionId, $newStatut);

        $this->assertDatabaseHas('historique_statut', [
            'Id_Mission' => $missionId,
            'Id_Statut' => $newStatut,
            'Date_Changement' => Carbon::now(),
        ]);
    }
}
