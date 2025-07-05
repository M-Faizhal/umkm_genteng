@extends('layouts.frontend')

@section('title', 'Kontak - UMKM Genteng')
@section('description', 'Hubungi tim UMKM Genteng untuk pertanyaan, saran, atau bantuan terkait platform direktori UMKM.')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Kontak</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold mb-4">Hubungi Kami</h1>
            <p class="lead text-muted mb-4">
                Ada pertanyaan atau saran? Kami siap membantu Anda kapan saja
            </p>
        </div>
    </div>

    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-8 mb-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="h3 fw-bold mb-4">Kirim Pesan</h2>

                    <form action="#" method="POST" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label">Subjek *</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="pertanyaan_umum">Pertanyaan Umum</option>
                                    <option value="daftar_umkm">Mendaftarkan UMKM</option>
                                    <option value="masalah_teknis">Masalah Teknis</option>
                                    <option value="saran">Saran & Masukan</option>
                                    <option value="kerjasama">Kerjasama</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label">Pesan *</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required
                                      placeholder="Tuliskan pesan Anda di sini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="privacy" required>
                                <label class="form-check-label" for="privacy">
                                    Saya setuju dengan <a href="#" class="text-primary">kebijakan privasi</a> dan
                                    <a href="#" class="text-primary">syarat & ketentuan</a> *
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-4">
            <!-- Contact Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-4">Informasi Kontak</h3>

                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3">
                            <i class="fas fa-map-marker-alt text-primary fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Alamat</h6>
                            <p class="text-muted small mb-0">
                                Jl. Raya Genteng No. 123<br>
                                Genteng, Banyuwangi<br>
                                Jawa Timur 68465
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3">
                            <i class="fas fa-phone text-primary fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Telepon</h6>
                            <p class="text-muted small mb-0">
                                <a href="tel:+6212345678901" class="text-decoration-none">+62 123 4567 8901</a><br>
                                <a href="tel:+6212345678902" class="text-decoration-none">+62 123 4567 8902</a>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3">
                            <i class="fas fa-envelope text-primary fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Email</h6>
                            <p class="text-muted small mb-0">
                                <a href="mailto:info@umkmgenteng.id" class="text-decoration-none">info@umkmgenteng.id</a><br>
                                <a href="mailto:support@umkmgenteng.id" class="text-decoration-none">support@umkmgenteng.id</a>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <i class="fas fa-clock text-primary fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Jam Operasional</h6>
                            <p class="text-muted small mb-0">
                                Senin - Jumat: 08:00 - 17:00<br>
                                Sabtu: 08:00 - 14:00<br>
                                Minggu: Tutup
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-4">Ikuti Kami</h3>

                    <div class="d-flex gap-3">
                        <a href="#" class="social-btn facebook" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-btn instagram" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-btn twitter" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-btn whatsapp" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>

                    <p class="text-muted small mt-3 mb-0">
                        Ikuti media sosial kami untuk mendapatkan update terbaru tentang UMKM di Genteng.
                    </p>
                </div>
            </div>

            <!-- FAQ Quick Links -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-4">Pertanyaan Umum</h3>

                    <div class="accordion accordion-flush" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara mendaftarkan UMKM?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Untuk mendaftarkan UMKM, silakan hubungi admin melalui kontak yang tersedia atau kirim pesan melalui form di halaman ini.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Apakah ada biaya untuk bergabung?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tidak ada biaya sama sekali. Platform UMKM Genteng sepenuhnya gratis untuk semua pelaku UMKM.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Bagaimana cara mengupdate informasi UMKM?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Silakan hubungi admin dengan menyertakan informasi yang ingin diupdate. Tim kami akan membantu memperbarui data UMKM Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="h4 fw-bold mb-4">Lokasi Kami</h3>
                    <div class="ratio ratio-21x9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31619.36896626739!2d114.1508!3d-8.3333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd154321c24b5df%3A0x5030bfbca82950e9!2sGenteng%2C%20Banyuwangi%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1000000000000!5m2!1sen!2sid"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Basic form validation
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    const privacy = document.getElementById('privacy').checked;

    if (!name || !email || !subject || !message || !privacy) {
        alert('Mohon lengkapi semua field yang wajib diisi.');
        return;
    }

    // Simulate form submission
    alert('Terima kasih! Pesan Anda telah dikirim. Tim kami akan menghubungi Anda segera.');
    this.reset();
});
</script>
@endpush
@endsection
