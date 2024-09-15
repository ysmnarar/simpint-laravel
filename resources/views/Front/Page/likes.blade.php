<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Likes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 36px;
        }

        #likesList {
            display: grid;
            gap: 20px;
        }

        .card {
            display: flex;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            height: 240px;
            margin-left: 30px;
            margin-right: 30px;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            margin: 20px;
            margin-left: 30px;
            border-radius: 10px;
            width: 150px;
            height: 200px;
            object-fit: cover;
        }

        .card .content {
            padding: 15px;
            flex: 1;
        }

        .card .title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
            padding-top: 70px;
            color: #333;
        }

        .card .writer-name {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }

        .card .actions {
            display: flex;
            align-items: center;
            padding-right: 25px;
        }

        .card .actions button {
            cursor: pointer;
            padding: 0;
            background-color: transparent;
            border: none;
            color: #999;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .card .actions button:hover {
            color: #d9534f;
        }
    </style>
</head>

<body>
    @include('Front.navbarLogin')
    @include('Front.Page.breadcrumbs')

    <h1>Liked Products</h1>

    <div id="likesList">
        @foreach ($likedProducts as $product)
            <div class="card">
                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->title }}">
                <div class="content">
                    <div class="title">{{ $product->title }}</div>
                    <div class="writer-name">{{ $product->writer_name }}</div>
                </div>
                <div class="actions">
                    <button onclick="removeLike({{ $product->id }})"><i class="fas fa-times"></i></button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function removeLike(productId) {
            fetch(`/like/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    console.error('Gagal menghapus like');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>

</html>