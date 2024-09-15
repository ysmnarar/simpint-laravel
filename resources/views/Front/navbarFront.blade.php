<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }

    header {
        background: linear-gradient(90deg, #d4a1ff, #96BFF8);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
        max-width: 100%;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 10px 0;
        width: 100%;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .nav-icons a {
        margin-left: 20px;
        position: relative;
        display: inline-block;
        transition: transform 0.3s ease;
        color: #fff;
        text-decoration: none;
    }

    .nav-icons a:hover {
        transform: scale(1.1);
        color: #ffeb3b;
    }

    .nav-icons img {
        width: 24px;
        height: 24px;
        filter: invert(100%);
    }

    .nav-icons a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background-color: #ffeb3b;
        bottom: -5px;
        left: 50%;
        transition: width 0.3s ease, left 0.3s ease;
    }

    .nav-icons a:hover::after {
        width: 100%;
        left: 0;
    }

    .sidebar {
        width: 270px;
        height: calc(100% - 60px);
        background-color: #fff;
        position: fixed;
        top: 60px;
        right: -350px;
        transition: right 0.3s ease;
        z-index: 999;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .sidebar.show {
        right: 0;
    }

    .sidebar form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .sidebar .btn {
        width: calc(100% - 40px);
        margin: 5px 0;
        padding: 17px;
        font-size: 16px;
        background: none;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.3s, background 0.3s;
        position: relative;
    }

    .sidebar .btn:hover {
        background-color: #96BFF8;
        transform: scale(1.05);
    }

    .overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        top: 0;
        left: 0;
        z-index: 998;
        display: none;
    }

    .overlay.active {
        display: block;
    }

    @media (max-width: 768px) {
        .header-container {
            flex-direction: column;
        }

        .search-bar input {
            width: 100%;
            margin-top: 10px;
        }

        .nav-icons {
            margin-top: 10px;
        }
    }
</style>

<header>
    <div class="header-container">
        <div class="logo">Simpint</div>
        <div class="nav-icons">
            <a href="{{ route('login') }}">
                <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.7.0/png/iconmonstr-heart-lined.png&r=255&g=255&b=255"
                    alt="Like">
            </a>
            <a href="#" id="sidebarBtn">
                <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.3.0/png/iconmonstr-menu-lined.png&r=255&g=255&b=255"
                    alt="Dropdown">
            </a>
        </div>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <form class="container-fluid justify-content-start">
        <button class="btn" type="button" style="margin-top: 30px;" onclick="redirectLogin()">Profile</button>
        <button class="btn" type="button" onclick="redirectLogin()">Dashboard</button>
        <button class="btn btn-login" style="margin-top: 300px; background-color: #BDBDBD;" type="button"
            onclick="redirectLogin()">Sign In</button>
        <button class="btn btn-register" style="background-color: #999898" type="button"
            onclick="redirectRegister()">Sign Up</button>
    </form>
</div>

<div class="overlay" id="overlay"></div>

<script>
    function redirectLogin() {
        window.location.href = '/login';
    }

    function redirectRegister() {
        window.location.href = '/register';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const sidebarBtn = document.getElementById('sidebarBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebarBtn.addEventListener('click', function () {
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
            } else {
                sidebar.classList.add('show');
                overlay.classList.add('active');
            }
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });
    });
</script>