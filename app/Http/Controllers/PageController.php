<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        $data = ['titre' => 'À propos de nous', 'description' => 'Nous sommes une équipe passionnée par Laravel !'];
        return view('about', $data);
    }

    public function contact()
    {
        $contacts = ['email' => 'contact@monsite.com', 'telephone' => '01 23 45 67 89', 'adresse' => '123 Rue Laravel, Paris'];
        return view('contact', ['contacts' => $contacts]);
    }

    public function services()
    {
        $services = [['nom' => 'Développement Web', 'prix' => '1500€'], ['nom' => 'Design UI/UX', 'prix' => '800€'],
            ['nom' => 'SEO', 'prix' => '500€']];
        return view('services', compact('services'));
    }

    public function blog()
    {
        $articles = [
            ['nomarticle' => 'a1', 'prix' => '1500€', 'description' => 'd1'],
            ['nomarticle' => 'a2', 'prix' => '1500€', 'description' => 'd2'],
            ['nomarticle' => 'a3', 'prix' => '1500€', 'description' => 'd3']
        ];

        return view('blog', compact('articles'));
    }
}

