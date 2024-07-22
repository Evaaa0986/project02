<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>

<!-- 導航連結函數 -->
<script>
    document.getElementById('siderjump').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('active');
    });
    document.addEventListener('mousemove', function(event) {
      var sidebar = document.getElementById('sidebar');
      var sidebarRect = sidebar.getBoundingClientRect();
      var sidebarLeft = sidebarRect.left;
      var sidebarWidth = sidebarRect.width;
      var mouseX = event.pageX;
      if (mouseX < sidebarLeft || mouseX > (sidebarLeft + sidebarWidth)) {
        sidebar.classList.remove('active');
      }
    });
  </script>