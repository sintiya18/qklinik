<?php include '../templates/header.php'; ?>

<div class="wrapper">

    <?php include '../templates/sidebar.php'; ?>

    <div class="main-content">

        <h3>Tambah Antrian</h3>

        <form method="POST" action="proses_antrian.php">

            <!-- tanggal tidak bisa pilih kemarin -->
            <input type="date" name="tanggal" 
                   class="form-control mb-2" 
                   min="<?= date('Y-m-d') ?>" 
                   required 
                   onchange="filterJam()">

            <!-- jam -->
            <select name="jam" class="form-control mb-2" required onchange="cekJam()">
                <option value="">Pilih Sesi Waktu</option>
                <option value="08:00-09:00">08:00 - 09:00</option>
                <option value="09:00-10:00">09:00 - 10:00</option>
                <option value="10:00-11:00">10:00 - 11:00</option>
                <option value="13:00-14:00">13:00 - 14:00</option>
                <option value="14:00-15:00">14:00 - 15:00</option>
            </select>

            <button class="btn btn-primary">Simpan</button>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>
function filterJam() {
    let tanggal = document.querySelector("input[name='tanggal']").value;
    let sekarang = new Date();

    let options = document.querySelectorAll("select[name='jam'] option");

    options.forEach(opt => {
        if (!opt.value) return;

        let jamMulai = opt.value.split('-')[0];
        let waktu = new Date(tanggal + " " + jamMulai);

        // reset dulu
        opt.disabled = false;

        // kalau hari ini dan jam lewat → disable
        if (tanggal === sekarang.toISOString().split('T')[0]) {
            if (waktu < sekarang) {
                opt.disabled = true;
            }
        }
    });
}

function cekJam() {
    let tanggal = document.querySelector("input[name='tanggal']").value;
    let jam = document.querySelector("select[name='jam']").value;

    if (!tanggal || !jam) return;

    let sekarang = new Date();
    let pilih = new Date(tanggal + " " + jam.split('-')[0]);

    if (pilih < sekarang) {
        alert("Jam sudah lewat!");
        document.querySelector("select[name='jam']").value = "";
    }
}
</script>

<?php include '../templates/footer.php'; ?>