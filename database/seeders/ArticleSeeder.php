<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            [
                'title' => 'Kenali Berbagai Jenis Kopi dan Cita Rasanya',
                'slug' => Str::slug('Kenali Berbagai Jenis Kopi dan Cita Rasanya'),
                'content' => 'Kopi memiliki berbagai jenis dan cita rasa, dari robusta yang kuat hingga arabika yang lebih asam dan lembut...',
                'image' => 'https://placehold.co/600x400?text=Coffee+Beans',
            ],
            [
                'title' => '5 Tips Menyeduh Kopi Agar Lebih Nikmat',
                'slug' => Str::slug('5 Tips Menyeduh Kopi Agar Lebih Nikmat'),
                'content' => 'Menggunakan air dengan suhu yang tepat dan biji kopi yang baru digiling adalah kunci dalam menyeduh kopi yang nikmat...',
                'image' => 'https://placehold.co/600x400?text=Brewing+Coffee',
            ],
            [
                'title' => 'Sejarah Kopi dan Perjalanannya ke Seluruh Dunia',
                'slug' => Str::slug('Sejarah Kopi dan Perjalanannya ke Seluruh Dunia'),
                'content' => 'Tahukah kamu bahwa kopi pertama kali ditemukan di Ethiopia dan kemudian menyebar ke seluruh dunia?',
                'image' => 'https://placehold.co/600x400?text=Coffee+History',
            ],
            [
                'title' => 'Manfaat Minum Kopi untuk Kesehatan',
                'slug' => Str::slug('Manfaat Minum Kopi untuk Kesehatan'),
                'content' => 'Kopi bukan hanya sekadar minuman yang memberikan energi, tetapi juga memiliki manfaat kesehatan seperti meningkatkan fokus dan metabolisme...',
                'image' => 'https://placehold.co/600x400?text=Healthy+Coffee',
            ],
            [
                'title' => 'Resep Kopi Susu Kekinian yang Bisa Dibuat di Rumah',
                'slug' => Str::slug('Resep Kopi Susu Kekinian yang Bisa Dibuat di Rumah'),
                'content' => 'Ingin membuat kopi susu ala cafe di rumah? Berikut adalah resep sederhana yang bisa kamu coba...',
                'image' => 'https://placehold.co/600x400?text=Latte+Art',
            ],
            [
                'title' => 'Mengapa Barista Selalu Menggunakan Timbangan?',
                'slug' => Str::slug('Mengapa Barista Selalu Menggunakan Timbangan'),
                'content' => 'Barista profesional selalu menggunakan timbangan saat menyeduh kopi agar mendapatkan konsistensi rasa yang sempurna...',
                'image' => 'https://placehold.co/600x400?text=Barista+Tips',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}

