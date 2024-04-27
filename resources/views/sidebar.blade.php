<style>
    /*===== GOOGLE FONTS =====*/
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    /*===== VARIABLES CSS =====*/
    :root {
        --header-height: 3rem;
        --nav-width: 68px;

        /*===== Colors =====*/
        --first-color: #0a043c;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;

        /*===== Font and typography =====*/
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;

        /*===== z index =====*/
        --z-fixed: 100;
    }

    /*===== BASE =====*/
    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s;
    }

    a {
        text-decoration: none;
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s;
    }

    .header__toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer;
    }

    .header__img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
    }

    .header__img img {
        width: 40px;
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background: var(--first-color);
        padding: 0.5rem 1rem 0 0;
        transition: 0.5s;
        z-index: var(--z-fixed);
        overflow-y: auto;
        /* Change to 'auto' */
        max-height: 100vh;
        /* Set a maximum height to prevent the sidebar from becoming too long */
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
    }

    .nav__logo,
    .nav__link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding-left: 1.5rem;
        /* padding:.5rem 0 .5rem 1.5rem; */
    }

    .nav__logo {
        margin-bottom: 1rem;
    }

    .nav__logo-icon {
        font-size: 1.25rem;
        color: var(--white-color);
    }

    .nav__logo-name {
        font-weight: 700;
        color: var(--white-color);
    }

    .nav__link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 0.5rem;
        transition: .3s;
    }

    .nav__link:hover {
        color: var(--white-color);
    }

    .nav__icon {
        font-size: 1.25rem;
    }

    .show {
        left: 0;
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem);
    }

    .active {
        color: var(--white-color);
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color);
    }

    h1 {
        padding: 2rem 0 0;
    }

    p {
        color: #333;
        line-height: 1.6;
    }

    @media screen and (min-width:768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem);
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 1rem 0 calc(var(--nav-width) + 1rem);
        }

        .header__img {
            width: 40px;
            height: 40px;
        }

        .header__img img {
            width: 45px;
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0;
        }

        .show {
            width: calc(var(--nav-width) + 156px);
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px);
        }

        .submenu ul {
            display: none;
        }

        .nav__logo,
        .nav__link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            /* padding-left: 1.5rem; */
            padding: .5rem 0 .5rem 1.5rem;
        }
    }

    .submenu ul.show-submenu {
        display: block;
    }



    .main-color {
        background-color: var(--first-color);
        color: white;
    }

    .main-color:hover {
        background-color: var(--first-color);
        color: lightgray;
    }
</style>

<header class="header" id="header">
    <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <div class="d-flex">
        <p class="mx-3 my-2" style="font-size: 18px">Hi, Admin </p>
        <div class="header__img">
            <img decoding="async" src="{{asset('storage/img/a-1.png') }}" alt="Image">
        </div>
    </div>
</header>

<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav__logo">
                <i class='bx bx-layer nav__logo-icon'></i>
                <span class="nav__logo-name">Textile</span>
            </a>
            <div class="nav__list">
                <a href="/companies" class="nav__link">
                    <i class='bx bx-grid-alt nav__icon'></i>
                    <span class="nav__name">Companies</span>
                </a>
            
                <a href="/employees" class="nav__link">
                    <i class="fa-regular fa-user nav__icon"></i>
                    <span class="nav__name">Employees</span>
                </a>
             


            </div>
        </div>
        <a href="/logout" class="nav__link">
            <i class='bx bx-log-out nav__icon'></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>


<!--===== MAIN JS =====-->
<script>
    const toggleSubmenu = (link, submenu, submenuClass) => {
        link.addEventListener('click', () => {
            // Hide all other submenus
            document.querySelectorAll('.nav__link').forEach(otherLink => {
                if (otherLink !== link) {
                    const otherSubmenu = otherLink.nextElementSibling;
                    if (otherSubmenu) {
                        otherSubmenu.classList.remove(`show-${otherLink.dataset.submenuClass}`);
                    }
                }
            });

            // Toggle the clicked submenu
            submenu.classList.toggle(`show-${submenuClass}`);
        });
    };

    const showNavbar = (toggleId, navId, bodyId, headerId, submenus) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                nav.classList.toggle('show');
                toggle.classList.toggle('bx-x');
                bodypd.classList.toggle('body-pd');
                headerpd.classList.toggle('body-pd');

                // Hide all submenus
                submenus.forEach(submenuClass => {
                    document.querySelectorAll(`.${submenuClass}`).forEach(submenu => {
                        submenu.classList.remove(`show-${submenuClass}`);
                    });
                });
            });
        }
    };

    const submenuLinks = document.querySelectorAll('.nav__link');
    submenuLinks.forEach(link => {
        const submenu = link.nextElementSibling;
        if (submenu) {
            toggleSubmenu(link, submenu, link.dataset.submenuClass);
        }
    });

    const submenuClasses = [
        'submenu1',
        'submenu2',
        'submenu3',
        'submenu4',
        'submenu5'
    ];

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header', submenuClasses);
</script>


