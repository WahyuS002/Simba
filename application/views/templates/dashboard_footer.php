<!--**********************************
        Scripts
    ***********************************-->
<script src="<?= base_url('assets/vendor/quixlab/') ?>plugins/common/common.min.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>js/settings.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>js/gleek.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/d3v3/index.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/topojson/topojson.min.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/chartist/js/chartist.min.js"></script>
<script src="<?= base_url('assets/vendor/quixlab/') ?>/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

<script src="<?= base_url('assets/vendor/quixlab/') ?>/js/dashboard/dashboard-1.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
</script>

<script>
    function triggerClick(e) {
        document.querySelector('#gambar').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

</body>

</html>