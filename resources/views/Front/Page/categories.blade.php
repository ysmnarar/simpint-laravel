<style>
     .container {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
          padding: 20px;
     }

     .card {
               position: relative;
               width: 250px;
               border-radius: 5px;
               margin: 10px;
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
</style>

@auth
     @include('Front.navbarLogin')
@else
     @include('Front.navbarFront')
@endauth

@include('Front.Page.breadcrumbs')

<div class="container">
    @foreach ($products as $product)
        <div class="card">
            <a href="{{ route('admin.index.detail', $product->id) }}">
                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->title }}">
                <div class="card-body">
                    <h4 class="card-text">{{ $product->writer_name }}</h4>
                    <h3 class="card-title">
                        {{ $product->title }}
                        <button class="favorite-icon {{ $product->isLiked ? 'active' : '' }}"
                                onclick="toggleLike(this)" data-id="{{ $product->id }}">
                            <i class="fas fa-heart"></i>
                        </button>
                    </h3>
                    <p class="card-text">Rp. {{ $product->price }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>
