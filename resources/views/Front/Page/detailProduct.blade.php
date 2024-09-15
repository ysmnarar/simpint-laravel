<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #D0D1E4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .card {
            display: flex;
            flex-direction: row;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 100%;
            max-width: 1200px;
        }

        .card img {
            width: auto; 
            height: 300px;
            margin: 40px;
            margin-top: 100px;
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: calc(100% - 300px);
        }

        .card-title {
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-text {
            font-size: 19px;
            color: #666;
            margin-bottom: 0;
        }

        .card-text-price {
            font-size: 24px;
            font-weight: bold;
            color: #666;
            margin-bottom: 10px;
        }

        .favorite-icon {
            font-size: 30px;
            padding: 30px;
            margin-bottom: 10px;
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

        .description {
            font-size: 20px;
            max-height: 100px;
            overflow: hidden;
            position: relative;
        }

        .description.expanded {
            max-height: none;
        }

        .read-more {
            cursor: pointer;
            font-size: 19px;
            text-align: right;
            margin-top: 10px;
        }

        .book-description {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    @auth
        @include('Front.navbarLogin')
    @else
        @include('Front.navbarFront')
    @endauth

    @include('Front.Page.breadcrumbs')

    <div class="container">
        <div class="card">
            <img src="{{ asset('storage/' . $products->img) }}" alt="{{ $products->title }}">
            <div class="card-body">
                <h4 class="card-text">{{ $products->writer_name }}</h4>
                <div class="card-title">
                    {{ $products->title }}
                    <button class="favorite-icon {{ $liked ? 'active' : '' }}" onclick="toggleLike(this)"
                        data-id="{{ $products->id }}">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="book-description">
                    Description Book
                </div>
                <div class="description" id="description">
                    {{ $products->desc }}
                </div>
                <p class="read-more" id="readMore">Read More</p>
                <p class="card-text-price">Rp. {{ $products->price }}</p>
            </div>
        </div>
    </div>

    <script>
        function toggleLike(button) {
            button.classList.toggle('active');
            const productId = button.dataset.id;
            fetch(`/like/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                if (response.ok) {
                    const message = button.classList.contains('active') ? 'Product added to likes!' : 'Product removed from likes!';
                    alert(message);
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const description = document.getElementById("description");
            const readMore = document.getElementById("readMore");

            readMore.addEventListener("click", function () {
                description.classList.toggle("expanded");
                readMore.textContent = description.classList.contains("expanded") ? "Read Less" : "Read More";
            });
        });
    </script>
</body>

</html>