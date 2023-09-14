<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Commande;
use App\Models\SuccursaleProduit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Commande::class)->constrained();
            $table->foreignIdFor(SuccursaleProduit::class)->constrained();
            $table->float("prix_vendu");
            $table->float("quantite");
            $table->float("reduction")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits_commandes');
    }
};
