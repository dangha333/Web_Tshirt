<?php
require_once('views/layout/header.php'); ?>
   <?php require_once('views/layout/menu.php'); ?>
   


<main>
  <div class="mb-4 pb-4"></div>
  <div class="mb-4 pb-4"> </div>
  <div class="mb-4 pb-4"> </div>





  <section class="contact-us container">
    <div class="mw-930">
     
      <div class="contact-us__form">

        <form action="?act=add-lien-he"  method="POST" enctype="multipart/form-data">
          <h3 class="mb-5">Liên hệ chúng tôi</h3>
          <div class="form-floating my-4">
          <label for="contact_us_name">Họ tên</label>
            <input type="text" class="form-control" name="name" placeholder="Họ và tên khách hàng    ">
            
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '' ?>
            </span>
          </div>
          <div class="form-floating my-4">
          <label for="contact_us_name">Số điện thoại </label>
            <input type="tel" class="form-control" name="so_dien_thoai" placeholder="Phone">
            
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
            </span>
          </div>
          <div class="form-floating my-4">
          <label for="contact_us_name">Email </label>
            <input type="email" class="form-control" name="email" placeholder="Email ">
           
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
            </span>
          </div>
          <div class="my-4">
          <label for="contact_us_name">Nội dung </label>
            <textarea name="noi_dung" class="form-control form-control_gray" placeholder="Nội dung " cols="30" rows="8"></textarea>
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
            </span>
          </div>
          <input type="hidden" name="ngay_gio" id="ngay_gio">

      

          <div class="my-4">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </section>
</main>

<?php if (isset($_GET['status'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if ($_GET['status'] == 'success'): ?>
            alert("Thêm liên hệ thành công!");
        <?php elseif ($_GET['status'] == 'fail'): ?>
            alert("Đã xảy ra lỗi, vui lòng thử lại.");
        <?php endif; ?>
    });
</script>
<?php endif; ?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const now = new Date();
    const formattedDate = now.toISOString().slice(0, 16); // Định dạng YYYY-MM-DDTHH:mm
    document.getElementById("ngay_gio").value = formattedDate;
  });
</script>
<?php require_once('views/layout/footer.php'); ?>
