<?php

use App\Livewire\Kelolauser\Index as KelolauserIndex;
use App\Livewire\Laporan\Ikm\Index as LaporanIkmIndex;
use App\Livewire\PelayananManager\Index as PelayananManager;
use App\Livewire\Pertanyaaan\Index as PertanyaaanIndex;
use App\Livewire\Responden\Index as RespondenIndex;
use App\Livewire\Websettings\Index as IndexTentangToko;
use App\Livewire\Dashboard\Index as IndexDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Survey\Index as SurveyIndex;

Route::get("/", function () {
    return redirect()->route("dashboard");
});

Route::group(["prefix" => "/survey"], function (): void {
    Route::get("/", SurveyIndex::class)->name("survey-index");
});

Route::middleware([
    "auth:sanctum",
    config("jetstream.auth_session"),
    "verified",
])->group(function (): void {
    Route::group(["prefix" => "/dashboard"], function (): void {
        Route::get("/", IndexDashboard::class)->name("dashboard");
    });

    Route::get("/tentang-toko", IndexTentangToko::class)->name("tentangToko");
    Route::get("/pelayanan", PelayananManager::class)->name(
        "pelayanan-manager",
    );
    Route::get("/pertanyaan", PertanyaaanIndex::class)->name(
        "pertanyaan-index",
    );
    Route::get("/kelola-user", KelolauserIndex::class)->name(
        "kelola-user-index",
    );

    Route::get("/responden", RespondenIndex::class)->name("responden-index");

    Route::get("/laporan-ikm", LaporanIkmIndex::class)->name(
        "laporan-ikm-index",
    );
});
