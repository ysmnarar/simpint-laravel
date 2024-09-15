<!DOCTYPE html>
<html lang="id">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Halaman Utama Simpint</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <style>
          body {
               background-color: #D0D1E4;
               font-family: Arial, sans-serif;
          }

          .container {
               display: flex;
               flex-wrap: wrap;
               justify-content: center;
               padding: 20px;
          }

          .category-genre {
               background-color: #96BFF8;
               padding: 0;
               border-radius: 10px;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
               margin: 0;
               display: flex;
               justify-content: space-around;
               width: calc(100% - 40px);
               /* Mengurangi padding total dari lebar 100% */
               margin-left: 20px;
               margin-right: 20px;
          }

          .category-bar {
               background-color: #fff;
               padding: 15px;
               border-radius: 10px;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
               margin: 20px 0;
               display: flex;
               justify-content: space-around;
               width: calc(100% - 40px);
               /* Mengurangi padding total dari lebar 100% */
               margin-left: 10px;
               margin-right: 10px;
          }

          .category-button {
               display: inline-flex;
               height: 2.5rem;
               align-items: center;
               justify-content: center;
               gap: 0.5rem;
               white-space: nowrap;
               border-radius: 0.375rem;
               background-color: #D8B4FE;
               padding: 0 3.5rem;
               margin-right: 2px;
               font-size: 20px;
               font-weight: 500;
               color: white;
               transition: background-color 0.3s, box-shadow 0.3s;
               border: none;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }

          .category-button:hover,
          .category-button:focus {
               background-color: #C084FC;
               outline: none;
               box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
          }

          .category-button:disabled {
               cursor: not-allowed;
               background-color: #D8B4FE;
               box-shadow: none;
          }

          .card {
               position: relative;
               width: 250px;
               border-radius: 5px;
               margin: 20px;
               overflow: hidden;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
               background-color: #fff;
               text-decoration: none;
               color: inherit;
               transition: transform 0.2s;
          }

          .card:hover {
               transform: scale(1.05);
          }

          .card img {
               width: 100%;
               height: auto;
          }

          .card-body {
               padding: 15px;
          }

          .card-title {
               font-size: 30px;
               margin-bottom: 8px;
               display: flex;
               justify-content: space-between;
               align-items: center;
          }

          .card a {
               text-decoration: none;
               /* Menghilangkan garis bawah pada link */
               color: inherit;
               /* Memastikan warna teks tidak berubah */
          }

          .card-text {
               font-size: 18px;
               color: #666;
               margin-bottom: 5px;
          }

          .favorite-icon {
               font-size: 24px;
               color: #000;
               cursor: pointer;
               background-color: transparent;
               border: none;
               transition: color 0.3s ease;
               outline: none;
          }

          .favorite-icon.active {
               color: #ff0000;
          }

          .card-w {
               width: 1350px;
               height: 600px;
               border: 1px solid #ccc;
               margin: 0px;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
               background-color: #fff;
               text-decoration: none;
               color: inherit;
               display: flex;
          }

          .card-w img {
               width: 600px;
               height: auto;
          }

          .card-body-w {
               padding: 15px;
               width: 100%;
               text-align: left;
          }

          .card-title-w {
               padding-top: 123px;
               font-size: 30px;
               font-weight: bold;
               color: #96BFF8;
               text-transform: uppercase;
               letter-spacing: 2px;
               text-align: center;
               text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
          }

          .card-title-genre {
               font-size: 30px;
               font-weight: bold;
               color: #fff;
               text-transform: uppercase;
               letter-spacing: 70px;
               text-align: center;
               text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
          }

          .card-paraghraph {
               color: #d4a1ff;
               font-size: 70px;
               margin-bottom: 10px;
               text-transform: lowercase;
               letter-spacing: 2px;
               text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
               text-align: center;
          }

          .flex-sections {
               display: flex;
               justify-content: space-around;
               margin: 20px;
          }

          .flex-sections section {
               flex: 1;
               text-align: center;
               padding: 10px;
               margin: 5px;
               background-color: #fff;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }

          .footer {
               background: linear-gradient(90deg, #d4a1ff, #96BFF8);
               color: #fff;
               padding: 30px 0;
          }

          .footer .container {
               display: flex;
               justify-content: space-between;
               flex-wrap: wrap;
               max-width: 1200px;
               margin: 0 auto;
               padding: 0 5px;
          }

          .footer .container div {
               flex: 1;
               margin: 5px;
          }

          .footer .logo {
               font-size: 24px;
               font-weight: bold;
          }

          .footer .logo img {
               max-width: 400px;
          }

          .footer h3 {
               margin-top: 0;
          }

          .footer p,
          .footer a {
               color: #fff;
               text-decoration: none;
          }

          .footer a:hover {
               text-decoration: underline;
          }

          .footer .social-icons {
               display: flex;
          }

          .footer .social-icons a {
               display: flex;
               align-items: center;
               justify-content: center;
               width: 40px;
               height: 40px;
               margin: 0 5px;
               background-color: #444;
               border-radius: 50%;
               color: #fff;
               transition: background-color 0.3s;
          }

          .footer .social-icons a:hover {
               background-color: #ff6347;
          }

          @media (max-width: 768px) {
               .footer .container {
                    flex-direction: column;
                    text-align: center;
               }

               .footer .container div {
                    margin: 20px 0;
               }
          }
     </style>
</head>

<body>
     @auth
           @include('Front.navbarLogin')
      @else
           @include('Front.navbarFront')
      @endauth

     <section>
          <div class="card-w">
               <img src="https://i.pinimg.com/564x/be/19/05/be19051e4d1dbf5bc142e84014e1fdd2.jpg" alt="kosong">
               <div class="card-body-w">
                    <h3 class="card-title-w">S I M P I N T</h3>
                    <h1 class="card-paraghraph">Winter Reading</h1>
               </div>
          </div>
     </section>

     <div class="flex-sections">
          <section>
               <h2>
                    Deciding what to read next?</h2>
               <p>You’re in the right place. Tell us what titles or genres you’ve enjoyed in the past, and we’ll give
                    you surprisingly insightful recommendations.</p>
          </section>
          <section style="background: linear-gradient(90deg, #96BFF8, #d4a1ff);">
               <h2>What is Simpint?</h2>
               <p>Find detailed synopses of popular reads. It's your ultimate hub for book recommendations based on what
                    you and your friends enjoy. Dive into a world of literary delights with Simpint!</p>
          </section>
          <section>
               <h2>What are your friends reading?</h2>
               <p>Chances are your friends are discussing their favorite (and least favorite) books on SimPint.</p>
          </section>
     </div>

     <div class="category-genre">
          <h3 class="card-title-genre">
               genre
          </h3>
     </div>

     <div class="category-bar">
          @foreach($categories as $category)
                 <a href="{{ url('/categories/' . $category->slug) }}">
                       <button class="category-button">
                              {{ $category->category }}
                       </button>
                 </a>
            @endforeach
     </div>

     <div class="container">
          @foreach ($products as $product)
                 <div class="card">
                       <a href="{{ route('admin.index.detail', $product->id) }}">
                              <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->title }}">
                              <div class="card-body">
                                    <h4 class="card-text">{{ $product->writer_name }}</h4>
                                    <h3 class="card-title">
                                          {{ $product->title }}
                                          @auth
                                                         <button class="favorite-icon {{ $product->isLiked ? 'active' : '' }}"
                                                                 onclick="toggleLike(event, this)" data-id="{{ $product->id }}">
                                                                 <i class="fas fa-heart"></i>
                                                         </button>
                                                    @else
                                                                        <button class="favorite-icon" onclick="alert('Silakan login untuk menyukai produk ini');">
                                                                                <i class="fas fa-heart"></i>
                                                                        </button>
                                                                   @endauth
                                    </h3>
                                    <p class="card-text">Rp. {{ $product->price }}</p>
                              </div>
                       </a>
                 </div>
            @endforeach
     </div>

     <!-- Footer -->
     <footer class="footer">
          <div class="container">
               <!-- Logo dan Slogan -->
               <div class="logo">
                    <img src="{{ asset('/image/logo.png') }}" alt="Logo">
               </div>

               <!-- Kontak -->
               <div>
                    <h3>Contact</h3>
                    <p><i class="fas fa-phone"></i> +62 812 4567 8910</p>
                    <p><i class="fas fa-envelope"></i> SimPint@gmail.com</p>
               </div>

               <!-- Media Sosial -->
               <div>
                    <h3>Ikuti Kami</h3>
                    <div class="social-icons">
                         <a href="#"><i class="fab fa-facebook-f"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
               </div>
          </div>
     </footer>

     <script>
          function toggleLike(event, button) {
               event.preventDefault(); // Mencegah tindakan default link

               const productId = button.dataset.id;
               const isActive = button.classList.toggle('active');

               fetch(`/like/${productId}`, {
                    method: 'POST',
                    headers: {
                         'Content-Type': 'application/json',
                         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
               }).then(response => {
                    if (!response.ok) {
                         button.classList.toggle('active'); // Kembalikan status jika request gagal
                         console.error('Gagal mengubah status suka');
                    }
               }).catch(error => {
                    button.classList.toggle('active'); // Kembalikan status jika request gagal
                    console.error('Error:', error);
               });
          }
     </script>
</body>

</html>