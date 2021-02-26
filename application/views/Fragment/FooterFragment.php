<div class="footer" style="display:none">
  <div class="float-right">
    Pemprov Babel
  </div>
  <div>
    <strong>Copyright</strong> BUMD Kepulauan Bangka Belitung &copy; 2020
  </div>
</div>
<div id='installer' style="display:none">
  <button class='button'>Install</button>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#tmtdate .input-group.date').datepicker({
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      calendarWeeks: true,
      format: "yyyy-mm-dd"
    });
    $('#tmtdate2 .input-group.date').datepicker({
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      calendarWeeks: true,
      format: "yyyy-mm-dd"
    });
  });

  // if (navigator.serviceWorker) {
  //   navigator.serviceWorker.register('<?= base_url() ?>sw.js').then(function(registration) {
  //     console.log('ServiceWorker registration successful with scope:',  registration.scope);
  //   }).catch(function(error) {
  //     console.log('ServiceWorker registration failed:', error);
  //   });
  // }
  const Installer = function(root) {
    let promptEvent;

    const install = function(e) {
      if (promptEvent) {
        promptEvent.prompt();
        promptEvent.userChoice
          .then(function(choiceResult) {
            // The user actioned the prompt (good or bad).
            // good is handled in
            promptEvent = null;
            root.classList.remove('available');
          })
          .catch(function(installError) {
            // Boo. update the UI.
            promptEvent = null;
            root.classList.remove('available');
          });
      }
    };

    const installed = function(e) {
      promptEvent = null;
      // This fires after onbeforinstallprompt OR after manual add to homescreen.
      root.classList.remove('available');
    };

    const beforeinstallprompt = function(e) {
      promptEvent = e;
      promptEvent.preventDefault();
      root.classList.add('available');
      return false;
    };

    window.addEventListener('beforeinstallprompt', beforeinstallprompt);
    window.addEventListener('appinstalled', installed);

    root.addEventListener('click', install.bind(this));
    root.addEventListener('touchend', install.bind(this));
  };

  new Installer(document.getElementById('installer'));
</script>


<!-- Mainly scripts -->
<script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.js"></script>
<script src="<?= base_url('assets/') ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url('assets/') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Date Picker-->
<script src="<?php echo base_url('assets'); ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= base_url('assets/') ?>js/inspinia.js"></script>
<script src="<?= base_url('assets/') ?>js/plugins/pace/pace.min.js"></script>

<script src="<?= base_url('assets/') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/plugins/jquery-autocomplete.js"></script>

<script>
  <?= $this->session->flashdata('msg') ?>
</script>
</body>

</html>