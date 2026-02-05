@include('layout/header')

<section class="riwayat">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-body">
                    <h3>Riwayat Konseling</h3>
                    <p>Daftar sesi konseling yang telah selesai anda lakukan. Laporan hasil konseling dapat diakses langsung melalui tabel riwayat konseling.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="filter-wrap">
                    <div class="filter">
                        <input type="date" id="filterTanggal" class="date-picker" required>

                        <select id="filterKategori">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Peribadi">Peribadi</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Karir">Karir</option>
                        </select>

                        <button>Terapkan</button>
                        <button id="reset">Reset</button>
                    </div>
                    <!-- <div class="search"> -->
                    <input class="search" type="text" placeholder="Cari...">
                    <!-- </div> -->
                </div>
                <div class="selected-filter" id="selectedFilter"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal Konseling</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 Desember 2026</td>
                                <td>Karir</td>
                                <td><span class="menunggu">Menunggu</span></td>
                                <td><a class="detail" href="#"><i class="fa-solid fa-folder"></i></a></td>
                            </tr>
                            <tr>
                                <td>07 Desember 2026</td>
                                <td>Akademik</td>
                                <td><span class="selesai">Selesai</span></td>
                                <td><a class="detail" id="detail" href="#"><i class="fa-solid fa-folder"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="slide">
                    <p>kembali</p><span class="number">1</span>
                    <p>Berikutnya</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="overlay" id="popupDetail">
    <div class="popup-content-detail">
        <h2 class="modal-title">Laporan Bimbingan Konseling</h2>

        <div class="info-data">
            <ul>
                <li>Nama</li>
                <li>Kelas</li>
                <li>Tgl, Konseling</li>
            </ul>
            <ul>
                <li>: Berta Yuanita Putri Mayani</li>
                <li>: XII-RPA</li>
                <li>: 28 November 2026</li>
            </ul>
        </div>

        <table class="table-report">
            <tr>
                <th>Kategori</th>
                <td>Akademik</td>
            </tr>
            <tr>
                <th>Permasalahan</th>
                <td>
                    Siswa mengalami kesulitan dalam memahami materi
                    pelajaran dan manajemen waktu belajar.
                </td>
            </tr>
            <tr>
                <th>Hasil & Catatan</th>
                <td>
                    Konselor memberikan arahan terkait pengelolaan
                    waktu belajar serta strategi belajar mandiri.
                    Siswa diharapkan dapat menerapkan jadwal belajar
                    secara konsisten.
                </td>
            </tr>
        </table>

        <button class="tutup" id="tutup">Tutup</button>
    </div>
</div>

@include('layout/footer')

<script>
    const btnDetails = document.querySelectorAll('.detail');
    const popup = document.getElementById('popupDetail');
    const btnClose = document.getElementById('tutup');

    btnDetails.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            popup.classList.add('show');
        });
    });

    btnClose.addEventListener('click', () => {
        popup.classList.remove('show');
    });

    const tanggal = document.getElementById('filterTanggal');
    const kategori = document.getElementById('filterKategori');
    const container = document.getElementById('selectedFilter');
    const resetBtn = document.getElementById('reset');

    function createChip(label, type) {
        container.querySelectorAll(`.chip[data-type="${type}"]`).forEach(el => el.remove());

        const chip = document.createElement('div');
        chip.className = 'chip';
        chip.dataset.type = type;
        chip.innerHTML = `
            ${label}
            <span class="close">&times;</span>
        `;

        chip.querySelector('.close').onclick = () => {
            chip.remove();
            if (type === 'tanggal') tanggal.value = '';
            if (type === 'kategori') kategori.value = '';
        };

        container.appendChild(chip);
    }

    tanggal.addEventListener('change', () => {
        const date = new Date(tanggal.value);
        const formatted = date.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
        createChip(formatted, 'tanggal');
    });

    kategori.addEventListener('change', () => {
        createChip(kategori.value, 'kategori');
    });

    resetBtn.addEventListener('click', () => {
        container.innerHTML = '';
        tanggal.value = '';
        kategori.value = '';
    });
</script>