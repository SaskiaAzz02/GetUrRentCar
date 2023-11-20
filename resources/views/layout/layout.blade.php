<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}
/*these classes are nessesary if you want to Use navbar only*/
:root {
    --white: white;
    --black: rgb(0, 0, 0);
    --links: 18px;
    --paragraph: 24px;
    --heading: 40px;
    --logoS: 100px;
}



.navbar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    backdrop-filter: invert(20%);
    position: fixed;
    background-color: rgba(0, 175, 206, 250);

}

.logo {
    width: var(--logoS);
    padding: 15px 20px;
}

.container-nav {
    width: 100%;
    max-width: 1200px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.data-icons {
    display: none;
    padding: 10px 15px;
}

a {
    font-size: var(--links);
    text-decoration: none;
    padding: 10px 15px;
    margin: 10px;
    transition: all 0.5s;
    color: var(--white);
    border-radius: 25px;
}

i {
    color: var(--white);
}

a:hover {
    background-color: var(--white);

    color: var(--black);
    transform: scale(1.05);
}

.data-links {
    display: flex;
    align-items: center;
    margin-left: auto;
}
.size {
    font-size: 25px;
    padding: 5px 7px;
}
h1 i{
    color: rgb(255, 96, 123);
}
@media (max-width:860px) {
    a {
        padding: 5px 7px;
        margin: 5px;
    }

    .logo {
        padding: 3px 5px;
    }

}

@media (max-width:730px) {
    .data-links {
        position: absolute;
        flex-direction: column;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.678);
        transform: translateY(-200%);
        filter: blur(20px);
        transition: all 0.5s;
        text-align: center;
    }
    a {
        width: 100%;
        margin: 0;
        border-radius: 0;
    }
    .data-icons {
        display: block;
        padding: 5px 7px;
    }
}

/*these classes are temporary to just have a rich view of sreen*/
.header {
    display: flex;
    flex-direction: column;
    height: 10vh;
    /*temporary you can remove it, i just applied it to have a full screen view of my work*/
    width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}
.hero-section {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: var(--white);
}

.hero-section h1 {
    font-size: var(--heading);
    text-transform: capitalize;
    text-align: center;
    padding: 10px 15px;
}

.hero-section p {
    font-size: var(--paragraph);
    color: rgb(165, 165, 165);
    text-transform: capitalize;
    text-align: center;
    padding: 10px 15px;
}



    </style>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="header">
        <nav class="navbar">
            <div class="container-nav">
            <!-- <img src="https://i.ibb.co/kGbqdSB/NEW-2.png" alt="Logo" class="logo"> -->
            <div class="data-links nav-links">
                <a href="/mobil">Mobil</a>
                <a href="/detail">Detail Sewa</a>
                <a href="/penyewaan">Penyewaan</a>
                <a href="/pengembalian">Pengembalian</a>
                <!-- <a href="">Contact Us</a> -->
                <!-- <a href="">Search</a> -->
            </div>
            <div class="data-icons">
           <i onclick="menu()" class="menu-icon size fa-solid fa-bars"></i>
           <i onclick="Mclose()" class="close-icon size fa-solid fa-xmark"></i>
            </div>
        </div>
        </nav>
    </div>
    <div class="">
        @yield('content')
    </div>
</body>
</html>