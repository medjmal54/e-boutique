<?php

namespace App\Queries;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ArticleQueryBuilderExercises
{
    /**
     * Source des exercices : Activities/Exercice_Query_Builder.pdf.
     *
     * @return array<int, Collection<int, object>>
     */
    public function run(): array
    {
        return [
            // 1. Sélectionner les articles dont la référence est différente de LPK-3022-QMA.
            DB::table('articles')
                ->where('reference', '!=', 'LPK-3022-QMA')
                ->get(),

            // 2. Récupérer les articles qui n'ont pas de description.
            DB::table('articles')
                ->whereNull('description')
                ->get(),

            // 3. Récupérer les articles dont la référence appartient à cette liste.
            DB::table('articles')
                ->whereIn('reference', ['OLM-5556-DCS', 'LPK-3002-QMA', 'JEJ-6343-XLH'])
                ->get(),

            // 4. Récupérer les articles dont la référence n'appartient pas à cette liste.
            DB::table('articles')
                ->whereNotIn('reference', ['OLM-5556-DCS', 'LPK-3002-QMA', 'JEJ-6343-XLH'])
                ->get(),

            // 5. Récupérer les articles dont le prix est compris entre 20 et 200.
            DB::table('articles')
                ->whereBetween('prix', [20, 200])
                ->get(),

            // 6. Récupérer les articles créés le 18 octobre 2026.
            DB::table('articles')
                ->whereDate('created_at', '2026-10-18')
                ->get(),

            // 7. Récupérer les articles dont le prix est inférieur à 50 ou le stock inférieur à 100.
            DB::table('articles')
                ->where('prix', '<', 50)
                ->orWhere('stock', '<', 100)
                ->get(),

            // 8. Prix supérieur à 50 et stock positif ou désignation contenant le mot « promo ».
            DB::table('articles')
                ->where('prix', '>', 50)
                ->where(function ($query): void {
                    $query->where('stock', '>', 0)
                        ->orWhere('designation', 'like', '%promo%');
                })
                ->get(),

            // 9. Afficher les cinq articles les plus chers, avec un prix supérieur à 100
            //    et un stock supérieur à la moyenne générale des stocks.
            DB::table('articles')
                ->where('prix', '>', 100)
                ->where('stock', '>', DB::table('articles')->avg('stock'))
                ->orderByDesc('prix')
                ->limit(5)
                ->get(),
        ];
    }
}
