<style>
     .breadcrumbs {
          font-family: 'Poppins', sans-serif;
          padding: 0;
          margin: 0;
          display: flex;
          justify-content: space-around;
          width: calc(100% - 60px);
          background-color: #fff;
          padding: 20px 30px;
          list-style: none;
          font-size: 20px;
     }

     .breadcrumbs a {
          text-decoration: none;
          color: #555;
          font-weight: 600;
     }

     .breadcrumbs span {
          margin: 0 5px;
          color: #3498db;
          font-weight: 400;
     }

     .breadcrumbs a:hover {
          color: #2980b9;
     }

     .breadcrumbs span:last-child {
          color: #333;
          font-weight: 600;
     }
</style>

<nav class="breadcrumbs">
     <a href="/">Home</a>
     <span>/</span>
     <a id="subCategory" href="#">Subcategory</a>
</nav>

<script>
     document.addEventListener("DOMContentLoaded", function () {
          // Ambil elemen anchor untuk subkategori
          const subCategory = document.getElementById("subCategory");

          // Simpan teks dari URL saat ini
          const currentURL = window.location.href;

          // Split URL berdasarkan "/" untuk mendapatkan segmen rute
          const segments = currentURL.split("/");

          // Ambil nama subkategori dari segmen terakhir dari URL
          const subCategoryName = segments[segments.length - 1];

          // Ubah teks subkategori menjadi nama subkategori dari URL
          subCategory.textContent = subCategoryName;
     });
</script>