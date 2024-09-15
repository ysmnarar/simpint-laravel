<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Simpint</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .navbar {
            width: 100%;
            background-color: #333;
            padding: 10px;
            color: #fff;
        }
        .edit-profile-container {
            max-width: 600px;
            width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .edit-profile-container:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .edit-profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
        }
        .edit-profile-form {
            display: grid;
            grid-gap: 20px;
        }
        .edit-profile-form label {
            font-weight: bold;
            color: #555;
            font-size: 16px;
        }
        .edit-profile-form input[type="text"],
        .edit-profile-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-right: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border 0.3s ease;
        }
        .edit-profile-form input[type="text"]:focus,
        .edit-profile-form input[type="email"]:focus {
            border: 1px solid #d4a1ff;
            outline: none;
        }
        .edit-profile-form button[type="submit"] {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background-color: #d4a1ff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        .edit-profile-form button[type="submit"]:hover {
            background-color: #c08bef;
        }
        .avatar-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .avatar-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #d4a1ff;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .avatar-container img:hover {
            transform: scale(1.05);
        }
        .avatar-container input[type="file"] {
            display: none;
        }
        .avatar-container label {
            display: block;
            color: #555;
            cursor: pointer;
            font-weight: bold;
            text-decoration: underline;
            transition: color 0.3s;
            margin-top: 10px;
        }
        .avatar-container label:hover {
            color: #333;
        }
    </style>
</head>
<body>
    @include('Front.navbarLogin')

    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <div class="avatar-container">
            @php
                $avatarPath = $user->avatar ? url('/avatars/' . $user->avatar) : 'https://via.placeholder.com/150';
            @endphp
            <img src="{{ $avatarPath }}" alt="New Profile Picture" id="avatarPreview">
            <input type="file" id="avatar" accept="image/*" onchange="previewAvatar()">
            <label for="avatar">Change Avatar</label>
        </div>

        <form class="edit-profile-form" action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        function previewAvatar() {
            const input = document.getElementById('avatar');
            const preview = document.getElementById('avatarPreview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '{{ $avatarPath }}';
            }
        }
    </script>
</body>
</html>
