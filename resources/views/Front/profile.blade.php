<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Simpint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .profile-picture {
            position: relative;
            margin-bottom: 15px;
        }

        .profile-picture img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #d4a1ff;
        }

        .upload-icon {
            position: absolute;
            top: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 24px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-info {
            text-align: center;
            margin-bottom: 10px;
        }

        .edit-profile-btn,
        .logout-btn {
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            margin: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            text-transform: uppercase;
        }

        .edit-profile-btn {
            background-color: #d4a1ff;
            color: #fff;
            margin-right: 5px;
        }

        .logout-btn {
            background-color: #96BFF8;
            color: #fff;
            margin-left: 5px;
        }

        .edit-profile-btn:hover,
        .logout-btn:hover {
            background-color: #a073ff;
        }
    </style>
</head>

<body>
    @include('Front.navbarLogin')
    @include('Front.Page.breadcrumbs')

    <div class="profile-header">
        <div class="profile-picture">
            @php
                $avatarPath = $user->avatar ? Storage::url($user->avatar) : 'https://via.placeholder.com/150';
            @endphp
            <img src="{{ $avatarPath }}" alt="Profile Picture">

            <div class="upload-icon" onclick="document.getElementById('avatar').click();">+</div>
            <form id="uploadAvatarForm" action="{{ route('update.profile') }}" method="POST"
                enctype="multipart/form-data" style="display: none;">
                @csrf
                <input type="file" name="avatar" id="avatar"
                    onchange="document.getElementById('uploadAvatarForm').submit();">
            </form>
        </div>

        <div class="profile-info">
            <h1>{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div>
            <button class="edit-profile-btn" onclick="window.location.href='{{ route('edit.profile') }}'">Edit
                Profile</button>
            <button class="logout-btn" onclick="document.getElementById('logout-form').submit();">Logout</button>
        </div>
    </div>

    <script>
        document.getElementById('avatar').addEventListener('change', function () {
            document.getElementById('uploadAvatarForm').submit();
        });
    </script>
</body>

</html>