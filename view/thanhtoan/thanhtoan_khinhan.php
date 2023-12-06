<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Popup Modal Box</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../../assets/css/tsset.css" />

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
  <section class="active">
    <button class="show-modal" hidden>hhh</button>
    <span class="overlay"></span>

    <div class="modal-box">
      <i class="fa-regular fa-circle-check"></i>
      <h2>Cảm mơn đã mua hàng </h2>
      <h3>ASCENSION xin trân thành cảm mơn </h3>

      <div class="buttons">
        <a class="close-btn" href="http://localhost/duan1_lo/index.php?act=shop" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5" />
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
          </svg> Tiếp tục mua</a>
        <a href="http://localhost/duan1_lo/index.php?act=donchitiet"  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
          </svg> Chi Tiết Đơn</a>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const section = document.querySelector("section");
      const overlay = document.querySelector(".overlay");
      const showBtn = document.querySelector(".show-modal");
      const closeBtn = document.querySelector(".close-btn");

      // Function to show the modal
      function showModal() {
        section.classList.add("active");
      }

      // Function to hide the modal and navigate to a new page
      function hideModalAndNavigate() {
        section.classList.remove("active");
        // Replace the URL with the desired page
        window.location.replace("http://localhost/duan1_lo/index.php");
      }

      // Automatically show the modal on page load
      showModal();

      // Event listeners
      showBtn.addEventListener("click", showModal);
      overlay.addEventListener("click", hideModalAndNavigate);
      closeBtn.addEventListener("click", hideModalAndNavigate);
    });
  </script>
</body>

</html>