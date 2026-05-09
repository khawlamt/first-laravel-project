<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Page d'accueil
    public function home()
    {
        return view('home');
    }

    // Page À propos
    public function about()
    {
        $data = [
            'titre' => 'À propos de nous',
            'description' => 'Nous sommes une équipe passionnée par Laravel !'
        ];

        return view('about', $data);
    }

    // Page Contact
    public function contact()
    {
        $contacts = [
            'email' => 'contact@monsite.com',
            'telephone' => '01 23 45 67 89',
            'adresse' => '123 Rue Laravel, Paris'
        ];

        return view('contact', ['contacts' => $contacts]);
    }

    // Page Services
    public function services()
    {
        $services = [
            ['nom' => 'Développement Web', 'prix' => '1500€'],
            ['nom' => 'Design UI/UX', 'prix' => '800€'],
            ['nom' => 'SEO', 'prix' => '500€']
        ];

        return view('services', compact('services'));
    }

    // Page Produits
    public function produit()
    {
        $produits = [
            ['nom' => 'Ordinateur Portable', 'prix' => '1200'],
            ['nom' => 'Ecran 27 pouces', 'prix' => '300'],
            ['nom' => 'Souris Sans Fil', 'prix' => '45']
        ];

        return view('produit', compact('produits'));
    }

    // Page Blog
    public function blog()
    {
        $articles = [
            [
                'id' => 1,
                'titre' => 'Smartphone Nouvelle Génération',
                'auteur' => 'Apple',
                'date' => '2026-02-28',
                'extrait' => 'Un smartphone rapide avec un appareil photo avancé et une grande autonomie.'
            ],
            [
                'id' => 2,
                'titre' => 'Casque Audio Sans Fil',
                'auteur' => 'Sony',
                'date' => '2026-03-01',
                'extrait' => 'Casque confortable avec réduction de bruit pour une meilleure expérience musicale.'
            ],
            [
                'id' => 3,
                'titre' => 'Montre Connectée',
                'auteur' => 'Huawei',
                'date' => '2026-03-02',
                'extrait' => 'Une montre intelligente pour suivre votre santé et vos activités sportives.'
            ]
        ];

        return view('blog', compact('articles'));
    }

    // Page Équipe
    public function equipe($membre = null)
    {
        $membres = ['Mohamed', 'Chaima', 'Amine', 'David', 'Emma'];

        if ($membre) {

            if (!in_array($membre, $membres)) {
                abort(404);
            }

            return "Membre : " . e($membre);
        }

        return "Toute l'équipe : " . implode(', ', $membres);
    }

    // Détail Article
    public function article($id)
    {
        $contenus = [
            1 => [
                'titre' => 'Smartphone Nouvelle Génération',
                'auteur' => 'Chaima',
                'contenu' => 'Cet article présente les nouvelles fonctionnalités des smartphones modernes comme la 5G, les écrans OLED et les performances améliorées.'
            ],
            2 => [
                'titre' => 'Casque Audio Sans Fil',
                'auteur' => 'Mouhamed',
                'contenu' => 'Les casques sans fil deviennent très populaires grâce à leur confort et leur qualité sonore. Ils sont idéaux pour la musique et les appels.'
            ],
            3 => [
                'titre' => 'Montre Connectée',
                'auteur' => 'Amine',
                'contenu' => 'Les montres connectées permettent de surveiller le rythme cardiaque, compter les pas et recevoir des notifications directement au poignet.'
            ]
        ];

        if (!isset($contenus[$id])) {
            abort(404);
        }

        return view('article', ['article' => $contenus[$id]]);
    }
}

