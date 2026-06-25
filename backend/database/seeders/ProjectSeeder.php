<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::truncate();

        $projects = [
            [
                'slug'              => 'santrendcode',
                'name'              => 'SantrendCode',
                'category'          => 'Learning Platform',
                'year'              => '2025',
                'role'              => 'UI/UX Designer',
                'timeline'          => '2 Weeks',
                'tools'             => ['Figma'],
                'problem_statement' => 'Banyak pemula mengalami kesulitan dalam memulai belajar pemrograman karena materi tersebar di berbagai platform, tidak memiliki roadmap yang jelas, serta sulit menemukan sumber belajar yang terpercaya. Kondisi ini membuat proses belajar menjadi kurang terarah dan menurunkan motivasi pengguna.',
                'ps_label'          => 'Problem Statement',
                'prototype_url'     => 'https://www.figma.com/proto/UxkiQDzOUEYMeDK6bowJ69/SantrendCode?node-id=171-2147&p=f&viewport=712%2C1164%2C0.02&t=ADHGUp03wo8YKWy1-1&scaling=scale-down&content-scaling=fixed&starting-point-node-id=171%3A2287&page-id=171%3A2146',
                'solutions'         => 'SantrendCode dirancang sebagai platform pembelajaran yang menyediakan roadmap belajar, materi yang terstruktur, rekomendasi creator terpercaya, serta informasi perkembangan teknologi dalam satu tempat. Dengan demikian, pengguna dapat belajar secara lebih mudah, terarah, dan efisien tanpa harus mencari referensi dari berbagai platform.',
                'hero_image'        => '/assets/sc.png',
                'page_images'       => [
                    '/assets/santrendcode/Complete Course.png',
                    '/assets/santrendcode/Detail Materi.png',
                    '/assets/santrendcode/Devtalks Page new.png',
                    '/assets/santrendcode/Home search 6.png',
                    '/assets/santrendcode/Landing Page.png',
                    '/assets/santrendcode/Proges Pembelajaran.png',
                    '/assets/santrendcode/Sign In 1.png',
                    '/assets/santrendcode/We Roadmap Page utama.png',
                ],
                'sort_order'        => 1,
            ],
            [
                'slug'              => 'santrendcorps',
                'name'              => 'SantrendCorps',
                'category'          => 'Company Profile',
                'year'              => '2025',
                'role'              => 'UI/UX Designer',
                'timeline'          => '1 Week',
                'tools'             => ['Webflow'],
                'problem_statement' => 'Memahami penggunaan tools no code development Webflow, memahami penggunaan div block, komponen pendukung untuk meletakkan gambar, text, pengaturan layout yang baik, juga memberikan animasi pada setiap section yang ditampilkan di dalam website, dan merancang arsitektur informasi yang baik yang diterapkan di dalam company profile tersebut.',
                'ps_label'          => 'Project Context',
                'prototype_url'     => 'https://santrendcorps.webflow.io/',
                'solutions'         => null,
                'hero_image'        => '/assets/scpw.png',
                'page_images'       => [
                    '/assets/santrendcorps/lpscp.png',
                ],
                'sort_order'        => 2,
            ],
            [
                'slug'              => 'pandu-divisi',
                'name'              => 'Pandu Divisi',
                'category'          => 'Recommendation System Website',
                'year'              => '2025',
                'role'              => 'UI/UX Designer',
                'timeline'          => '2 Weeks',
                'tools'             => ['Figma'],
                'problem_statement' => 'Pilihan divisi yang begitu banyak membuat para calon peserta yang ingin mendaftar program MSIB di PT Vinix 7 mendapatkan tantangan yang serius. Sebagian besar dari mereka memilih divisi berdasarkan asumsi pribadi dan saran dari rekan-rekan mereka, yang notabene divisi tersebut kemungkinan kurang sesuai dengan minat dan kompetensi mereka, sehingga jika salah pemilihan divisi akan berdampak ketika mereka menjalani program tersebut.',
                'ps_label'          => 'Problem Statement',
                'prototype_url'     => 'https://www.figma.com/proto/odlhKhLM0KZ5mthwWu3sob/Pandu-DIvisi?node-id=187-2001&p=f&viewport=127%2C247%2C0.02&t=zkqQa0XS1IKIBLoo-1&scaling=scale-down&content-scaling=fixed&starting-point-node-id=510%3A12283&page-id=0%3A1',
                'solutions'         => 'Merancang sebuah UI/UX website rekomendasi divisi yang intuitif dan berpusat pada pengguna guna mengarahkan calon peserta ke divisi yang tepat sesuai minat dan potensi diri mereka, serta mempermudah alur pendaftaran dengan menciptakan alur yang terintegrasi dengan hasil rekomendasi divisi.',
                'hero_image'        => '/assets/pd.png',
                'page_images'       => [
                    '/assets/pandu-divisi/1.png',
                    '/assets/pandu-divisi/2.png',
                    '/assets/pandu-divisi/3.png',
                    '/assets/pandu-divisi/4.png',
                    '/assets/pandu-divisi/5.png',
                    '/assets/pandu-divisi/6.png',
                    '/assets/pandu-divisi/7.png',
                    '/assets/pandu-divisi/8.png',
                    '/assets/pandu-divisi/9.png',
                    '/assets/pandu-divisi/10.png',
                    '/assets/pandu-divisi/11.png',
                    '/assets/pandu-divisi/12.png',
                    '/assets/pandu-divisi/13.png',
                ],
                'sort_order'        => 3,
            ],
            [
                'slug'              => 'mayang-mangurai',
                'name'              => 'Mayang Mangurai Auto Variasi',
                'category'          => 'Profile Business',
                'year'              => '2025',
                'role'              => 'UI/UX Designer',
                'timeline'          => '2 Weeks',
                'tools'             => ['Figma'],
                'problem_statement' => 'Calon pelanggan kesulitan memahami perbedaan layanan upgrade lampu, kualitas hasil pengerjaan, dan produk yang digunakan, sementara Mayang Mangurai Auto Variasi belum memiliki media yang mampu menampilkan layanan, hasil project, dan keahlian workshop secara jelas dan meyakinkan, sehingga proses membangun kepercayaan dan mendorong pelanggan untuk melakukan konsultasi atau booking menjadi kurang efektif.',
                'ps_label'          => 'Problem Statement',
                'prototype_url'     => 'https://www.figma.com/proto/A5y9pXevqh1nl9HekP6Sw5/MM-Auto-Variasi?team_id=1638080154240541053&node-id=6-473&page-id=6%3A472&starting-point-node-id=6%3A473&t=vezW3HcJeXcyn2Ii-1',
                'solutions'         => 'Solusi yang ditawarkan adalah merancang website Business Profile dan Portfolio Showcase yang menampilkan informasi layanan, hasil project, serta produk yang digunakan secara jelas dan terstruktur. Website ini membantu calon pelanggan memahami value yang ditawarkan, membangun kepercayaan terhadap kualitas workshop, serta mempermudah proses konsultasi dan booking layanan.',
                'hero_image'        => '/assets/mmav.png',
                'page_images'       => [
                    '/assets/mayang-mangurai/beranda utama.png',
                    '/assets/mayang-mangurai/detail project 1.png',
                    '/assets/mayang-mangurai/galery.png',
                    '/assets/mayang-mangurai/Pemasangan Bi-LED Projector.png',
                    '/assets/mayang-mangurai/POSTER PRODUK.png',
                ],
                'sort_order'        => 4,
            ],
        ];

        foreach ($projects as $data) {
            Project::create($data);
        }
    }
}
