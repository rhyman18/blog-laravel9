<script>
    const btnThumbnail = document.getElementById('thumbnail');
    const btnBanner = document.getElementById('banner');
    const labelThumbnail = document.getElementById('labelThumbnail');
    const labelBanner = document.getElementById('labelBanner');
    const btnClear = document.getElementById('clear');

    btnThumbnail.addEventListener('change', function() {
        const file = btnThumbnail.files;
        labelThumbnail.innerText = file[0].name;
    });

    btnBanner.addEventListener('change', function() {
        const file = btnBanner.files;
        labelBanner.innerText = file[0].name;
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('judul').value = "";
        document.getElementById('konten').value = "";
    });
</script>