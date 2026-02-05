@include('layout/header')

<section class="pengajuan">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-body">
                    <h3>Pengajuan Konseling</h3>
                    <p>Ajukan permohonan konseling sesuai permasalahan yang sedang kamu hadapi. Data yang kamu kirim bersifat rahasia.</p>
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
                    <div class="filter-right">
                        <input class="search" type="text" placeholder="Cari...">
                        <button class="btn-tambah-ajuan">+ Ajukan Konseling</button>
                    </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 Desember 2026</td>
                                <td>Karir</td>
                                <td><span class="menunggu">Menunggu</span></td>
                            </tr>
                            <tr>
                                <td>07 Desember 2026</td>
                                <td>Akademik</td>
                                <td><span class="selesai">Selesai</span></td>
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
        <div class="overlay" id="popupPengajuan">
            <div class="popup-content">
                <div class="row form-pengajuan">
                    <div class="col-md-6">
                        <form action="">
                            <label for="">Kategori</label><br>
                            <select name="" id="">
                                <option value="" selected disabled>- Pilih Kategori Masalah -</option>
                                <option value="">Akademik</option>
                                <option value="">Peribadi</option>
                                <option value="">Sosial</option>
                                <option value="">Karir</option>
                            </select><br><br>
                            <label for="">Deskripsi</label><br>
                            <textarea name="" placeholder="Ringkasan masalah" id=""></textarea>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Konseling</label>
                        <input type="text" id="tanggal_konsultasi" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 btn-ajuan text-center">
                        <button id="btnBatal">Batal</button>
                        <button class="submit-btn">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layout/footer')

<script>
    flatpickr("#tanggal_konsultasi", {
        inline: true,
        dateFormat: "Y-m-d"
    });
</script>

<script>
    const btnTambah = document.querySelector('.btn-tambah-ajuan');
    const popup = document.getElementById('popupPengajuan');
    const btnBatal = document.getElementById('btnBatal');

    btnTambah.addEventListener('click', () => {
        popup.classList.add('show');
    });

    btnBatal.addEventListener('click', () => {
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