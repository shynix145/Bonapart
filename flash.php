
      <div class="flash-zone">
        <?php if(isset($_SESSION['flash'])): ?>
<div class="alert alert--success">
          <?=  $_SESSION['flash'] ?>
        </div>
<?php endif; ?>
      </div>

                 <div class="flash-zone">
        <?php if(isset($_SESSION['flash_error'])): ?>
<div class="alert alert--error">
          <?=  $_SESSION['flash_error'] ?>
        </div>
<?php endif; ?>
      </div>

      <?php unset($_SESSION['flash_error']) ?>
      <?php unset($_SESSION['flash']) ?>


