@extends('front.layout.template')

@section('title', 'About - PostinAJA')

@section('content')
    <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow-sm">
                        <a href="">
                            <img class="card-img-top featured-img" src="{{ asset('front/img/ChatGPT Image Jun 5, 2025, 12_04_19 AM.png') }}" alt="About PostinAja" />
                        </a>
                        <div class="card-body">
                            <div class="small text-muted">{{ date('d/m/Y') }}</div>
                            <h2 class="card-title">Tentang PostinAja</h2>
                            <div class="container"> 
                                <p class="tagline">
                                    <strong>Selamat Datang di PostinAja! Tempat di Mana Setiap Cerita Berhak Mendapat Ruang.</strong>
                                </p>
                                <p>
                                    Di tengah derasnya arus informasi, seringkali kita menyimpan ide dan cerita kita sendiri. Entah karena merasa tidak cukup baik, tidak relevan, atau takut dihakimi. PostinAja hadir untuk mendobrak keraguan itu.
                                </p>
                                <p>
                                    Nama <strong>PostinAja</strong> adalah sebuah ajakan. Sebuah pengingat bahwa gagasanmu berharga dan ceritamu layak untuk dibagikan. Filosofi kami sederhana: "Jangan terlalu banyak berpikir, post-in aja!"
                                </p>                            
                                <h2 id="siapa-kami">Siapa Kami?</h2>
                                <p>
                                    Kami adalah sekumpulan individu dengan latar belakang dan minat yang berbeda-beda, disatukan oleh satu hal: kecintaan pada kata-kata dan cerita. Dari seorang pengembang software yang hobi memasak, desainer grafis yang gemar traveling, hingga mahasiswa yang suka mengulas film. Keberagaman inilah yang menjadi warna dari PostinAja.
                                </p>
                                <h2 id="misi-kami">Apa Misi Kami?</h2>
                                <p>Misi kami adalah menciptakan sebuah platform yang santai, inklusif, dan inspiratif. Kami ingin:</p>
                                <ul>
                                    <li><strong>Mendorong Keberanian:</strong> Menginspirasi siapa saja untuk mulai menulis dan berbagi tanpa tekanan untuk menjadi sempurna.</li>
                                    <li><strong>Menjadi Ruang Ekspresi:</strong> Menyediakan wadah bagi berbagai sudut pandang, opini, dan kisah personal.</li>
                                    <li><strong>Membangun Komunitas:</strong> Menghubungkan para penulis dan pembaca untuk saling berdiskusi dan bertukar pikiran.</li>
                                </ul>
                                <h2 id="topik-kami">Apa Saja yang Kami Bahas?</h2>
                                <p>Kami menulis tentang apa pun yang menarik perhatian kami. Di sini kamu bisa menemukan artikel tentang:</p>
                                <ul>
                                    <li>Teknologi & Gaya Hidup</li>
                                    <li>Seni, Desain, & Kreativitas</li>
                                    <li>Perjalanan & Kuliner</li>
                                    <li>Pengembangan Diri & Produktivitas</li>
                                    <li>Opini & Analisis Budaya Pop</li>
                                    <li>Dan lain-lain</li>
                                </ul>                
                                <h2 id="bergabung">Jadilah Bagian dari Kami!</h2>
                                <p>PostinAja bukan hanya milik kami, tapi milik kita semua. Kami percaya setiap orang punya cerita.</p>
                                <ul>
                                    <li><strong>Ikuti Kami:</strong> Terhubung dengan kami melalui media sosial untuk mendapatkan update terbaru.
                                        <ul class="social-links">
                                            <li>Instagram: <a href="https://www.instagram.com/irfan_purwa/">@irfan_purwa</a></li>
                                            <li>YouTube: <a href="https://www.youtube.com/@rairadko">RAIRADKO</a></li>
                                            <li>Email: <a href="mailto:rahmatirfanap@gmail.com">rahmatirfanap@gmail.com</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="signature">
                                    Terima kasih telah menjadi bagian dari perjalanan ini. Selamat membaca!
                                    <br>
                                    <strong>Tim PostinAja</strong>
                                </p>
                            </div>
                            <div>
                                <h2>Lokasi Kami</h2>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.88029641249534!2d109.33651179889192!3d-7.4292031477792575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559f876935467%3A0xe789a5f120eb4f4a!2sHMIF%20UNSOED!5e0!3m2!1sid!2sid!4v1749203716381!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="text-center"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @include('front.layout.side-widget')
            </div>
        </div>
@endsection