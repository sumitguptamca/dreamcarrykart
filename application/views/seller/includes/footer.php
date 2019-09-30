
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$basepath = base_url('assets_admin/');
?>
<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<script src="<?=$basepath?>js/my_dashboard.js"></script>
    <script src="<?php echo base_url();?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=$basepath?>js/main.js"></script>
    <script src="<?php echo base_url();?>vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url();?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url();?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>vendors/pdfmake/build/vfs_fonts.js"></script>
     <script src="<?php echo base_url();?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?=$basepath?>js/init-scripts/data-table/datatables-init.js"></script>
    <script src="<?php echo base_url();?>vendors/chosen/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.js"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);

        jQuery(document).ready(function() {
           jQuery('#example').DataTable( {
                'sScrollX': true
            } );
        } );
         jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
    </script>
    </div><!-- /#right-panel -->
</body>

</html>
<?php
if (isset($_SESSION['TYPE'])) {
    ?>
  <!--   <script>
        showtoast('<?php echo $_SESSION['TYPE'] ?>', '<?php echo $_SESSION['MESSAGE'] ?>')
    </script> -->
    <?php
    unset($_SESSION['TYPE']);
    unset($_SESSION['MESSAGE']);
}
?> 
